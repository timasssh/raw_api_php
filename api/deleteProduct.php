<?php

include_once("../utils/error.php");
include_once("../utils/success.php");
include_once("../utils/getData.php");
include_once("../utils/updateData.php");

function deleteProduct() {
    if(!isset($_POST["id"])) return error("Parâmetros faltando!");
    if((int)$_POST["id"] < 0) return error("Esse não é um id válido!");
    
    $id = (int)$_POST["id"];
    
    $data = getData() ?? [];
    if(count($data) === 0) return error("Produto não encontrado!");

    $newData = [];
    foreach($data as $product) {
        $productId = $product->id;

        if($productId !== $id) {
            array_push($newData, $product);
        }
    }

    if($newData === $data) return error("Produto não encontrado!");

    updateData($newData);
    return success(200, "Produto removido com sucesso!");
}