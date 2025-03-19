<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php 
    $current_page = "Add Category"; // Dynamically set this based on the page
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
                    <div class="grid gap-5 grid-cols-1 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
                        <div class="card pb-2.5">
                            <div class="card-body grid gap-5">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                                    <!-- Category Name -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Category Name</label>
                                        <input class="input" type="text" placeholder="Category_Name">
                                    </div>
                                    
                                    <!-- Parent Id -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Sort Number</label>
                                        <input class="input" placeholder="3" type="text" value="">
                                    </div>
                                    
                                    <!-- Description -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Description</label>
                                        <div class="card pb-2.5">
                                            <!-- Description -->
                                            <textarea class="note-codable text-edit" aria-multiline="true"></textarea>
                                        </div>
                                    </div>
                                    <!-- Discount Title -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Parent Id</label>
                                        <select class="select">
                                            <option value="1">Parent 1</option>
                                            <option value="2">Parent 2</option>
                                            <option value="3">Parent 3</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Discount Type -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount Type</label>
                                        <select class="select">
                                            <option>Flat</option>
                                            <option>Percent</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Discount Value -->
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount (₹/%)</label>
                                        <input class="input" type="text" value="1199.00 /-">
                                    </div>
                                </div>
                                
                                <div class="flex justify-end gap-5">
                                    <button class="btn btn-primary">Save Category</button>
                                </div>
                            </div>
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
</style>