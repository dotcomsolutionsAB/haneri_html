<?php
$apiToken = "eaf207ab1f9fcb2fca6876f836b7ab375b45c2a0";

// Unique order ID
$orderId = "ORD" . rand(1000, 9999);

// Build the payload as per Delhivery's expected structure
$data = [
    "shipments" => [
        [
            "add" => "M25, Nelson Marg",
            "address_type" => "home",
            "phone" => "8310418179",
            "payment_mode" => "COD",
            "name" => "Shruti",
            "pin" => "700016", // Make sure this is serviceable
            "order" => $orderId,
            "country" => "India",
            "cod_amount" => 1293.89,
            "waybill" => "", // Delhivery will generate one
            "shipping_mode" => "Surface"
        ]
    ],
    "pickup_location" => [
        "name" => "Burhanuddin", // Must match registered warehouse exactly
        "city" => "Kolkata",
        "pin" => "700016",
        "country" => "India",
        "phone" => "9876543210",
        "add" => "Your registered address for Burhanuddin" // Optional, but keep accurate
    ]
];

// Encode payload
$formData = http_build_query([
    'format' => 'json',
    'data' => json_encode($data)
]);

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://track.delhivery.com/api/cmu/create.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Token $apiToken",
    "Content-Type: application/x-www-form-urlencoded"
]);

// Execute the request
$response = curl_exec($ch);

// Handle response
if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo "<h3>Delhivery API Response for Order <code>$orderId</code>:</h3>";
    echo "<pre>" . htmlentities($response) . "</pre>";
}

curl_close($ch);
?>
