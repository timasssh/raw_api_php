<?php

function getData() {
    $data = json_decode($_COOKIE["data"]) ?? null;

    return $data;
}