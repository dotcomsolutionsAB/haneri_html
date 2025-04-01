<?php
$apiToken = "eaf207ab1f9fcb2fca6876f836b7ab375b45c2a0";

// Build the payload as per Postman
$data = [
    "shipments" => [
        [
            "add" => "M25,NelsonMarg",
            "address_type" => "home",
            "phone" => "8310418179",
            "payment_mode" => "COD",
            "name" => "Shruti",
            "pin" => "411021",
            "order" => "ORD" . rand(1000, 9999),
            "country" => "India",
            "cod_amount" => 1293.89,
            "waybill" => "",
            "shipping_mode" => "Surface"
        ]
    ],
    "pickup_location" => [
        "name" => "ESS SURFACE",
        "city" => "Pune",
        "pin" => "411021",
        "country" => "India",
        "phone" => "8310418179",
        "add" => "SAMSUKHA COMPLEX H. NO. 204 2ND FLOOR 2ND FLOOR BELAGAVI KHADE BAZAR , Belgaun, Karnataka ,India 590001"
    ]
];

// Encode payload as JSON, then form-encode for POST
$formData = http_build_query([
    'format' => 'json',
    'data' => json_encode($data)
]);

// Init cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://track.delhivery.com/api/cmu/create.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Token $apiToken",
    "Content-Type: application/x-www-form-urlencoded"
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
