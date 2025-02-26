<?php
session_start();

function logout() {
    session_destroy();
    header('Location: ../views/login.php');
    exit();
}
logout();
?>