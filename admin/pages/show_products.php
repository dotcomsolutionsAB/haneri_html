<base href="../">
<?php include("../auth/url.php"); ?>
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
                                        <table class="table table-border" data-datatable-table="true" id="products-table">
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
                                                <!-- <tr>
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
                                                </tr> -->
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
    <!-- <script>
        $(document).ready(function () {
            const token = localStorage.getItem('authToken');

            let itemsPerPage = 10; // Default items per page
            let currentPage = 1; // Current page number
            let totalItems = 0; // Total items from API response

            const fetchProducts = () => {
                const offset = (currentPage - 1) * itemsPerPage;

                $.ajax({
                    url: '<?php echo BASE_URL; ?>/products/get_products',
                    type: 'POST',
                    headers: { Authorization: `Bearer ${token}` },
                    data: { search: '', limit: itemsPerPage, offset: offset},
                    success: (response) => {
                            if (response && response.data) {
                                totalItems = response.total_records; // Assuming total items is part of the API response
                                populateTable(response.data);
                                updatePagination();
                            } else {
                                console.error("Unexpected response format:", response);
                            }
                    },
                    error: (error) => {
                            console.error("Error fetching data:", error);
                    }
                });
            };

            const populateTable = (data) => {
                const tbody = $("#products-table tbody");
                tbody.empty();

                data.forEach((product) => {
                    const row = `
                    <tr>
                            <td class="text-center">
                                <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="${product.product_code}" />
                            </td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                <img alt="${product.product_name}" class="rounded-full size-7 shrink-0" 
                                    src="${product.product_image ? `https://app.supersteelpowertools.com${product.product_image}` : 'assets/media/placeholder.png'}" />
                                <div class="flex flex-col">
                                    <a class="text-sm font-medium text-gray-900 hover:text-primary-active mb-px">
                                        ${product.product_name}
                                    </a>
                                    <span class="text-2sm text-gray-700 font-normal">${product.product_code}</span>
                                </div>
                                </div>
                            </td>
                            <td class="text-gray-800 font-normal text-center">${product.basic}.00</td>
                            <td class="text-gray-800 font-normal text-center">${product.gst}.00</td>
                            <td class="text-gray-800 font-normal">${product.category || 'N/A'}</td>
                    </tr>
                    `;
                tbody.append(row);
                });
            };

            const updatePagination = () => {
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                const pagination = $(".pagination");
                pagination.empty();

                const maxVisiblePages = 5; // Number of page buttons to show
                const startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                const endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                // Ensure that the range always includes maxVisiblePages if possible
                const adjustedStartPage = Math.max(1, Math.min(startPage, endPage - maxVisiblePages + 1));

                // Previous button
                if (currentPage > 1) {
                    pagination.append(
                        `<button class="btn btn-sm" data-page="${currentPage - 1}">Previous</button>`
                    );
                }

                // Page numbers
                for (let page = adjustedStartPage; page <= endPage; page++) {
                    const isActive = page === currentPage ? "active" : "";
                    pagination.append(
                        `<button class="btn btn-sm ${isActive}" data-page="${page}">${page}</button>`
                    );
                }

                // Next button
                if (currentPage < totalPages) {
                    pagination.append(
                        `<button class="btn btn-sm" data-page="${currentPage + 1}">Next</button>`
                    );
                }

                $("#card-title").text(
                    `Showing ${Math.min((currentPage - 1) * itemsPerPage + 1, totalItems)} to ${
                        Math.min(currentPage * itemsPerPage, totalItems)
                    } of ${totalItems} Products`
                );
            };
            
            // Handle pagination click
            $(".pagination").on("click", "button", function () {
            currentPage = parseInt($(this).data("page"));
            fetchProducts();
            });


            // Handle items per page change
            $("[data-datatable-size]").on("change", function () {
                itemsPerPage = parseInt($(this).val());
                currentPage = 1; // Reset to first page
                fetchProducts();
            });

            // Initialize dropdown for items per page
            const perPageSelect = $("[data-datatable-size]");
            [10, 25, 50, 100].forEach((size) => {
                perPageSelect.append(`<option value="${size}">${size}</option>`);
            });
            perPageSelect.val(itemsPerPage);

            // Initial fetch
            fetchProducts();
        });
    </script> -->
    <script>
        $(document).ready(function () {
            const token = localStorage.getItem('authToken');

            let itemsPerPage = 10; // Default items per page
            let currentPage = 1; // Current page number
            let totalItems = 0; // Total items from API response

            const fetchProducts = () => {
                const offset = (currentPage - 1) * itemsPerPage;

                $.ajax({
                    url: '<?php echo BASE_URL; ?>/products/get_products',
                    type: 'POST',
                    headers: { Authorization: `Bearer ${token}` },
                    data: { search: '', limit: itemsPerPage, offset: offset},
                    success: (response) => {
                            if (response && response.data) {
                                totalItems = response.total_records; // Assuming total items is part of the API response
                                populateTable(response.data);
                                updatePagination();
                            } else {
                                console.error("Unexpected response format:", response);
                            }
                    },
                    error: (error) => {
                            console.error("Error fetching data:", error);
                    }
                });
            };

            const populateTable = (data) => {
                const tbody = $("#products-table tbody");
                tbody.empty();

                data.forEach((product) => {
                    const row = `
                    <tr>
                        <td class="text-center">
                            <input class="checkbox checkbox-sm" type="checkbox" value="${product.slug}" />
                        </td>
                        <td>
                            <div class="flex items-center gap-2.5">
                                <img alt="${product.name}" class="rounded-full size-7 shrink-0" src="assets/media/placeholder.png" />
                                <div class="flex flex-col">
                                    <a class="text-sm font-medium text-gray-900 hover:text-primary-active mb-px">
                                        ${product.name}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-gray-800 font-normal text-center">${product.variants[0].selling_price}.00</td>
                        <td class="text-gray-800 font-normal text-center">${product.variants[0].selling_tax}.00</td>
                        <td class="text-gray-800 font-normal">${product.category.name}</td>
                    </tr>
                    `;
                    tbody.append(row);
                });
            };

            const updatePagination = () => {
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                const pagination = $(".pagination");
                pagination.empty();

                if (currentPage > 1) {
                    pagination.append(`<button class="btn btn-sm" data-page="${currentPage - 1}">Previous</button>`);
                }

                for (let page = 1; page <= totalPages; page++) {
                    const isActive = page === currentPage ? "active" : "";
                    pagination.append(`<button class="btn btn-sm ${isActive}" data-page="${page}">${page}</button>`);
                }

                if (currentPage < totalPages) {
                    pagination.append(`<button class="btn btn-sm" data-page="${currentPage + 1}">Next</button>`);
                }
            };

            $(".pagination").on("click", "button", function () {
                currentPage = parseInt($(this).data("page"));
                fetchProducts();
            });

            $("[data-datatable-size]").on("change", function () {
                itemsPerPage = parseInt($(this).val());
                currentPage = 1;
                fetchProducts();
            });

            // Initialize dropdown for items per page
            const perPageSelect = $("[data-datatable-size]");
            [10, 25, 50, 100].forEach((size) => {
                perPageSelect.append(`<option value="${size}">${size}</option>`);
            });
            perPageSelect.val(itemsPerPage);

            fetchProducts();
        });
    </script>
    <!-- Sync Products api -->
    <!-- <script>     
        const syncProducts = () => {
            const token = localStorage.getItem('authToken');
            if (!token) return alert('You are not authenticated.');

            $('.loading-spinner').show(); // Show spinner for sync operation

            $.ajax({
                url: 'https://app.supersteelpowertools.com/api/fetch_products',
                type: 'GET',
                headers: { Authorization: `Bearer ${token}` },
                success: () => {
                        $('.loading-spinner').hide();
                        fetchProducts(); // Refresh table after sync
                },
                error: () => {
                        $('.loading-spinner').hide();
                        alert('Failed to sync products.');
                },
            });
        };
        $('#syncProducts').on('click', syncProducts); // Attach sync button click event

        const handleImageUpload = () => {
            const token = localStorage.getItem('authToken');
            if (!token) return alert('You are not authenticated.');

            const productCode = $('#productCode').val();
            const file = $('#imageFile')[0].files[0];

            if (!file) return alert('Please select an image file.');

            const formData = new FormData();
            formData.append('product_code', productCode);
            formData.append('product_image', file);

            $.ajax({
                url: 'https://app.supersteelpowertools.com/api/admin/upload_product',
                type: 'POST',
                headers: { Authorization: `Bearer ${token}` },
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                        const res = JSON.parse(response);
                        if (res.message === 'Image uploaded successfully') {
                            alert(res.message);
                            $('#uploadModal').modal('hide');
                            fetchProducts(); // Refresh the product list
                        } else {
                            alert('Failed to upload image.');
                        }
                },
                error: () => {
                        alert('Image upload failed.');
                },
            });
        };
        $('#uploadImageBtn').on('click', handleImageUpload);

        // $('#syncProducts').on('click', syncProducts);

        $('#logoutBtn').on('click', () => {
            localStorage.removeItem('authToken');
            alert('You have been logged out.');
            window.location.href = 'index.php';
        });

        // $(document).ready(fetchProducts);
    </script> -->
<?php include("footer1.php"); ?>