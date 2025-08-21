<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<!-- Include SweetAlert2 (make sure to have sweetalert2 or similar library included in your project) -->


<style>
    div:where(.swal2-container) .swal2-input {
        width:25rem;
    }
    div:where(.swal2-container).swal2-center>.swal2-popup {
        width:40rem;
    }
</style>

<script>
    window.onload = function() {
        // Retrieve token and tempId from local storage
        let token = localStorage.getItem("auth_token");
        let tempId = localStorage.getItem("temp_id");

        // Define API URLs
        const apiFetchUrl = `<?php echo BASE_URL; ?>/cart/fetch`;

        // Grabbing DOM elements
        const cartTableBody = document.querySelector("#cartTable tbody");
        const subtotalElem = document.getElementById("cart-subtotal");
        const taxElem = document.getElementById("cart-tax");
        const totalElem = document.getElementById("cart-total");
        const shipElem = document.getElementById("shipping_price");
        if (!cartTableBody) {
            console.error("Cart table body not found. Ensure the table has ID 'cartTable'.");
            return;
        }

        console.log("Auth Token:", token);
        console.log("Temp ID:", tempId);

        // Fetch the cart on page load
        fetchCart();

        // Main function to fetch cart data
        function fetchCart() {
            console.log("Fetching cart...");

            // If neither token nor tempId is present, user isn't authenticated or doesn't have a guest cart
            if (!token && !tempId) {
                console.warn("No authentication token or guest cart ID found. Redirecting to login page...");
                window.location.href = "login.php";
                return;
            }

            // Show a loading message while fetching
            cartTableBody.innerHTML = "<tr><td colspan='6' class='text-center'>Loading cart items...</td></tr>";

            // Decide what to send in the request body
            let requestData = token ? {} : { cart_id: tempId };

            console.log("Request Data:", requestData);

            fetch(apiFetchUrl, {
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

        // Display cart data in the table
        function displayCart(cartItems) {
            cartTableBody.innerHTML = "";
            console.log("Displaying cart items:", cartItems);

            let cartSubtotal = 0;
            let taxRate = 0.18; // example tax rate

            cartItems.forEach((item, index) => {
                // if (!item.product) {
                //     console.warn("Missing product details:", item);
                //     return;
                // }

                let productName = item.product_name;
                let variantName = item.variant_value ? `(${item.variant_value})` : "";
                let sellingPrice = parseFloat((item.selling_price || "0").replace(/,/g, ""));
                let productImage = item.file_urls[0];
                let quantity = item.quantity || 1;
                let subtotal = sellingPrice * quantity;

                if (isNaN(subtotal)) subtotal = 0;
                cartSubtotal += subtotal;

                console.log(`Adding item: ${productName}, Price: ${sellingPrice}, Quantity: ${quantity}`);

                cartTableBody.innerHTML += `
                    <tr data-cart-id="${item.id}">
                        <td data-label="Image"><img src="${productImage}" alt="${productName}" width="50"></td>
                        <td data-label="Product">${productName} ${variantName}</td>
                        <td data-label="Price">₹${sellingPrice.toFixed(2)}</td>
                        <td data-label="Quantity">
                            <div class="quantity-container">
                                <button class="btn-quantity" onclick="updateCartQuantity('${item.id}', 'decrease')">-</button>
                                <input 
                                    type="text" 
                                    class="horizontal-quantity" 
                                    value="${quantity}" 
                                    onchange="updateCartQuantity('${item.id}', 'input', this.value)"
                                >
                                <button class="btn-quantity" onclick="updateCartQuantity('${item.id}', 'increase')">+</button>
                            </div>
                        </td>
                        <td data-label="Subtotal" class="text-right">₹${subtotal.toFixed(2)}</td>
                        <td data-label="Remove">
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

        function updateCartTotals(subtotalWithTax, cartItemCount = 0) {
          const taxRate = 0.18;
          const shippingCharge = 80;

          // Ensure the input is valid
          subtotalWithTax = isNaN(subtotalWithTax) ? 0 : subtotalWithTax;

          // Calculate base subtotal (exclusive of tax)
          const baseSubtotal = subtotalWithTax / (1 + taxRate);

          // Calculate tax
          const tax = subtotalWithTax - baseSubtotal;

            // Determine shipping
            let shipping = 0;
            if (cartItemCount > 0) {
                shipping = subtotalWithTax > 1000 ? 0 : shippingCharge;
            }

            // Determine shipping based on subtotalWithTax
            //   const shipping = subtotalWithTax > 1000 ? 0 : shippingCharge;

          // Final total
          const total = subtotalWithTax + shipping;

          // Update DOM elements
          subtotalElem.innerText = `₹${baseSubtotal.toFixed(2)}`;
          taxElem.innerText = `₹${tax.toFixed(2)}`;
          shipElem.innerText = `₹${shipping.toFixed(2)}`;
          totalElem.innerText = `₹${total.toFixed(2)}`;

          console.log(`Updating totals: Subtotal (excl. tax): ₹${baseSubtotal.toFixed(2)}, Tax: ₹${tax.toFixed(2)}, Shipping: ₹${shipping}, Total: ₹${total.toFixed(2)}`);
        }

        // Remove an item from the cart
        window.removeCartItem = function(cartItemId) {
            console.log("Removing item with ID:", cartItemId);

            // Construct the remove URL
            const removeUrl = `<?php echo BASE_URL; ?>/cart/remove/${cartItemId}`;

            // Decide the body
            let requestBody = token ? {} : { cart_id: tempId };

            fetch(removeUrl, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {})
                },
                body: JSON.stringify(requestBody)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Remove response:", data);
                // Refresh cart to update the view
                fetchCart();
            })
            .catch(error => {
                console.error("Error removing cart item:", error);
            });
        }

        // Function to update cart quantity (increase, decrease, input)
        window.updateCartQuantity = function(cartItemId, action, value = 1) {
            const row = document.querySelector(`tr[data-cart-id="${cartItemId}"]`);
            if (!row) {
                console.error("Row not found for cartItemId:", cartItemId);
                return;
            }

            const qtyInput = row.querySelector(".horizontal-quantity");
            if (!qtyInput) {
                console.error("Quantity input not found for cartItemId:", cartItemId);
                return;
            }

            let currentQty = parseInt(qtyInput.value);
            if (isNaN(currentQty)) currentQty = 1;

            let newQty = currentQty;

            switch (action) {
                case "increase":
                    newQty = currentQty + 1;
                    break;
                case "decrease":
                    if (currentQty > 1) {
                        newQty = currentQty - 1;
                    }
                    break;
                case "input":
                    newQty = parseInt(value);
                    if (isNaN(newQty) || newQty < 1) newQty = 1;
                    break;
                default:
                    console.error("Unknown action:", action);
                    return;
            }

            // If quantity didn't actually change, no API call needed
            if (newQty === currentQty) {
                return;
            }

            // Update the input field immediately
            qtyInput.value = newQty;

            // Construct the update URL
            const updateUrl = `<?php echo BASE_URL; ?>/cart/update/${cartItemId}`;

            // Build the request body
            let bodyData = token 
                ? { quantity: newQty } 
                : { cart_id: tempId, quantity: newQty };

            // Make the API call to update quantity
            fetch(updateUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    ...(token ? { "Authorization": `Bearer ${token}` } : {})
                },
                body: JSON.stringify(bodyData)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Update quantity response:", data);
                // After updating, re-fetch cart
                fetchCart();
            })
            .catch(error => {
                console.error("Error updating cart quantity:", error);
            });
        }
    };
</script>

<!-- for guest checkout -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const proceedCheckoutBtn = document.querySelector(".checkout-methods a.btn.btn-block.btn-dark");

    if (proceedCheckoutBtn) {
      proceedCheckoutBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const token = localStorage.getItem("auth_token");
        const tempId = localStorage.getItem("temp_id");

        if (token) {
            window.location.href = "checkout.php";
            return;
        }

        if (tempId) {
            window.location.href = "checkout.php";
            return;
        }
      });
    }
  });
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
                                <td colspan="5" class="clearfix">
                                    <div class="float-right">
                                        <div class="cart-discount">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm" type="submit">Apply Coupon</button>
                                            </div>
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
                            <tr>
                                <td>Shipping</td>
                                <td id="shipping_price">₹0.00</td>
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
                    <br>
                    <div class="quotation-methods" id="quotation-methods">
                        <a href="#" class="btn btn-block btn-danger" id="get-quotation-btn">
                            📃 Get Quotation <i class="fa fa-arrow-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script>
    // Get values from localStorage
    const cartAuthToken = localStorage.getItem('auth_token');
    const userRole = localStorage.getItem('user_role');

    // Check if auth_token exists and user_role is not 'customer'
    if (cartAuthToken && userRole !== 'customer') {
        document.getElementById('quotation-methods').style.display = 'block'; // Show the button
    } else {
        document.getElementById('quotation-methods').style.display = 'none'; // Hide the button
    }
</script>

<script>
    // Event listener for the 'Get Quotation' button
    document.getElementById('get-quotation-btn').addEventListener('click', function () {
        // Show the SweetAlert popup with the form
        Swal.fire({
            title: 'Create Quotation',
            html: `
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <input id="q_user" class="swal2-input" placeholder="User Name (required)" required>
                    <input id="q_email" class="swal2-input" placeholder="Email (optional)">
                    <input id="q_mobile" class="swal2-input" placeholder="Mobile (optional)">
                    <input id="q_address" class="swal2-input" placeholder="Address (optional)">
                </div>
            `,
            confirmButtonText: 'Create Quote',
            confirmButtonColor: '#00473e',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#dc3545',
            preConfirm: () => {
                const qUser = document.getElementById('q_user').value;
                const qEmail = document.getElementById('q_email').value;
                const qMobile = document.getElementById('q_mobile').value;
                const qAddress = document.getElementById('q_address').value;

                // Validate required fields
                if (!qUser) {
                    Swal.showValidationMessage('User Name is required');
                    return false;
                }

                // Prepare the data for the API request
                const requestData = {
                    q_user: qUser,
                    q_email: qEmail,
                    q_mobile: qMobile,
                    q_address: qAddress
                };

                // API request
                fetch('<?php echo BASE_URL; ?>/quotation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${cartAuthToken}`,  // Pass the auth token here
                    },
                    body: JSON.stringify(requestData),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.data && data.message === "Quotation created successfully!") {
                        // Show success message
                        Swal.fire('Success', data.data.message, 'success');
                        
                        // Get the invoice_quotation URL
                        const invoiceUrl = data.data.data.invoice_quotation;

                        // Open the invoice in a new tab
                        if (invoiceUrl) {
                            window.open(invoiceUrl, '_blank');
                        }
                        
                        // Optionally, you can log the quotation details if needed
                        console.log('Quotation Details:', data.data.data);
                    } else {
                        // Show error message if the message doesn't match or is missing
                        Swal.fire('Error', 'Failed to create quotation.', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error', 'Something went wrong. Please try again later.', 'error');
                });
            }
        });
    });
</script>

<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>
