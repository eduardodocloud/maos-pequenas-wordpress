#!/bin/bash
# =============================================================
# Import dos artigos do blog (data/articles.json) para o WordPress
# Cria 43 posts com datas históricas (jun/2020 → ago/2024), categorias
# e excerpts. Pode ser rodado standalone ou pelo setup-wordpress.sh.
# =============================================================
set -e

export PATH="/usr/local/bin:/usr/local/sbin:/usr/local/opt/php@8.2/bin:/opt/homebrew/bin:$PATH"

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
ARTICLES_JSON="$SCRIPT_DIR/data/articles.json"

# WP-CLI: usa o do sistema ou cai para o .phar do user
if command -v wp &>/dev/null; then
  WP="wp"
elif [ -f "$HOME/Sites/wp-cli.phar" ] && command -v php &>/dev/null; then
  WP="php $HOME/Sites/wp-cli.phar"
else
  echo "❌ WP-CLI não encontrado. Instale com 'brew install wp-cli'."
  exit 1
fi

# Diretório do WordPress (pode passar via $1 ou usa o default do setup)
SITE_DIR="${1:-$HOME/Sites/larmaospequenas}"
if [ ! -f "$SITE_DIR/wp-config.php" ]; then
  echo "❌ WordPress não encontrado em $SITE_DIR"
  echo "   Uso: bash import-artigos.sh [/caminho/do/wordpress]"
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

# Cria categorias antes de criar posts
for cat in "Acolhimento" "Adoção" "Como Ajudar" "Desenvolvimento Infantil" "Direitos" "Notícias"; do
  $WP term create category "$cat" --slug="$(echo $cat | tr '[:upper:]' '[:lower:]' | tr ' ' '-' | sed 's/ção/cao/;s/ã/a/g;s/á/a/g;s/é/e/g;s/í/i/g;s/ó/o/g')" 2>/dev/null || true
done

# Processa o JSON com python3 + cria posts via WP-CLI
TOTAL=$(python3 -c "import json; print(len(json.load(open('$ARTICLES_JSON'))))")
echo "   Total a importar: $TOTAL artigos"
echo ""

COUNT=0
python3 -c "
import json
data = json.load(open('$ARTICLES_JSON'))
for a in data:
    # Imprime em formato delimitado por NULs para o bash consumir com IFS seguro
    print('\x1e'.join([a['date'], a['title'], a['category'], a['excerpt'], a['content']]))
" | while IFS=$'\x1e' read -r date title category excerpt content; do
  COUNT=$((COUNT + 1))
  printf "  [%2d/%d] %s — %s\n" "$COUNT" "$TOTAL" "${date:0:10}" "${title:0:60}"

  # Cria post; o WP-CLI lê o conteúdo de stdin se passar --post_content=-
  POST_ID=$(echo "$content" | $WP post create \
    --post_type=post \
    --post_status=publish \
    --post_title="$title" \
    --post_excerpt="$excerpt" \
    --post_date="$date" \
    --post_date_gmt="$date" \
    --post_content=- \
    --porcelain 2>/dev/null)

  if [ -n "$POST_ID" ]; then
    # Atribui categoria
    $WP post term set "$POST_ID" category "$category" 2>/dev/null || true
  fi
done

echo ""
echo "✅ Importação concluída"
echo "   Total no banco: $($WP post list --post_type=post --format=count 2>/dev/null) posts"
