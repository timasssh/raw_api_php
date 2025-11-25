<?php

function success($successCode, $message) {
    http_response_code($successCode);
    return json_encode(["success" => true, "message" => $message]);
}