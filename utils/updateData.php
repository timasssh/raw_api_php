<?php

function updateData($data) {
    setcookie("data", json_encode($data), time() + 60, "/");
}