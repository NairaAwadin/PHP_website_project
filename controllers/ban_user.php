<?php
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] != 1) {
    header("Location: /login");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["user_id"])) {
        $user_id = intval($_POST["user_id"]);

        require_once '../config/db.php';

        try {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$user_id]);

            if ($stmt->rowCount() > 0) {
                $_SESSION["message"] = "Utilisateur banni avec succès.";
            } else {
                $_SESSION["message"] = "Erreur lors de la tentative de bannissement de l'utilisateur.";
            }
        } catch (PDOException $e) {
            $_SESSION["message"] = "Erreur de base de données : " . $e->getMessage();
        }
    }
}

header("Location: /profil");
exit();
?>