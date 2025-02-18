<base href="../">
<?php 
    $current_page = "Show Products"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>
            <!-- End of Header -->
            <!-- Content -->
            <main class="grow content pt-5" id="content" role="content">
                <!-- Container -->
                <div class="container-fixed" id="content_container">
                </div>
                <!-- Container -->
                <div class="container-fixed">
                    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                        <div class="flex flex-col justify-center gap-2">
                            <h1 class="text-xl font-medium leading-none text-gray-900">
                                Products (14)
                            </h1>
                            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                                Overview of all products and brands.
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <a class="btn btn-sm btn-light" href="#">
                                Import Products
                            </a>
                            <a class="btn btn-sm btn-primary" href="#">
                                Add Product
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End of Container -->
                <!-- Container -->
                <div class="container-fixed">
                    <div class="grid gap-5 lg:gap-7.5">
                        <div class="card card-grid min-w-full">
                            <div class="card-header py-5 flex-wrap gap-2">
                                <h3 class="card-title">
                                    Products
                                </h3>
                                <div class="flex gap-6">
                                    <div class="relative">
                                        <i
                                            class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                        </i>
                                        <input class="input input-sm pl-8" data-datatable-search="#members_table"
                                            placeholder="Search Product" type="text" />
                                    </div>
                                    <label class="switch switch-sm">
                                        <input class="order-2" name="check" type="checkbox" value="1" />
                                        <span class="switch-label order-1">
                                            Publish Products
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div data-datatable="true" data-datatable-page-size="10">
                                    <div class="scrollable-x-auto">
                                        <table class="table table-border" data-datatable-table="true" id="members_table">
                                            <thead>
                                                <tr>
                                                    <th class="w-[60px] text-center">
                                                        <input class="checkbox checkbox-sm" data-datatable-check="true" type="checkbox">
                                                    </th>
                                                    <th class="min-w-[300px]">
                                                        <span class="sort asc">
                                                            <span class="sort-label text-gray-700 font-normal">Name</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="text-gray-700 font-normal min-w-[100px]">Added By</th>
                                                    <th class="min-w-[225px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Info</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="min-w-[100px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Publish</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="min-w-[165px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">
                                                                Recent Offers
                                                            </span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="w-[60px]">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"></td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <div class="">
                                                                <img class="h-9 rounded-full" src="assets/media/avatars/300-3.png">
                                                            </div>
                                                            <div class="flex flex-col gap-0.5">
                                                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">Name</a>
                                                                <span class="text-xs text-gray-700 font-normal">13 Stock Available</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-wrap gap-2.5 mb-2">
                                                            <span class="badge badge-sm badge-light badge-outline">
                                                                Admin
                                                            </span>   
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <img alt="flag" class="h-4 rounded-full" src="assets/media/flags/estonia.svg">
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Brands
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Category: Category Name
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Price: 1660.00 /-
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-sm badge-outline badge-success">
                                                            YES
                                                        </span>
                                                    </td>
                                                    <td class="text-gray-800 font-normal">
                                                        Flash offer Sale
                                                    </td>
                                                    <td class="w-[60px]">
                                                        <div class="menu" data-menu="true">
                                                            <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                                <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                    <i class="ki-filled ki-dots-vertical">
                                                                    </i>
                                                                </button>
                                                                <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true" style="">
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-search-list">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                View
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-file-up">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Export
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-pencil">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Edit
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-copy">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Make a copy
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-trash">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Remove
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"></td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <div class="">
                                                                <img class="h-9 rounded-full" src="assets/media/avatars/300-3.png">
                                                            </div>
                                                            <div class="flex flex-col gap-0.5">
                                                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">Name</a>
                                                                <span class="text-xs text-gray-700 font-normal">13 Stock Available</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-wrap gap-2.5 mb-2">
                                                            <span class="badge badge-sm badge-light badge-outline">
                                                                Admin
                                                            </span>   
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <img alt="flag" class="h-4 rounded-full" src="assets/media/flags/estonia.svg">
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Brands
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Category: Category Name
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Price: 1660.00 /-
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-sm badge-outline badge-warning">
                                                            YES
                                                        </span>
                                                    </td>
                                                    <td class="text-gray-800 font-normal">
                                                        Flash offer Sale
                                                    </td>
                                                    <td class="w-[60px]">
                                                        <div class="menu" data-menu="true">
                                                            <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                                <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                    <i class="ki-filled ki-dots-vertical">
                                                                    </i>
                                                                </button>
                                                                <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true" style="">
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-search-list">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                View
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-file-up">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Export
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-pencil">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Edit
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-copy">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Make a copy
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-trash">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Remove
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"></td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <div class="">
                                                                <img class="h-9 rounded-full" src="assets/media/avatars/300-3.png">
                                                            </div>
                                                            <div class="flex flex-col gap-0.5">
                                                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">Name</a>
                                                                <span class="text-xs text-gray-700 font-normal">13 Stock Available</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-wrap gap-2.5 mb-2">
                                                            <span class="badge badge-sm badge-light badge-outline">
                                                                Admin
                                                            </span>   
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <img alt="flag" class="h-4 rounded-full" src="assets/media/flags/estonia.svg">
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Brands
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Category: Category Name
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Price: 1660.00 /-
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-sm badge-outline badge-primary">
                                                            YES
                                                        </span>
                                                    </td>
                                                    <td class="text-gray-800 font-normal">
                                                        Flash offer Sale
                                                    </td>
                                                    <td class="w-[60px]">
                                                        <div class="menu" data-menu="true">
                                                            <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                                <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                    <i class="ki-filled ki-dots-vertical">
                                                                    </i>
                                                                </button>
                                                                <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true" style="">
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-search-list">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                View
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-file-up">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Export
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-pencil">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Edit
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-copy">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Make a copy
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-trash">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Remove
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"></td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <div class="">
                                                                <img class="h-9 rounded-full" src="assets/media/avatars/300-3.png">
                                                            </div>
                                                            <div class="flex flex-col gap-0.5">
                                                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">Name</a>
                                                                <span class="text-xs text-gray-700 font-normal">13 Stock Available</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-wrap gap-2.5 mb-2">
                                                            <span class="badge badge-sm badge-light badge-outline">
                                                                Admin
                                                            </span>   
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <img alt="flag" class="h-4 rounded-full" src="assets/media/flags/estonia.svg">
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Brands
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Category: Category Name
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center gap-1.5 pb-2">        
                                                            <span class="leading-none text-gray-800 font-normal">
                                                                Price: 1660.00 /-
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-sm badge-outline badge-danger">
                                                            YES
                                                        </span>
                                                    </td>
                                                    <td class="text-gray-800 font-normal">
                                                        Flash offer Sale
                                                    </td>
                                                    <td class="w-[60px]">
                                                        <div class="menu" data-menu="true">
                                                            <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                                                                <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                    <i class="ki-filled ki-dots-vertical">
                                                                    </i>
                                                                </button>
                                                                <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true" style="">
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-search-list">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                View
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-file-up">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Export
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-pencil">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Edit
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-copy">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Make a copy
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="menu-separator">
                                                                    </div>
                                                                    <div class="menu-item">
                                                                        <a class="menu-link" href="#">
                                                                            <span class="menu-icon">
                                                                                <i class="ki-filled ki-trash">
                                                                                </i>
                                                                            </span>
                                                                            <span class="menu-title">
                                                                                Remove
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div
                                        class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                        <div class="flex items-center gap-2 order-2 md:order-1">
                                            Show
                                            <select class="select select-sm w-16" data-datatable-size="true"
                                                name="perpage">
                                            </select>
                                            per page
                                        </div>
                                        <div class="flex items-center gap-4 order-1 md:order-2">
                                            <span data-datatable-info="true">
                                            </span>
                                            <div class="pagination" data-datatable-pagination="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include("../admin_inc/faq.php"); ?>
                    </div>
                </div>
                <!-- End of Container -->
            </main>
            <!-- End of Content -->
            <!-- Footer -->
<?php include("footer1.php"); ?>