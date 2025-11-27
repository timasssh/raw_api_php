<?php

include_once("../utils/validateUserRole.php");
include_once("../utils/error.php");
include_once("../utils/success.php");
include_once("../utils/getData.php");
include_once("../utils/getProductFromParams.php");
include_once("../utils/updateData.php");

function editProduct() {
    if(!validateUserRole()) { return error("Permissão para acessar essa rota negada!"); }
    
    if(!isset($_POST["id"])) return error("Parâmetros faltando!");
    if((int)$_POST["id"] < 0) return error("Esse não é um id válido!");
    
    $id = (int)$_POST["id"];
    
    $data = getData() ?? [];
    if(count($data) === 0) return error("Produto não encontrado!");

    foreach($data as $index => $product) {
        $productId = $product->id;

        if($productId === $id) {
            $newProduct = getProductFromParams($_POST);
            if(!$newProduct) return error("Parâmetros faltando!");
            if(!validateProduct($newProduct)) return error("Parâmetros inválidos!");

            $newProduct->forceId($id);
            $data[$index] = $newProduct->toArray();            
            updateData($data);
    
            return success(200, "Produto alterado com sucesso!", $newProduct);
        }
    }
    
    return error("Produto não encontrado!");
}