<?php

function error($message) {
    http_response_code(400);
    return json_encode(["success" => false, "message" => $message]);
}