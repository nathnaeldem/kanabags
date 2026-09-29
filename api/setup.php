<?php
// ================================================================
// KanaBags LLC – MySQL Schema Setup
// Run this file ONCE to create the database and tables.
// Access via: http://localhost/api/setup.php (or php setup.php)
// ================================================================

$host    = 'localhost';
$user    = 'root';     // <-- Change to your MySQL user
$pass    = '';         // <-- Change to your MySQL password
$db_name = 'kanabagsllc';

try {
    // Connect without selecting a database first
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name`
                CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$db_name`");

    // ── Orders Table ─────────────────────────────────────────────
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `orders` (
            `id`               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `company_name`     VARCHAR(255)  NOT NULL,
            `contact_name`     VARCHAR(255)  NOT NULL,
            `email`            VARCHAR(320)  NOT NULL,
            `phone`            VARCHAR(60)   DEFAULT NULL,
            `product_type`     VARCHAR(80)   NOT NULL,
            `monthly_volume`   VARCHAR(80)   NOT NULL,
            `lead_time`        VARCHAR(100)  DEFAULT NULL,
            `cup_sizes`        VARCHAR(80)   DEFAULT NULL,
            `lining`           VARCHAR(80)   DEFAULT NULL,
            `request_sample`   TINYINT(1)    NOT NULL DEFAULT 0,
            `shipping_address` TEXT          DEFAULT NULL,
            `notes`            TEXT          DEFAULT NULL,
            `status`           ENUM('new','reviewing','quoted','fulfilled','cancelled')
                               NOT NULL DEFAULT 'new',
            `created_at`       DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at`       DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
                                             ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_status (status),
            INDEX idx_email  (email),
            INDEX idx_created (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // ── Contact Messages Table ────────────────────────────────────
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `contact_messages` (
            `id`         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `name`       VARCHAR(255) NOT NULL,
            `email`      VARCHAR(320) NOT NULL,
            `subject`    VARCHAR(255) NOT NULL,
            `message`    TEXT         NOT NULL,
            `is_read`    TINYINT(1)   NOT NULL DEFAULT 0,
            `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_email   (email),
            INDEX idx_is_read (is_read),
            INDEX idx_created (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    echo json_encode([
        'success' => true,
        'message' => "✅ Database '$db_name' and tables created successfully!"
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database setup failed: ' . $e->getMessage()
    ]);
}
