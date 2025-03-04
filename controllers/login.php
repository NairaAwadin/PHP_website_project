<?php
session_start();
require_once "../models/user.php";

function handle_login($pdo)
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = login($pdo, ["email" => $email]);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["prenom"] = $user["prenom"];
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["sexe"] = $user["sexe"];
            $_SESSION["phone"] = $user["phone"];
            $_SESSION["address"] = $user["address"];
            header("Location: /profil");
            exit();
        } else {
            echo "Identifiants incorrects";
            return;
        }
    }
}

handle_login($pdo);
?>