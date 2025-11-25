<?php

include_once("../utils/error.php");
include_once("../utils/success.php");
include_once("../utils/getData.php");

function getProduct($data) {
    if(!isset($_GET["id"])) return error("Parâmetros faltando");
    if((int)$_GET["id"] < 0) return error("Esse não é um id válido!");
    
    $id = (int)$_GET["id"];
    $data = getData();

    if(!$data) return error("Nenhum produto encontrado!");
    
    foreach($data as $product) {
        $productId = $product->id;

        if($productId === $id) {
            return success(200, "Produto encontrado!", $product);
        }
    }
    
    return error("Produto não encontrado!");
}