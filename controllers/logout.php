<?php
session_start();

function logout() {
    session_destroy();
    header('Location: /login');
    exit();
}

logout();
?>