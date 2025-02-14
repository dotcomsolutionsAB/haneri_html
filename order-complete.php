<?php include("header.php"); ?>

<?php include("configs/config.php"); ?> 

<main class="main main-test order_complete">
    <div class="container checkout-container padding_top_100">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li>
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li>
                <a href="checkout.php">Checkout</a>
            </li>
            <li class="active">
                <a href="order-complete.php">Order Complete</a>
            </li>
        </ul>

        <div class="order-success-message text-center">
            <h2 class="text-success">Thank You! Your Order Has Been Placed Successfully.</h2>
            <p class="lead">Your order ID is <strong>#123456</strong>. You will receive a confirmation email shortly.</p>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="order-details-box">
                    <h3>Order Details</h3>
                    <table class="table table-mini-cart">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">Circled Ultimate 3D Speaker × <span class="product-qty">4</span></h3>
                                </td>
                                <td class="price-col">
                                    <span>$1,040.00</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">Fashion Computer Bag × <span class="product-qty">2</span></h3>
                                </td>
                                <td class="price-col">
                                    <span>$418.00</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td><h4>Subtotal</h4></td>
                                <td class="price-col"><span>$1,458.00</span></td>
                            </tr>
                            <tr class="order-total">
                                <td><h4>Total</h4></td>
                                <td><b class="total-price"><span>$1,603.80</span></b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="customer-info-box">
                    <h3>Billing & Shipping Details</h3>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> johndoe@example.com</p>
                    <p><strong>Phone:</strong> +1 234 567 890</p>
                    <p><strong>Address:</strong> 123 Street, City, State, ZIP</p>
                </div>
                <div class="text-center mt-4">
                    <a href="shop.html" class="btn btn-dark">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</main>



<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>
