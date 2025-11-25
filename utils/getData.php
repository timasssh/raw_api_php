<?php

function getData() {
    $data = $_COOKIE["data"] ?? null;

    return json_decode($data);
}