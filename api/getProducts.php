<?php

include_once("../utils/success.php");
include_once("../utils/getData.php");

function getProducts() {
    return success(200, "Listando produtos...", getData());
}