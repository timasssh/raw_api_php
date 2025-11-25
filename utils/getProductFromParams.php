<?php

include_once("../utils/error.php");
include_once("../Models/Product.php");

function getProductFromParams($method) {
    $name = $method["name"] ?? false;
    $price = $method["price"] ?? false;
    $category = $method["category"] ?? false;
    $stockQuantity = $method["stockQuantity"] ?? false;

    if(!$name || !$price || !$category || !$stockQuantity) return false;

    return new Product($name, (float)$price, $category, (int)$stockQuantity);
}