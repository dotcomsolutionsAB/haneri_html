<?php
// Read the JSON file
$json_data = file_get_contents('data.json');

// Decode the JSON data into an associative array
$data = json_decode($json_data, true);

// Access the data like a regular PHP array
echo 'Name: ' . $data['name'] . '<br>';
echo 'Address: ' . $data['address'] . '<br>';
echo 'Phone: ' . $data['phone'] . '<br>';
echo 'Email: ' . $data['email'] . '<br>';
echo 'Facebook Link: ' . $data['facebooklink'] . '<br>';
echo 'Instagram Link: ' . $data['instagramlink'] . '<br>';
echo 'YouTube Link: ' . $data['youtube'] . '<br>';
?>
