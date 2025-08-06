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
        <div class="card p-5 shadow-sm">
            <h3 class="text-xl font-medium text-gray-700 mb-4">Product Details</h3>
            <form>
                <!-- Table for Product Fields -->
                <table class="table-auto w-full">
                    <tbody>
                        <!-- Product Name -->
                        <tr>
                            <td><label class="form-label">Product Name</label></td>
                            <td><input class="input" type="text" placeholder="Enter product name" value=""></td>
                        </tr>
                        <!-- Brand -->
                        <tr>
                            <td><label class="form-label">Brand</label></td>
                            <td>
                                <select class="select">
                                    <option value="brand1">Brand 1</option>
                                    <option value="brand2">Brand 2</option>
                                    <option value="brand3">Brand 3</option>
                                </select>
                            </td>
                        </tr>
                        <!-- Category -->
                        <tr>
                            <td><label class="form-label">Category</label></td>
                            <td>
                                <select class="select">
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <option value="category3">Category 3</option>
                                </select>
                            </td>
                        </tr>
                        <!-- HSN Code -->
                        <tr>
                            <td><label class="form-label">HSN</label></td>
                            <td><input class="input" type="text" placeholder="Enter HSN code" value="ABCD12"></td>
                        </tr>
                        <!-- Tax -->
                        <tr>
                            <td><label class="form-label">Tax</label></td>
                            <td><input class="input" type="text" placeholder="Enter tax" value="5%"></td>
                        </tr>
                        <!-- Minimum Purchase Qty -->
                        <tr>
                            <td><label class="form-label">Minimum Purchase Qty</label></td>
                            <td><input class="input" type="number" placeholder="Enter quantity" value="10"></td>
                        </tr>
                        <!-- Weight -->
                        <tr>
                            <td><label class="form-label">Weight (kg)</label></td>
                            <td><input class="input" type="text" placeholder="Enter weight" value="1.5 kg"></td>
                        </tr>
                        <!-- Slug -->
                        <tr>
                            <td><label class="form-label">Slug</label></td>
                            <td><input class="input" type="text" placeholder="Enter product slug" value="product-name-slug"></td>
                        </tr>
                        <!-- Publish Status -->
                        <tr>
                            <td><label class="form-label">Is Published</label></td>
                            <td>
                                <select class="select">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </td>
                        </tr>
                        <!-- Description -->
                        <tr>
                            <td><label class="form-label">Description</label></td>
                            <td><textarea class="input w-full" placeholder="Enter product description"></textarea></td>
                        </tr>
                        <!-- Product Image Upload -->
                        <tr>
                            <td><label class="form-label">Product Image</label></td>
                            <td><input type="file" accept=".jpg, .jpeg, .png" class="input"></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Features and Variants Section -->
                <div class="mt-6">
                    <h4 class="text-xl font-medium text-gray-700 mb-4">Features & Variants</h4>
                    <!-- Features -->
                    <table class="table-auto w-full mb-4">
                        <tbody>
                            <tr>
                                <td><label class="form-label">Feature 1</label></td>
                                <td><textarea class="input w-full" placeholder="Feature 1 description"></textarea></td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Feature 2</label></td>
                                <td><textarea class="input w-full" placeholder="Feature 2 description"></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-end mb-6">
                        <button class="btn btn-light">Add Feature</button>
                    </div>

                    <!-- Variant 1 -->
                    <table class="table-auto w-full mb-4">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-lg font-semibold">Variant 1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="form-label">Variant Type</label></td>
                                <td>
                                    <select class="select">
                                        <option value="size">Size</option>
                                        <option value="color">Color</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Variant Value</label></td>
                                <td><input class="input" type="text" placeholder="Enter variant value"></td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Variant Price (₹)</label></td>
                                <td><input class="input" type="text" placeholder="Enter variant price"></td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Discount (%)</label></td>
                                <td><input class="input" type="text" placeholder="Enter discount percentage"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Variant 2 -->
                    <table class="table-auto w-full mb-4">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-lg font-semibold">Variant 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="form-label">Variant Type</label></td>
                                <td>
                                    <select class="select">
                                        <option value="size">Size</option>
                                        <option value="color">Color</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Variant Value</label></td>
                                <td><input class="input" type="text" placeholder="Enter variant value"></td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Variant Price (₹)</label></td>
                                <td><input class="input" type="text" placeholder="Enter variant price"></td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Discount (%)</label></td>
                                <td><input class="input" type="text" placeholder="Enter discount percentage"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-end mb-6">
                        <button class="btn btn-primary">Add Variant</button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 mt-6">
                    <button class="btn btn-light">Deactivate</button>
                    <button class="btn btn-danger">Update Product</button>
                </div>
            </form>
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
        font-size: 1rem;
    }

    .textarea {
        height: 120px;
        resize: vertical;
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
