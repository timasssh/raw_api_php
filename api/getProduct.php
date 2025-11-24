<?php

function getProduct() {
    if(!isset($_GET["id"])) return error("Esse não é um id válido!");
    
    $id = (int)$_GET["id"];
    $data = $_COOKIE["data"] ?? false;

    if(!$data) return error("Nenhum produto encontrado!");
    if($id < 0) return error("Esse não é um id válido!");
    
    foreach(json_decode($data) as $product) {
        $productId = $product->id;

        if($productId === $id) {
            return  json_encode($product);
        }
    }
    
    return error("Produto não encontrado!");
}