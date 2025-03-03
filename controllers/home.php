<?php

function protectedRoute(Closure $closure, $roles = ['USER'])
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login');
    } else {
        $closure();
    }
}


$action = $_SERVER['REQUEST_URI'];
$path = substr(strtok($action, '?'), 1);
$matches = [];

match (true) {
    $path === "" =>        index(),
    $path === "list-tasks" => listTasksFromFile(),
    $path ===  "products" =>        protectedRoute(fn () => listProducts()),
    $path ===  "products/create" =>        protectedRoute(fn () => actionCreateProduct(), ['ADMIN']),
    preg_match("/products\/(?<id>\d+)\/update/", $path, $matches) === 1 => protectedRoute(fn () => actionUpdateProduct($matches['id'])),
    preg_match("/products\/(?<id>\d+)\/delete/", $path, $matches) === 1 => protectedRoute(function () use ($matches) { actionDeleteProduct($matches['id']);}),
    $path === "register" => actionRegister(),
    $path === "login" => actionLogin(),
    $path === "logout" => actionLogout(),
    default => (function () { echo "404"; })(),
};

?>