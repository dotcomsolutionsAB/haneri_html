<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php 
    $current_page = "Edit Product";
?>
<?php include("header1.php"); ?>

<main class="grow content pt-5" id="content" role="content">
    <!-- Container -->
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Edit Product</h1>
            <a href="pages/show_products.php" class="btn btn-sm btn-light">Back to Products</a>
        </div>

        <!-- Product Form -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- General Settings Card -->
            <div class="card p-5 shadow-sm">
                <h3 class="text-xl font-medium text-gray-700 mb-4">General Settings</h3>
                
                <!-- Product Name -->
                <div class="mb-4">
                    <label class="form-label">Product Name</label>
                    <input class="input" type="text" placeholder="Product Name">
                </div>

                <!-- Brands -->
                <div class="mb-4">
                    <label class="form-label">Brands</label>
                    <select class="select">
                        <option>Brand 1</option>
                        <option>Brand 2</option>
                        <option>Brand 3</option>
                    </select>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label class="form-label">Category</label>
                    <select class="select">
                        <option>Category 1</option>
                        <option>Category 2</option>
                        <option>Category 3</option>
                    </select>
                </div>

                <!-- HSN Code -->
                <div class="mb-4">
                    <label class="form-label">HSN</label>
                    <input class="input" type="text" placeholder="ABCD12">
                </div>

                <!-- Tax -->
                <div class="mb-4">
                    <label class="form-label">Tax</label>
                    <input class="input" type="text" placeholder="Tax Amount">
                </div>

                <!-- Minimum Purchase Qty -->
                <div class="mb-4">
                    <label class="form-label">Minimum Purchase Qty</label>
                    <input class="input" type="number" placeholder="5">
                </div>

                <!-- Weight -->
                <div class="mb-4">
                    <label class="form-label">Weight (kg)</label>
                    <input class="input" type="text" placeholder="1.5 kg">
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label class="form-label">Slug</label>
                    <input class="input" type="text" placeholder="product-name-slug">
                </div>

                <!-- Publish Status -->
                <div class="mb-4">
                    <label class="form-label">Is Published</label>
                    <select class="select">
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="form-label">Description</label>
                    <textarea class="input w-full" placeholder="Product Description"></textarea>
                </div>

                <!-- Photo Upload -->
                <div class="mb-4">
                    <label class="form-label">Product Image</label>
                    <div class="image-input">
                        <input type="file" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
            </div>

            <!-- Features and Variants -->
            <div class="card p-5 shadow-sm">
                <h3 class="text-xl font-medium text-gray-700 mb-4">Features & Variants</h3>
                
                <!-- Features -->
                <div class="mb-4">
                    <label class="form-label">Feature 1</label>
                    <textarea class="input w-full" placeholder="Feature 1 Description"></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label">Feature 2</label>
                    <textarea class="input w-full" placeholder="Feature 2 Description"></textarea>
                </div>
                
                <div class="flex justify-end">
                    <button class="btn btn-light">Add Feature</button>
                </div>

                <!-- Variant 1 -->
                <div class="mb-4">
                    <h4 class="text-lg font-semibold">Variant 1</h4>
                    <div class="mb-4">
                        <label class="form-label">Variant Type</label>
                        <select class="select">
                            <option value="size">Size</option>
                            <option value="color">Color</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Variant Value</label>
                        <input class="input" type="text" placeholder="Size / Color">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Variant Price (₹)</label>
                        <input class="input" type="text" placeholder="Price">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Discount (%)</label>
                        <input class="input" type="text" placeholder="Discount">
                    </div>
                </div>

                <!-- Variant 2 -->
                <div class="mb-4">
                    <h4 class="text-lg font-semibold">Variant 2</h4>
                    <div class="mb-4">
                        <label class="form-label">Variant Type</label>
                        <select class="select">
                            <option value="size">Size</option>
                            <option value="color">Color</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Variant Value</label>
                        <input class="input" type="text" placeholder="Size / Color">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Variant Price (₹)</label>
                        <input class="input" type="text" placeholder="Price">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Discount (%)</label>
                        <input class="input" type="text" placeholder="Discount">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary">Add Variant</button>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-4 mt-6">
            <button class="btn btn-light">Deactivate</button>
            <button class="btn btn-danger">Update Product</button>
        </div>
    </div>
</main>

<?php include("footer1.php"); ?>

<style>
    .input, .select, .textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 16px;
        font-size: 1rem;
    }

    .textarea {
        height: 120px;
        resize: vertical;
    }

    .image-input input[type="file"] {
        padding: 0;
        font-size: 1rem;
    }

    .btn {
        padding: 8px 16px;
        font-size: 1rem;
        border-radius: 6px;
        cursor: pointer;
    }

    .btn-light {
        background-color: #f0f0f0;
        border: 1px solid #ddd;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }
</style>
