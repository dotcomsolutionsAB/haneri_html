<?php
header("Content-Type: application/json");

// Load config
$config = include("config.php");
$token = $config['delhivery_token'];
$pickupCode = $config['pickup_location'];

$input = json_decode(file_get_contents("php://input"), true);
file_put_contents("deliveryone-v1-request-log.txt", date('Y-m-d H:i:s') . "\n" . print_r($input, true) . "\n\n", FILE_APPEND);

// Validate required fields
if (!$input || !isset($input['order_id'], $input['user'], $input['address'], $input['amount'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

// Extract values
$orderId = "ORD" . $input['order_id'];
$user = $input['user'];
$address = $input['address'];
$amount = (float) $input['amount'];
$paymentMode = strtoupper($input['payment_mode'] ?? "Prepaid");

$codAmount = ($paymentMode === "COD") ? $amount : 0;

// Extract 6-digit PIN code
preg_match('/(\d{6})/', $address, $matches);
$pincode = $matches[1] ?? '700001';

// Prepare Delhivery API payload
$data = [
    "packages" => [
        [
            "order_id" => $orderId,
            "consignee" => [
                "name" => $user['name'] ?? "Guest User",
                "phone" => $user['phone'] ?? "0000000000",
                "address" => $address,
                "city" => "Kolkata",
                "state" => "West Bengal",
                "pincode" => $pincode
            ],
            "pickup_location" => [
                "name" => $pickupCode
            ],
            "shipment" => [
                "payment_mode" => $paymentMode,
                "total_amount" => $amount,
                "cod_amount" => $codAmount,
                "product" => "General Product",
                "weight" => 0.5,
                "dimensions" => [
                    "length" => 10,
                    "breadth" => 5,
                    "height" => 5
                ]
            ],
            "invoice" => [
                "number" => "INV" . $input['order_id'],
                "date" => date("Y-m-d"),
                "value" => $amount,
                "tax_value" => 0
            ]
        ]
    ]
];

$headers = [
    "Authorization: Token $token",
    "Content-Type: application/json"
];

$apiUrl = "https://api.delhivery.com/v1/packages"; // Use staging/live accordingly

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

file_put_contents("deliveryone-v1-response-log.txt", date('Y-m-d H:i:s') . "\n" . $response . "\n\n", FILE_APPEND);

if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(["error" => curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);
http_response_code($httpCode);
echo $response;
exit;
