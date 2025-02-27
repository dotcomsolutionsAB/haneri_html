<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<?php
$authToken = $_SESSION['auth_token'] ?? ''; // Get auth token from session

if (!$authToken) {
    echo "<p class='text-danger text-center'>Unauthorized Access. Please Login.</p>";
    exit;
}

// Fetch latest payment details from API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, BASE_URL . "/payments");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $authToken,
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

$paymentData = json_decode($response, true);

if (!isset($paymentData['data'])) {
    echo "<p class='text-danger text-center'>Error fetching payment details.</p>";
    exit;
}

$paymentDetails = $paymentData['data'];
$productStats = $paymentData['product_stats'] ?? [];
?>

<main class="main main-test checkout_page">
    <div class="container checkout-container padding_top_100">
        <div class="order-success-message text-center animate__animated animate__fadeIn">            
            <h2 class="text-success mt-3 animate__animated animate__fadeInUp">
                Thank You! Your Order Has Been Placed Successfully.
                <i class="fas fa-check-circle text-success fa-1x animate__animated animate__bounceIn order_success_text"></i>
            </h2>
            <p class="lead animate__animated animate__fadeInUp">
                Your order ID is <strong class="order-id-highlight text-primary animate__animated animate__pulse animate__infinite">#<?= $paymentDetails['order_id'] ?></strong>. 
                You will receive a confirmation email shortly.
            </p>
            <p class="lead animate__animated animate__fadeInUp"><strong>Payment ID:</strong> <?= $paymentDetails['razorpay_payment_id'] ?></p>
        </div>

        <div class="row mt-5 d-flex align-items-stretch">
            <div class="col-lg-6">
                <div class="order-details-box p-4 shadow rounded bg-white h-100 animate__animated animate__fadeInLeft">
                    <h3 class="border-bottom pb-2 mb-3">Order Details</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th class="text-right">#<?= $paymentDetails['order_id'] ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td class="text-right">₹<?= $paymentDetails['amount'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Shipping Address</strong></td>
                                <td class="text-right"><?= $paymentDetails['shipping_address'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Payment ID</strong></td>
                                <td class="text-right"><?= $paymentDetails['razorpay_payment_id'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="order-details-box p-4 shadow rounded bg-white h-100 animate__animated animate__fadeInLeft">
                    <h3 class="border-bottom pb-2 mb-3">Product Stats</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productStats as $product) { ?>
                                <tr>
                                    <td><?= $product['product_name'] ?></td>
                                    <td class="text-right"><?= $product['total_quantity'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 animate__animated animate__fadeInUp">
            <a href="index.php" class="btn btn-lg btn-primary px-5">Continue Shopping</a>
        </div>
    </div>
</main>

<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>

