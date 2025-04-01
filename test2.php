<?php
// Delhivery API Token (You can move this to a config file for security)
$apiToken = "eaf207abjhvbkjskhuskjvlsvb375b45c2a0";

// Sample order payload
$orderData = [
    "pickup_location" => "Burhanuddin", // your active pickup location
    "shipments" => [
        [
            "waybill" => "", // Leave empty to auto-generate
            "order" => "ORD" . rand(100000, 999999),
            "products_desc" => "Fan",
            "quantity" => 1,
            "total_amount" => 1500,
            "cod_amount" => 1500, // Change to 0 for Prepaid
            "add" => "123 Customer Street, Park Street",
            "city" => "Kolkata",
            "state" => "West Bengal",
            "country" => "India",
            "phone" => "9876543210",
            "name" => "John Doe",
            "pin" => "700016",
            "payment_mode" => "COD",
            "weight" => 0.5
        ]
    ]
];

// Initialize cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://track.delhivery.com/api/cmu/create.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// Build form data (json must be encoded under `json` key)
$postFields = http_build_query([
    'json' => json_encode($orderData)
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Token $apiToken"
]);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo "<h3>Delhivery API Response:</h3>";
    echo "<pre>" . htmlentities($response) . "</pre>";
}

curl_close($ch);
?>
