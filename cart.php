<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 
<script>
document.addEventListener("DOMContentLoaded", function() {
    const guestId = localStorage.getItem('guest_id');
    const userId = localStorage.getItem('user_id');
    const cartUserIdElem = document.getElementById('cart-user-id');

    if (guestId) {
        cartUserIdElem.textContent = `User ID: ${guestId}`;
    } else if (userId) {
        cartUserIdElem.textContent = `User ID: ${userId}`;
    } else {
        console.warn("No user ID found in localStorage.");
    }
});


</script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let token = localStorage.getItem('auth_token');
            let userId = localStorage.getItem('user_id');
            // alert(userId);
            let apiUrl = "<?php echo BASE_URL; ?>/cart/fetch";
            let requestData = {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({})
            };
            
            if (token) {
                requestData.headers["Authorization"] = `Bearer ${token}`;
            } 
            
            if (userId) {
                requestData.body = JSON.stringify({ cart_id: userId });
            }
            
            if (!token && !userId) {
                console.log("No auth_token or user_id found");
                return;
            }

            fetch(apiUrl, requestData)
                .then(response => response.json())
                .then(data => {
                    if (data.data && data.data.length > 0) {
                        let cartTableBody = document.querySelector(".table-cart tbody");
                        cartTableBody.innerHTML = "";
                        
                        data.data.forEach(item => {
                            let variantInfo = item.variant ? `${item.variant.variant_type}: ${item.variant.variant_value}` : "No Variant";
                            let subtotal = (item.quantity * item.variant.selling_price).toFixed(2);

                            let row = `
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="#" class="product-image">
                                                <img src="assets/images/products/product-placeholder.jpg" alt="product">
                                            </a>
                                            <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="#">${item.product.name}</a>
                                        </h5>
                                        <p>${variantInfo}</p>
                                    </td>
                                    <td>₹ ${item.variant.selling_price}</td>
                                    <td>
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" type="text" value="${item.quantity}" readonly>
                                        </div>
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">₹ ${subtotal}</span></td>
                                </tr>
                            `;
                            cartTableBody.insertAdjacentHTML("beforeend", row);
                        });
                    } else {
                        document.querySelector(".table-cart tbody").innerHTML = "<tr><td colspan='5' class='text-center'>No items in cart</td></tr>";
                    }
                })
                .catch(error => console.error("Error fetching cart items:", error));
        });
    </script>
<main class="main cart_page">
    <div class="container padding_top_100">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li>
                <a href="checkout.php">Checkout</a>
            </li>
            <li class="disabled">
                <a href="order-complete.php">Order Complete</a>
            </li>
        </ul>
        <p id="cart-user-id">Loading user...</p>
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="thumbnail-col"></th>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="qty-col">Quantity</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan='5' class='text-center'>Loading cart items...</td></tr>
                        </tbody>


                        <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-left">
                                        <div class="cart-discount">
                                            <form action="#">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Coupon Code" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm" type="submit">Apply
                                                            Coupon</button>
                                                    </div>
                                                </div><!-- End .input-group -->
                                            </form>
                                        </div>
                                    </div><!-- End .float-left -->

                                    <div class="float-right">
                                        <button type="submit" class="btn btn-shop btn-update-cart">
                                            Update Cart
                                        </button>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>

                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>₹ 199.00</td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-left">
                                    <h4>Shipping</h4>

                                    <div class="form-group form-group-custom-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="radio"
                                                checked>
                                            <label class="custom-control-label">Free Shipping</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <form action="#">
                                        <div class="form-group form-group-sm">
                                            <div class="select-custom">
                                                <select class="form-control form-control-sm">
                                                    <option value="India">INDIA</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-sm">
                                            <div class="select-custom">
                                                <select class="form-control form-control-sm">
                                                    <option value="NY">Mumbai</option>
                                                    <option value="CA">Delhi</option>
                                                    <option value="TX">West Bengal</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-sm">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Town / City">
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-sm">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Pin Code">
                                        </div><!-- End .form-group -->

                                        <button type="submit" class="btn btn-shop btn-update-total">
                                            Update Totals
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td>₹ 199.00</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="checkout.php" class="btn btn-block btn-dark">Proceed to Checkout
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->


<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>
