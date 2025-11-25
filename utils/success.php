<?php

function success($successCode, $message, $data = null) {
    http_response_code($successCode);
    return json_encode(["success" => true, "message" => $message, "data" => $data]);
}