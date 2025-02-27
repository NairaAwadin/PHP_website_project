<?php
session_start();

require_once '../models/user.php';

function handle_register($pdo)
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        ["nom" => $nom, "prenom" => $prenom, "sexe" => $sexe, "email" => $email, "password" => $password] = $_POST;

        try {
            $newUser = createUser($pdo, [
                "nom" => $nom,
                "prenom" => $prenom,
                "sexe" => $sexe,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);

            if ($newUser) {
                header("Location: ../views/login.php");
                exit();
            } else {
                echo "Erreur lors de la création de l'utilisateur.";
            }
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

handle_register($pdo);
?>