<?php
header("Content-Type: application/json");

// Load config
$config = include("config.php");
$token = $config['delhivery_token'];
$pickupLocation = $config['pickup_location'];

// Get input
$input = json_decode(file_get_contents("php://input"), true);
file_put_contents("deliveryone-request-log.txt", print_r($input, true)); // For debug

if (!$input || !isset($input['order_id'], $input['user'], $input['address'], $input['amount'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

// Extract details
$orderId = "ORD" . $input['order_id'];
$user = $input['user'];
$address = $input['address'];
$amount = $input['amount'];

// Extract pin (6 digit)
preg_match('/(\d{6})/', $address, $matches);
$pin = $matches[1] ?? '000000';

$payload = [
    "pickup_location" => $pickupLocation,
    "order" => $orderId,
    "products_desc" => "General Item",
    "amount" => $amount,
    "name" => $user['name'],
    "email" => $user['email'],
    "phone" => $user['phone'],
    "address" => $address,
    "city" => "Burdwan", // hardcoded or parse better
    "state" => "West Bengal",
    "country" => "India",
    "pin" => $pin,
    "payment_mode" => "Prepaid",
    "cod_amount" => 0,
    "weight" => 0.5,
    "fragile_shipment" => false
];

// Build post data with format=json
$postFields = http_build_query([
    "format" => "json",
    "data" => json_encode([
        "pickup_location" => $pickupLocation,
        "shipments" => [$payload]
    ])
]);

$apiUrl = "https://staging-express.delhivery.com/api/cmu/create.json"; // Use staging first
$headers = [
    "Content-Type: application/x-www-form-urlencoded"
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Token $token"]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

file_put_contents("deliveryone-response-log.txt", $response); // 👈 Check this log

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
