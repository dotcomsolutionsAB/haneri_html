<?php include("header.php"); ?>

<?php include("configs/config.php"); ?> 

<main class="main main-test checkout_page">
    <div class="container checkout-container padding_top_100">

        <div class="order-success-message text-center animate__animated animate__fadeIn">            
            <h2 class="text-success mt-3 animate__animated animate__fadeInUp">
                Thank You! Your Order Has Been Placed Successfully.
                <i class="fas fa-check-circle text-success fa-1x animate__animated animate__bounceIn order_success_text"></i>
            </h2>
            <p class="lead animate__animated animate__fadeInUp">Your order ID is <strong class="order-id-highlight text-primary animate__animated animate__pulse animate__infinite">#123456</strong>. You will receive a confirmation email shortly.</p>
        </div>

        <div class="row mt-5 d-flex align-items-stretch">
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
                                <td>Circled Ultimate 3D Speaker × <span class="product-qty">4</span></td>
                                <td class="text-right">₹ 1,040.00</td>
                            </tr>
                            <tr>
                                <td>Fashion Computer Bag × <span class="product-qty">2</span></td>
                                <td class="text-right">₹ 418.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td><strong>Subtotal</strong></td>
                                <td class="text-right">₹ 1,458.00</td>
                            </tr>
                            <tr class="order-total">
                                <td><strong>Total</strong></td>
                                <td class="text-right text-danger font-weight-bold">₹ 1,603.80</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="customer-info-box p-4 shadow rounded bg-white h-100 animate__animated animate__fadeInRight">
                    <h3 class="border-bottom pb-2 mb-3">Billing & Shipping Details</h3>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> johndoe@example.com</p>
                    <p><strong>Phone:</strong> +1 234 567 890</p>
                    <p><strong>Address:</strong> 123 Street, City, State, ZIP</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5 animate__animated animate__fadeInUp">
            <a href="#" class="btn btn-lg btn-primary px-5">Continue Shopping</a>
        </div>
    </div>
</main>




<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>
