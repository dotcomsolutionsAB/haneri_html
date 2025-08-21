
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
        <script>
            $(document).ready(function () {
                const authToken = localStorage.getItem('auth_token'); // Replace with actual token
                // If not logged in, don't call /address. Go straight to Add Address form.
                if (!authToken) {
                    setTimeout(() => openAddAddressForm(), 300);
                    // you may also want to show an empty list placeholder
                    $("#collapseNew").html("<p>No addresses found.</p>").addClass("show");
                    // continue with other initializations if needed, but skip fetchAddresses
                } else {
                    fetchAddresses(); // logged-in users only
                }

                const baseUrl = "<?php echo BASE_URL; ?>/address";
                let addressList = []; // Store addresses in memory

                function fetchAddresses() {
                    $.ajax({
                        url: baseUrl,
                        type: "GET",
                        headers: { "Authorization": `Bearer ${authToken}` },
                        success: function (response) {
                            if (response.data.length > 0) {
                                addressList = response.data; // Store in memory
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
                                                    <input
                                                        type="radio"
                                                        id="addressRadio${index}"
                                                        name="address_select"
                                                        class="select-radio"
                                                        ${isChecked}
                                                    >
                                                    <span class="footer-label">Select Address</span>
                                                </div>
                                                <div class="btbt">
                                                    <!-- Update Button -->
                                                    <button class="btn btn-primary btn-sm edit-add" onclick="openUpdateModal(${address.id})">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <!-- Delete Button -->
                                                    <button class="btn btn-danger btn-sm del-add" onclick="deleteAddress(${address.id})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>                                            
                                                </div>
                                            </div>
                                        </label>
                                    `;
                                });
                                $("#collapseNew").html(addressHTML).addClass("show");
                            } else {
                                $("#collapseNew").html("<p>No addresses found.</p>").addClass("show");
                                // 🔥 Auto open add address popup if no address found
                                setTimeout(() => {
                                    openAddAddressForm();
                                }, 500);
                            }
                        },
                        error: function () {
                            console.error("Error fetching addresses.");
                        }
                    });
                }

                window.deleteAddress = function (id) { 
                    $.ajax({
                        url: `${baseUrl}/${id}`,
                        type: "DELETE",
                        headers: { "Authorization": `Bearer ${authToken}` },
                        success: function (response) {
                            if (response.message.includes("success")) {
                                // alert("Address deleted successfully.");
                                fetchAddresses(); // Refresh address list
                            } else {
                                alert("Failed to delete address. Please try again.");
                            }
                        },
                        error: function () {
                            alert("Failed to delete address. Please try again.");
                        }
                    });
                };

                fetchAddresses();

                window.openUpdateModal = function (id) {
                    const address = addressList.find(addr => addr.id === id); // Get data from memory

                    if (!address) {
                        Swal.fire({
                            title: "Error!",
                            text: "Address not found.",
                            icon: "error"
                        });
                        return;
                    }

                    Swal.fire({
                        title: 'Update Address',
                        width: '700px',
                        customClass: {
                            confirmButton: 'update-address-btn',
                            cancelButton: 'cancel-address-btn'
                        },
                        html: `
                            <style>
                                .swal-form-grid {
                                    display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    gap: 15px;
                                }
                                .swal-form-grid input,
                                .swal-form-grid select {
                                    width: 100%;
                                    height: 45px;
                                    padding: 10px;
                                    font-size: 14px;
                                    border-radius: 5px;
                                    border: 1px solid #ccc;
                                }
                                .swal2-actions {
                                    justify-content: flex-end;
                                    margin-top: 20px;
                                }
                            </style>

                            <form id="swal-update-form" class="swal-form-grid">
                                <input type="hidden" id="update_address_id" value="${address.id}">
                                <input type="text" id="update_name" value="${address.name || ''}" placeholder="Name">
                                <input type="text" id="update_contact_no" value="${address.contact_no || ''}" placeholder="Contact No">
                                <input type="text" id="update_address_line1" value="${address.address_line1 || ''}" placeholder="Address Line 1">
                                <input type="text" id="update_address_line2" value="${address.address_line2 || ''}" placeholder="Address Line 2 (optional)">
                                <input type="text" id="update_city" value="${address.city || ''}" placeholder="City">
                                <select id="update_state">
                                    <option value="">Select State</option>
                                    <option value="Mumbai" ${address.state === "Mumbai" ? "selected" : ""}>Mumbai</option>
                                    <option value="Delhi" ${address.state === "Delhi" ? "selected" : ""}>Delhi</option>
                                    <option value="West Bengal" ${address.state === "West Bengal" ? "selected" : ""}>West Bengal</option>
                                </select>
                                <select id="update_country">
                                    <option value="India" ${address.country === "India" ? "selected" : ""}>India</option>
                                    <option value="Australia" ${address.country === "Australia" ? "selected" : ""}>Australia</option>
                                </select>
                                <input type="text" id="update_postal_code" value="${address.postal_code || ''}" placeholder="Pincode">
                            </form>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Save Changes',
                        cancelButtonText: 'Cancel',
                        // customClass: {
                        //     confirmButton: 'swal-orange-btn'
                        // },
                        focusConfirm: false,
                        preConfirm: () => {
                            return {
                                id: document.getElementById("update_address_id").value,
                                name: document.getElementById("update_name").value,
                                contact_no: document.getElementById("update_contact_no").value,
                                address_line1: document.getElementById("update_address_line1").value,
                                address_line2: document.getElementById("update_address_line2").value || null,
                                city: document.getElementById("update_city").value,
                                state: document.getElementById("update_state").value,
                                country: document.getElementById("update_country").value,
                                postal_code: document.getElementById("update_postal_code").value
                            };
                        }
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            updateAddress(result.value);
                        }
                    });
                };

                window.updateAddress = function (data) {
                    if (!data || !data.id) {
                        Swal.fire("Error", "Invalid data", "error");
                        return;
                    }

                    const updatedData = {
                        name: data.name,
                        contact_no: data.contact_no,
                        address_line1: data.address_line1,
                        address_line2: data.address_line2,
                        city: data.city,
                        state: data.state,
                        postal_code: data.postal_code,
                        country: data.country,
                        is_default: true
                    };

                    Swal.fire({
                        title: "Updating...",
                        text: "Please wait",
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                    $.ajax({
                        url: `${baseUrl}/update/${data.id}`,
                        type: "POST",
                        headers: {
                            "Authorization": `Bearer ${authToken}`,
                            "Content-Type": "application/json"
                        },
                        data: JSON.stringify(updatedData),
                        success: function (response) {
                            Swal.close();
                            if (response.message && response.message.includes("success")) {
                                Swal.fire({
                                    title: "Success!",
                                    text: "Address updated successfully. ",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    fetchAddresses(); // refresh list
                                });
                            } else {
                                Swal.fire("Error", response.message || "Failed to update address.", "error");
                            }
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire("Error", "Something went wrong. Please try again.", "error");
                        }
                    });
                };               

                window.openAddAddressForm = function () {
                    const authToken = localStorage.getItem('auth_token');
                    const tempId = localStorage.getItem('temp_id');
                    const showCreateUserCheckbox = !authToken;

                    Swal.fire({
                        title: 'Add New Address',
                        width: '700px',
                        customClass: {
                            confirmButton: 'add-address-btn',
                            cancelButton: 'cancel-address-btn'
                        },
                        html: `
                            <form id="swal-address-form">
                                <input type="text" id="swal_name" placeholder="Name*" required>
                                <input type="text" id="swal_contact_no" placeholder="Contact No*" required>
                                <input type="email" id="swal_email" placeholder="Email*" required>
                                <input type="text" id="swal_address_line1" placeholder="Address Line 1*" required>
                                <input type="text" id="swal_address_line2" placeholder="Address Line 2 (optional)">
                                <input type="text" id="swal_city" placeholder="City*" required>

                                <select id="swal_state" required>
                                    <option value="">Select State*</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>

                                <select id="swal_country" required>
                                    <option value="India">India</option>
                                    <option value="Australia">Australia</option>
                                </select>

                                <input type="text" id="swal_postal_code" placeholder="Pincode*" required>

                                ${showCreateUserCheckbox ? `
                                <div class="create_user_checkbox">
                                    <label for="swal_create_user">Create as User</label>
                                    <input type="checkbox" id="swal_create_user" name="create_user" checked>
                                </div>` : ''}
                            </form>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Add Address',
                        cancelButtonText: 'Cancel',
                        focusConfirm: false,
                        preConfirm: () => {
                            const name = document.getElementById('swal_name').value.trim();
                            const email = document.getElementById('swal_email').value.trim();
                            const contact_no = document.getElementById('swal_contact_no').value.trim();
                            const address_line1 = document.getElementById('swal_address_line1').value.trim();
                            const address_line2 = document.getElementById('swal_address_line2').value.trim();
                            const city = document.getElementById('swal_city').value.trim();
                            const state = document.getElementById('swal_state').value;
                            const country = document.getElementById('swal_country').value;
                            const postal_code = document.getElementById('swal_postal_code').value.trim();

                            if (!name || !contact_no || !email || !address_line1 || !city || !state || !country || !postal_code) {
                                Swal.showValidationMessage('Please fill all required fields.');
                                return false;
                            }

                            let create_user = false;
                            if (showCreateUserCheckbox) {
                                const createUserChecked = document.getElementById('swal_create_user').checked;
                                if (!createUserChecked) {
                                    Swal.showValidationMessage('Please check "Create as User" to proceed.');
                                    return false;
                                }
                                create_user = true;
                            }

                            return {
                                name,
                                email,
                                contact_no,
                                address_line1,
                                address_line2,
                                city,
                                state,
                                country,
                                postal_code,
                                create_user
                            };
                        }
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            submitAddress(result.value);
                        }
                    });
                };

                function submitAddress(data) {
                    const authToken = localStorage.getItem("auth_token");
                    const tempId = localStorage.getItem("temp_id");

                    const addressData = {
                        name: data.name,
                        contact_no: data.contact_no,
                        address_line1: data.address_line1,
                        address_line2: data.address_line2,
                        city: data.city,
                        state: data.state,
                        country: data.country,
                        postal_code: data.postal_code,
                        is_default: true
                    };

                    if (authToken) {
                        sendAddress(addressData, authToken);
                    } else if (tempId) {
                        Swal.fire({ title: "Registering User...", allowOutsideClick: false, didOpen: () => Swal.showLoading() });

                        fetch("<?php echo BASE_URL; ?>/make_user", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                name: data.name,
                                email: data.email,
                                mobile: data.contact_no,
                                cart_id: tempId
                            })
                        })
                        .then(res => res.json())
                        .then(resData => {
                            if (resData.token && resData.user) {
                                localStorage.setItem("auth_token", resData.token);
                                localStorage.setItem("user_name", resData.user.name);
                                localStorage.setItem("user_email", resData.user.email);
                                localStorage.setItem("user_mobile", resData.user.mobile);
                                localStorage.setItem("user_role", resData.user.role);
                                localStorage.setItem("pwd_000", resData.password);

                                sendAddress(addressData, resData.token);
                            } else {
                                Swal.close();
                                Swal.fire("Error", resData.message || "Failed to register user.", "error");
                            }
                        })
                        .catch(err => {
                            Swal.close();
                            console.error(err);
                            Swal.fire("Error", "Registration failed. Please try again.", "error");
                        });
                    } else {
                        Swal.fire("Error", "User not logged in or cart session expired.", "error");
                    }
                }

                function sendAddress(addressData, token) {
                    fetch("<?php echo BASE_URL; ?>/address/register", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": `Bearer ${token}`
                        },
                        body: JSON.stringify(addressData)
                    })
                    .then(res => res.json())
                    .then(responseData => {
                        Swal.close();
                        if (responseData.success || (responseData.message && responseData.message.toLowerCase().includes("success"))) {
                            Swal.fire({
                                title: "Success",
                                text: "Address added successfully!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Error", responseData.message || "Failed to add address.", "error");
                        }
                    })
                    .catch(err => {
                        Swal.close();
                        console.error(err);
                        Swal.fire("Error", "Something went wrong. Please try again.", "error");
                    });
                }

                // Load addresses on page load
                fetchAddresses();
            });
        </script>
<style>
    .create_user_checkbox{
        height: 45px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 15px;
    }
    .create_user_checkbox input{
        width: 15px !important;
     }
    .create_user_checkbox label{
        margin: 0px;
        font-weight: 600;
        font-family: sans-serif !important;
        color: #1b4e47;
    }
</style>
        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Billing details</h2>
                        <div class="form-group">
                            <a href="javascript:void(0);" onclick="openAddAddressForm()" class="text-primary">
                                Add another Address?
                            </a>
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
                    const authTemp = localStorage.getItem('temp_id');
                    const cartUrl = "<?php echo BASE_URL; ?>/cart/fetch";
                    const orderUrl = "<?php echo BASE_URL; ?>/orders";

                    function fetchCartItems() {
                        const authToken = localStorage.getItem('auth_token');
                        const authTemp = localStorage.getItem('temp_id');
                        const cartUrl = "<?php echo BASE_URL; ?>/cart/fetch";

                        const ajaxOptions = {
                            url: cartUrl,
                            type: "POST",
                            contentType: "application/json",
                            success: function (response) {
                                // if (response.data.length > 0) {
                                //     let cartHTML = "";
                                //     let subtotal = 0;
                                //     let totalTax = 0;
                                //     let total = 0;

                                //     response.data.forEach(item => {
                                //         const quantity = item.quantity;
                                //         const fullPrice = parseFloat(item.selling_price); // inclusive of tax
                                //         const basePrice = fullPrice / 1.18;
                                //         const tax = fullPrice - basePrice;
                                //         const itemBaseTotal = basePrice * quantity;
                                //         const itemTaxTotal = tax * quantity;
                                //         const itemTotal = fullPrice * quantity;

                                //         subtotal += itemBaseTotal;
                                //         totalTax += itemTaxTotal;
                                //         total += itemTotal;

                                //         cartHTML += `
                                //             <tr>
                                //                 <td class="product-col">
                                //                     <h3 class="product-title">
                                //                         ${item.product_name} - ${item.variant_value} × <span class="product-qty">${quantity}</span>
                                //                     </h3>
                                //                 </td>
                                //                 <td class="price-col">
                                //                     <span>₹ ${itemTotal.toFixed(2)}</span>
                                //                 </td>
                                //             </tr>
                                //         `;
                                //     });

                                //     // Shipping Logic
                                //     let shippingCharge = 0;
                                //     let shippingHTML = "";
                                //     if (total > 5000) {
                                //         shippingHTML = `
                                //             <div class="custom-control custom-radio d-flex">
                                //                 <input type="radio" class="custom-control-input" name="radio" checked />
                                //                 <label class="custom-control-label">Free Shipping</label>
                                //             </div>
                                //         `;
                                //     } else {
                                //         shippingCharge = 120;
                                //         total += shippingCharge;
                                //         shippingHTML = `
                                //             <div class="custom-control custom-radio d-flex">
                                //                 <input type="radio" class="custom-control-input" name="radio" checked />
                                //                 <label class="custom-control-label">Shipping Charges ₹120.00</label>
                                //             </div>
                                //         `;
                                //     }

                                //     $("#cart-items").html(cartHTML);
                                //     $("#subtotal").text(`₹ ${subtotal.toFixed(2)}`);
                                //     $("#total-tax").text(`₹ ${totalTax.toFixed(2)}`);
                                //     $("#total").text(`₹ ${total.toFixed(2)}`);
                                //     $(".order-shipping td .form-group-custom-control").html(shippingHTML);
                                // } else {
                                //     $("#cart-items").html("<tr><td colspan='2'>No items in cart.</td></tr>");
                                //     $("#subtotal").text("₹ 0.00");
                                //     $("#total-tax").text("₹ 0.00");
                                //     $("#total").text("₹ 0.00");
                                //     $(".order-shipping td .form-group-custom-control").html(`
                                //         <div class="custom-control custom-radio d-flex">
                                //             <input type="radio" class="custom-control-input" name="radio" checked />
                                //             <label class="custom-control-label">Free Shipping</label>
                                //         </div>
                                //     `);
                                // }
                                if (response.data.length > 0) {
                                    let cartHTML = "";
                                    let subtotal = 0;
                                    let totalTax = 0;
                                    let total = 0;
                                    const GST_RATE = 0.18; // 18% GST

                                    response.data.forEach(item => {
                                        const quantity = item.quantity;

                                        // Remove commas from price string before parsing
                                        const fullPrice = parseFloat(item.selling_price.replace(/,/g, '')); // inclusive of tax

                                        // Calculate base price and tax per unit
                                        const basePrice = fullPrice / (1 + GST_RATE);
                                        const tax = fullPrice - basePrice;

                                        // Totals for this line item
                                        const itemBaseTotal = basePrice * quantity;
                                        const itemTaxTotal = tax * quantity;
                                        const itemTotal = fullPrice * quantity;

                                        // Add to overall totals
                                        subtotal += itemBaseTotal;
                                        totalTax += itemTaxTotal;
                                        total += itemTotal;

                                        // Build HTML for cart
                                        cartHTML += `
                                            <tr>
                                                <td class="product-col">
                                                    <h3 class="product-title">
                                                        ${item.product_name} - ${item.variant_value} × <span class="product-qty">${quantity}</span>
                                                    </h3>
                                                </td>
                                                <td class="price-col">
                                                    <span>₹ ${itemTotal.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</span>
                                                </td>
                                            </tr>
                                        `;
                                    });

                                    // Shipping Logic
                                    let shippingCharge = 0;
                                    let shippingHTML = "";
                                    if (total > 5000) {
                                        shippingHTML = `
                                            <div class="custom-control custom-radio d-flex">
                                                <input type="radio" class="custom-control-input" name="radio" checked />
                                                <label class="custom-control-label">Free Shipping</label>
                                            </div>
                                        `;
                                    } else {
                                        shippingCharge = 120;
                                        total += shippingCharge;
                                        shippingHTML = `
                                            <div class="custom-control custom-radio d-flex">
                                                <input type="radio" class="custom-control-input" name="radio" checked />
                                                <label class="custom-control-label">Shipping Charges ₹120.00</label>
                                            </div>
                                        `;
                                    }

                                    // Render to DOM
                                    $("#cart-items").html(cartHTML);
                                    $("#subtotal").text(`₹ ${subtotal.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
                                    $("#total-tax").text(`₹ ${totalTax.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
                                    $("#total").text(`₹ ${total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
                                    $(".order-shipping td .form-group-custom-control").html(shippingHTML);

                                } else {
                                    // Empty cart
                                    $("#cart-items").html("<tr><td colspan='2'>No items in cart.</td></tr>");
                                    $("#subtotal").text("₹ 0.00");
                                    $("#total-tax").text("₹ 0.00");
                                    $("#total").text("₹ 0.00");
                                    $(".order-shipping td .form-group-custom-control").html(`
                                        <div class="custom-control custom-radio d-flex">
                                            <input type="radio" class="custom-control-input" name="radio" checked />
                                            <label class="custom-control-label">Free Shipping</label>
                                        </div>
                                    `);
                                }
                            },
                            error: function () {
                                console.error("Error fetching cart items.");
                            }
                        };

                        // Determine how to send credentials
                        if (authToken) {
                            ajaxOptions.headers = { "Authorization": `Bearer ${authToken}` };
                            ajaxOptions.data = JSON.stringify({});
                        } else if (authTemp) {
                            ajaxOptions.data = JSON.stringify({ cart_id: authTemp });
                        } else {
                            $("#cart-items").html("<tr><td colspan='2'>No items in cart.</td></tr>");
                            $("#subtotal").text("₹ 0.00");
                            $("#total-tax").text("₹ 0.00");
                            $("#total").text("₹ 0.00");
                            $(".order-shipping td .form-group-custom-control").html(`
                                <div class="custom-control custom-radio d-flex">
                                    <input type="radio" class="custom-control-input" name="radio" checked />
                                    <label class="custom-control-label">Free Shipping</label>
                                </div>
                            `);
                            return;
                        }

                        $.ajax(ajaxOptions);
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
                        event.preventDefault();

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

                                    // ✅ Punch DeliveryOne (via backend PHP)
                                    punchOrderInDeliveryOne(orderDetails);

                                    // ✅ Start Razorpay
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

                    function punchOrderInDeliveryOne(orderDetails) {
                        const payload = {
                            order_id: orderDetails.order_id,
                            user: {
                                name: orderDetails.name,
                                email: orderDetails.email,
                                phone: orderDetails.phone
                            },
                            address: orderDetails.shipping_address,
                            amount: orderDetails.total_amount,
                            items: orderDetails.items || []
                        };

                        // $.ajax({
                        //     url: "punch-deliveryone",
                        //     method: "POST",
                        //     contentType: "application/json",
                        //     data: JSON.stringify({
                        //         order_id: "123",
                        //         user: {
                        //         name: "Test User",
                        //         email: "test@example.com",
                        //         phone: "9876543210"
                        //         },
                        //         address: "123 ABC Street, Kolkata, West Bengal 700001, India",
                        //         amount: 999,
                        //         items: []
                        //     }),
                        //     success: function (res) {
                        //         console.log("✅ DeliveryOne Response:", res);
                        //     },
                        //     error: function (err) {
                        //         console.error("❌ DeliveryOne Error:", err);
                        //     }
                        // });

                        $.ajax({
                            url: "punch-deliveryone",
                            method: "POST",
                            contentType: "application/json",
                            data: JSON.stringify({
                                order_id: "528323",
                                user: {
                                name: "Asen Jamir",
                                email: "asen@example.com",
                                phone: "9603304294"
                                },
                                address: "MRH- C 113, Ward no - 18. Below Sumi Church, Merhulietsa School Road",
                                amount: 750
                            }),
                            success: function (res) {
                                console.log("✅ DeliveryOne Response:", res);
                            },
                            error: function (err) {
                                console.error("❌ DeliveryOne Error:", err);
                            }
                        });
                    }

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
                            "name": "HANERI ELECTRICALS LLP",
                            "description": `Order ID: ${orderId}`,
                            "image": "https://haneri.ongoingsites.xyz/images/Haneri_Favicon.jpg",
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
