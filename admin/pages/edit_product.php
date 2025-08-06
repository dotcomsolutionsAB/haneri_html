<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>
<?php 
    $current_page = "Edit Product"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>

<!-- End of Header -->
<!-- Content -->
<main class="grow content pt-5" id="content" role="content">
    <!-- Container -->
    <div class="container-fixed" id="content_container">
    </div>
    <!-- End of Container -->

    <!-- Container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-gray-900">
                    Edit - Product
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
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">
                                Product Name
                            </label>
                            <input class="input" type="text" name="product_name" placeholder="Haneri AirElite AEW1">
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Brands</label>
                            <select class="select" name="brand">
                                <option value="">Select</option>
                                <option value="Haneri">Haneri</option>
                            </select>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Category</label>
                            <select class="select" name="category">
                                <option value="">Select</option>
                                <option value="1">CEILING FAN</option>
                                <option value="2">TABLE WALL PEDESTALS</option>
                                <option value="3">DOMESTIC EXHAUSTS</option>
                                <option value="4">PERSONAL</option>
                            </select>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Slug</label>
                            <input class="input" type="text" name="slug" placeholder="product-name-slug">
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Is Publish</label>
                            <select class="select" name="is_active">
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                            </select>
                        </div>
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-56">Description</label>
                            <textarea class="note-codable text-edit" name="description" aria-multiline="true"></textarea>
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
                        <textarea class="note-codable text-edit-features" name="features[0]" aria-multiline="true"></textarea>
                    </div>
                    <div class="p-2 flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="form-label max-w-56">Feature 2</label>
                        <textarea class="note-codable text-edit-features" name="features[1]" aria-multiline="true"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="btn btn-light">Add Features</button>
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
                        <table class="table table-bordered" id="variants">
                            <thead>
                                <tr>
                                    <th>Variant No</th>
                                    <th>Variant Value</th>
                                    <th>Variant Price (₹)</th>
                                    <th>Customer Discount (%)</th>
                                    <th>Dealer Discount (%)</th>
                                    <th>Architect Discount (%)</th>
                                    <th>Description</th>
                                    <th>Regular Tax (%)</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <div class="flex justify-end">
                                <button class="btn btn-primary">Add Variant</button>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body flex flex-col lg:py-6 lg:gap-7.5 gap-7">
            <div class="flex justify-end gap-2.5">
                <button class="btn btn-light">Deactivate Instead</button>
                <button class="btn btn-danger">Update Product</button>
            </div>
        </div>
    </div>
</main>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');
    const authTokenUpdate = localStorage.getItem('auth_token');

    // Fetch product details using POST method
    fetch('<?php echo BASE_URL; ?>/products/get_products/' + productId, {
        method: 'POST',  // POST method as per your requirement
        headers: {
            'Authorization': 'Bearer ' + authTokenUpdate,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const product = data.data;

            // Pre-fill the form fields
            document.querySelector('input[name="product_name"]').value = product.name;
            document.querySelector('select[name="brand"]').value = product.brand;
            document.querySelector('select[name="category"]').value = product.category;
            document.querySelector('input[name="slug"]').value = product.slug;
            document.querySelector('textarea[name="description"]').value = product.description || "";

            // Pre-fill Features
            product.features.forEach((feature, index) => {
                let featureField = document.querySelector(`textarea[name="features[${index}]"]`);
                if (featureField) {
                    featureField.value = feature.feature_value;
                }
            });

            // Pre-fill Variants
            const variantsTable = document.querySelector('#variants tbody');
            if (variantsTable) {
                product.variants.forEach((variant, index) => {
                    const row = variantsTable.insertRow();
                    row.innerHTML = `
                        <td><input class="input" type="text" value="${variant.id}" disabled /></td>
                        <td><input class="input" type="text" value="${variant.variant_value || ''}" /></td>
                        <td><input class="input" type="number" value="${variant.regular_price || ''}" /></td>
                        <td><input class="input" type="number" value="${variant.customer_discount || ''}" /></td>
                        <td><input class="input" type="number" value="${variant.dealer_discount || ''}" /></td>
                        <td><input class="input" type="number" value="${variant.architect_discount || ''}" /></td>
                        <td><input class="input" type="text" value="${variant.description || ''}" /></td>
                        <td><input class="input" type="number" value="${variant.regular_tax || ''}" /></td>
                    `;
                });
            }
        } else {
            console.error('Error fetching product details:', data.message);
        }
    })
    .catch(error => console.error('Error fetching product:', error));

    // Update Product Button
    document.querySelector('.btn-danger').addEventListener('click', function() {
        const updatedProduct = {
            name: document.querySelector('input[name="product_name"]').value,
            brand_id: document.querySelector('select[name="brand"]').value,
            category_id: document.querySelector('select[name="category"]').value,
            slug: document.querySelector('input[name="slug"]').value,
            description: document.querySelector('textarea[name="description"]').value,
            is_active: document.querySelector('select[name="is_active"]').value === 'true' ? 1 : 0,
            features: Array.from(document.querySelectorAll('.text-edit-features')).map((textarea, index) => ({
                feature_name: `Feature ${index + 1}`,
                feature_value: textarea.value,
                is_filterable: true
            })),
            variants: Array.from(document.querySelectorAll('#variants tbody tr')).map((row) => {
                const variantId = row.querySelector('input[type="text"]:nth-child(1)').value; // Get variant id
                const variantValue = row.querySelector('input[type="text"]:nth-child(2)');
                const regularPrice = row.querySelector('input[type="number"]:nth-child(3)');
                const customerDiscount = row.querySelector('input[type="number"]:nth-child(4)');
                const dealerDiscount = row.querySelector('input[type="number"]:nth-child(5)');
                const architectDiscount = row.querySelector('input[type="number"]:nth-child(6)');
                const description = row.querySelector('input[type="text"]:nth-child(7)');
                const regularTax = row.querySelector('input[type="number"]:nth-child(8)');

                return {
                    id: variantId, // Ensure variant id is passed
                    variant_value: variantValue ? variantValue.value.trim() : null,
                    regular_price: regularPrice ? parseFloat(regularPrice.value.trim()) : null,
                    customer_discount: customerDiscount ? parseFloat(customerDiscount.value.trim()) : null,
                    dealer_discount: dealerDiscount ? parseFloat(dealerDiscount.value.trim()) : null,
                    architect_discount: architectDiscount ? parseFloat(architectDiscount.value.trim()) : null,
                    description: description ? description.value.trim() : null,
                    regular_tax: regularTax ? parseFloat(regularTax.value.trim()) : null,
                };
            }).filter(Boolean) // Filter out any invalid rows or null values
        };

        // Log the final payload to inspect the structure
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
            if (data.success) {
                alert('Product updated successfully!');
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
