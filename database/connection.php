<?php

function getDatabaseConnection() {
    $host = 'localhost';
    $port = '5432';
    $dbname = 'crud_db';
    $user = 'postgres';
    $password = 'manchester';
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
        exit;
    }
}