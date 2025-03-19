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
                    <div class="grid gap-5 grid-cols-2 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
                        <div class="col-span-1">
                            <div class="card pb-2.5">
                                <div class="card-header" id="basic_settings">
                                    <h3 class="card-title">
                                        General Settings
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <label class="switch switch-sm">
                                            <span class="switch-label">
                                                Publish
                                            </span>
                                            <input checked="" name="check" type="checkbox" value="1">
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body grid gap-5">
                                    
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">
                                            Product Name
                                        </label>
                                        <input class="input" type="text" value="Haneri AirElite AEW1">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Stock
                                            
                                        </label>
                                        <input class="input" placeholder="99999" type="text" value="">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">
                                            Weight(in kgs)
                                        </label>
                                        <input class="input" type="text" value="13.5 kg">
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="btn btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid gap-3 grid-cols-span-1">
                            <div class="card pb-2.5">
                                <div class="card-header" id="password_settings">
                                    <h3 class="card-title">Discount</h3>
                                    <div class="flex items-center gap-2">
                                        <label class="switch switch-sm">
                                            <span class="switch-label">
                                                Active
                                            </span>
                                            <input checked="" name="check" type="checkbox" value="1">
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body grid gap-5">
                                    
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount Title</label>
                                        <select class="select">
                                            <option>Title 1</option>
                                            <option>Title 2</option>
                                            <option>Title 3</option>
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount Type</label>
                                        <select class="select">
                           
                                            <option>Flat</option>
                                            <option>Percent</option>
                                        </select>
                                    </div><div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount (₹/%)</label>
                                        <input class="input" type="text" value="1199.00 /-">
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="btn btn-primary">
                                            Save Discount
                                        </button>
                                    </div>
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