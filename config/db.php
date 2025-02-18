<?php

$pdo = new PDO("mysql:host=localhost;ddbname=app", 'username', 'password');

if($pdo->query("SELECT 1") -> execute()) {
    die('No database connection');
}