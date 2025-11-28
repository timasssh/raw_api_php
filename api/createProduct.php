<?php

include_once("../utils/validateUserRole.php");
include_once("../utils/error.php");
include_once("../utils/validateProduct.php");
include_once("../utils/getData.php");
include_once("../utils/updateData.php");
include_once("../utils/getProductFromParams.php");
include_once("../utils/success.php");

function createProduct() {
    if(!validateUserRole()) { return error("Permissão para acessar essa rota negada!"); }
    
    $newProduct = getProductFromParams($_POST);
    if(!$newProduct) return error("Parâmetros faltando!");
    if(!validateProduct($newProduct)) return error("Parâmetros inválidos!");
    
    $data = getData() ?? [];
    

    // forçando o id a ser o maior id dos produtos criados + 1, pois a abordagem:
    // id = propriedade estática não funciona com múltiplas requisições :(

    if(empty($data)) {
        $newProduct->forceId(0);
    }else {
        $biggestId = max(array_column($data, "id")) ?? 0;
        $newProduct->forceId($biggestId + 1);
    }

    array_push($data, $newProduct->toArray());
    updateData($data);
    
    return success(201, "Produto criado com sucesso!", $newProduct);
}