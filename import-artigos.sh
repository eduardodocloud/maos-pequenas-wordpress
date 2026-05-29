#!/bin/bash
# =============================================================
# Import dos artigos do blog (data/articles.json) para o WordPress
# Cria posts com datas históricas, categorias e excerpts.
# =============================================================
set -e

export PATH="/usr/local/bin:/usr/local/sbin:/usr/local/opt/php@8.2/bin:/opt/homebrew/bin:$PATH"

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
ARTICLES_JSON="$SCRIPT_DIR/data/articles.json"

# WP-CLI
if command -v wp &>/dev/null; then
  WP_CMD="wp"
elif [ -f "$HOME/Sites/wp-cli.phar" ] && command -v php &>/dev/null; then
  WP_CMD="php $HOME/Sites/wp-cli.phar"
else
  echo "❌ WP-CLI não encontrado."
  exit 1
fi

SITE_DIR="${1:-$HOME/Sites/larmaospequenas}"
if [ ! -f "$SITE_DIR/wp-config.php" ]; then
  echo "❌ WordPress não encontrado em $SITE_DIR"
  exit 1
fi
cd "$SITE_DIR"

if [ ! -f "$ARTICLES_JSON" ]; then
  echo "❌ Arquivo $ARTICLES_JSON não encontrado"
  exit 1
fi

echo "📚 Importando artigos do blog..."
echo "   Origem: $ARTICLES_JSON"
echo "   WordPress: $SITE_DIR"
echo ""

# Cria categorias
for cat in "Acolhimento" "Adoção" "Como Ajudar" "Desenvolvimento Infantil" "Direitos" "Notícias"; do
  $WP_CMD --skip-plugins term create category "$cat" 2>/dev/null > /dev/null || true
done

# Faz tudo em Python — chama wp_cli para cada artigo, passa content via tempfile
SITE_DIR="$SITE_DIR" WP_CMD="$WP_CMD" ARTICLES_JSON="$ARTICLES_JSON" python3 << 'PYEOF'
import json, os, subprocess, tempfile, sys

site_dir = os.environ['SITE_DIR']
wp_cmd   = os.environ['WP_CMD'].split()
articles = json.load(open(os.environ['ARTICLES_JSON']))

print(f"   Total a importar: {len(articles)} artigos\n")

def wp(*args, input_=None):
    return subprocess.run(
        wp_cmd + ['--skip-plugins'] + list(args),
        cwd=site_dir, input=input_, capture_output=True, text=True
    )

ok = 0
for i, a in enumerate(articles, 1):
    title = a['title']
    date  = a['date']
    print(f"  [{i:2d}/{len(articles)}] {date[:10]} — {title[:65]}")

    # Escreve content em arquivo temporário e passa via --post_content=-
    with tempfile.NamedTemporaryFile('w', suffix='.html', delete=False, encoding='utf-8') as f:
        f.write(a['content'])
        tmpf = f.name
    try:
        with open(tmpf, 'r', encoding='utf-8') as cf:
            result = wp(
                'post', 'create',
                '--post_type=post',
                '--post_status=publish',
                f"--post_title={title}",
                f"--post_excerpt={a['excerpt']}",
                f"--post_date={date}",
                f"--post_date_gmt={date}",
                '--post_content=-',
                '--porcelain',
                input_=cf.read(),
            )
        pid = result.stdout.strip().split('\n')[-1]
        if pid.isdigit():
            ok += 1
            # Atribui categoria
            subprocess.run(
                wp_cmd + ['--skip-plugins','post','term','set', pid, 'category', a['category']],
                cwd=site_dir, capture_output=True, text=True
            )
        else:
            print(f"      ⚠️  falhou: {result.stderr[:200]}", file=sys.stderr)
    finally:
        os.unlink(tmpf)

print(f"\n✅ {ok}/{len(articles)} artigos importados")
PYEOF

echo ""
echo "📊 Total de posts no banco:"
$WP_CMD --skip-plugins post list --post_type=post --format=count 2>/dev/null | grep -v Deprecated
