<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file permette le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabelle, Chiavi Segrete, Lingua di WordPress Language, e
 * ABSPATH. E' possibile trovare maggiori informazioni visitando la pagina
 * del Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni MySQL
 * dal proprio fornitore di hosting.
 *
 * QUesto file viene utilizzato dallo script di creazione di wp-config.php
 * durante l'installazione. Non è necessario crearlo tramite web, è possibile
 * copiare semplicemente questo file in "wp-config.php" e compilarlo con i
 * valori opportuni.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL -  E' possibile ottenere le impostazioni MySQL ** //
// ** dal proprio fornitore di hosting ** //
/** Il nome del database utilizzato per WordPress */
// define('DB_NAME', 'basketgardolo_it_database2');
define('DB_NAME', 'basketgardolo_it_database');

/** Nome utente database MySQL */
// define('DB_USER', 'FG7487_02');
define('DB_USER', 'FG7487_01');

/** Password database MySQL */
// define('DB_PASSWORD', 'ferrari');
define('DB_PASSWORD', 'dispyfan,.-123');

/** Nome host MySQL */
// define('DB_HOST', 'hostingmysql202.register.it');
define('DB_HOST', 'hostingmysql335.register.it');

/** Charset del database da utilizzare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione de Database. Da non modificare se si hanno dei dubbi. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Identificazione e Salatura.
 *
 * Modificarle con frasi differenti e univoche!
 * E' possibile generarle utilizzando il {@link https://api.wordpress.org/secret-key/1.1/salt/
 * Servizio chiavi -segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento per invalidare i cookie esistenti.
 * Ciò forzerà tutti gli utenti a dover effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'O816mw 1DqG-/hOf#r6=%1Mq}#d:?n{I2K|<--_<f *dl|:+CL_c=1?B3e[hEHdT');
define('SECURE_AUTH_KEY',  'COkpI&`u:$u)KQqAflp#*%QTmP^)fdy:nNV=5PTYAq^Q,p!6;n@=t-Zr3v*]hM&C');
define('LOGGED_IN_KEY',    '?8,B[2b`Bs&o_1lJ k|2Bd9;U$AW~}++slK% i:(;},DIqd8Bm1.*er>!5#R!c9+');
define('NONCE_KEY',        '=fEwLc%+IUNluu*uI2z3]K%=qIZlZA+YV/zP!8Kb]2l? ,OiNjj9Dp7:`W=>L =~');
define('AUTH_SALT',        'DHG`K7%}>?,?ndBVu2?^w*MgtHX)5zMcDJN26cDS(cz7Jc%M462d`jmqFaB]f~x^');
define('SECURE_AUTH_SALT', '=v+GafHlOZRBiSpEg{Q&xuy+WNY2u-yEr)FfH99R$V*4$+P08-]IH(V7|%CV.3[[');
define('LOGGED_IN_SALT',   'LO5feM48k]{:/1@qwO$@CyF@VpeBcJ[^jwjSSNyTXp#L[h5M_d/S,mt6g_V/]b^l');
define('NONCE_SALT',       'Vy:_%x9-U2.^PNN56oOMsT`{T3tOfC#`:cR5u63`dx&;r4Nc-W`!Y9/O+G5/EI8(');

define( 'AUTOMATIC_UPDATER_DISABLED', true );
/**#@-*/

/**
 * Prefisso delle Tabelle del Database di WordPress.
 *
 * E' possibile avere più installazioni su un singolo database se si fornisce
 * un prefisso univoco. Solo numeri, lettere e simbolo di sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Lingua di Localizzazione di WordPress, predefinita  in Italiano.
 *
 * Modificando questa voce si localiza WOrdPress. Occorre chenella directory
 * wp-content/languages sia installato il corrispondene file MO per la lingua
 * selezionata. Ad esempio, installando de.mo in wp-content/languages ed
 * impostando WPLANG a 'de' si abiliterà il supporto alla lingua tedesca.
 * 
 * Nel pacchetto italiano questo valore è già correttamente definito per utilizzare
 * il file di lingua italiana e quindi non richiede modifiche a meno di voler
 * utilizare una lingua diversa
 */
define ('WPLANG', 'it_IT');

define( 'WP_POST_REVISIONS', 0 );

/**
 * Per sviluppatori: WordPress debugging mode.
 *
 * Modificando questa voce in vera (true) si abiliterà la visaulizzazione degli
 * avvertimenti durante lo sviluppo.
 * E' fortemente consigliato agli sviluppatori di temi e plugin di utilizzare
 * WP_DEBUG nei loro ambienti di sviluppo.
 */
// Turns WordPress debugging on
define('WP_DEBUG', false);

// Tells WordPress to log everything to the /wp-content/debug.log file
define('WP_DEBUG_LOG', false);

// Doesn't force the PHP 'display_errors' variable to be on
define('WP_DEBUG_DISPLAY', false);

//Expand memory limit
define( 'WP_MEMORY_LIMIT', '64M' );

// Hides errors from being displayed on-screen
@ini_set('display_errors', 0);
define('SCRIPT_DEBUG', true);
define('FORCE_SSL_ADMIN', true);
/* E' tutto, nessuna altra modifica! Buon blogging. */

/** Path assoluto alla direcotry di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include file. */
require_once(ABSPATH . 'wp-settings.php');
