<?php

session_start();

define("BASE_PATH", __DIR__);

function index()
{
    $pageTitle = "Home";
    require_once BASE_PATH . "/layouts/head.php";
    require_once BASE_PATH . "/layouts/header.php";
    require_once BASE_PATH . "/views/home.php";
    require_once BASE_PATH . "/layouts/footer.php";
}

function register()
{
    $pageTitle = "Register";
    require_once BASE_PATH . "/layouts/head.php";
    require_once BASE_PATH . "/layouts/header.php";
    require_once BASE_PATH . "/views/register.php";
    require_once BASE_PATH . "/layouts/footer.php";
}

function login()
{
    $pageTitle = "Login";
    require_once BASE_PATH . "/layouts/head.php";
    require_once BASE_PATH . "/layouts/header.php";
    require_once BASE_PATH . "/views/login.php";
    require_once BASE_PATH . "/layouts/footer.php";
}

function profil()
{
    $pageTitle = "Profil";
    require_once BASE_PATH . "/layouts/head.php";
    require_once BASE_PATH . "/layouts/header.php";
    require_once BASE_PATH . "/views/profil.php";
    require_once BASE_PATH . "/layouts/footer.php";
}

$action = $_SERVER['REQUEST_URI'];
// var_dump($action);
switch (substr(strtok($action, '?'), 1)) {
    case "":
        index();
        break;
    case "profil":
        profil();
        break;
    case "login":
        login();
        break;
    case "register":
        register();
        break;
    default:
        echo "404 - Page not found";
        break;
}

?>