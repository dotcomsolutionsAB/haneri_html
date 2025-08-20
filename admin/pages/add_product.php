<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>
<?php 
    $current_page = "Add Product"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>

<!-- End of Header -->
<!-- Content -->
<main class="grow content pt-5" id="content" role="content">
    <!-- Container -->
    <div class="container-fixed" id="content_container"></div>
    <!-- End of Container -->

    <!-- Container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-gray-900">
                    Add - Product
                </h1>
            </div>
            <div class="flex items-center gap-2.5">
                <a class="btn btn-sm btn-light" href="pages/show_products.php">
                    Products
                </a>
            </div>
        </div>
    </div>
    <!-- End of Container -->

    <!-- Container -->
    <div class="container-fixed">
        <div class="grid gap-5 grid-cols-2 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
            <div class="col-span-1">
                <div class="card pb-2.5">
                    <div class="card-header" id="basic_settings">
                        <h3 class="card-title">
                            General Settings
                        </h3>
                    </div>
                    <div class="card-body grid gap-5">
                        <!-- Form fields -->
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Product Name</label>
                            <input class="input" type="text" id="product_name" placeholder="Haneri AirElite AEW1">
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Brands</label>
                            <select class="select" id="brand">
                                <option value="">Select</option>
                                <option value="1">Haneri</option>
                            </select>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Category</label>
                            <select class="select" id="category">
                                <option value="">Select</option>
                                <option value="1">CEILING FAN</option>
                                <option value="2">TABLE WALL PEDESTALS</option>
                                <option value="3">DOMESTIC EXHAUSTS</option>
                                <option value="4">PERSONAL</option>
                            </select>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Slug</label>
                            <input class="input" type="text" id="slug" placeholder="product-name-slug">
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Is Publish</label>
                            <select class="select" id="is_active">
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                            </select>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Description</label>
                            <textarea class="note-codable text-edit" id="description" aria-multiline="true"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-3 grid-cols-span-1">
                <div class="card p-2.5">
                    <div class="card-header" id="features">
                        <h3 class="card-title">Features</h3>
                    </div>
                    <div class="p-2 flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="form-label max-w-56">Feature 1</label>
                        <textarea class="note-codable text-edit-features" id="feature_1" aria-multiline="true"></textarea>
                    </div>
                    <div class="p-2 flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="form-label max-w-56">Feature 2</label>
                        <textarea class="note-codable text-edit-features" id="feature_2" aria-multiline="true"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-5 grid-cols-2 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
            <div class="col-span-2">
                <div class="card pb-2.5">
                    <div class="card-header" id="variants">
                        <h3 class="card-title">Variants</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="variants_table">
                            <thead>
                                <tr>
                                    <th>Variant No</th>
                                    <th>Variant Type</th>
                                    <th>Variant Value</th>
                                    <th>Variant Price (₹)</th>
                                    <th>Customer Discount (%)</th>
                                    <th>Dealer Discount (%)</th>
                                    <th>Architect Discount (%)</th>
                                    <th>Description</th>
                                    <th>Regular Tax (%)</th>
                                </tr>
                            </thead>
                            <tbody id="variants_body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body flex flex-col lg:py-6 lg:gap-7.5 gap-7">
            <div class="flex justify-end gap-2.5">
                <!-- <button class="btn btn-light">Deactivate Instead</button> -->
                <button class="btn btn-danger" id="update_product">Update Product</button>
            </div>
        </div>
    </div>
</main>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');
    const authTokenUpdate = localStorage.getItem('auth_token');

    // Fetch product details using POST method
    fetch('<?php echo BASE_URL; ?>/products/get_admin/' + productId, {
        method: 'POST',  
        headers: {
            'Authorization': 'Bearer ' + authTokenUpdate,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const product = data.data;

            // Pre-fill the form fields using IDs
            document.getElementById('product_name').value = product.name;
            document.getElementById('description').value = product.description || "";
            document.getElementById('slug').value = product.slug;
            
            // Set the correct `brand` value based on the response
            const brandSelect = document.getElementById('brand');
            const categorySelect = document.getElementById('category');

            // Match the brand and set the correct `option` value
            const brandOptions = brandSelect.getElementsByTagName('option');
            for (let option of brandOptions) {
                if (option.text === product.brand) {
                    option.selected = true; // Set the correct brand option
                    break;
                }
            }

            // Match the category and set the correct `option` value
            const categoryOptions = categorySelect.getElementsByTagName('option');
            for (let option of categoryOptions) {
                if (option.text === product.category) {
                    option.selected = true; // Set the correct category option
                    break;
                }
            }

            // Pre-fill Features using IDs
            document.getElementById('feature_1').value = product.features[0]?.feature_value || "";
            document.getElementById('feature_2').value = product.features[1]?.feature_value || "";

            // Pre-fill Variants using IDs
            const variantsBody = document.getElementById('variants_body');
            product.variants.forEach((variant, index) => {
                const row = variantsBody.insertRow();
                row.innerHTML = `
                    <td><input class="input" type="text" value="${variant.id}" id="variant_${index}_id" disabled /></td>
                    <td><input class="input" type="text" value="${variant.variant_type || ''}" id="variant_${index}_type" /></td>
                    <td><input class="input" type="text" value="${variant.variant_value || ''}" id="variant_${index}_value" /></td>
                    <td><input class="input" type="number" value="${variant.regular_price || ''}" id="variant_${index}_price" /></td>
                    <td><input class="input" type="number" value="${variant.customer_discount || ''}" id="variant_${index}_customer_discount" /></td>
                    <td><input class="input" type="number" value="${variant.dealer_discount || ''}" id="variant_${index}_dealer_discount" /></td>
                    <td><input class="input" type="number" value="${variant.architect_discount || ''}" id="variant_${index}_architect_discount" /></td>
                    <td><input class="input" type="text" value="${variant.description || ''}" id="variant_${index}_description" /></td>
                    <td><input class="input" type="number" value="${variant.regular_tax || ''}" id="variant_${index}_tax" /></td>
                `;
            });
        } else {
            console.error('Error fetching product details:', data.message);
        }
    })
    .catch(error => console.error('Error fetching product:', error));

    // Update Product Button
    document.getElementById('update_product').addEventListener('click', function() {
        const updatedProduct = {
            name: document.getElementById('product_name').value,
            brand_id: document.getElementById('brand').value,
            category_id: document.getElementById('category').value,
            slug: document.getElementById('slug').value,
            description: document.getElementById('description').value,
            is_active: document.getElementById('is_active').value === 'true' ? 1 : 0,
            variants: Array.from(document.querySelectorAll('#variants_body tr')).map((row, index) => {
                const variantId = document.getElementById(`variant_${index}_id`).value;
                const variantType = document.getElementById(`variant_${index}_type`);
                const variantValue = document.getElementById(`variant_${index}_value`);
                const regularPrice = document.getElementById(`variant_${index}_price`);
                const customerDiscount = document.getElementById(`variant_${index}_customer_discount`);
                const dealerDiscount = document.getElementById(`variant_${index}_dealer_discount`);
                const architectDiscount = document.getElementById(`variant_${index}_architect_discount`);
                const description = document.getElementById(`variant_${index}_description`);
                const regularTax = document.getElementById(`variant_${index}_tax`);

                // Handle invalid numbers (NaN)
                const getValidNumber = (value) => {
                    const parsedValue = parseFloat(value.trim());
                    return isNaN(parsedValue) ? null : parsedValue;
                };

                return {
                    id: variantId,
                    variant_type: variantType ? variantType.value.trim() : null,
                    variant_value: variantValue ? variantValue.value.trim() : null,
                    regular_price: regularPrice ? getValidNumber(regularPrice.value) : null,
                    customer_discount: customerDiscount ? getValidNumber(customerDiscount.value) : null,
                    dealer_discount: dealerDiscount ? getValidNumber(dealerDiscount.value) : null,
                    architect_discount: architectDiscount ? getValidNumber(architectDiscount.value) : null,
                    description: description ? description.value.trim() : null,
                    regular_tax: regularTax ? getValidNumber(regularTax.value) : null,
                };
            }).filter(Boolean) // Filter out any invalid rows or null values
        };

        console.log('Updated Product Payload:', updatedProduct);

        // Send PUT request to update the product
        fetch('<?php echo BASE_URL; ?>/products/' + productId, {
            method: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + authTokenUpdate,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(updatedProduct)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message && data.message === "Product updated successfully!") {
                // Show SweetAlert success message and refresh page
                Swal.fire({
                    title: 'Success!',
                    text: 'Product updated successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();  // Refresh the page after successful update
                });
            } else {
                alert('Error updating product!');
            }
        })
        .catch(error => console.error('Error updating product:', error));
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
    .text-edit-features{
        width: 100%;
        min-height: 80px;
        border: 1px solid rgba(128, 128, 128, 0.34);
        border-radius: 10px;
        background: #fcfcfc;
        padding: 2px 10px;
        text-align: justify;
    }
</style>

<?php include("footer1.php"); ?>
