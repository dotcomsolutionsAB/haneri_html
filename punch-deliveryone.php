<?php
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);

// DEBUG: log what was received (optional)
// file_put_contents("log.txt", print_r($input, true));

if (!$input || !isset($input['order_id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

$username = "Info@haneri.in";
$password = "Arnav@123";
$token = "eaf207abjhvbkjskhuskjvlsvb375b45c2a0";

// Replace with actual order creation API from Delhivery
$apiUrl = "https://one.delhivery.com/settings/api-setup";

$headers = [
    "Authorization: Basic " . base64_encode("$username:$password"),
    "x-api-token: $token",
    "Content-Type: application/json"
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(["error" => curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);
http_response_code($httpCode);
echo $response;
