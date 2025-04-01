<?php
header("Content-Type: application/json");

$rawInput = file_get_contents("php://input");

// Optional: log input to debug
file_put_contents("debug-log.txt", $rawInput);

$input = json_decode($rawInput, true);

// Validate
if (!$input || !isset($input['order_id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

// Just return success for now (no Delhivery call yet)
http_response_code(200);
echo json_encode(["message" => "Order received successfully", "data" => $input]);
