<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("UPDATE users SET address = :address WHERE id = :id");
        $stmt->execute(['address' => $address, 'id' => $user_id]);

        $_SESSION['address'] = $address;
        header('Location: /profil');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

?>