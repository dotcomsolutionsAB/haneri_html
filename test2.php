<?php
$apiToken = "eaf207ab1f9fcb2fca6876f836b7ab375b45c2a0";

// Build the order data
$orderData = [
    "pickup_location" => "Burhanuddin",
    "shipments" => [
        [
            "waybill" => "", // Let Delhivery generate
            "order" => "ORD" . rand(100000, 999999),
            "products_desc" => "Fan",
            "quantity" => 1,
            "total_amount" => 1500,
            "cod_amount" => 1500,
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

// Final and correct POST body
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'format' => 'json', // REQUIRED
    'data' => json_encode($orderData) // Shipments info
]);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Token $apiToken"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo "<h3>Delhivery API Response:</h3>";
    echo "<pre>" . htmlentities($response) . "</pre>";
}

curl_close($ch);
?>
