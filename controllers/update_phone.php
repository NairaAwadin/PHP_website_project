<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $user_id = $_SESSION['user_id'];
        
    try {
        $stmt = $pdo->prepare("UPDATE users SET phone = :phone WHERE id = :id");
        $stmt->execute(['phone' => $phone, 'id' => $user_id]);

        $_SESSION['phone'] = $phone;
        header('Location: /profil');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>