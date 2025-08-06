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
                                                <th>Variant Type</th>
                                                <th>Variant Value</th>
                                                <th>Variant Price (₹)</th>
                                                <th>Customer Discount (%)</th>
                                                <th>Dealer Discount (%)</th>
                                                <th>Architect Discount (%)</th>
                                                <th>Description</th>
                                                <th>HSN</th>
                                                <th>Regular Tax (%)</th>
                                                <th>Video URL</th>
                                                <th>Product PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Variant 1 -->
                                            <tr>
                                                <td><input class="input" type="text" value="Variant 1" /></td>
                                                <td><input class="input" type="text" value="Size" /></td>
                                                <td><input class="input" type="text" value="Large" /></td>
                                                <td><input class="input" type="text" value="7299.00" /></td>
                                                <td><input class="input" type="text" value="13%" /></td>
                                                <td><input class="input" type="text" value="15%" /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                                <td><input class="input" type="text" value="Variant for size Medium." /></td>
                                                <td><input class="input" type="text" value="123456" /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                                <td><input class="input" type="text" value="https://example.com/video-medium.mp4" /></td>
                                                <td><input class="input" type="text" value="https://example.com/pdf-medium.pdf" /></td>
                                            </tr>
                                            <!-- Variant 2 -->
                                            <tr>
                                                <td><input class="input" type="text" value="Variant 2" /></td>
                                                <td><input class="input" type="text" value="Color" /></td>
                                                <td><input class="input" type="text" value="Red-600" /></td>
                                                <td><input class="input" type="text" value="6299.00" /></td>
                                                <td><input class="input" type="text" value="10%" /></td>
                                                <td><input class="input" type="text" value="12%" /></td>
                                                <td><input class="input" type="text" value="16%" /></td>
                                                <td><input class="input" type="text" value="Variant for color Red-600." /></td>
                                                <td><input class="input" type="text" value="123457" /></td>
                                                <td><input class="input" type="text" value="18%" /></td>
                                                <td><input class="input" type="text" value="https://example.com/video-red.mp4" /></td>
                                                <td><input class="input" type="text" value="https://example.com/pdf-red.pdf" /></td>
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