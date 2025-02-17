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
                        <div class="grid lg:grid-cols-2 gap-5 lg:gap-7.5">
                            <form class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Invite People
                                    </h3>
                                </div>
                                <div class="card-body grid gap-5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-32">
                                            Email
                                        </label>
                                        <input class="input" name="user_email" placeholder="" type="text"
                                            value="jason@studio.io" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap gap-2.5">
                                        <label class="form-label max-w-32">
                                            Role
                                        </label>
                                        <div class="flex flex-col items-start grow gap-5">
                                            <select class="select" name="user_role">
                                                <option selected="" value="1">
                                                    Member
                                                </option>
                                                <option value="2">
                                                    Editor
                                                </option>
                                                <option value="3">
                                                    Designer
                                                </option>
                                                <option value="4">
                                                    Admin
                                                </option>
                                            </select>
                                            <a class="btn btn-sm btn-light btn-outline" href="#">
                                                <i class="ki-filled ki-plus-squared">
                                                </i>
                                                Add more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer justify-center">
                                    <a class="btn btn-sm btn-primary" href="#">
                                        Invite People
                                    </a>
                                </div>
                            </form>
                            <form class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Invite with Link
                                    </h3>
                                </div>
                                <div class="card-body grid gap-5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-32">
                                            Link
                                        </label>
                                        <div class="flex flex-col items-start grow gap-5">
                                            <div class="relative w-full">
                                                <input class="input" name="user_email" placeholder="" type="text"
                                                    value="https://www.ktstudio.com/RSVP?c=12345XYZt" />
                                                <button
                                                    class="btn btn-clear btn-light btn-icon btn-sm absolute end-0 top-2/4 -translate-y-2/4 me-1.5">
                                                    <i class="ki-filled ki-copy">
                                                    </i>
                                                </button>
                                            </div>
                                            <a class="btn btn-sm btn-light btn-outline" href="#">
                                                <i class="ki-filled ki-arrows-circle">
                                                </i>
                                                Reset Link
                                            </a>
                                        </div>
                                    </div>
                                    <p class="text-gray-800 text-2sm">
                                        Click below to RSVP for our exclusive event. Limited spaces available, so don't
                                        miss out.
                                        Reserve your spot now with this special invitation link!
                                    </p>
                                </div>
                                <div class="card-footer justify-center">
                                    <a class="btn btn-sm btn-primary" href="#">
                                        Invite People
                                    </a>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    FAQ
                                </h3>
                            </div>
                            <div class="card-body py-3">
                                <div data-accordion="true" data-accordion-expand-all="true">
                                    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200"
                                        data-accordion-item="true">
                                        <button class="accordion-toggle py-4" data-accordion-toggle="#faq_1_content">
                                            <span class="text-base text-gray-900">
                                                How is pricing determined for each plan ?
                                            </span>
                                            <i
                                                class="ki-filled ki-plus text-gray-600 text-sm accordion-active:hidden block">
                                            </i>
                                            <i
                                                class="ki-filled ki-minus text-gray-600 text-sm accordion-active:block hidden">
                                            </i>
                                        </button>
                                        <div class="accordion-content hidden" id="faq_1_content">
                                            <div class="text-gray-700 text-md pb-4">
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision.
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision.
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200"
                                        data-accordion-item="true">
                                        <button class="accordion-toggle py-4" data-accordion-toggle="#faq_2_content">
                                            <span class="text-base text-gray-900">
                                                What payment methods are accepted for subscriptions ?
                                            </span>
                                            <i
                                                class="ki-filled ki-plus text-gray-600 text-sm accordion-active:hidden block">
                                            </i>
                                            <i
                                                class="ki-filled ki-minus text-gray-600 text-sm accordion-active:block hidden">
                                            </i>
                                        </button>
                                        <div class="accordion-content hidden" id="faq_2_content">
                                            <div class="text-gray-700 text-md pb-4">
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200"
                                        data-accordion-item="true">
                                        <button class="accordion-toggle py-4" data-accordion-toggle="#faq_3_content">
                                            <span class="text-base text-gray-900">
                                                Are there any hidden fees in the pricing ?
                                            </span>
                                            <i
                                                class="ki-filled ki-plus text-gray-600 text-sm accordion-active:hidden block">
                                            </i>
                                            <i
                                                class="ki-filled ki-minus text-gray-600 text-sm accordion-active:block hidden">
                                            </i>
                                        </button>
                                        <div class="accordion-content hidden" id="faq_3_content">
                                            <div class="text-gray-700 text-md pb-4">
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200"
                                        data-accordion-item="true">
                                        <button class="accordion-toggle py-4" data-accordion-toggle="#faq_4_content">
                                            <span class="text-base text-gray-900">
                                                Is there a discount for annual subscriptions ?
                                            </span>
                                            <i
                                                class="ki-filled ki-plus text-gray-600 text-sm accordion-active:hidden block">
                                            </i>
                                            <i
                                                class="ki-filled ki-minus text-gray-600 text-sm accordion-active:block hidden">
                                            </i>
                                        </button>
                                        <div class="accordion-content hidden" id="faq_4_content">
                                            <div class="text-gray-700 text-md pb-4">
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200"
                                        data-accordion-item="true">
                                        <button class="accordion-toggle py-4" data-accordion-toggle="#faq_5_content">
                                            <span class="text-base text-gray-900">
                                                Do you offer refunds on subscription cancellations ?
                                            </span>
                                            <i
                                                class="ki-filled ki-plus text-gray-600 text-sm accordion-active:hidden block">
                                            </i>
                                            <i
                                                class="ki-filled ki-minus text-gray-600 text-sm accordion-active:block hidden">
                                            </i>
                                        </button>
                                        <div class="accordion-content hidden" id="faq_5_content">
                                            <div class="text-gray-700 text-md pb-4">
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item [&:not(:last-child)]:border-b border-b-gray-200"
                                        data-accordion-item="true">
                                        <button class="accordion-toggle py-4" data-accordion-toggle="#faq_6_content">
                                            <span class="text-base text-gray-900">
                                                Can I add extra features to my current plan ?
                                            </span>
                                            <i
                                                class="ki-filled ki-plus text-gray-600 text-sm accordion-active:hidden block">
                                            </i>
                                            <i
                                                class="ki-filled ki-minus text-gray-600 text-sm accordion-active:block hidden">
                                            </i>
                                        </button>
                                        <div class="accordion-content hidden" id="faq_6_content">
                                            <div class="text-gray-700 text-md pb-4">
                                                Metronic embraces flexible licensing options that empower you to choose
                                                the perfect fit for your project's needs and budget.
                                                Understanding the factors influencing each plan's pricing helps you make
                                                an informed decision
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-5 lg:gap-7.5">
                            <div class="card">
                                <div class="card-body px-10 py-7.5 lg:pr-12.5">
                                    <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                                        <div class="flex flex-col items-start gap-3">
                                            <h2 class="text-1.5xl font-medium text-gray-900">
                                                Questions ?
                                            </h2>
                                            <p class="text-sm text-gray-800 leading-5.5 mb-2.5">
                                                Visit our Help Center for detailed assistance on billing, payments, and
                                                subscriptions.
                                            </p>
                                        </div>
                                        <img alt="image" class="dark:hidden max-h-[150px]"
                                            src="assets/media/illustrations/29.svg" />
                                        <img alt="image" class="light:hidden max-h-[150px]"
                                            src="assets/media/illustrations/29-dark.svg" />
                                    </div>
                                </div>
                                <div class="card-footer justify-center">
                                    <a class="btn btn-link" href="">
                                        Go to Help Center
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body px-10 py-7.5 lg:pr-12.5">
                                    <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                                        <div class="flex flex-col items-start gap-3">
                                            <h2 class="text-1.5xl font-medium text-gray-900">
                                                Contact Support
                                            </h2>
                                            <p class="text-sm text-gray-800 leading-5.5 mb-2.5">
                                                Need assistance? Contact our support team for prompt, personalized help
                                                your queries & concerns.
                                            </p>
                                        </div>
                                        <img alt="image" class="dark:hidden max-h-[150px]"
                                            src="assets/media/illustrations/31.svg" />
                                        <img alt="image" class="light:hidden max-h-[150px]"
                                            src="assets/media/illustrations/31-dark.svg" />
                                    </div>
                                </div>
                                <div class="card-footer justify-center">
                                    <a class="btn btn-link" href="https://devs.keenthemes.com/unresolved">
                                        Contact Support
                                    </a>
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