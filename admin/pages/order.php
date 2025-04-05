<?php include("../configs/auth_check.php"); ?>
<?php include("../configs/config.php"); ?>
<?php include("header.php");?>
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
                                Order Details
                            </h1>
                            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                                <button id="printButton" class="bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition">
                                    Print Invoice
                                </button>
                            </div>
                        </div>
                        <!-- <div class="flex items-center gap-2.5">
                            <a class="btn btn-sm btn-light" href="html/demo1/public-profile/profiles/default.html">
                                View Profile
                            </a>
                        </div> -->
                    </div>
                </div>
                <!-- End of Container -->

                

            </main>
            <!-- End of Content -->
    

<!-- Footer -->
<?php include("footer.php");?>

