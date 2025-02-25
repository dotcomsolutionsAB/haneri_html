<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>

<?php
// Fetch order details from URL parameters
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 'N/A';
$total_amount = isset($_GET['total_amount']) ? $_GET['total_amount'] : '0.00';
$shipping_address = isset($_GET['shipping_address']) ? urldecode($_GET['shipping_address']) : 'N/A';

// Extracting details from the shipping address
$shipping_details = explode(",", $shipping_address);
$name = trim($shipping_details[0] ?? "N/A");
$phone = trim($shipping_details[1] ?? "N/A");
$email = trim($shipping_details[2] ?? "N/A");
$address = implode(", ", array_slice($shipping_details, 3)); // Combine remaining parts as the full address
?>

<main class="main main-test checkout_page">
    <div class="container checkout-container padding_top_100">
        <div class="order-success-message text-center animate__animated animate__fadeIn">
            <h2 class="text-success mt-3 animate__animated animate__fadeInUp">
                Thank You! Your Order Has Been Placed Successfully.
                <i class="fas fa-check-circle text-success fa-1x animate__animated animate__bounceIn order_success_text"></i>
            </h2>
            <p class="lead animate__animated animate__fadeInUp">
                Your order ID is <strong class="order-id-highlight text-primary animate__animated animate__pulse animate__infinite">#<?= $user_id; ?></strong>. 
                You will receive a confirmation email shortly.
            </p>
        </div>

        <div class="row mt-5 d-flex align-items-stretch">
            <!-- Order Details Box -->
            <div class="col-lg-6">
                <div class="order-details-box p-4 shadow rounded bg-white h-100 animate__animated animate__fadeInLeft">
                    <h3 class="border-bottom pb-2 mb-3">Order Details</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product Name × <span class="product-qty">X</span></td>
                                <td class="text-right">₹ <?= number_format($total_amount, 2); ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td><strong>Subtotal</strong></td>
                                <td class="text-right">₹ <?= number_format($total_amount, 2); ?></td>
                            </tr>
                            <tr class="order-total">
                                <td><strong>Total</strong></td>
                                <td class="text-right text-danger font-weight-bold">₹ <?= number_format($total_amount, 2); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <!-- Billing & Shipping Details -->
            <div class="col-lg-6">
                <div class="customer-info-box p-4 shadow rounded bg-white h-100 animate__animated animate__fadeInRight">
                    <h3 class="border-bottom pb-2 mb-3">Billing & Shipping Details</h3>
                    <p><strong>Name:</strong> <?= $name; ?></p>
                    <p><strong>Email:</strong> <?= $email; ?></p>
                    <p><strong>Phone:</strong> <?= $phone; ?></p>
                    <p><strong>Address:</strong> <?= $address; ?></p>
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
