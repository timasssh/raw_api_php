<?php

include_once("../utils/error.php");

function validateUserRole() {
    $role = $_SESSION["role"];

    if($role === "admin") {
        return true;
    }

    return false;
}