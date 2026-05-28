#!/bin/bash
# =====================================================
# SETUP WORDPRESS — Lar Mãos Pequenas
# =====================================================
set -e

# Configurar PATH
export PATH="/usr/local/bin:/usr/local/sbin:/usr/local/opt/php@8.2/bin:/opt/homebrew/bin:$PATH"

# Detectar WP-CLI
if command -v wp &>/dev/null; then
  WP="wp"
elif [ -f "$HOME/Sites/wp-cli.phar" ] && command -v php &>/dev/null; then
  WP="php $HOME/Sites/wp-cli.phar"
  echo "ℹ️  Usando WP-CLI .phar"
else
  echo "❌ PHP ou WP-CLI não encontrado."
  echo "   Execute: brew install shivammathur/php/php@8.2 wp-cli"
  exit 1
fi

# Detectar PHP
PHP_BIN=$(command -v php)
echo "✅ PHP: $PHP_BIN"
echo "✅ WP-CLI: $WP"

# Configurações
SITE_DIR="$HOME/Sites/larmaospequenas"
SITE_URL="http://localhost:8080"
DB_NAME="larmaospequenas"
DB_USER="root"
DB_PASS=""
WP_ADMIN_USER="admin"
WP_ADMIN_PASS="maospequenas2025"
WP_ADMIN_EMAIL="larmaospequenas@gmail.com"
# Como este script vive dentro do próprio diretório do tema,
# o source do tema é o diretório onde o script reside.
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
THEME_SRC="$SCRIPT_DIR"

echo ""
echo "============================================"
echo "  SETUP: Lar Mãos Pequenas WordPress"
echo "============================================"
echo ""

# 1. Criar diretório do site
echo "📁 Criando diretório do site..."
mkdir -p "$SITE_DIR"
cd "$SITE_DIR"

# 2. Baixar WordPress em PT-BR
echo "⬇️  Baixando WordPress em português..."
$WP core download --locale=pt_BR --force

# 3. Iniciar MariaDB se não estiver rodando
echo "🗄️  Verificando banco de dados..."
if command -v mysql &>/dev/null; then
  brew services start mariadb 2>/dev/null || brew services start mysql 2>/dev/null || true
  sleep 2

  # Criar banco de dados
  mysql -u root -e "CREATE DATABASE IF NOT EXISTS \`$DB_NAME\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>/dev/null && \
    echo "✅ Banco de dados '$DB_NAME' criado/verificado" || \
    echo "⚠️  Configure o banco manualmente: CREATE DATABASE $DB_NAME;"
else
  echo "⚠️  MySQL/MariaDB não encontrado."
  echo "   Execute: brew install mariadb && brew services start mariadb"
  echo "   Depois crie o banco: mysql -u root -e \"CREATE DATABASE $DB_NAME;\""
fi

# 4. Criar wp-config.php
echo "⚙️  Criando wp-config..."
if [ ! -f wp-config.php ]; then
  $WP config create \
    --dbname="$DB_NAME" \
    --dbuser="$DB_USER" \
    --dbpass="$DB_PASS" \
    --dbhost="127.0.0.1" \
    --locale=pt_BR
fi

# 5. Instalar WordPress
echo "🚀 Instalando WordPress..."
$WP core install \
  --url="$SITE_URL" \
  --title="Lar Mãos Pequenas — Lar Assistencial" \
  --admin_user="$WP_ADMIN_USER" \
  --admin_password="$WP_ADMIN_PASS" \
  --admin_email="$WP_ADMIN_EMAIL" \
  --skip-email

# 6. Configurações básicas
echo "🔧 Configurando WordPress..."
$WP option update blogdescription "Lar Assistencial — Acolhimento com amor há mais de 20 anos em Diadema, SP"
$WP option update timezone_string "America/Sao_Paulo"
$WP option update date_format "d/m/Y"
$WP option update time_format "H:i"
$WP option update start_of_week 1
$WP option update posts_per_page 9
$WP option update WPLANG "pt_BR"
$WP rewrite structure "/%category%/%postname%/" --hard

# Remover conteúdo padrão
$WP post delete 1 2 --force 2>/dev/null || true

# 7. Instalar e ativar tema
echo "🎨 Instalando tema Mãos Pequenas..."
THEME_DEST="$SITE_DIR/wp-content/themes/maos-pequenas"
mkdir -p "$THEME_DEST"
cp -r "$THEME_SRC/." "$THEME_DEST/"
$WP theme activate maos-pequenas

# 8. Criar páginas do site (estrutura do briefing oficial)
echo "📄 Criando páginas..."

HOME_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Home" --post_name="home" --post_content="" --porcelain)
$WP post meta update $HOME_ID _wp_page_template "front-page.php"

ABOUT_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Quem Somos" --post_name="quem-somos" --post_content="" --porcelain)
$WP post meta update $ABOUT_ID _wp_page_template "page-quem-somos.php"

DOACOES_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Doações" --post_name="doacoes" --post_content="" --porcelain)
$WP post meta update $DOACOES_ID _wp_page_template "page-doacoes.php"

VOL_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Seja Voluntário" --post_name="seja-voluntario" --post_content="" --porcelain)
$WP post meta update $VOL_ID _wp_page_template "page-seja-voluntario.php"

PARC_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Parceiros" --post_name="parceiros" --post_content="" --porcelain)
$WP post meta update $PARC_ID _wp_page_template "page-parceiros.php"

DADOS_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Dados aos Doadores" --post_name="dados-aos-doadores" --post_content="" --porcelain)
$WP post meta update $DADOS_ID _wp_page_template "page-dados-aos-doadores.php"

BLOG_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Blog" --post_name="blog" --post_content="" --porcelain)

CONTACT_ID=$($WP post create --post_type=page --post_status=publish \
  --post_title="Contato" --post_name="contato" --post_content="" --porcelain)
$WP post meta update $CONTACT_ID _wp_page_template "page-contato.php"

# Configurar página inicial
$WP option update page_on_front $HOME_ID
$WP option update page_for_posts $BLOG_ID
$WP option update show_on_front "page"

# 9. Criar posts de exemplo
echo "📝 Criando conteúdo inicial..."
$WP post create \
  --post_type=post --post_status=publish \
  --post_title="Como funciona o acolhimento no Lar Mãos Pequenas" \
  --post_excerpt="Entenda como acolhemos crianças e adolescentes em situação de vulnerabilidade." \
  --post_content="<p>Você sabe como funciona o acolhimento de uma criança? Muita gente imagina que é só oferecer um teto, comida e roupas. Mas o acolhimento vai muito além disso.</p><p>No Lar Mãos Pequenas, cada criança que chega carrega uma história. Nosso papel é oferecer um ambiente seguro, afetuoso e estruturado, onde ela possa se sentir cuidada de verdade.</p><p>Acolher é garantir escola, alimentação, saúde, apoio emocional e, principalmente, presença. É mostrar que, mesmo longe da família, ela não está sozinha.</p>" 2>/dev/null

$WP post create \
  --post_type=post --post_status=publish \
  --post_title="20 anos do Lar Mãos Pequenas: uma história de amor" \
  --post_excerpt="Celebramos 20 anos transformando vidas em Diadema, SP." \
  --post_content="<p>Em 2025, o Lar Mãos Pequenas celebra 20 anos de atuação dedicados ao acolhimento de crianças e adolescentes em Diadema, São Paulo.</p><p>Ao longo dessas duas décadas, centenas de crianças passaram por nosso lar e foram devolvidas às suas famílias ou encaminhadas para adoção com amor, segurança e perspectiva de futuro.</p><p>Essa história só foi possível graças a você — doadores, voluntários e parceiros que acreditam no poder da solidariedade.</p>" 2>/dev/null

$WP post create \
  --post_type=post --post_status=publish \
  --post_title="Por que ser voluntário transforma a sua vida também" \
  --post_excerpt="Descubra como o voluntariado beneficia tanto as crianças quanto você." \
  --post_content="<p>Ser voluntário é uma recompensa enorme — principalmente para as crianças. Quando você dedica seu tempo, talento e carinho ao Lar Mãos Pequenas, você não está apenas ajudando — você está se transformando também.</p><p>Quer fazer parte dessa experiência? Cadastre-se como voluntário na página 'Como Ajudar'.</p>" 2>/dev/null

# 10. Configurar identidade visual via customizer (dados reais do briefing)
echo "🎨 Configurando customizer..."
$WP option update "theme_mods_maos-pequenas" '{"mp_whatsapp":"(11) 4047-2289","mp_tel_1":"(11) 4047-2167","mp_tel_2":"(11) 4047-2289","mp_fax":"(11) 4049-6305","mp_tel_3":"(11) 4059-6973","mp_email":"larmaospequenas@gmail.com","mp_instagram":"https://instagram.com/larmaospequenas","mp_cnpj":"07.679.226/0001-00","mp_util_publica":"2877/09","mp_endereco":"Estrada Nova Ipê, 440 — Condomínio Praia Vermelha — Diadema/SP","mp_horario":"Segunda à sexta-feira, das 9h às 17h","mp_doare_url":"https://doare.org/","mp_hero_titulo_1":"Um pequeno gesto pode fazer uma <span>grande diferença<\/span>","mp_hero_texto_1":"Faça sua doação e ajude a transformar a vida de crianças e adolescentes acolhidos no Lar Mãos Pequenas.","mp_hero_titulo_2":"Há 20 anos levando esperança para <span>crianças e adolescentes<\/span>","mp_hero_texto_2":"O Lar Assistencial Mãos Pequenas é um espaço de acolhimento, afeto e dignidade em Diadema/SP."}' 2>/dev/null || true

# 10.1. Upload dos PDFs de transparência (Estatuto + Balancetes)
DOCS_DIR="$HOME/Desktop/site"
if [ -d "$DOCS_DIR" ]; then
  echo "📎 Importando documentos de transparência..."

  # Mapa: caminho-do-arquivo|slug-do-anexo|título
  declare -a DOC_MAP=(
    "$DOCS_DIR/Estatuto Atual_Novo Endereço.pdf|estatuto-social|Estatuto Social"
    "$DOCS_DIR/Ata Atual_Diretoria (2).pdf|ata-diretoria|Ata da Diretoria"
    "$DOCS_DIR/Balancetes/Mãos Pequenas - Demonstrações Contábeis Completas (BP-DR-DMPL-FC-NE) 2018.pdf|balancete-2018|Balancete 2018"
    "$DOCS_DIR/Balancetes/Mãos Pequenas - Peças Contábeis - BP-DRE-DMPL-DFI-NE - 2017.pdf|balancete-2017|Balancete 2017"
    "$DOCS_DIR/Balancetes/037 - Lar Assistencial Mãos Pequenas - Demonstrações Contábeis (Notas Explicativas) 2016.pdf|balancete-2016|Balancete 2016"
    "$DOCS_DIR/Balancetes/039 - Demonstrações Contabeis Completas 2015.doc|balancete-2015|Balancete 2015"
    "$DOCS_DIR/Balancetes/039 - Demonstrações Contábeis (BP-DR-DMPL-FC) 2014-2013.xlsx|balancete-2014|Balancete 2014-2013"
    "$DOCS_DIR/Balancetes/039 -Lar Mão Pequenas - Demonstracoes contabeis 2013 - 2012.pdf|balancete-2013|Balancete 2013-2012"
    "$DOCS_DIR/Balancetes/Lar Ass Mãos Pequenas - NOTAS EXPLICATIVAS ÀS DEMONSTRAÇÕES CONTÁBEIS EM 31-12-2012.doc|balancete-2012|Balancete 2012"
    "$DOCS_DIR/Balancetes/Lar Mãos Pequenas - Demonstrações Financeiras 2012 Comparativo 2011.xlsx|balancete-2011|Balancete 2012-2011"
  )

  for entry in "${DOC_MAP[@]}"; do
    IFS='|' read -r file slug title <<< "$entry"
    if [ -f "$file" ]; then
      $WP media import "$file" --title="$title" --porcelain 2>/dev/null | head -1 | while read aid; do
        if [ -n "$aid" ]; then
          $WP post update "$aid" --post_name="$slug" 2>/dev/null || true
        fi
      done
    fi
  done
  echo "✅ Documentos importados"
fi

# 11. Instalar logo SVG como custom logo
LOGO_PATH="$THEME_DEST/assets/images/logo.svg"
if [ -f "$LOGO_PATH" ]; then
  LOGO_ID=$($WP media import "$LOGO_PATH" --porcelain 2>/dev/null) || LOGO_ID=""
  if [ -n "$LOGO_ID" ]; then
    $WP option update "theme_mods_maos-pequenas" \
      "$(echo $($WP option get theme_mods_maos-pequenas --format=json 2>/dev/null || echo '{}') | python3 -c "import sys,json; d=json.load(sys.stdin); d['custom_logo']=$LOGO_ID; print(json.dumps(d))")" 2>/dev/null || true
  fi
fi

# 12. Plugins
echo "🔌 Instalando plugins..."
$WP plugin delete hello akismet 2>/dev/null || true
$WP plugin install yoast-seo --activate 2>/dev/null || echo "ℹ️  Yoast SEO: instale manualmente"
$WP plugin install contact-form-7 --activate 2>/dev/null || echo "ℹ️  Contact Form 7: instale manualmente"

# 13. Iniciar servidor
echo ""
echo "✅ ==============================================="
echo "   SITE CONFIGURADO COM SUCESSO!"
echo "   =============================================="
echo "   🌐 Site:    $SITE_URL"
echo "   🔧 Admin:   $SITE_URL/wp-admin"
echo "   👤 Usuário: $WP_ADMIN_USER"
echo "   🔑 Senha:   $WP_ADMIN_PASS"
echo "   =============================================="
echo ""
echo "   Iniciando servidor em http://localhost:8080 ..."
echo "   (Ctrl+C para parar)"
echo ""

cd "$SITE_DIR"
$WP server --host=0.0.0.0 --port=8080 2>/dev/null || \
  php -S 0.0.0.0:8080 -t "$SITE_DIR" 2>&1
