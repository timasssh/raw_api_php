<?php

include_once("../utils/getData.php");

function getProducts() {
    return json_encode(getData());
}