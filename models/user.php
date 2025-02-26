<?php
require_once '../config/db.php';

function login(PDO $pdo, array $credentials): array|false
{

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statement->bindparam(':email', $credentials['email']);
    $statement->execute();
    $user = $statement->fetch();

    return $user;
}
?>