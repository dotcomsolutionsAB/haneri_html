<?php include("header.php"); ?>

<?php include("configs/config.php"); ?> 
<style>
    .vvv{
        display:flex;
        justify-content:end;
    }
    .selects{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .selects .sel{
        width: 40px;
        height: 40px;
    }
    .address_box{
        /* background: antiquewhite; */
        /* padding: 5px 15px; */
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .add_box_1{
        display: flex;
        justify-content: space-between;
        padding: 15px 0px;
        background: #f4f4f4;
        border-radius: 10px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <li>
                <a href="order-complete.php">Order Complete</a>
            </li>
        </ul>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        const authToken = localStorage.getItem('auth_token'); // Replace with actual token
        const baseUrl = "<?php echo BASE_URL; ?>/address";

        function fetchAddresses() {
            $.ajax({
                url: baseUrl,
                type: "GET",
                headers: { "Authorization": `Bearer ${authToken}` },
                success: function (response) {
                    if (response.data.length > 0) {
                        let addressHTML = "";
                        response.data.forEach(address => {
                            let isChecked = address.is_default ? "checked" : "";
                            addressHTML += `
                                <div class="address_box">
                                    <div class="add_box_1">
                                        <div class="col-lg-5">
                                            <p><strong>Name:</strong> ${address.name}</p>
                                            <p><strong>Contact No:</strong> ${address.contact_no}</p>
                                            <input type="hidden" name="is_default" value="${address.is_default}">
                                        </div>
                                        <div class="col-lg-5">
                                            <p><strong>Address 1:</strong> ${address.address_line1}</p>
                                            <p><strong>Address 2:</strong> ${address.address_line2 || "N/A"}</p>
                                            <p>
                                                <strong>Location:</strong> 
                                                <span>${address.country}</span>, 
                                                <span>${address.state}</span>, 
                                                <span>${address.city}</span>
                                            </p>
                                            <p><strong>Postal Code:</strong> ${address.postal_code}</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="selects">
                                                <input type="radio" name="address_select" class="sel" ${isChecked}>
                                            </div>                                                  
                                        </div>
                                    </div>                                        
                                </div>
                            `;
                        });
                        $("#collapseNew").html(addressHTML).addClass("show");
                    } else {
                        $("#collapseNew").html("<p>No addresses found.</p>").addClass("show");
                    }
                },
                error: function () {
                    console.error("Error fetching addresses.");
                }
            });
        }

        // Open modal when link is clicked
        $("#openAddressModal").click(function (e) {
            e.preventDefault();
            $("#addressModal").modal("show");
        });

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
                url: "<?php echo BASE_URL; ?>/address/register",
                type: "POST",
                headers: { "Authorization": `Bearer ${authToken}`, "Content-Type": "application/json" },
                data: JSON.stringify(addressData),
                success: function (response) {
                    if (response.message.includes("success")) {
                        $("#checkout-form")[0].reset(); // Reset form fields
                        $("#addressModal").modal("hide"); // Close modal
                        fetchAddresses(); // Refresh address list
                    } else {
                        alert("Failed to add address. Please try again.");
                    }
                },
                error: function () {
                    alert("Failed to add address. Please try again.");
                }
            });
        });

        fetchAddresses(); // Load addresses on page load
    });
</script>

        <div class="row">
           
            <div class="col-lg-7">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Billing details</h2>

                        <div class="form-group">
                            <a href="#" id="openAddressModal" class="text-primary">
                                Ship to an Additional Address?
                            </a>
                        </div>


                        <!-- Address Modal -->
                        <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addressModalLabel">Add a New Address</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="checkout-form">
                                            <div class="form-group">
                                                <label>Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="name" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Contact No <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="contact_no" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Address 1 <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="address_line1" placeholder="House number and street name" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Address 2 (optional)</label>
                                                <input type="text" class="form-control" id="address_line2">
                                            </div>

                                            <div class="form-group">
                                                <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="city" required>
                                            </div>

                                            <div class="form-group">
                                                <label>State <abbr class="required" title="required">*</abbr></label>
                                                <select class="form-control" id="state">
                                                    <option value="Mumbai" selected>Mumbai</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Country <span class="required">*</span></label>
                                                <select class="form-control" id="country">
                                                    <option value="India" selected>India</option>
                                                    <option value="Australia">Australia</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Pincode <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="postal_code" required>
                                            </div>

                                            <div class="form-group text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                                    <button data-toggle="collapse" data-target="#collapseNew" aria-expanded="true" aria-controls="collapseNew" class="btn btn-link btn-toggle">SHOW ADDRESS</button>
                                </div>
                                <div id="collapseNew" class="collapse">
                                    <!-- Addresses will be dynamically added here -->
                                </div>
                            </div>
                        </div>
                       
                        <!-- <form action="#" id="checkout-form">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mt-0">
                                    <input type="checkbox" class="custom-control-input" id="different-shipping">
                                    <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour"
                                        aria-controls="collapseFour" for="different-shipping" aria-expanded="true">
                                        Ship to an Additional Address?
                                    </label>
                                </div>
                            </div>

                            <div id="collapseFour" class="collapse">
                                <div class="shipping-info">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="name" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Contact No <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" id="contact_no" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Address 1<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" id="address_line1" placeholder="House number and street name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Address 2 (optional)</label>
                                        <input type="text" class="form-control" id="address_line2">
                                    </div>

                                    <div class="form-group">
                                        <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" id="city" required>
                                    </div>

                                    <div class="form-group">
                                        <label>State <abbr class="required" title="required">*</abbr></label>
                                        <select class="form-control" id="state">
                                            <option value="Mumbai" selected>Mumbai</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="form-control" id="country">
                                            <option value="India" selected>India</option>
                                            <option value="Australia">Australia</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pincode <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" id="postal_code" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" id="addAddressBtn">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form> -->


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
        let selectedRadio = $("input[name='address_select']:checked").closest(".address_box");

        if (selectedRadio.length === 0) {
            alert("Please select a shipping address.");
            return null;
        }

        let name = selectedRadio.find(".col-lg-5 p:contains('Name')").text().replace("Name:", "").trim();
        let contactNo = selectedRadio.find(".col-lg-5 p:contains('Contact No')").text().replace("Contact No:", "").trim();
        let email = selectedRadio.find(".col-lg-5 p:contains('Email')").text().replace("Email:", "").trim();
        let address1 = selectedRadio.find(".col-lg-5 p:contains('Address 1')").text().replace("Address 1:", "").trim();
        let address2 = selectedRadio.find(".col-lg-5 p:contains('Address 2')").text().replace("Address 2:", "").trim() || "";
        let city = selectedRadio.find(".col-lg-5 p:contains('Location') span:nth-child(3)").text().trim();
        let state = selectedRadio.find(".col-lg-5 p:contains('Location') span:nth-child(2)").text().trim();
        let country = selectedRadio.find(".col-lg-5 p:contains('Location') span:nth-child(1)").text().trim();
        let postalCode = selectedRadio.find(".col-lg-5 p:contains('Postal Code')").text().replace("Postal Code:", "").trim();

        let shippingAddress = `${name}, ${contactNo}, ${email ? email + ", " : ""}${address1}, ${address2 ? address2 + ", " : ""}${city}, ${state}, ${postalCode}, ${country}`;

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
                    alert("Order placed successfully!");
                } else {
                    alert("Failed to place order. Please try again.");
                }
            },
            error: function () {
                alert("Failed to place order. Please try again.");
            }
        });
    });

    fetchCartItems(); // Load cart items on page load
        });
    </script>

            <div class="col-lg-5">
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

                            <tr class="order-total" style="width: 50%;">
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

                    <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                        Place order
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
