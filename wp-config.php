<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'exp3-advocaciaestevespaes');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dWH2EY.ArJW=B-J>#H}%I7LcDu7Vw&NL9fBh8b=#DStTq`r 29b`x5~[aCC+D[z{');
define('SECURE_AUTH_KEY',  '7awxXp6pZJB^F7#,:i;B{#zkwB2j6;=!n?#pXY|:OpEkGo&<iv+y3u(8ava3|CvZ');
define('LOGGED_IN_KEY',    '#enP5n7K;NU;tHz$d=WflXF>r/R ;;aK%6Ve=zl{4t_80.@HlRi>?FddrJ_Q@e=_');
define('NONCE_KEY',        '9P {as!.V]Ng0Lm^L?9z5#$^vFIDSS:+E6ZDGWI}5kl :CRzfZ*vIkN-%i84H*}h');
define('AUTH_SALT',        'I9Sdsd;vh1.:{5?*zZEJ2^CB2O{`?Zy3%~hyUVcmx3MLYbwsx`ZXgp!d~e=AY2:r');
define('SECURE_AUTH_SALT', 'hs.#8>k)Sf8B2}p47edQ 4w+-i-H&jN9DN*Tq_~LFQJ|`b5Xp_+$L5&oZx0W9NX%');
define('LOGGED_IN_SALT',   'DDN_hV!GbgT9;zwQc4#^4Y|F[Le$W8DIFEu7_(f,B62U|f(.SMUp^D|f(Rb9y* t');
define('NONCE_SALT',       '#O=DnH5+Zxbd|5XuTZ{_So:.3BgA41^*!N23ZL4t34vXe*~h#i{BA(2z5@7nM?Mf');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
