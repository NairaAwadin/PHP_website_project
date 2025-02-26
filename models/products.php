<?php

// require_once "./../lib/db.php";

$products = [
    [
        "price" => 1.5,
        "name" => "Banane",
        "id" => uniqid()
    ],
    [
        "price" => 2,
        "name" => "Banane",
        "id" => uniqid()
    ],
    [
        "price" => 2.5,
        "name" => "Banane",
        "id" => uniqid()
    ],
    [
        "price" => 3,
        "name" => "Banane",
        "id" => uniqid()
    ],
    [
        "price" => 1.5,
        "name" => "Banane",
        "id" => uniqid()
    ]
];


function createProduct(&$products, $product) {

    $product['id'] = uniqid();
    array_push($products, $product);

    return $product;

}