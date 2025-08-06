<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>
<?php 
    $current_page = "Add Discount"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .cardx{
        width:100%;
    }
</style>
            <!-- End of Header -->
            <!-- Content -->
            <main class="grow content pt-5" id="content" role="content">
                <!-- Container -->
                <div class="container-fixed" id="content_container">
                </div>
                <!-- End of Container -->
                
                <!-- Container -->
                <div class="container-fixed">
                    <div class="grid gap-5 grid-cols-1 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
                        <div class="card pb-2.5">
                            <div class="card-header" id="basic_settings">
                                <h3 class="card-title">
                                    Add Discount
                                </h3>
                            </div>
                            <div class="card-body grid gap-5">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                                    <!-- User Name -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">User Name</label>
                                        <select class="select" id="chooseUser">
                                            <option value="">Loading users...</option>
                                        </select>
                                    </div>

                                    <!-- Product Variant ID -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Select Product</label>
                                        <select class="select" id="chooseProduct">
                                            <option value="">Loading products...</option>
                                        </select>
                                    </div>

                                    <!-- Discount Value -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount %</label>
                                        <input class="input" type="text" id="discount" placeholder="Discount Value">
                                    </div>

                                    <!-- Category Select -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Select Category</label>
                                        <select class="select" id="chooseCategory">
                                            <option value="">Loading categories...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-5">
                                    <button class="btn btn-primary" id="saveDiscount">Save Discount</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Container -->
            </main>
            <!-- End of Content -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const productSelect = document.querySelector("#chooseProduct");
        const userSelect = document.querySelector("#chooseUser");
        const categorySelect = document.querySelector("#chooseCategory");
        const discountInput = document.querySelector("#discount");
        const saveButton = document.querySelector("#saveDiscount");

        const token = localStorage.getItem('auth_token');
        
        /** FETCH PRODUCTS **/ 
        function fetchProducts() {
            fetch("<?php echo BASE_URL; ?>/products/get_products", {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ limit: 200 })  // Send limit as 200
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.success) {
                    productSelect.innerHTML = "";  // Clear existing options

                    // Default option
                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Select Product";
                    productSelect.appendChild(defaultOption);

                    // Populate dropdown with product variants
                    data.data.forEach(product => {
                        product.variants.forEach(variant => {
                            const option = document.createElement("option");
                            option.value = variant.id;  // Use variant ID
                            option.textContent = `${product.name} - ${variant.variant_value}`;  // Show product name and variant value
                            productSelect.appendChild(option);
                        });
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching products:", error);
            });
        }

        /** FETCH USERS **/ 
        function fetchUsers() {
            fetch("<?php echo BASE_URL; ?>/all_users", {  // Use your actual API endpoint
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.success) {
                    userSelect.innerHTML = "";  // Clear existing options

                    // Default option
                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Select User";
                    userSelect.appendChild(defaultOption);

                    // Populate dropdown with users
                    data.data.forEach(user => {
                        const option = document.createElement("option");
                        option.value = user.id;  // Use user ID
                        option.textContent = user.name;  // Show user name
                        userSelect.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching users:", error);
            });
        }

        /** FETCH CATEGORIES **/ 
        function fetchCategories() {
            fetch("<?php echo BASE_URL; ?>/categories/fetch", {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.data) {
                    categorySelect.innerHTML = "";  // Clear existing options

                    // Default option
                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Select Category";
                    categorySelect.appendChild(defaultOption);

                    // Populate dropdown with categories
                    data.data.forEach(category => {
                        const option = document.createElement("option");
                        option.value = category.parent_id;  // Use category parent_id as the value
                        option.textContent = category.name;
                        categorySelect.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching categories:", error);
            });
        }

        /** SUBMIT DISCOUNT **/ 
        function submitDiscount() {
            // Parse the discount value as a decimal (float)
            const discountValue = parseFloat(discountInput.value.trim());

            if (isNaN(discountValue)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Discount',
                    text: 'Please enter a valid discount value.'
                });
                return; // Prevent submission if the discount value is invalid
            }
            
            const formData = {
                user_id: userSelect.value,
                product_variant_id: productSelect.value,
                discount: discountValue,
                category_id: categorySelect.value
            };

            console.log("Submitting Discount:", formData); // Debugging

            fetch(`<?php echo BASE_URL; ?>/discount/add`, {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Success Response:", data);
                if (data.message) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        clearFields();      // Clear input fields after submission
                    });
                }
            })
            .catch(error => {
                console.error("Error submitting discount:", error);
                // Show error SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error submitting discount: ' + error.message
                });
            });
        }

        function clearFields() {
            userSelect.value = "";
            productSelect.value = "";
            discountInput.value = "";
            categorySelect.value = ""; // Reset dropdown
        }

        // Event listener for save button
        saveButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default behavior
            submitDiscount();
        });

        // Fetch products, users, and categories on page load
        fetchProducts();
        fetchUsers();
        fetchCategories();
    });
</script>

<style>
    .text-edit{
        width: 100%;
        min-height: 120px;
        border: 1px solid rgba(128, 128, 128, 0.34);
        border-radius: 10px;
        background: #fcfcfc;
        padding: 2px 10px;
        text-align: justify;
    }
</style>

            <!-- Footer -->
<?php include("footer1.php"); ?>
