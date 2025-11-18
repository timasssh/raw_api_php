<?php
include("../Models/Product.php");
include("../utils/error.php");
include("./getProducts.php");
include("./getProduct.php");
include("./createProduct.php");
include("./editProduct.php");
include("./deleteProduct.php");

header("Content-Type: application/json; charset=utf-8");

// $initialData = [];
// $product1 = new Product("Produto 1", 5.0, "Geral", 10);
// $product2 = new Product("Produto 2", 45.0, "Bebida", 23);
// $product3 = new Product("Produto 3", 17.0, "Comida", 1);

// array_push($initialData, $product1);
// array_push($initialData, $product2);
// array_push($initialData, $product3);

// var_dump($product1);

setcookie("data", json_encode("teste"), time() + 60);

if($_SERVER["REQUEST_METHOD"] === "GET" && empty($_GET)){
    echo getProducts();
}else if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])){
    echo getProduct();
}else if($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST) || $_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST["action"]) || $_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST["id"])){
    echo error("Parâmetros faltando!");
}else if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "create"){
    echo createProduct();
}else if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "edit"){
    echo editProduct();
}else if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "delete"){
    echo deleteProduct();
}else {
    http_response_code(404);
    echo json_encode(["success" => false, "message" => "URL not found!"]);
}