<?php

include_once("../utils/error.php");
include_once("../utils/validateProduct.php");
include_once("../utils/getData.php");
include_once("../utils/updateData.php");
include_once("../utils/getProductFromParams.php");
include_once("../utils/success.php");

function createProduct() {
    $newProduct = getProductFromParams($_POST);
    if(!validateProduct($newProduct)) return error("Parâmetros inválidos!");
    
    $data = getData() ?? [];
    array_push($data, $newProduct);
    updateData($data);
    
    return  success(201, $newProduct);
}