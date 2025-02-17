<?php

/* php -S localhost:5500 */
/* [ADD][MODIF][SUPP] */

function index()
{
    $pageTitle = "Home";
    define("BASE_PATH", __DIR__);
    require_once BASE_PATH . "/layouts/head.php";
    require_once BASE_PATH . "/views/home.php";
}

$action = $_SERVER['REQUEST_URI'];
// var_dump($action);
switch (substr(strtok($action, '?'), 1)) {
    case "":
        index();
        break;
    default:
        echo "404";
        break;
}

?>