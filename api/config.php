<?php
// ================================================================
// KanaBags LLC – Database Configuration
// ================================================================
define('DB_HOST', 'localhost');
define('DB_NAME', 'kanabagsllc');
define('DB_USER', 'root');        // <-- Change to your MySQL user
define('DB_PASS', '');            // <-- Change to your MySQL password
define('DB_CHARSET', 'utf8mb4');

define('ADMIN_EMAIL', 'operations@kanabagsllc.net');
define('SITE_NAME', 'KanaBags LLC');

/**
 * Create and return a PDO database connection.
 */
function get_db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $opts = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $opts);
    }
    return $pdo;
}
