<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>

<style>
    /* Quantity Container */
    .quantity-container {
        display: flex;
        /* background: aqua; */
        height: 45px;
        /* justify-content: center; */
        align-items: center;
    }

    .btn-quantity {
        border: 1px solid #ccc;
        padding: 10px 8px;
        margin: 0 2px;
        cursor: pointer;
        background: #fff;
    }
    .btn-quantity:hover {
        background-color: #ddd;
    }

    /* Remove Button */
    .btn-remove-item {
        background: none;
        border: none;
        cursor: pointer;
        color: #d9534f;
        font-size: 1.5rem;
        margin-left: 10px;
        padding: 10px;
    }
    .btn-remove-item:hover {
        color: #c12e2a;
        padding: 10px;
        background: antiquewhite;
        border-radius: 50%;
    }
    .horizontal-quantity {
        border: 0px;
        font-size: x-large;
        width: 35px;
        text-align: center;
        font-family: 'Open Sans';
    }
</style>

<script>
    window.onload = function() {
        let token = localStorage.getItem("auth_token");
        let tempId = localStorage.getItem("temp_id");
        const apiUrl = `<?php echo BASE_URL; ?>/cart/fetch`;
        const cartTableBody = document.querySelector("#cartTable tbody");
        const subtotalElem = document.getElementById("cart-subtotal");
        const taxElem = document.getElementById("cart-tax");
        const totalElem = document.getElementById("cart-total");

        if (!cartTableBody) {
            console.error("Cart table body not found. Ensure the table has ID 'cartTable'.");
            return;
        }

        console.log("Auth Token:", token);
        console.log("Temp ID:", tempId);

        fetchCart();

        function fetchCart() {
            console.log("Fetching cart...");

            if (!token && !tempId) {
                console.warn("No authentication token or guest cart ID found. Redirecting to login page...");
                window.location.href = "login.php";
                return;
            }

            cartTableBody.innerHTML = "<tr><td colspan='6' class='text-center'>Loading cart items...</td></tr>";

            let requestData = token ? {} : { cart_id: tempId };

            console.log("Request Data:", requestData);

            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {})
                },
                body: JSON.stringify(requestData)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Cart data received:", data);

                // Ensure the data object is structured correctly
                if (data && Array.isArray(data.data) && data.data.length > 0) {
                    console.log("Data received, displaying cart...");
                    displayCart(data.data);
                } else {
                    console.warn("Cart is empty or data is missing.");
                    cartTableBody.innerHTML = "<tr><td colspan='6' class='text-center'>Your cart is empty.</td></tr>";
                    updateCartTotals(0, 0, 0);
                }
            })
            .catch(error => {
                console.error("Error fetching cart:", error);
                cartTableBody.innerHTML = "<tr><td colspan='6' class='text-center text-danger'>Error loading cart.</td></tr>";
            });
        }

        // Example remove function
        window.removeCartItem = function(cartItemId) {
            // Write your remove item logic here
            console.log("Removing item with ID:", cartItemId);
            // Example:
            // fetch(`<?php echo BASE_URL; ?>/cart/remove`, { 
            //     method: "POST", 
            //     ...
            // }).then(...)
            // .catch(...);
        }

        function displayCart(cartItems) {
            cartTableBody.innerHTML = "";
            console.log("Displaying cart items:", cartItems);

            let cartSubtotal = 0;
            let taxRate = 0.18;

            cartItems.forEach((item, index) => {
                if (!item.product) {
                    console.warn("Missing product details:", item);
                    return;
                }

                let productName = item.product.name;
                let variantName = item.variant ? `(${item.variant.variant_value})` : "";
                let sellingPrice = item.variant
                    ? parseFloat(item.variant.selling_price)
                    : parseFloat(item.product.selling_price || 0);
                let quantity = item.quantity;
                let subtotal = sellingPrice * quantity;

                if (isNaN(subtotal)) subtotal = 0;
                cartSubtotal += subtotal;

                console.log(`Adding item: ${productName}, Price: ${sellingPrice}, Quantity: ${quantity}`);

                cartTableBody.innerHTML += `
                    <tr data-cart-id="${item.id}">
                        <td><img src="images/f${(index % 10) + 1}.png" alt="${productName}" width="50"></td>
                        <td>${productName} ${variantName}</td>
                        <td>₹${sellingPrice.toFixed(2)}</td>
                        <td>
                            <div class="quantity-container">
                                <button class="btn-quantity" onclick="updateCartQuantity('${item.id}', 'decrease')">-</button>
                                <input type="text" class="horizontal-quantity" value="${quantity}" onchange="updateCartQuantity('${item.id}', 'input', this.value)">
                                <button class="btn-quantity" onclick="updateCartQuantity('${item.id}', 'increase')">+</button>
                            </div>
                        </td>
                        <td class="text-right">₹${subtotal.toFixed(2)}</td>
                        <td>
                            <button class="btn-remove-item" onclick="removeCartItem('${item.id}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });

            let taxAmount = cartSubtotal * taxRate;
            let totalAmount = cartSubtotal + taxAmount;

            if (isNaN(taxAmount)) taxAmount = 0;
            if (isNaN(totalAmount)) totalAmount = 0;

            updateCartTotals(cartSubtotal, taxAmount, totalAmount);
        }

        // Example quantity update function
        window.updateCartQuantity = function(cartItemId, action, value = 1) {
            // Replace with your logic to adjust quantity 
            console.log(`updateCartQuantity called for ID: ${cartItemId}, action: ${action}, value: ${value}`);
        }

        function updateCartTotals(subtotal, tax, total) {
            console.log(`Updating totals: Subtotal: ₹${subtotal}, Tax: ₹${tax}, Total: ₹${total}`);
            subtotalElem.innerText = `₹${(isNaN(subtotal) ? 0 : subtotal).toFixed(2)}`;
            taxElem.innerText = `₹${(isNaN(tax) ? 0 : tax).toFixed(2)}`;
            totalElem.innerText = `₹${(isNaN(total) ? 0 : total).toFixed(2)}`;
        }
    };
</script>

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

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table id="cartTable" class="table table-cart">
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
                            <tr><td colspan='6' class='text-center'>Loading cart items...</td></tr>
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
                                                        <button class="btn btn-sm" type="submit">Apply Coupon</button>
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

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>CART TOTALS</h3>
                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td id="cart-subtotal">₹0.00</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td id="cart-tax">₹0.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td id="cart-total">₹0.00</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="checkout.php" class="btn btn-block btn-dark">
                            Proceed to Checkout <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>
