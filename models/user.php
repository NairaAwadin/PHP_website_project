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

function createUser(PDO $pdo, array $userData): array
{
    $keys = implode(', ', array_keys($userData));
    $preparedKeys = implode(
        ', ',
        array_map(
            fn ($key) => ":{$key}",
            array_keys($userData)
        )
    );
    $statement = $pdo->prepare("INSERT INTO users ({$keys}) VALUES ({$preparedKeys})");
    $statement->execute($userData);

    $newUserId = $pdo->lastInsertId();
    $newUser = $pdo->query("SELECT * FROM users WHERE id = {$newUserId}")->fetch();

    return $newUser;
}

?>