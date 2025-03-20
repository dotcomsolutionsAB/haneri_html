<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<!-- Main cart page script -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        let token = localStorage.getItem("auth_token");
        let tempId = localStorage.getItem("temp_id");
        const apiUrl = `<?php echo BASE_URL; ?>/cart/fetch`;
        const cartTableBody = document.querySelector(".table-cart tbody");
        console.log(tempId)
        // Fetch the cart data on page load
        fetchCart();

        /**
         * Fetches the cart details, automatically including auth_token or temp_id.
         */
        function fetchCart() {
            console.log("Fetching cart...");

            // Redirect to login if no token or guest cart_id is found
            if (!token && !tempId) {
                console.warn("No authentication token or guest cart ID found. Redirecting to login page...");
                window.location.href = "login.php"; // Change this to your actual login page URL
                return;
            }

            // Show loading state
            cartTableBody.innerHTML = "<tr><td colspan='5' class='text-center'>Loading cart items...</td></tr>";

            let requestData = token ? {} : { cart_id: tempId };

            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {}) // ✅ Adds token only if available
                },
                // credentials: "include",
                body: JSON.stringify(requestData)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Cart data received:", data);

                if (data.success && data.count > 0) {
                    displayCart(data.data);
                } else {
                    cartTableBody.innerHTML = "<tr><td colspan='5' class='text-center'>Your cart is empty.</td></tr>";
                }
            })
            .catch(error => {
                console.error("Error fetching cart:", error);
                cartTableBody.innerHTML = "<tr><td colspan='5' class='text-center text-danger'>Error loading cart.</td></tr>";
            });
        }

        /**
         * Displays cart items dynamically in the table
         */
        function displayCart(cartItems) {
            cartTableBody.innerHTML = ""; // Clear existing rows

            cartItems.forEach((item, index) => {
                let productName = item.product.name;
                let variantName = item.variant ? `(${item.variant.variant_value})` : "";
                let sellingPrice = parseFloat(item.variant.selling_price);
                let quantity = item.quantity;
                let subtotal = sellingPrice * quantity;

                cartTableBody.innerHTML += `
                    <tr data-cart-id="${item.id}">
                        <td><img src="images/f${index + 1}.png" alt="${productName}" width="50"></td>
                        <td>${productName} ${variantName}</td>
                        <td>₹${sellingPrice.toFixed(2)}</td>
                        <td>
                            <button onclick="updateCartQuantity('${item.id}', 'decrease')">-</button>
                            <input type="text" class="horizontal-quantity" value="${quantity}" onchange="updateCartQuantity('${item.id}', 'input', this.value)">
                            <button onclick="updateCartQuantity('${item.id}', 'increase')">+</button>
                        </td>
                        <td class="text-right">₹${subtotal.toFixed(2)}</td>
                    </tr>
                `;
            });
        }

        /**
         * Updates cart quantity for a given item
         */
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

            let updateUrl = `<?php echo BASE_URL; ?>/cart/update/${cartId}`;

            fetch(updateUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {})
                },
                body: JSON.stringify({ quantity: currentQuantity })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Cart quantity updated:", data);
                fetchCart(); // Refresh cart after update
            })
            .catch(error => console.error("Error updating cart quantity:", error));
        };

        /**
         * Removes an item from the cart
         */
        window.removeCartItem = function(cartId) {
            if (confirm("Are you sure you want to remove this item from your cart?")) {
                let removeUrl = `<?php echo BASE_URL; ?>/cart/remove/${cartId}`;

                fetch(removeUrl, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        ...(token ? { "Authorization": `Bearer ${token}` } : {})
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Item removed from cart:", data);
                    fetchCart(); // Refresh cart after removal
                })
                .catch(error => console.error("Error removing cart item:", error));
            }
        };
    });
</script> -->

<script>
    window.onload = function() {
        let token = localStorage.getItem("auth_token");
        let tempId = localStorage.getItem("temp_id");
        const apiUrl = `<?php echo BASE_URL; ?>/cart/fetch`;
        const cartTableBody = document.querySelector(".table-cart tbody");

        // Ensure cartTableBody exists before proceeding
        if (!cartTableBody) {
            console.error("Cart table body not found. Make sure the table structure exists.");
            return;
        }

        // Fetch the cart data on page load
        fetchCart();

        /**
         * Fetches the cart details, automatically including auth_token or temp_id.
         */
        function fetchCart() {
            console.log("Fetching cart...");

            // Redirect to login if no token or guest cart_id is found
            if (!token && !tempId) {
                console.warn("No authentication token or guest cart ID found. Redirecting to login page...");
                window.location.href = "login.php"; // Change this to your actual login page URL
                return;
            }

            // Show loading state
            cartTableBody.innerHTML = "<tr><td colspan='5' class='text-center'>Loading cart items...</td></tr>";

            let requestData = token ? {} : { cart_id: tempId };

            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {}) // ✅ Adds token only if available
                },
                // credentials: "include",
                body: JSON.stringify(requestData)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Cart data received:", data);

                if (data.success && data.data.length > 0) {
                    displayCart(data.data);
                } else {
                    cartTableBody.innerHTML = "<tr><td colspan='5' class='text-center'>Your cart is empty.</td></tr>";
                }
            })
            .catch(error => {
                console.error("Error fetching cart:", error);
                cartTableBody.innerHTML = "<tr><td colspan='5' class='text-center text-danger'>Error loading cart.</td></tr>";
            });
        }

        /**
         * Displays cart items dynamically in the table
         */
        function displayCart(cartItems) {
            cartTableBody.innerHTML = ""; // Clear existing rows
            console.log("Displaying cart items:", cartItems);

            cartItems.forEach((item, index) => {
                if (!item.product) {
                    console.warn("Cart item missing product details:", item);
                    return;
                }

                let productName = item.product.name;
                let variantName = item.variant ? `(${item.variant.variant_value})` : "";
                let sellingPrice = item.variant ? parseFloat(item.variant.selling_price) : parseFloat(item.product.selling_price || 0);
                let quantity = item.quantity;
                let subtotal = sellingPrice * quantity;

                console.log(`Adding item: ${productName}, Price: ${sellingPrice}, Quantity: ${quantity}`);

                cartTableBody.innerHTML += `
                    <tr data-cart-id="${item.id}">
                        <td><img src="images/f${(index % 10) + 1}.png" alt="${productName}" width="50"></td>
                        <td>${productName} ${variantName}</td>
                        <td>₹${sellingPrice.toFixed(2)}</td>
                        <td>
                            <button onclick="updateCartQuantity('${item.id}', 'decrease')">-</button>
                            <input type="text" class="horizontal-quantity" value="${quantity}" onchange="updateCartQuantity('${item.id}', 'input', this.value)">
                            <button onclick="updateCartQuantity('${item.id}', 'increase')">+</button>
                        </td>
                        <td class="text-right">₹${subtotal.toFixed(2)}</td>
                    </tr>
                `;
            });
        }

        /**
         * Updates cart quantity for a given item
         */
        window.updateCartQuantity = function(cartId, action, value = null) {
            let row = document.querySelector(`tr[data-cart-id="${cartId}"]`);
            let quantityInput = row ? row.querySelector(".horizontal-quantity") : null;
            if (!quantityInput) return;

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

            let updateUrl = `<?php echo BASE_URL; ?>/cart/update/${cartId}`;

            fetch(updateUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {})
                },
                body: JSON.stringify({ quantity: currentQuantity })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Cart quantity updated:", data);
                fetchCart(); // Refresh cart after update
            })
            .catch(error => console.error("Error updating cart quantity:", error));
        };
    };
</script>
<style>
    #get_quotation{
        width: 100%;
    background: #0d8676;
    border: 0px solid #000;
    }
</style>
<main class="main cart_page">
    <div class="container padding_top_100">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li class="disabled">
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
                    <!-- <table class="table table-cart">
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
                                    <div class="float-right">
                                        <div class="cart-discount">
                                            <form action="#">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Coupon Code" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm" type="submit">Apply
                                                            Coupon</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table> -->
                    <!-- Cart Table -->
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
                <div class="float-right">
                    <div class="cart-discount">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Coupon Code" required>
                                <div class="input-group-append">
                                    <button class="btn btn-sm" type="submit">Apply
                                        Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    </tfoot>
</table>
                </div>
            </div>
            <!--  -->
                <!-- Cart Table -->
<!-- <table id="cart-container">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody></tbody>
</table> -->
            <!--  -->
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>

                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>₹ 00.00</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>₹ 00.00</td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td>₹ 00.00</td>
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
