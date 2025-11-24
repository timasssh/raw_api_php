<?php

include_once("../utils/error.php");
include_once("../utils/validateProduct.php");
include_once("../utils/getData.php");
include_once("../utils/updateData.php");

function createProduct() {
    $name = $_POST["name"] ?? false;
    $price = $_POST["price"] ?? false;
    $category = $_POST["category"] ?? false;
    $stockQuantity = $_POST["stockQuantity"] ?? false;

    if(!$name || !$price || !$category || !$stockQuantity) return error("Parâmetros faltando!");
    $newProduct = new Product($name, (float)$price, $category, (int)$stockQuantity);
    if(!validateProduct($newProduct)) return error("Parâmetros inválidos!");
    
    $data = getData();
    array_push($data, $newProduct);
    updateData($data);
    
    return  json_encode(["validate product" => validateProduct($newProduct)]);
}