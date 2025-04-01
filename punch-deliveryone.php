<?php
header("Content-Type: application/json");

// Load config
$config = include("config.php");
$token = $config['delhivery_token'];
$pickupLocation = $config['pickup_location'];

// Read request data
$input = json_decode(file_get_contents("php://input"), true);
file_put_contents("deliveryone-request-log.txt", print_r($input, true)); // Debug

if (!$input || !isset($input['order_id'], $input['user'], $input['address'], $input['amount'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

// Extract data
$orderId = "ORD" . $input['order_id'];
$user = $input['user'];
$address = $input['address'];
$amount = $input['amount'];

// Extract 6-digit pin
preg_match('/(\d{6})/', $address, $matches);
$pin = $matches[1] ?? '700001'; // fallback to Kolkata pin

// Build shipment payload
$shipment = [
    "order" => $orderId,
    "products_desc" => "General Product",
    "amount" => $amount,
    "name" => $user['name'],
    "email" => $user['email'],
    "phone" => $user['phone'],
    "address" => $address,
    "city" => "Kolkata",
    "state" => "West Bengal",
    "country" => "India",
    "pin" => $pin,
    "payment_mode" => "Prepaid",
    "cod_amount" => 0,
    "weight" => 0.5,
    "fragile_shipment" => false
];

// Prepare API data (format=json required)
$postData = http_build_query([
    "format" => "json",
    "data" => json_encode([
        "pickup_location" => $pickupLocation,
        "shipments" => [$shipment]
    ])
]);

$apiUrl = "https://staging-express.delhivery.com/api/cmu/create.json";
$headers = [
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: Token $token"
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
file_put_contents("deliveryone-response-log.txt", $response); // ✅ View this file to debug result

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
?>
