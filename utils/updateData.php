<?php

$variablesFile = parse_ini_file("../.env");
$expirationTime = $variablesFile["MINIMUM_COOKIE_EXPIRATION_TIME"];

function updateData($data) {
    $variablesFile = parse_ini_file("../.env");
    $expirationTime = $variablesFile["MINUMUM_COOKIE_EXPIRATION_TIME"];
    
    setcookie("data", json_encode($data), time() + (int)$expirationTime, "/");
}