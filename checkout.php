<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<main class="main main-test checkout_page">
    <div class="container checkout-container padding_top_100">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li>
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li class="active">
                <a href="checkout.php">Checkout</a>
            </li>
            <!-- <li class="disabled"> -->
            <li class="disabled">
                <a href="order-complete.php">Order Complete</a>
            </li>
        </ul>

        <!-- Your existing jQuery script with minimal changes -->
<!-- Make sure you have SweetAlert2 included -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        let authToken = localStorage.getItem('auth_token');
        const tempId = localStorage.getItem('temp_id');
        const baseUrl = "<?php echo BASE_URL; ?>/address";
        let addressList = [];

        // 🔐 Show Guest Modal if no auth token but temp_id exists
        if (!authToken && tempId) {
            $("#guest_temp_id").val(tempId);
            $("#guestModal").show();
            return; // Stop further execution until guest registers
        }

        // 📨 Guest Register Button Logic
        $(document).on("click", "#guestRegisterBtn", function () {
            const name = $("#guest_name").val();
            const mobile = $("#guest_mobile").val();
            const email = $("#guest_email").val();
            const cart_id = $("#guest_temp_id").val();

            if (!name || !mobile || !email) {
                alert("Please fill all fields.");
                return;
            }

            const formData = new FormData();
            formData.append("name", name);
            formData.append("mobile", mobile);
            formData.append("email", email);
            formData.append("cart_id", cart_id);

            fetch("<?php echo BASE_URL; ?>/make_user", {
                method: "POST",
                body: formData
            })
            .then((res) => res.json())
            .then((data) => {
                if (data.token) {
                    localStorage.removeItem("temp_id");
                    localStorage.setItem("auth_token", data.token);
                    alert("Registered successfully!");
                    location.reload();
                } else {
                    alert(data.message || "Something went wrong.");
                }
            })
            .catch(() => {
                alert("Registration failed. Please try again.");
            });
        });

        // ❌ Close modal on click
        $(".close").click(function () {
            $("#guestModal").hide();
        });

        // 🏠 Fetch Addresses After Logged In
        function fetchAddresses() {
            $.ajax({
                url: baseUrl,
                type: "GET",
                headers: { "Authorization": `Bearer ${authToken}` },
                success: function (response) {
                    if (response.data.length > 0) {
                        addressList = response.data;
                        let addressHTML = "";
                        response.data.forEach((address, index) => {
                            let isChecked = address.is_default ? "checked" : "";
                            addressHTML += `
                                <label class="address-card" for="addressRadio${index}">
                                    <div class="card-header">
                                        <h3 class="card-title">${address.name}</h3>
                                        <p class="card-phone">${address.contact_no}</p>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Address 1:</strong> ${address.address_line1}</p>
                                        <p><strong>Address 2:</strong> ${address.address_line2 || "N/A"}</p>
                                        <p><strong>Location:</strong> ${address.country}, ${address.state}, ${address.city}</p>
                                        <p><strong>Postal Code:</strong> ${address.postal_code}</p>
                                    </div>
                                    <div class="card-footer cardf">
                                        <div class="red">
                                            <input type="radio" id="addressRadio${index}" name="address_select" class="select-radio" ${isChecked}>
                                            <span class="footer-label">Select Address</span>
                                        </div>
                                        <div class="btbt">
                                            <button class="btn btn-primary btn-sm edit-add" onclick="openUpdateModal(${address.id})"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm del-add" onclick="deleteAddress(${address.id})"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </label>`;
                        });
                        $("#collapseNew").html(addressHTML).addClass("show");
                    } else {
                        $("#collapseNew").html("<p>No addresses found.</p>").addClass("show");
                        $("#addressModal").modal("show"); // Show address modal
                    }
                },
                error: function () {
                    console.error("Error fetching addresses.");
                }
            });
        }

        // 🗑️ Delete Address
        window.deleteAddress = function (id) {
            if (!confirm("Are you sure you want to delete this address?")) return;
            $.ajax({
                url: `${baseUrl}/${id}`,
                type: "DELETE",
                headers: { "Authorization": `Bearer ${authToken}` },
                success: function (response) {
                    if (response.message.includes("success")) {
                        alert("Address deleted successfully.");
                        fetchAddresses();
                    } else {
                        alert("Failed to delete address.");
                    }
                },
                error: function () {
                    alert("Failed to delete address.");
                }
            });
        };

        // ✏️ Edit Address
        window.openUpdateModal = function (id) {
            let address = addressList.find(addr => addr.id === id);
            if (!address) return alert("Address not found.");

            $("#update_address_id").val(address.id);
            $("#update_name").val(address.name);
            $("#update_contact_no").val(address.contact_no);
            $("#update_address_line1").val(address.address_line1);
            $("#update_address_line2").val(address.address_line2);
            $("#update_city").val(address.city);
            $("#update_state").val(address.state);
            $("#update_postal_code").val(address.postal_code);
            $("#update_country").val(address.country);

            $("#updateAddressModal").modal("show");
        };

        // 💾 Update Address
        window.updateAddress = function () {
            let id = $("#update_address_id").val();
            let updatedData = {
                name: $("#update_name").val(),
                contact_no: $("#update_contact_no").val(),
                address_line1: $("#update_address_line1").val(),
                address_line2: $("#update_address_line2").val(),
                city: $("#update_city").val(),
                state: $("#update_state").val(),
                postal_code: $("#update_postal_code").val(),
                country: $("#update_country").val(),
                is_default: true
            };

            if (!updatedData.name || !updatedData.contact_no || !updatedData.address_line1 || !updatedData.city || !updatedData.state || !updatedData.country || !updatedData.postal_code) {
                alert("Please fill all required fields.");
                return;
            }

            $.ajax({
                url: `${baseUrl}/update/${id}`,
                type: "POST",
                headers: {
                    "Authorization": `Bearer ${authToken}`,
                    "Content-Type": "application/json"
                },
                data: JSON.stringify(updatedData),
                success: function (response) {
                    if (response.message.includes("success")) {
                        alert("Address updated successfully.");
                        $("#updateAddressModal").modal("hide");
                        fetchAddresses();
                    } else {
                        alert("Failed to update address.");
                    }
                },
                error: function () {
                    alert("Failed to update address.");
                }
            });
        };

        // ➕ Add New Address
        $("#addAddressBtn").click(function () {
            let addressData = {
                name: $("#name").val(),
                contact_no: $("#contact_no").val(),
                address_line1: $("#address_line1").val(),
                address_line2: $("#address_line2").val(),
                city: $("#city").val(),
                state: $("#state").val(),
                country: $("#country").val(),
                postal_code: $("#postal_code").val(),
                is_default: true
            };

            if (!addressData.name || !addressData.contact_no || !addressData.address_line1 || !addressData.city || !addressData.state || !addressData.country || !addressData.postal_code) {
                alert("Please fill all required fields.");
                return;
            }

            $.ajax({
                url: `${baseUrl}/register`,
                type: "POST",
                headers: {
                    "Authorization": `Bearer ${authToken}`,
                    "Content-Type": "application/json"
                },
                data: JSON.stringify(addressData),
                success: function (response) {
                    if (response.message.includes("success")) {
                        $("#checkout-form")[0].reset();
                        $("#addressModal").modal("hide");
                        fetchAddresses();
                    } else {
                        alert("Failed to add address.");
                    }
                },
                error: function () {
                    alert("Failed to add address.");
                }
            });
        });

        // 📦 Initial Load if logged in
        fetchAddresses();
    });
</script>


<!-- Guest Registration Modal -->
<div class="modal" id="guestModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Register to Continue</h5>
                <button type="button" class="close" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="guestRegistrationForm">
                    <input type="hidden" id="guest_temp_id" />
                    <div class="form-group">
                        <label for="guest_name">Name:</label>
                        <input type="text" id="guest_name" class="form-control" placeholder="Enter your name" required />
                    </div>
                    <div class="form-group">
                        <label for="guest_mobile">Mobile:</label>
                        <input type="text" id="guest_mobile" class="form-control" placeholder="Enter your mobile number" required />
                    </div>
                    <div class="form-group">
                        <label for="guest_email">Email:</label>
                        <input type="email" id="guest_email" class="form-control" placeholder="Enter your email address" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="guestRegisterBtn" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</div>



        <!-- Update Address Modal -->
        <div class="modal fade" id="updateAddressModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal">
                        <input type="hidden" id="update_address_id">
                        <div class="form-group">
                            <label class="labl">Name</label>
                            <input type="text" class="form-control inp" id="update_name">
                        </div>
                        <div class="form-group">
                            <label class="labl">Contact No</label>
                            <input type="text" class="form-control inp" id="update_contact_no">
                        </div>
                        <div class="form-group">
                            <label class="labl">Address Line 1</label>
                            <input type="text" class="form-control inp" id="update_address_line1">
                        </div>
                        <div class="form-group">
                            <label class="labl">Address Line 2</label>
                            <input type="text" class="form-control inp" id="update_address_line2">
                        </div>
                        <div class="form-group">
                            <label class="labl">City</label>
                            <input type="text" class="form-control inp" id="update_city">
                        </div>
                        <div class="form-group">
                            <label class="labl">State</label>
                            <input type="text" class="form-control inp" id="update_state">
                        </div>
                        <div class="form-group">
                            <label class="labl">Postal Code</label>
                            <input type="text" class="form-control inp" id="update_postal_code">
                        </div>
                        <div class="form-group">
                            <label class="labl">Country</label>
                            <input type="text" class="form-control inp" id="update_country">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success dft" onclick="updateAddress()">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Billing details</h2>
                        <div class="form-group">
                            <a href="#" id="openAddressModal" class="text-primary">
                                Add another Address?
                            </a>
                        </div>
                        <!-- Address Modal -->
                        <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addressModalLabel">Add a New Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="checkout-form" class="check-form">
                                            <div class="form-group in">
                                                <label class="labl">Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control inp" id="name">
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">Contact No <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control inp" id="contact_no">
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">Address 1 <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control inp" id="address_line1" placeholder="House number and street name">
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">Address 2 (optional)</label>
                                                <input type="text" class="form-control inp" id="address_line2">
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">Town / City <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control inp" id="city">
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">State <abbr class="required" title="required">*</abbr></label>
                                                <select class="form-control inp" id="state">
                                                    <option value="Mumbai" selected>Mumbai</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">Country <span class="required">*</span></label>
                                                <select class="form-control inp" id="country">
                                                    <option value="India" selected>India</option>
                                                    <option value="Australia">Australia</option>
                                                </select>
                                            </div>

                                            <div class="form-group in">
                                                <label class="labl">Pincode <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control inp" id="postal_code">
                                            </div>

                                            <div class="form-group text-end btt">
                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                                                <button type="button" class="btn btn-primary" id="addAddressBtn">Add Address</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addresses">
                            <div class="address">                            
                                <div class="vvv">
                                    <button data-toggle="collapse" data-target="#collapseNew" aria-expanded="true" aria-controls="collapseNew" class="btn btn-link btn-toggle"></button>
                                </div>
                                <div id="collapseNew" class="collapse">
                                    <!-- Addresses will be dynamically added here -->
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End .col-lg-8 -->
            <script>
                $(document).ready(function () {
                    const authToken = localStorage.getItem('auth_token'); // Replace with actual token
                    const cartUrl = "<?php echo BASE_URL; ?>/cart/fetch";
                    const orderUrl = "<?php echo BASE_URL; ?>/orders";

                    function fetchCartItems() {
                        $.ajax({
                            url: cartUrl,
                            type: "POST",
                            headers: {
                                "Authorization": `Bearer ${authToken}`,
                                "Content-Type": "application/json"
                            },
                            success: function (response) {
                                if (response.data.length > 0) {
                                    let cartHTML = "";
                                    let subtotal = 0;
                                    let totalTax = 0;
                                    let total = 0;

                                    response.data.forEach(item => {
                                        let productName = item.product.name;
                                        let quantity = item.quantity;
                                        let price = parseFloat(item.variant.selling_price);
                                        let tax = parseFloat(item.variant.selling_tax);
                                        let itemTotal = (price + tax) * quantity;

                                        subtotal += (price * quantity);
                                        totalTax += (tax * quantity);
                                        total += itemTotal;

                                        cartHTML += `
                                            <tr>
                                                <td class="product-col">
                                                    <h3 class="product-title">
                                                        ${productName} × <span class="product-qty">${quantity}</span>
                                                    </h3>
                                                </td>
                                                <td class="price-col">
                                                    <span>₹ ${itemTotal.toFixed(2)}</span>
                                                </td>
                                            </tr>
                                        `;
                                    });

                                    $("#cart-items").html(cartHTML);
                                    $("#subtotal").text(`₹ ${subtotal.toFixed(2)}`);
                                    $("#total-tax").text(`₹ ${totalTax.toFixed(2)}`);
                                    $("#total").text(`₹ ${total.toFixed(2)}`);
                                } else {
                                    $("#cart-items").html("<tr><td colspan='2'>No items in cart.</td></tr>");
                                    $("#subtotal").text("₹ 0.00");
                                    $("#total-tax").text("₹ 0.00");
                                    $("#total").text("₹ 0.00");
                                }
                            },
                            error: function () {
                                console.error("Error fetching cart items.");
                            }
                        });
                    }

                    function getSelectedAddress() {
                        let selectedRadio = $("input[name='address_select']:checked").closest(".address-card");

                        if (selectedRadio.length === 0) {
                            alert("Please select a shipping address.");
                            return null;
                        }

                        let name = selectedRadio.find(".card-header h3").text().trim();
                        let contactNo = selectedRadio.find(".card-header .card-phone").text().trim();
                        let address1 = selectedRadio.find(".card-body p:contains('Address 1')").text().replace("Address 1:", "").trim();
                        let address2 = selectedRadio.find(".card-body p:contains('Address 2')").text().replace("Address 2:", "").trim() || "";
                        
                        // Extract Location (Country, State, City)
                        let locationText = selectedRadio.find(".card-body p:contains('Location')").text().replace("Location:", "").trim();
                        let locationParts = locationText.split(",").map(item => item.trim());
                        
                        let country = locationParts[0] || "";
                        let state = locationParts[1] || "";
                        let city = locationParts[2] || "";
                        
                        let postalCode = selectedRadio.find(".card-body p:contains('Postal Code')").text().replace("Postal Code:", "").trim();

                        let shippingAddress = `${name}, ${contactNo}, ${address1}, ${address2 ? address2 + ", " : ""}${city}, ${state}, ${postalCode}, ${country}`;

                        return shippingAddress;
                    }

                    $("#placeOrderBtn").click(function (event) {
                        event.preventDefault(); // Prevent form from submitting normally

                        let shippingAddress = getSelectedAddress();
                        if (!shippingAddress) return;

                        let orderData = {
                            status: "pending",
                            payment_status: "pending",
                            shipping_address: shippingAddress
                        };

                        $.ajax({
                            url: orderUrl,
                            type: "POST",
                            headers: {
                                "Authorization": `Bearer ${authToken}`,
                                "Content-Type": "application/json"
                            },
                            data: JSON.stringify(orderData),
                            success: function (response) {
                                if (response.message.includes("success")) {
                                    let orderDetails = response.data.data;

                                    let orderId = orderDetails.order_id;
                                    let razorpayOrderId = orderDetails.razorpay_order_id;
                                    let totalAmount = orderDetails.total_amount;
                                    let userName = orderDetails.name;
                                    let userEmail = orderDetails.email;
                                    let userPhone = orderDetails.phone;
                                    let userId = orderDetails.user_id;

                                    // Open Razorpay Payment Popup
                                    openRazorpayPopup(razorpayOrderId, totalAmount, orderId, userId, userName, userEmail, userPhone, shippingAddress);
                                } else {
                                    alert("Failed to place order. Please try again.");
                                }
                            },
                            error: function () {
                                alert("Failed to place order. Please try again.");
                            }
                        });
                    });
                    // Check if user_role in localStorage is 'vendor'
                    if (localStorage.getItem("user_role") === "vendor") {
                        $("#get_quotation").show();
                    } else {
                        $("#get_quotation").hide();
                    }

                    // Quotation button click event
                    $("#get_quotation").click(function(event) {
                        event.preventDefault();

                        let shippingAddress = getSelectedAddress();
                        if (!shippingAddress) return;

                        let quoteData = {
                            status: "pending",
                            payment_status: "pending",
                            shipping_address: shippingAddress
                        };
                        $.ajax({
                            url: "<?php echo BASE_URL; ?>/quotation",
                            type: "POST",
                            headers: {
                                "Authorization": `Bearer ${authToken}`,
                                "Content-Type": "application/json"
                            },
                            data: JSON.stringify(quoteData),
                            success: function(response) {
                                if (response.message && response.message.includes("success")) {
                                    // Extract the nested quotation data
                                    let quotationData = response.data.data;
                                    
                                    // Build query parameters from the returned data
                                    let params = new URLSearchParams();
                                    for (let key in quotationData) {
                                        if (quotationData.hasOwnProperty(key)) {
                                            params.append(key, quotationData[key]);
                                        }
                                    }
                                    // Redirect to the quotation page with all data passed as query parameters
                                    window.location.href = "quotation.php?" + params.toString();
                                } else {
                                    alert("Failed to get quotation. Please try again.");
                                }
                            },
                            error: function() {
                                alert("Failed to get quotation. Please try again.");
                            }
                        });
                    });

                    function openRazorpayPopup(order_id, amount, orderId, userId, name, email, phone, shippingAddress) {
                        var options = {
                            "key": "rzp_test_EVVF2DggZF1FTZ", // Replace with your Razorpay Key ID
                            "amount": amount * 100, // Convert to paise (₹1 = 100 paise)
                            "currency": "INR",
                            "name": "Haneri",
                            "description": `Order ID: ${orderId}`,
                            "image": "https://haneri.ongoingsites.xyz/images/Haneri%20Logo.png",
                            "order_id": order_id, // Razorpay Order ID
                            "handler": function(response) {
                                // alert("Payment successful! Payment ID: " + response.razorpay_payment_id);

                                // Send payment details to backend API
                                processPayment(response.razorpay_payment_id, orderId, order_id, amount, userId, shippingAddress);
                            },
                            "prefill": {
                                "name": name,
                                "email": email,
                                "contact": phone
                            },
                            "theme": {
                                "color": "#f0f8fe"
                            }
                        };

                        var rzp = new Razorpay(options);
                        rzp.open();
                    }

                    function processPayment(paymentId, orderId, razorpayOrderId, amount, userId, shippingAddress) {
                        let paymentData = {
                            "method": "upi",
                            "razorpay_payment_id": paymentId,
                            "amount": amount,
                            "status": "pending",
                            "order_id": orderId,
                            "razorpay_order_id": razorpayOrderId,
                            "user_id": userId
                        };

                        $.ajax({
                            url: `<?php echo BASE_URL; ?>/payments`,
                            type: "POST",
                            headers: {
                                "Authorization": `Bearer ${authToken}`,
                                "Content-Type": "application/json"
                            },
                            data: JSON.stringify(paymentData),
                            success: function (response) {
                                if (response.message.includes("success")) {
                                    let paymentDetails = response.data;
                                    let productStats = JSON.stringify(response.product_stats);

                                    // Redirect to order complete page with payment details
                                    window.location.href = `order-complete.php?method=${paymentDetails.method}&payment_id=${paymentDetails.razorpay_payment_id}&amount=${paymentDetails.amount}&order_id=${paymentDetails.order_id}&shipping_address=${encodeURIComponent(paymentDetails.shipping_address)}&product_stats=${encodeURIComponent(productStats)}`;
                                } else {
                                    alert("Payment processing failed. Please contact support.");
                                }
                            },
                            error: function () {
                                alert("Payment processing failed. Please contact support.");
                            }
                        });
                    }

                    fetchCartItems(); // Load cart items on page load
                });
            </script>


            <!-- Order Summary Section -->
            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>YOUR ORDER</h3>

                    <table class="table table-mini-cart">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <!-- Cart items will be inserted here dynamically -->
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td><h4>Subtotal</h4></td>
                                <td class="price-col"><span id="subtotal">₹ 0.00</span></td>
                            </tr>

                            <tr class="cart-tax">
                                <td><h4>Tax</h4></td>
                                <td class="price-col"><span id="total-tax">₹ 0.00</span></td>
                            </tr>

                            <tr class="order-total">
                                <td><h4>Total</h4></td>
                                <td><b class="total-price"><span id="total">₹ 0.00</span></b></td>
                            </tr>

                            <tr class="order-shipping">
                                <td class="text-left" colspan="2">
                                    <h4 class="m-b-sm">Shipping</h4>
                                    <div class="form-group form-group-custom-control">
                                        <div class="custom-control custom-radio d-flex">
                                            <input type="radio" class="custom-control-input" name="radio" checked />
                                            <label class="custom-control-label">Free Shipping</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="payment-methods">
                        <h4 class="mb-3">Payment Methods</h4>
                        <div class="payment-option border rounded p-3 d-flex align-items-center justify-content-between">
                            <span class="fw-bold fs-6">Razorpay</span>
                            <span class="rounded-circle d-inline-block ms-3 overflow-hidden" style="width: 80px; height: 40px;">
                                <img src="assets/images/payments/razorpay.png" class="w-100 h-100 object-fit-cover" alt="Razorpay" />
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-place-order" id="placeOrderBtn">
                        Place order
                    </button>
                    <button type="submit" class="btn btn-dark btn-get-quotation" id="get_quotation">
                        Get Quotation
                    </button>
                </div>
            </div>
            <!-- End .col-lg-4 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
</main>
<!-- End .main -->

<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>
