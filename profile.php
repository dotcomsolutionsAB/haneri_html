<script>
	document.addEventListener("DOMContentLoaded", function() {
		const authToken = localStorage.getItem("auth_token");

		if (!authToken) {
			// If no token, redirect to login page
			window.location.href = "login.php";
		}
	});
</script>

<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<main class="main profile_page">
	<div class="container account-container custom-account-container padding_top_100">
		<div class="row">
			<div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
				<h2 class="text-uppercase">My Account</h2>
				<ul class="nav nav-tabs flex-column mb-0" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
							role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
							aria-controls="order" aria-selected="true">Orders</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
							aria-controls="address" aria-selected="false">Addresses</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
							aria-controls="edit" aria-selected="false">Account
							details</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="logout-btn">Logout</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-9 order-lg-last order-1 tab-content">
				<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
					<div class="dashboard-content">
						<h6>
							Hello <strong class="text-dark" id="user-name">..</strong>
						</h6>

						<p>
							From your account dashboard you can view your
							<a class="btn btn-link alink link-to-tab" href="#order">recent orders</a>,
							manage your
							<a class="btn btn-link alink link-to-tab" href="#address">shipping and billing
								addresses</a>, and
							<a class="btn btn-link alink link-to-tab" href="#edit">edit your password and account
								details.</a>
						</p>

						<div class="mb-4"></div>

						<div class="row row-lg">
							<div class="col-6 col-md-3">
								<div class="feature-box text-center pb-4">
									<a href="#order" class="link-to-tab"><i
											class="sicon-social-dropbox"></i></a>
									<div class="feature-box-content">
										<h3>ORDERS</h3>
									</div>
								</div>
							</div>

							<div class="col-6 col-md-3">
								<div class="feature-box text-center pb-4">
									<a href="#address" class="link-to-tab"><i
											class="sicon-location-pin"></i></a>
									<div class="feature-box-content">
										<h3>ADDRESSES</h3>
									</div>
								</div>
							</div>

							<div class="col-6 col-md-3">
								<div class="feature-box text-center pb-4">
									<a href="#edit" class="link-to-tab"><i class="icon-user-2"></i></a>
									<div class="feature-box-content p-0">
										<h3>ACCOUNT DETAILS</h3>
									</div>
								</div>
							</div>

							<!-- <div class="col-6 col-md-3">
								<div class="feature-box text-center pb-4">
									<a class="link-to-tab" id="logout-btn"><i class="sicon-logout"></i></a>
									<div class="feature-box-content">
										<h3>LOGOUT</h3>
									</div>
								</div>
							</div> -->

						</div><!-- End .row -->
					</div>
				</div><!-- End .tab-pane -->
				<script>
					document.getElementById("logout-btn").addEventListener("click", function () {
						Swal.fire({
							title: "Are you sure?",
							text: "You will be logged out.",
							icon: "warning",
							showCancelButton: true,
							confirmButtonColor: "#d33",
							cancelButtonColor: "#3085d6",
							confirmButtonText: "Yes, Logout"
						}).then((result) => {
							if (result.isConfirmed) {
								// Remove authentication token
								localStorage.removeItem("auth_token");
								localStorage.removeItem("user_name");
								localStorage.removeItem("user_role");
								localStorage.removeItem("user_id");
								localStorage.removeItem("unique_id");
								localStorage.removeItem("guest_id");

								// Redirect to login page (update with correct login URL)
								window.location.href = "login.php";
							}
						});
					});
				</script>

				<style>
					.table-order tbody {
						display: block;
						max-height: 300px; /* Adjust height as needed */
						overflow-y: auto;
					}
					.table-order thead, 
					.table-order tbody tr {
						display: table;
						width: 100%;
						table-layout: fixed;
					}
					.table td{

					}
					.table td, .table th {
						padding: .75rem;
						vertical-align: middle;
						border-top: 1px solid #dee2e6;
						text-align: center;
					}
					.table-order tbody tr .addressess{
						font-size:smaller;
						text-align: start;
					}
					@media (max-width: 520px) {
						.order-table-container {
							overflow-x: auto;
							width: 100%;
						}

						.table-order {
							min-width: 600px; /* Allow full columns to be scrollable */
						}

						.table-order thead {
							font-size: 14px;
						}

						.table-order tbody {
							max-height: 200px;
						}

						.table-order tbody tr .addressess {
							font-size: 12px;
							text-align: left;
						}

						.table-order td,
						.table-order th {
							font-size: 13px;
							padding: 0.5rem;
						}

						.btn.btn-dark {
							font-size: 14px;
							padding: 0.6rem 1rem;
						}
					}

				</style>
				<!-- Orders Showing For each Profile -->
				<div class="tab-pane fade" id="order" role="tabpanel">
					<div class="order-content">
						<h3 class="account-sub-title d-none d-md-block">
							<i class="sicon-social-dropbox align-middle mr-3"></i>Orders
						</h3>
						<div class="order-table-container text-center">
							<table class="table table-order text-left">
								<thead>
									<tr>
										<th class="order-id">ORDER</th>
										<th class="order-date">BILLING</th>
										<th class="order-status">STATUS</th>
										<th class="order-price">TOTAL</th>
										<th class="order-action">ACTIONS</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
							<hr class="mt-0 mb-3 pb-2" />
							<a href="shop.php" class="btn btn-dark">Go Shop</a>
						</div>
					</div>
				</div>
				<!--Orders Fetch Script -->
				<script>
					document.addEventListener("DOMContentLoaded", function () {
						const authToken = localStorage.getItem("auth_token");
						if (!authToken) {
							console.log("User not logged in.");
							return;
						}

						fetch("<?php echo BASE_URL; ?>/orders", {
							method: "GET",
							headers: {
								"Content-Type": "application/json",
								"Authorization": `Bearer ${authToken}`
							}
						})
						.then(response => response.json())
						.then(responseData => {
							console.log("API Response:", responseData); // Debugging - Check API response in Console

							// Extract actual orders from responseData
							const orders = responseData.data; // Now correctly accessing the orders array
							const tableBody = document.querySelector(".table-order tbody");
							tableBody.innerHTML = ""; // Clear table content

							if (!Array.isArray(orders) || orders.length === 0) {
								console.log("No orders found.");
								tableBody.innerHTML = `<tr><td colspan="5" class="text-center">No Orders Found</td></tr>`;
								return;
							}

							orders.forEach(order => {
								const orderId = order.items.length > 0 ? order.items[0].order_id : "N/A"; 
								// const orderDate = new Date().toLocaleDateString(); 
								const orderStatus = order.status || "Pending";
								const orderBill = order.shipping_address || "NA";
								const totalAmount = `₹${order.total_amount || '0.00'}`;
								
								// Debugging
								// console.log(`Order ID: ${orderId}, Total: ${totalAmount}`);

								tableBody.innerHTML += `
									<tr>
										<td class="text-center">#${orderId}</td>
										<td class="addressess">${orderBill}</td>
										<td class="text-center">${orderStatus}</td>
										<td class="text-center">${totalAmount}</td>
										<td class="text-center">
											<a href="order_details.html?id=${orderId}" class="btn btn-default">View</a>
										</td>
									</tr>
								`;
							});
						})
						.catch(error => {
							console.error("Error fetching orders:", error);
						});
					});
				</script>

				<div class="tab-pane fade" id="address" role="tabpanel">
					<h3 class="account-sub-title d-none d-md-block mb-1">
						<i class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
					<div class="addresses-content">
						<!-- <p class="mb-4">
							The following addresses will be used on the checkout page by
							default.
						</p> -->

						<div class="row">
							<div class="address col-md-6">
								<div class="heading d-flex">
									<h4 class="text-dark mb-0">Billing address</h4>
								</div>

								<div class="address-box">
									You have not set up this type of address yet.
								</div>

								<a class="btn btn-default address-action" href="javascript:void(0);" onclick="openAddAddressForm()">
									Add Address
								</a>
							</div>
						</div>
						<!-- Fetch Address Card-->
						<div id="addressList" class="add-List">

						</div>
						<!-- Fetch & Create Address Script -->
						<script>
							let allAddresses = []; // Store all addresses globally

							document.addEventListener("DOMContentLoaded", function () {
								const authToken = localStorage.getItem("auth_token");
								if (!authToken) {
									console.log("User not logged in.");
									return;
								}

								// Function to fetch and display all addresses
								function fetchAddresses() {
									fetch("<?php echo BASE_URL; ?>/address", {
										method: "GET",
										headers: {
											"Content-Type": "application/json",
											"Authorization": `Bearer ${authToken}`
										}
									})
									.then(response => response.json())
									.then(responseData => {
										console.log("Fetched Addresses:", responseData);

										allAddresses = responseData.data; // Store addresses globally

										const addresses = responseData.data;
										const addressContainer = document.getElementById("addressList"); 
										addressContainer.innerHTML = ""; 

										if (!Array.isArray(addresses) || addresses.length === 0) {
											addressContainer.innerHTML = `<p class="text-center">No Address Found</p>`;
											return;
										}

										addresses.forEach((address, index) => {
											const isChecked = address.is_default ? "checked" : ""; 
											const addressLine2 = address.address_line2 ? address.address_line2 : "N/A"; 

											addressContainer.innerHTML += `
												<label class="address-card" for="addressRadio${index}">
													<div class="card-header">
														<h3 class="card-title">${address.name}</h3>
														<p class="card-phone">${address.contact_no}</p>
													</div>
													<div class="card-body">
														<p><strong>Address 1:</strong> ${address.address_line1}</p>
														<p><strong>Address 2:</strong> ${addressLine2}</p>
														<p><strong>Location:</strong> ${address.city}, ${address.state}, ${address.country}</p>
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
															<button class="btn btn-primary btn-sm edit-add" onclick="openUpdateModal(${address.id})">
																<i class="fas fa-edit"></i>
															</button>

															<button class="btn btn-danger btn-sm del-add" onclick="deleteAddress(${address.id})">
																<i class="fas fa-trash"></i>
															</button>
																
														</div>
													</div>
												</label>
											`;
										});
									})
									.catch(error => {
										console.error("Error fetching addresses:", error);
									});
								}
								// Fetch addresses on page load
								fetchAddresses();

								window.openAddAddressForm = function () {
									Swal.fire({
										title: 'Add New Address',
										width: '700px', // Wider popup
										customClass: {
											confirmButton: 'add-address-btn',
											cancelButton: 'cancel-address-btn'
										},
										html: `			
											<form id="swal-address-form">
												<input type="text" id="swal_name" placeholder="Name*" required>
												<input type="text" id="swal_contact_no" placeholder="Contact No*" required>
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
											</form>
										`,
										showCancelButton: true,
										confirmButtonText: 'Add Address',
										cancelButtonText: 'Cancel',
										focusConfirm: false,
										preConfirm: () => {
											const name = document.getElementById('swal_name').value.trim();
											const contact_no = document.getElementById('swal_contact_no').value.trim();
											const address_line1 = document.getElementById('swal_address_line1').value.trim();
											const address_line2 = document.getElementById('swal_address_line2').value.trim();
											const city = document.getElementById('swal_city').value.trim();
											const state = document.getElementById('swal_state').value;
											const country = document.getElementById('swal_country').value;
											const postal_code = document.getElementById('swal_postal_code').value.trim();

											if (!name || !contact_no || !address_line1 || !city || !state || !country || !postal_code) {
												Swal.showValidationMessage('Please fill all required fields.');
												return false;
											}

											return {
												name,
												contact_no,
												address_line1,
												address_line2,
												city,
												state,
												country,
												postal_code
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
									if (!authToken) {
										Swal.fire("Error", "User not logged in.", "error");
										return;
									}

									const addressData = {
										...data,
										is_default: true
									};

									Swal.fire({
										title: "Saving...",
										text: "Please wait",
										allowOutsideClick: false,
										didOpen: () => Swal.showLoading()
									});

									fetch("<?php echo BASE_URL; ?>/address/register", {
										method: "POST",
										headers: {
											"Content-Type": "application/json",
											"Authorization": `Bearer ${authToken}`
										},
										body: JSON.stringify(addressData)
									})
									.then(response => response.json())
									.then(responseData => {
										Swal.close();
										if (responseData.message && responseData.message.includes("success")) {
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
									.catch(error => {
										console.error("Error:", error);
										Swal.close();
										Swal.fire("Error", "Something went wrong. Please try again.", "error");
									});
								}
							});
						</script>
						<!-- Delete Address Script -->
						<script>
							function deleteAddress(addressId) {
								Swal.fire({
									title: "Are you sure?",
									text: "You won't be able to revert this!",
									icon: "warning",
									showCancelButton: true,
									confirmButtonColor: "#d33",
									cancelButtonColor: "#3085d6",
									confirmButtonText: "Yes, delete it!"
								}).then((result) => {
									if (result.isConfirmed) {
										const authToken = localStorage.getItem("auth_token");
										if (!authToken) {
											console.log("User not logged in.");
											return;
										}

										fetch(`<?php echo BASE_URL; ?>/address/${addressId}`, {
											method: "DELETE",
											headers: {
												"Authorization": `Bearer ${authToken}`
											}
										})
										.then(response => response.json())
										.then(responseData => {
											console.log("Delete Response:", responseData);

											if (responseData.message && responseData.message.includes("deleted successfully")) {
												Swal.fire({
													title: "Deleted!",
													text: "Your address has been deleted.",
													icon: "success",
													timer: 2000,
													showConfirmButton: false
												}).then(() => {
													location.reload(); // Refresh the list AFTER alert closes
												});
											} else {
												Swal.fire({
													title: "Error!",
													text: responseData.message || "Failed to delete address.",
													icon: "error"
												});
											}
										})
										.catch(error => {
											console.error("Error deleting address:", error);
											Swal.fire({
												title: "Error!",
												text: "Something went wrong. Please try again.",
												icon: "error"
											});
										});
									}
								});
							}
						</script>

						<!-- Open Update Modal  -->
						<script>
							function openUpdateModal(addressId) {
								const address = allAddresses.find(addr => addr.id == addressId);
								console.log(address);
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
									confirmButtonText: 'Update Address',
									cancelButtonText: 'Cancel',
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
										submitUpdatedAddress(result.value);
									}
								});
							}

							function submitUpdatedAddress(data) {
								const authToken = localStorage.getItem("auth_token");
								if (!authToken) {
									Swal.fire("Error", "User not logged in.", "error");
									return;
								}

								const updatedData = {
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

								Swal.fire({
									title: "Updating...",
									text: "Please wait",
									allowOutsideClick: false,
									didOpen: () => Swal.showLoading()
								});

								fetch(`<?php echo BASE_URL; ?>/address/update/${data.id}`, {
									method: "POST",
									headers: {
										"Content-Type": "application/json",
										"Authorization": `Bearer ${authToken}`
									},
									body: JSON.stringify(updatedData)
								})
								.then(response => response.json())
								.then(responseData => {
									Swal.close();
									if (responseData.message && responseData.message.includes("updated successfully")) {
										Swal.fire({
											title: "Updated!",
											text: "Your address has been updated.",
											icon: "success",
											timer: 2000,
											showConfirmButton: false
										}).then(() => {
											location.reload();
										});
									} else {
										Swal.fire("Error!", responseData.message || "Failed to update address.", "error");
									}
								})
								.catch(error => {
									console.error("Error updating address:", error);
									Swal.close();
									Swal.fire("Error", "Something went wrong. Please try again.", "error");
								});
							}
						</script>
						<!-- Save update Modal -->

					</div>
				</div><!-- End .tab-pane -->

				<div class="tab-pane fade" id="edit" role="tabpanel">
					<h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
							class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
					<div class="account-content">
						<form id="profileForm">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="acc-name">First name <span class="required">*</span></label>
										<input type="text" class="form-control" placeholder="Editor"
											id="acc-name" name="acc-name" required />
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="acc-lastname">Last name <span
												class="required">*</span></label>
										<input type="text" class="form-control" id="acc-lastname"
											name="acc-lastname" />
									</div>
								</div>
							</div>

							<div class="form-group mb-2">
								<label for="acc-text">Display name <span class="required">*</span></label>
								<input type="text" class="form-control" id="acc-mobile" name="acc-mobile" readonly
									placeholder="Editor" required />
								<p>Mobile Number can not be changed</p>
							</div>


							<div class="form-group mb-4">
								<label for="acc-email">Email address <span class="required">*</span></label>
								<input type="email" class="form-control" id="acc-email" name="acc-email"
									placeholder="editor@gmail.com" required />
							</div>

							<div class="change-password">
								<h3 class="text-uppercase mb-2">Password Change</h3>

								<div class="form-group">
									<label for="acc-password">Current Password (leave blank to leave
										unchanged)</label>
									<input type="password" class="form-control" id="acc-password"
										name="acc-password" />
								</div>

								<div class="form-group">
									<label for="acc-password">New Password (leave blank to leave
										unchanged)</label>
									<input type="password" class="form-control" id="acc-new-password"
										name="acc-new-password" />
								</div>

								<div class="form-group">
									<label for="acc-password">Confirm New Password</label>
									<input type="password" class="form-control" id="acc-confirm-password"
										name="acc-confirm-password" />
								</div>
							</div>

							<div class="form-footer mt-3 mb-0">
								<button type="button" class="btn btn-dark mr-0" id="saveProfileBtn">
									Save changes
								</button>
							</div>
						</form>
					</div>
				</div><!-- End .tab-pane -->
			</div><!-- End .tab-content -->
		</div><!-- End .row -->
	</div><!-- End .container -->

	<div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->


<script>
	document.addEventListener("DOMContentLoaded", function () {
		const authToken = localStorage.getItem("auth_token");
		if (!authToken) {
			console.log("User not logged in.");
			return;
		}

		// Fetch user profile details
		fetch("<?php echo BASE_URL; ?>/users/profile", {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"Authorization": `Bearer ${authToken}`
			}
		})
		.then(response => response.json())
		.then(responseData => {
			console.log("Profile Data:", responseData);

			if (!responseData.data) {
				Swal.fire({
					title: "Error!",
					text: "Failed to fetch profile details.",
					icon: "error"
				});
				return;
			}

			const user = responseData.data;

			// Populate form fields
			document.getElementById("acc-name").value = user.name || "";
			document.getElementById("acc-email").value = user.email || "";
			document.getElementById("acc-mobile").value = user.mobile || ""; // Display name same as name
		})
		.catch(error => {
			console.error("Error fetching profile:", error);
			Swal.fire({
				title: "Error!",
				text: "Something went wrong while fetching profile.",
				icon: "error"
			});
		});
	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		const authToken = localStorage.getItem("auth_token");

		if (!authToken) {
			console.log("User not logged in.");
			return;
		}

		// Fetch user profile and fill the form
		fetch("<?php echo BASE_URL; ?>/users/profile", {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"Authorization": `Bearer ${authToken}`
			}
		})
		.then(response => response.json())
		.then(responseData => {
			console.log("Fetched Profile Data:", responseData);

			if (!responseData.data) {
				Swal.fire({
					title: "Error!",
					text: "Failed to fetch profile data.",
					icon: "error"
				});
				return;
			}

			const user = responseData.data;

			// Fill input fields with user data
			document.getElementById("acc-name").value = user.name || "";
			document.getElementById("acc-email").value = user.email || "";
		})
		.catch(error => {
			console.error("Error fetching profile:", error);
			Swal.fire({
				title: "Error!",
				text: "Something went wrong while fetching your profile.",
				icon: "error"
			});
		});

		// Attach event listener to the Save Changes button
		document.getElementById("saveProfileBtn").addEventListener("click", function () {
			const name = document.getElementById("acc-name").value.trim();
			const email = document.getElementById("acc-email").value.trim();

			if (!name || !email) {
				Swal.fire({
					title: "Missing Fields!",
					text: "Name and Email cannot be empty.",
					icon: "warning"
				});
				return;
			}

			const updatedData = { name, email };

			console.log("Updating Profile Data:", updatedData);

			fetch("<?php echo BASE_URL; ?>/users/update", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"Authorization": `Bearer ${authToken}`
				},
				body: JSON.stringify(updatedData)
			})
			.then(response => response.json())
			.then(responseData => {
				console.log("Profile Update Response:", responseData);

				if (responseData.message && responseData.message.includes("success")) {
					Swal.fire({
						title: "Updated!",
						text: "Your profile has been updated successfully.",
						icon: "success",
						timer: 2000,
						showConfirmButton: false
					}).then(() => {
						location.reload(); // Reload the page after update
					});
				} else {
					Swal.fire({
						title: "Error!",
						text: responseData.message || "Failed to update profile.",
						icon: "error"
					});
				}
			})
			.catch(error => {
				console.error("Error updating profile:", error);
				Swal.fire({
					title: "Error!",
					text: "Something went wrong. Please try again.",
					icon: "error"
				});
			});
		});
	});
</script>



<script>
	document.addEventListener("DOMContentLoaded", function() {
		const authToken = localStorage.getItem("auth_token");
		const userName = localStorage.getItem("user_name");
		const userEmail = localStorage.getItem("user_email"); // Store email if available

		if (!authToken) {
			// Redirect to login page if not logged in
			window.location.href = "login.php";
		} else {
			// Update Profile Details
			document.getElementById("user-name").textContent = userName ? userName : "Not Showing !";
			document.getElementById("user-name-again").textContent = userName ? userName : "Not Showing !";
			document.getElementById("profile-user-name").textContent = userName ? userName : "Not Showing !";
			document.getElementById("profile-user-email").textContent = userEmail ? userEmail : "Not Available";
		}

		// Logout functionality
		document.getElementById("logout-btn").addEventListener("click", function() {
			logoutUser();
		});

		document.getElementById("logout-btn-alt").addEventListener("click", function() {
			logoutUser();
		});

		function logoutUser() {
			localStorage.removeItem("auth_token");
			localStorage.removeItem("user_name");
			localStorage.removeItem("user_email");
			localStorage.removeItem("user_role");
			localStorage.removeItem("user_id");
			window.location.href = "login.php"; // Redirect to login page after logout
		}

		
	});
</script>
<?php include("footer.php"); ?>
