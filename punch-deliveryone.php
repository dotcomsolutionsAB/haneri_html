<?php
header("Content-Type: application/json");

// Load credentials
$config = include("config.php"); // create config.php as below
$token = $config['delhivery_token'] ?? '';
$pickup_location = $config['pickup_location'] ?? 'Haneri Warehouse';

$rawInput = file_get_contents("php://input");
$input = json_decode($rawInput, true);

// Log for debug
file_put_contents("deliveryone-request-log.txt", $rawInput);

if (!$input || !isset($input['order_id'], $input['address'], $input['user'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

$orderId = $input['order_id'];
$user = $input['user'];
$address = $input['address'];
$amount = $input['amount'];

preg_match('/(\d{6})/', $address, $pinMatch);
$pincode = $pinMatch[1] ?? '000000';

$city = "Burdwan"; // Set manually or improve this with smarter parsing

$shipment = [
    "pickup_location" => $pickup_location,
    "order" => "ORD" . $orderId,
    "products_desc" => "General Product",
    "amount" => $amount,
    "name" => $user['name'],
    "email" => $user['email'],
    "phone" => $user['phone'],
    "address" => $address,
    "city" => $city,
    "state" => "West Bengal",
    "country" => "India",
    "pin" => $pincode,
    "payment_mode" => "Prepaid",
    "cod_amount" => 0,
    "weight" => 0.5
];

$apiUrl = "https://track.delhivery.com/api/cmu/create.json";
$headers = [
    "Authorization: Token " . $token,
    "Content-Type: application/json"
];

$postData = json_encode([
    "pickup_location" => $pickup_location,
    "shipments" => [$shipment]
]);

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

file_put_contents("deliveryone-response-log.txt", $response); // ✅ Check this file after

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
