<?php
// filepath: /c:/Users/Romain/Documents/ADEVELOPPEMENT/PHP_website_project/config/db.php

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=app;port=3307;charset=utf8mb4", 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

?>