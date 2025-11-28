<?php

session_start();

if(empty($_SESSION["role"])) {
    if(empty($_POST["role"]) || $_POST["role"] !== "admin" && $_POST["role"] !== "user") {
        $_SESSION["role"] = "user";
    }else {
        $_SESSION["role"] = $_POST["role"];
    }
}else {
    if(isset($_POST["role"]) && $_SESSION["role"] !== $_POST["role"]) $_SESSION["role"] = $_POST["role"];
}

include("../Models/Product.php");
include("../utils/createInitialData.php");
include("../utils/updateData.php");
include("../utils/error.php");
include("./getProducts.php");
include("./getProduct.php");
include("./createProduct.php");
include("./editProduct.php");
include("./deleteProduct.php");

header("Content-Type: application/json; charset=utf-8");

if(empty(getData())) createInitialData();

$requestedMethod = $_SERVER["REQUEST_METHOD"];
if($requestedMethod === "GET"){
    if(empty($_COOKIE["data"])) {
        echo error("Nenhum produto encontrado!");
    }else if(empty($_GET)) {
        echo getProducts();
    }else {
        echo getProduct($_COOKIE["data"]);
    }
}else if($requestedMethod === "POST") {
    if(empty($_POST) || empty($_POST["action"])) {
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