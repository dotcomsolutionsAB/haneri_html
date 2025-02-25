<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const guestId = localStorage.getItem('guest_id');
            const userId = localStorage.getItem('user_id');
            const idToDisplay = guestId || userId;
            console.log("Retrieved ID:", idToDisplay);

        });
    </script>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let token = localStorage.getItem('auth_token');
            let guestId = localStorage.getItem('guest_id');
            let backendDomain = "https://haneri.dotcombusiness.in";
            
            // If there is no auth token and guestId exists, store it in cookies for the backend domain
            if (!token && guestId) {
                document.cookie = `cart_id=${guestId}; path=/; domain=${backendDomain}; SameSite=None; Secure`;
            }
            
            let apiUrl = "<?php echo BASE_URL; ?>/cart/fetch";
            let requestData = {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                // credentials: "include" // Ensure cookies are sent with request
            };
            
            if (token) {
                requestData.headers["Authorization"] = `Bearer ${token}`;
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
    </script> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let token = localStorage.getItem('auth_token');
        let guestId = localStorage.getItem('guest_id');
        let backendDomain = "https://haneri.dotcombusiness.in";
        
        if (!token && guestId) {
            document.cookie = `cart_id=${guestId}; path=/; domain=${backendDomain}; SameSite=None; Secure`;
        }

        let apiUrl = "<?php echo BASE_URL; ?>/cart/fetch";

        fetchCart();

        function fetchCart() {
            $.ajax({
                url: apiUrl,
                type: "POST",
                headers: { "Authorization": token ? `Bearer ${token}` : "" },
                contentType: "application/json",
                success: function (data) {
                    if (data.data && data.data.length > 0) {
                        let cartTableBody = document.querySelector(".table-cart tbody");
                        let totalsTableBody = document.querySelector(".table-totals tbody");
                        let totalsTableFoot = document.querySelector(".table-totals tfoot");

                        cartTableBody.innerHTML = "";
                        totalsTableBody.innerHTML = "";
                        totalsTableFoot.innerHTML = "";

                        let subtotal = 0;
                        let totalTax = 0;

                        data.data.forEach(item => {
                            let variantInfo = item.variant ? `${item.variant.variant_type}: ${item.variant.variant_value}` : "No Variant";
                            let itemPrice = parseFloat(item.variant.selling_price) || 0;
                            let itemTax = parseFloat(item.variant.selling_tax) || 0;
                            let itemSubtotal = (item.quantity * itemPrice).toFixed(2);
                            let itemTotalTax = (item.quantity * itemTax).toFixed(2);

                            subtotal += parseFloat(itemSubtotal);
                            totalTax += parseFloat(itemTotalTax);

                            let row = `
                                <tr class="product-row" data-cart-id="${item.id}">
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
                                    <td>₹ ${itemPrice.toFixed(2)}</td>
                                    <td>
                                        <div class="product-single-qty">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <span class="input-group-btn input-group-prepend">
                                                    <button class="btn btn-outline btn-down-icon bootstrap-touchspin-down" type="button" onclick="updateCartQuantity(${item.id}, 'decrease')">-</button>
                                                </span>
                                                <input class="horizontal-quantity form-control" type="number" value="${item.quantity}" min="1" onchange="updateCartQuantity(${item.id}, 'input', this.value)">
                                                <span class="input-group-btn input-group-append">
                                                    <button class="btn btn-outline btn-up-icon bootstrap-touchspin-up" type="button" onclick="updateCartQuantity(${item.id}, 'increase')">+</button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">₹ ${itemSubtotal}</span></td>
                                </tr>
                            `;
                            cartTableBody.insertAdjacentHTML("beforeend", row);
                        });

                        let grandTotal = subtotal + totalTax;

                        totalsTableBody.innerHTML = `
                            <tr>
                                <td>Subtotal</td>
                                <td>₹ ${subtotal.toFixed(2)}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>₹ ${totalTax.toFixed(2)}</td>
                            </tr>
                        `;

                        totalsTableFoot.innerHTML = `
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>₹ ${grandTotal.toFixed(2)}</strong></td>
                            </tr>
                        `;
                    } else {
                        document.querySelector(".table-cart tbody").innerHTML = "<tr><td colspan='5' class='text-center'>No items in cart</td></tr>";
                        document.querySelector(".table-totals tbody").innerHTML = "<tr><td colspan='2' class='text-center'>No totals to display</td></tr>";
                        document.querySelector(".table-totals tfoot").innerHTML = "";
                    }
                },
                error: function (error) {
                    console.error("Error fetching cart items:", error);
                }
            });
        }

        window.updateCartQuantity = function(cartId, action, value = null) {
            let row = document.querySelector(`tr[data-cart-id="${cartId}"]`);
            let quantityInput = row.querySelector(".horizontal-quantity");
            let currentQuantity = parseInt(quantityInput.value);

            if (action === "increase") {
                currentQuantity += 1;
            } else if (action === "decrease" && currentQuantity > 1) {
                currentQuantity -= 1;
            } else if (action === "input") {
                currentQuantity = parseInt(value);
                if (isNaN(currentQuantity) || currentQuantity < 1) currentQuantity = 1;
            }

            quantityInput.value = currentQuantity;

            $.ajax({
                url: `<?php echo BASE_URL; ?>/cart/update/${cartId}`,
                type: "POST",
                headers: { "Authorization": token ? `Bearer ${token}` : "" },
                contentType: "application/json",
                data: JSON.stringify({ quantity: currentQuantity }),
                success: function (data) {
                    console.log("Cart quantity updated:", data);
                    fetchCart();
                },
                error: function (error) {
                    console.error("Error updating cart quantity:", error);
                }
            });
        };
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
        <!-- <p id="cart-user-id">Loading user...</p> -->
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
                                <td>Tax</td>
                                <td>₹ 199.00</td>
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
