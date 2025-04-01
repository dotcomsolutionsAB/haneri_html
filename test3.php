<?php
$apiToken = "eaf207ab1f9fcb2fca6876f836b7ab375b45c2a0"; // Your Delhivery API Token

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://track.delhivery.com/api/backend/clientwarehouse/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Token $apiToken"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo "<h3>Registered Pickup Locations (Warehouses):</h3>";
    echo "<pre>" . htmlentities($response) . "</pre>";
}

curl_close($ch);
?>
