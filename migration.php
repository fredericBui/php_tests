<?php

$host = '127.0.0.1';
$db   = 'test_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$port= '3307';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);

    $sql = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    $pdo->exec($sql);
    echo "✅ Table 'users' créée avec succès.\n";

} catch (PDOException $e) {
    echo "❌ Erreur lors de la migration : " . $e->getMessage() . "\n";
    exit(1);
}
