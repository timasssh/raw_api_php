<?php

function validateProduct($productToValidate): bool {
    if(gettype($productToValidate->id) !== "integer" || $productToValidate->id < 0) return false;
    if(gettype($productToValidate->name) !== "string" || strlen($productToValidate->name) === 0) return false;
    if(gettype($productToValidate->price) !== "double" || $productToValidate->price < 0.0) return false;
    if(gettype($productToValidate->category) !== "string" || strlen($productToValidate->category) === 0) return false;
    if(gettype($productToValidate->stockQuantity) !== "integer" || $productToValidate->stockQuantity < 0) return false;

    return true;
}