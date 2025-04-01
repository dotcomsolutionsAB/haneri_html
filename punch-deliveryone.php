<?php
header("Content-Type: application/json");

$rawInput = file_get_contents("php://input");
file_put_contents("debug-log.txt", $rawInput); // ✅ LOG the raw body to debug

$input = json_decode($rawInput, true);

if (!$input || !isset($input['order_id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

// Skip Delhivery API call for now
http_response_code(200);
echo json_encode(["message" => "Received successfully!", "data" => $input]);
