<?php
/**
 * Temeljna konfiguracija WordPressa.
 *
 * wp-config.php instalacijska skripta koristi ovaj zapis tijekom instalacije.
 * Ne morate koristiti web stranicu, samo kopirajte i preimenujte ovaj zapis
 * u "wp-config.php" datoteku i popunite tražene vrijednosti.
 *
 * Ovaj zapis sadrži sljedeće konfiguracije:
 *
 * * MySQL postavke
 * * Tajne ključeve
 * * Prefiks tablica baze podataka
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL postavke - Informacije možete dobiti od vašeg web hosta ** //
/** Ime baze podataka za WordPress */
define( 'DB_NAME', 'wpstudom' );

/** MySQL korisničko ime baze podataka */
define( 'DB_USER', 'root' );

/** MySQL lozinka baze podataka */
define( 'DB_PASSWORD', '' );

/** MySQL naziv hosta */
define( 'DB_HOST', 'localhost' );

/** Kodna tablica koja će se koristiti u kreiranju tablica baze podataka. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Tip sortiranja (collate) baze podataka. Ne mijenjate ako ne znate što radite. */
define('DB_COLLATE', '');

/**#@+
 * Jedinstveni Autentifikacijski ključevi (Authentication Unique Keys and Salts).
 *
 * Promijenite ovo u vaše jedinstvene fraze!
 * Ključeve možete generirati pomoću {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org servis tajnih-ključeva}
 * Ključeve možete promijeniti bilo kada s tim da će se svi korisnici morati ponovo prijaviti jer kolačići (cookies) neće više važiti nakon izmjene ključeva.
 *
 * @od inačice 2.6.0
 */
define( 'AUTH_KEY',         'zSl-2nRT`KpZniXJk .~~F5|9`CfW48k+DSwyGzvQH~h:H7r8U36<(QhJz#Axo:8' );
define( 'SECURE_AUTH_KEY',  'fLQWeA[$XZg}ogvM1>ut{`~d/Av!934Li-{e4(Qd0|}+A/,HTg}~1Q>OF=6y6!(_' );
define( 'LOGGED_IN_KEY',    '2O+0^iBSRR|e:-vr1y*g>Vfw:QpG/x Om~yNfU|Fo.X(mBfi(>bF|yl,gEt~|l@V' );
define( 'NONCE_KEY',        'hXC3wvgk@5w<zli)M6pxwWZ67 &]> &6;GzNl3OXlt`!1VwgFj7y6FNe?vX,Sx*&' );
define( 'AUTH_SALT',        'o_0[<dXFF!$p6N{cpyN8<u|OvG)M.kO>RmVDV!?F$_3_l,wtjzuQyI|mX.]DJf]l' );
define( 'SECURE_AUTH_SALT', 't>9yQR%J1U8Xk,p;_;4V@kh#?=%;!$-@i}sY< P+Pp^yl((WWj? JXsf_|~<_=1;' );
define( 'LOGGED_IN_SALT',   '$:E<HlFB J.QV227z(W=%kImYZm!gK1qL|qeV~h{<$DB6PAK!aQ[e;*Qa~4a[)xw' );
define( 'NONCE_SALT',       'dewB|?ITX<$Ky?] H2qQ4H5M+)Gzc%9uQAB)f=q!TX*s(izo,)Ban1g_%7Hz.yC$' );

/**#@-*/

/**
 * Prefix WordPress tablica baze podataka.
 *
 * Možete imati više instalacija unutar jedne baze podataka ukoliko svakoj dodjelite
 * jedinstveni prefiks. Koristite samo brojeve, slova, i donju crticu!
 */
$table_prefix  = 'wp_';

/**
 * Za programere: WordPress debugging mode.
 *
 * Promijenit ovo u true kako bi omogućili prikazivanje poruka tijekom razvoja.
 * Izrazito preporučujemo da programeri dodataka (plugin) i tema
 * koriste WP_DEBUG u njihovom razvojnom okružju.
 *
 * Za informacije o drugim konstantama koje se mogu koristiti za debugging,
 * posjetite Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To je sve, ne morate više ništa mijenjati! Sretno bloganje. */

/** Apsolutna putanja do WordPress mape. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Postavke za WordPress varijable i već uključene zapise. */
require_once(ABSPATH . 'wp-settings.php');
