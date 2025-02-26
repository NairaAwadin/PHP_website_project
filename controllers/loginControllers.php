<?php
session_start();
require_once "../config/db.php";
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
            header("Location: ../views/profil.php");
            exit();
        } else {
            echo "Identifiants incorrects";
            return;
        }
    }
}
handle_login($pdo);
?>