<base href="../">
<?php include("../../configs/auth_check.php"); ?>
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
                                        <input class="input" type="text" placeholder="Haneri AirElite AEW1">
                                    </div>                                    
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Brands</label>
                                        <select class="select">
                                            <option>Brand 1</option>
                                            <option>Brand 2</option>
                                            <option>Brand 3</option>
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Category</label>
                                        <select class="select">
                                            <option>Category 1</option>
                                            <option>Category 2</option>
                                            <option>Category 3</option>
                                        </select>
                                    </div>                      
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Slug</label>
                                        <input class="input" type="text" placeholder="product-name-slug">
                                    </div>                                    
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Is Publish</label>
                                        <select class="select">
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid gap-3 grid-cols-span-1">
                            <div class="card p-2.5">
                                <div class="card-header" id="features">
                                    <h3 class="card-title">Fetaures</h3>                                    
                                </div>
                                <div class="p-2 flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="form-label max-w-56">Features 1</label>
                                    <textarea class="note-codable text-edit-features" aria-multiline="true"></textarea>
                                </div>
                                <br>
                                <div class="p-2 flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="form-label max-w-56">Features 2</label>
                                    <textarea class="note-codable text-edit-features" aria-multiline="true"></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button class="btn btn-light">
                                        Add Fetaures
                                    </button>
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
                                    <table class="table table-bordered">
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
                                        <tbody>
                                            <!-- Variant 1 -->
                                            <tr>
                                                <td><input class="input" type="text" value="Variant 1" /></td>
                                                <td><input class="input" type="text" value="Large" /></td>
                                                <td><input class="input" type="text" value="7299.00" /></td>
                                                <td><input class="input" type="text" value="13%" /></td>
                                                <td><input class="input" type="text" value="15%" /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                                <td><input class="input" type="text" value="Variant for size Medium." /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                            </tr>
                                            <!-- Variant 2 -->
                                            <tr>
                                                <td><input class="input" type="text" value="Variant 1" /></td>
                                                <td><input class="input" type="text" value="Large" /></td>
                                                <td><input class="input" type="text" value="7299.00" /></td>
                                                <td><input class="input" type="text" value="13%" /></td>
                                                <td><input class="input" type="text" value="15%" /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                                <td><input class="input" type="text" value="Variant for size Medium." /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                            </tr>
                                        </tbody>
                                        <div class="flex justify-end">
                                            <button class="btn btn-primary">
                                                Add Variant
                                            </button>
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
                            <button class="btn btn-light">
                                Deactivate Instead
                            </button>
                            <button class="btn btn-danger">
                                Update Product
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End of Container -->
    
            </main>
            <!-- End of Content -->
<script>
    // Get the Product ID from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');

    // Get auth token from local storage
    const authToken = localStorage.getItem('auth_token');

    // Fetch product details
    fetch('<?php echo BASE_URL; ?>/products/get_products/' + productId, {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + authToken,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const product = data.data;
            
            // Pre-fill the form fields with the product details
            document.querySelector('input[name="product_name"]').value = product.name;
            document.querySelector('select[name="brand"]').value = product.brand;
            document.querySelector('select[name="category"]').value = product.category;
            document.querySelector('input[name="slug"]').value = product.slug;
            document.querySelector('textarea[name="description"]').value = product.description;

            // Pre-fill Features
            product.features.forEach((feature, index) => {
                document.querySelector(`textarea[name="features[${index}]"]`).value = feature.feature_value;
            });

            // Pre-fill Variants
            const variantsTable = document.querySelector('#variants tbody');
            product.variants.forEach((variant, index) => {
                const row = variantsTable.insertRow();
                row.innerHTML = `
                    <td><input class="input" type="text" value="Variant ${index + 1}" /></td>
                    <td><input class="input" type="text" value="${variant.variant_value}" /></td>
                    <td><input class="input" type="text" value="${variant.regular_price}" /></td>
                    <td><input class="input" type="text" value="${variant.customer_discount}" /></td>
                    <td><input class="input" type="text" value="${variant.dealer_discount}" /></td>
                    <td><input class="input" type="text" value="${variant.architect_discount}" /></td>
                    <td><input class="input" type="text" value="${variant.description}" /></td>
                    <td><input class="input" type="text" value="${variant.regular_tax}" /></td>
                `;
            });
        }
    })
    .catch(error => console.error('Error fetching product:', error));


    // Update Product Button Click Event
    document.querySelector('.btn-danger').addEventListener('click', function() {
        // Gather the updated product data from the form
        const updatedProduct = {
            name: document.querySelector('input[name="product_name"]').value,
            brand_id: document.querySelector('select[name="brand"]').value,
            category_id: document.querySelector('select[name="category"]').value,
            slug: document.querySelector('input[name="slug"]').value,
            description: document.querySelector('textarea[name="description"]').value,
            is_active: document.querySelector('select[name="is_active"]').value === 'true' ? true : false,
            features: Array.from(document.querySelectorAll('.text-edit-features')).map((textarea, index) => ({
                feature_name: `Feature ${index + 1}`,
                feature_value: textarea.value,
                is_filterable: true // Assuming filterable by default
            })),
            variants: Array.from(document.querySelectorAll('#variants tbody tr')).map((row, index) => ({
                photo_id: index + 1, // Just an example; you might need a real photo ID
                min_qty: row.querySelector('input[type="text"]').value,
                is_cod: true, // Assuming COD available by default
                weight: row.querySelector('input[type="text"]').value,
                description: row.querySelector('input[type="text"]').value,
                variant_type: 'Size', // Assuming 'Size' as an example
                variant_value: row.querySelector('input[type="text"]').value,
                discount_price: 0, // Assuming 0 as an example
                regular_price: row.querySelector('input[type="text"]').value,
                selling_price: row.querySelector('input[type="text"]').value,
                customer_discount: 0, // Example
                dealer_discount: 0, // Example
                architect_discount: 0, // Example
                hsn: 'HSN1234', // Example
                regular_tax: 18, // Example
                video_url: 'https://example.com/video.mp4', // Example
                product_pdf: 'https://example.com/pdf.pdf' // Example
            }))
        };

        // Send PUT request to update product
        fetch('<?php echo BASE_URL; ?>/products/' + productId, {
            method: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + authToken,
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
            <!-- Footer -->
<?php include("footer1.php"); ?>

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