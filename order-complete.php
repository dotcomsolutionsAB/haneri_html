<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<?php
$order_id = $_GET['order_id'] ?? 'N/A';
$total_amount = $_GET['total_amount'] ?? 'N/A';
$shipping_address = $_GET['shipping_address'] ?? 'N/A';
$payment_id = $_GET['payment_id'] ?? 'N/A';
$name = $_GET['name'] ?? 'N/A';
$email = $_GET['email'] ?? 'N/A';
$phone = $_GET['phone'] ?? 'N/A';
?>

<main class="main main-test checkout_page">
    <div class="container checkout-container padding_top_100">
        <div class="order-success-message text-center animate__animated animate__fadeIn">            
            <h2 class="text-success mt-3 animate__animated animate__fadeInUp">
                Thank You! Your Order Has Been Placed Successfully.
                <i class="fas fa-check-circle text-success fa-1x animate__animated animate__bounceIn order_success_text"></i>
            </h2>
            <p class="lead animate__animated animate__fadeInUp">
                Your order ID is <strong class="order-id-highlight text-primary animate__animated animate__pulse animate__infinite">#<?= $order_id ?></strong>. 
                You will receive a confirmation email shortly.
            </p>
            <p class="lead animate__animated animate__fadeInUp"><strong>Payment ID:</strong> <?= $payment_id ?></p>
        </div>

        <div class="row mt-5 d-flex align-items-stretch">
            <div class="col-lg-6">
                <div class="order-details-box p-4 shadow rounded bg-white h-100 animate__animated animate__fadeInLeft">
                    <h3 class="border-bottom pb-2 mb-3">Order Details</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th class="text-right">#<?= $order_id ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td class="text-right">₹<?= $total_amount ?></td>
                            </tr>
                            <tr>
                                <td><strong>Shipping Address</strong></td>
                                <td class="text-right"><?= urldecode($shipping_address) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Payment ID</strong></td>
                                <td class="text-right"><?= $payment_id ?></td>
                            </tr>
                            <tr>
                                <td><strong>Customer Name</strong></td>
                                <td class="text-right"><?= urldecode($name) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td class="text-right"><?= urldecode($email) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Phone</strong></td>
                                <td class="text-right"><?= $phone ?></td>
                            </tr>
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
