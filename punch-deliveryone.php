<?php
// Enable error reporting for debugging (can be removed later)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set JSON response type
header("Content-Type: application/json");

// Load config file for token and pickup location
$config = include("config.php");
$token = $config['delhivery_token'];
$pickupLocation = $config['pickup_location'];

// Get request input
$input = json_decode(file_get_contents("php://input"), true);

// Log raw input (with timestamp)
file_put_contents("deliveryone-request-log.txt", date('Y-m-d H:i:s') . "\n" . print_r($input, true) . "\n\n", FILE_APPEND);

// Validate required fields
if (
    !$input ||
    !isset($input['order_id'], $input['user'], $input['address'], $input['amount'])
) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

// Sample fallback data
$orderId = "ORD" . $input['order_id'];
$user = $input['user'];
$address = $input['address'];
$amount = $input['amount'];

// Extract 6-digit PIN from address
preg_match('/(\d{6})/', $address, $matches);
$pin = $matches[1] ?? '700001'; // fallback pin (Kolkata)

// Build shipment payload
$shipment = [
    "order" => $orderId,
    "products_desc" => "Sample Product",
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

// Full payload with pickup details
$payload = [
    "pickup_location" => $pickupLocation,
    "pickup_time" => "Mid Day", // Make sure this matches Delhivery slot
    "client" => "Dot com Solutions", // Optional, but included per your request
    "shipments" => [$shipment]
];

// Required format=json&data=... format
$postData = http_build_query([
    "format" => "json",
    "data" => json_encode($payload)
]);

// Delhivery API endpoint
$apiUrl = "https://staging-express.delhivery.com/api/cmu/create.json"; // switch to production later
// $apiUrl = "https://track.delhivery.com/api/cmu/create.json";

$headers = [
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: Token $token"
];

// cURL setup
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Log response
file_put_contents("deliveryone-response-log.txt", date('Y-m-d H:i:s') . "\n" . $response . "\n\n", FILE_APPEND);

// Handle curl error
if (curl_errno($ch)) {
    $error = curl_error($ch);
    file_put_contents("deliveryone-response-log.txt", "cURL ERROR: " . $error . "\n", FILE_APPEND);
    http_response_code(500);
    echo json_encode(["error" => $error]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Return Delhivery API response
http_response_code($httpCode);
echo $response;
exit;
?>
