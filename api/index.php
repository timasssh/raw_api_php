<?php
include("../Models/Product.php");
include("../utils/error.php");
include("./getProducts.php");
include("./getProduct.php");
include("./createProduct.php");
include("./editProduct.php");
include("./deleteProduct.php");

header("Content-Type: application/json; charset=utf-8");

$initialData = [];
$product1 = new Product("Produto 1", 5.0, "Geral", 10);
$product2 = new Product("Produto 2", 45.0, "Bebida", 23);
$product3 = new Product("Produto 3", 17.0, "Comida", 1);

array_push($initialData, $product1->toArray());
array_push($initialData, $product2->toArray());
array_push($initialData, $product3->toArray());

setcookie("data", json_encode($initialData), time() + 60, "/");

$requestedMethod = $_SERVER["REQUEST_METHOD"];
if($requestedMethod === "GET"){
    if(empty($_COOKIE["data"])) {
        echo error("Nenhum produto encontrado!");
    }else if(empty($_GET)) {
        echo getProducts($_COOKIE["data"]);
    }else {
        echo getProduct();
    }
}else if($requestedMethod === "POST") {
    if(empty($_POST) || empty($_POST["action"]) || empty($_POST["id"])) {
        echo error("Parâmetros faltando!");
    }else if($_POST["action"] === "create") {
        echo createProduct();
    }else if($_POST["action"] === "edit") {
        echo editProduct();
    }else if($_POST["action"] === "delete") {
        echo deleteProduct();
    }else {
        http_response_code(404);
        echo json_encode(["success" => false, "message" => "URL not found!"]);
    }
}else {
    http_response_code(404);
    echo json_encode(["success" => false, "message" => "URL not found!"]);
}