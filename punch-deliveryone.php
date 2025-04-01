<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");

// Delhivery Auth Token
$token = 'eaf207abjhvbkjskhuskjvlsvb375b45c2a0';

// Sample order input (replace with real dynamic values in production)
$input = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!$input || !isset($input['order_id'], $input['name'], $input['phone'], $input['address'], $input['pin'], $input['amount'])) {
    http_response_code(400);
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

// Build payload
$payload = [
    "format" => "json",
    "data" => format=json&data={
        "pickup_location" => [
            "name" => "ESS SURFACE",
            "city" => "Pune",
            "pin" => "411021",
            "country" => "India",
            "phone" => "8310418179",
            "add" => "SAMSUKHA COMPLEX H. NO. 204 2ND FLOOR 2ND FLOOR BELAGAVI KHADE BAZAR , Belgaun, Karnataka ,India 590001"
        ],
        "shipments" => [
            [
                "add" => $input['address'],
                "address_type" => "home",
                "phone" => $input['phone'],
                "payment_mode" => "COD", // or Prepaid
                "name" => $input['name'],
                "pin" => $input['pin'],
                "order" => $input['order_id'],
                "country" => "India",
                "cod_amount" => (float)$input['amount'],
                "waybill" => "", // Let Delhivery auto-generate
                "shipping_mode" => "Surface"
            ]
        ]
    ])
];

// Convert to x-www-form-urlencoded
$postData = http_build_query($payload);

// API Endpoint
$apiUrl = "https://staging-express.delhivery.com/api/cmu/create.json";
// $apiUrl = "https://track.delhivery.com/api/cmu/create.json"; // production

// Headers
$headers = [
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: Token $token"
];

// cURL Setup
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Log the response
file_put_contents("deliveryone-response-log.txt", date('Y-m-d H:i:s') . "\n" . $response . "\n\n", FILE_APPEND);

// Handle errors
if (curl_errno($ch)) {
    echo json_encode(["error" => curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);
http_response_code($httpCode);
echo $response;
