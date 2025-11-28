<?php

include_once("../utils/getData.php");
include_once("../Models/Product.php");

function createInitialData() {
    $initialData = [];
    $product1 = new Product("Produto 1", 5.0, "Geral", 10);
    $product2 = new Product("Produto 2", 45.0, "Bebida", 23);
    $product3 = new Product("Produto 3", 17.0, "Comida", 1);
    
    array_push($initialData, $product1->toArray());
    array_push($initialData, $product2->toArray());
    array_push($initialData, $product3->toArray());
    
    updateData($initialData);
}