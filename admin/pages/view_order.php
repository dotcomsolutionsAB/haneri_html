<?php
    // Get the order ID from the URL
    $orderId = isset($_GET['o_id']) ? $_GET['o_id'] : 'No order ID provided';

    // Display the order ID on the page
    echo "Order ID: " . htmlspecialchars($orderId);
?>
