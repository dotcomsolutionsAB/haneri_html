<?php
$uatToken = "eaf207ab1f9fcb2fca6876f836b7ab375b45c2a0"; // Replace with staging token
$uatUrl = "https://staging-express.delhivery.com/api/cmu/create.json";

$data = [
    "shipments" => [
        [
            "add" => "Test Address, Demo Lane",
            "address_type" => "home",
            "phone" => "9999999999",
            "payment_mode" => "COD",
            "name" => "Test User",
            "pin" => "110001", // Use known testable pincode
            "order" => "TESTORD" . rand(1000, 9999),
            "country" => "India",
            "cod_amount" => 10,
            "waybill" => "",
            "shipping_mode" => "Surface"
        ]
    ],
    "pickup_location" => [
        "name" => "TEST_WAREHOUSE", // Provided by Delhivery UAT
        "city" => "Delhi",
        "pin" => "110001",
        "country" => "India",
        "phone" => "9999999999",
        "add" => "Test Pickup Address"
    ]
];

$formData = http_build_query([
    'format' => 'json',
    'data' => json_encode($data)
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uatUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Token $uatToken",
    "Content-Type: application/x-www-form-urlencoded"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo "<h3>Delhivery UAT Response:</h3>";
    echo "<pre>" . htmlentities($response) . "</pre>";
}

curl_close($ch);
?>
