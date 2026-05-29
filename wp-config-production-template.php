<?php
/**
 * ============================================================
 * Template de wp-config.php para PRODUÇÃO
 * Lar Mãos Pequenas — larmaospequenas.org.br
 * ============================================================
 *
 * Como usar:
 * 1) Substitua os valores em ALL_CAPS pelos da hospedagem.
 * 2) Gere AUTH_KEY e amigos em https://api.wordpress.org/secret-key/1.1/salt/
 *    e cole no lugar dos placeholders.
 * 3) Salve como `wp-config.php` na raiz do WordPress (NÃO commit no git).
 */

// ─── Banco de dados ─────────────────────────────────────────
define('DB_NAME',     'DBNAME_AQUI');
define('DB_USER',     'DBUSER_AQUI');
define('DB_PASSWORD', 'DBPASS_AQUI');
define('DB_HOST',     'localhost');     // ou IP da hospedagem
define('DB_CHARSET',  'utf8mb4');
define('DB_COLLATE',  '');

// ─── Chaves de autenticação (gere novas!) ───────────────────
// https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'COLE_CHAVE_GERADA_AQUI');
define('SECURE_AUTH_KEY',  'COLE_CHAVE_GERADA_AQUI');
define('LOGGED_IN_KEY',    'COLE_CHAVE_GERADA_AQUI');
define('NONCE_KEY',        'COLE_CHAVE_GERADA_AQUI');
define('AUTH_SALT',        'COLE_CHAVE_GERADA_AQUI');
define('SECURE_AUTH_SALT', 'COLE_CHAVE_GERADA_AQUI');
define('LOGGED_IN_SALT',   'COLE_CHAVE_GERADA_AQUI');
define('NONCE_SALT',       'COLE_CHAVE_GERADA_AQUI');

// ─── Prefixo de tabelas (mudar para não usar default wp_) ───
$table_prefix = 'mp_';

// ─── URL do site ─────────────────────────────────────────────
define('WP_HOME',    'https://larmaospequenas.org.br');
define('WP_SITEURL', 'https://larmaospequenas.org.br');

// ─── Segurança ──────────────────────────────────────────────
define('DISALLOW_FILE_EDIT', true);   // sem editor de plugin/tema no admin
define('DISALLOW_FILE_MODS', false);  // permite atualizar plugin/tema do admin
define('WP_AUTO_UPDATE_CORE', 'minor');
define('AUTOMATIC_UPDATER_DISABLED', false);
define('FORCE_SSL_ADMIN', true);

// ─── Performance ────────────────────────────────────────────
define('WP_POST_REVISIONS', 5);       // máx 5 revisões por post
define('AUTOSAVE_INTERVAL', 300);     // 5min
define('EMPTY_TRASH_DAYS', 14);
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');

// ─── Debug (sempre OFF em produção) ─────────────────────────
define('WP_DEBUG',         false);
define('WP_DEBUG_LOG',     false);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG',     false);

// ─── Locale ─────────────────────────────────────────────────
define('WPLANG', 'pt_BR');

// ─── Cookies seguros (HTTPS only) ───────────────────────────
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure',   1);
ini_set('session.use_only_cookies', 1);

// ─── Caminho absoluto ───────────────────────────────────────
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

// ─── Bootstrap WP ───────────────────────────────────────────
require_once ABSPATH . 'wp-settings.php';
