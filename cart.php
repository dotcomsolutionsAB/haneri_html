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
                                <input 
                                    type="text" 
                                    class="horizontal-quantity" 
                                    value="${quantity}" 
                                    onchange="updateCartQuantity('${item.id}', 'input', this.value)"
                                >
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

        // Update the displayed subtotal, tax, and total
        function updateCartTotals(subtotal, tax, total) {
            console.log(`Updating totals: Subtotal: ₹${subtotal}, Tax: ₹${tax}, Total: ₹${total}`);
            subtotalElem.innerText = `₹${(isNaN(subtotal) ? 0 : subtotal).toFixed(2)}`;
            taxElem.innerText = `₹${(isNaN(tax) ? 0 : tax).toFixed(2)}`;
            totalElem.innerText = `₹${(isNaN(total) ? 0 : total).toFixed(2)}`;
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
<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Grab the checkout button
    const proceedCheckoutBtn = document.querySelector(".checkout-methods a.btn.btn-block.btn-dark");

    // Attach click event
    if (proceedCheckoutBtn) {
      proceedCheckoutBtn.addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default navigation

        // Retrieve token and tempId from local storage
        const token = localStorage.getItem("auth_token");
        const tempId = localStorage.getItem("temp_id");

        // If we have a valid token, just proceed to checkout
        if (token) {
          window.location.href = "checkout.php";
          return;
        }

        // If we don't have an auth token but do have a temp_id,
        // we start our multi-step SweetAlert flow:
        if (!token && tempId) {
          let userName = "";
          let userEmail = "";
          let userMobile = "";

          // Step 1: Get Name
          Swal.fire({
            title: "Enter Your Name",
            input: "text",
            inputAttributes: {
              autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Next",
            preConfirm: (value) => {
              if (!value.trim()) {
                Swal.showValidationMessage("Name is required.");
                return false;
              }
              userName = value.trim();
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then((step1) => {
            if (!step1.isConfirmed) {
              return; // user cancelled
            }

            // Step 2: Get Email
            Swal.fire({
              title: "Enter Your Email",
              input: "email",
              inputAttributes: {
                autocapitalize: "off"
              },
              showCancelButton: true,
              confirmButtonText: "Next",
              preConfirm: (value) => {
                if (!value.trim()) {
                  Swal.showValidationMessage("Email is required.");
                  return false;
                }
                userEmail = value.trim();
              },
              allowOutsideClick: () => !Swal.isLoading()
            }).then((step2) => {
              if (!step2.isConfirmed) {
                return; // user cancelled
              }

              // Step 3: Get Mobile & Submit
              Swal.fire({
                title: "Enter Your Mobile",
                input: "text",
                inputAttributes: {
                  autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: true,
                preConfirm: async (value) => {
                  if (!value.trim()) {
                    return Swal.showValidationMessage("Mobile is required.");
                  }
                  userMobile = value.trim();

                  // Now call the /make_user endpoint
                  let formData = new FormData();
                  formData.append("name", userName);
                  formData.append("email", userEmail);
                  formData.append("mobile", userMobile);
                  formData.append("cart_id", tempId);

                  try {
                    const response = await fetch("<?php echo BASE_URL; ?>/make_user", {
                      method: "POST",
                      body: formData
                    });
                    if (!response.ok) {
                      const errData = await response.json();
                      return Swal.showValidationMessage(
                        `Error: ${errData.message || "Could not register user"}`
                      );
                    }

                    const data = await response.json();
                    if (!data.token) {
                      return Swal.showValidationMessage(
                        data.message || "Registration failed."
                      );
                    }

                    // If successful, remove temp_id, store auth_token
                    localStorage.removeItem("temp_id");
                    localStorage.setItem("auth_token", data.token);
                    localStorage.setItem("user_name", data.user.name);
                    localStorage.setItem("user_role", data.user.role);
                    localStorage.setItem("user_email", data.user.email);

                    // Return the data so .then() sees success
                    return data;
                  } catch (error) {
                    return Swal.showValidationMessage(`Request failed: ${error}`);
                  }
                },
                allowOutsideClick: () => !Swal.isLoading()
              }).then((finalStep) => {
                if (finalStep.isConfirmed) {
                  // All good, redirect
                  window.location.href = "checkout.php";
                }
              });
            });
          });
        } else {
          // If we have neither token nor tempId, redirect to login
          window.location.href = "login.php";
        }
      });
    }
  });
</script> -->
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

        if (!token && tempId) {
          Swal.fire({
            title: "Give Your Details",
            customClass: {
              confirmButton: 'confirmation-btn'
            },
            html:
              `<input type="text" id="swal-name" class="swal2-input" placeholder="Name">
               <input type="email" id="swal-email" class="swal2-input" placeholder="Email">
               <input type="text" id="swal-mobile" class="swal2-input" placeholder="Mobile">`,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: "Submit",
            showLoaderOnConfirm: true,
            preConfirm: async () => {
              const userName = document.getElementById("swal-name").value.trim();
              const userEmail = document.getElementById("swal-email").value.trim();
              const userMobile = document.getElementById("swal-mobile").value.trim();

              if (!userName || !userEmail || !userMobile) {
                Swal.showValidationMessage("All fields are required.");
                return false;
              }

              const formData = new FormData();
              formData.append("name", userName);
              formData.append("email", userEmail);
              formData.append("mobile", userMobile);
              formData.append("cart_id", tempId);

              try {
                const response = await fetch("<?php echo BASE_URL; ?>/make_user", {
                  method: "POST",
                  body: formData,
                });

                if (!response.ok) {
                  const errData = await response.json();
                  return Swal.showValidationMessage(
                    `Error: ${errData.message || "Could not register user"}`
                  );
                }

                const data = await response.json();
                if (!data.token) {
                  return Swal.showValidationMessage(data.message || "Registration failed.");
                }

                localStorage.removeItem("temp_id");
                localStorage.setItem("auth_token", data.token);
                localStorage.setItem("user_name", data.user.name);
                localStorage.setItem("user_role", data.user.role);
                localStorage.setItem("user_email", data.user.email);

                return data;
              } catch (error) {
                return Swal.showValidationMessage(`Request failed: ${error}`);
              }
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "checkout.php";
            }
          });
        } else {
          window.location.href = "login.php";
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
