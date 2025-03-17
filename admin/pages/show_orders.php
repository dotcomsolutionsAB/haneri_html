<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>
<?php 
    $current_page = "Show Orders"; // Dynamically set this based on the page
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
                            <h1 class="text-xl font-medium leading-none text-gray-900" id="count-orders">
                                Orders (14)
                            </h1>
                            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                                Overview of all orders and brands.
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <a class="btn btn-sm btn-light" href="#">
                                Import Orders
                            </a>
                            <a class="btn btn-sm btn-primary" href="#">
                                Add Order
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
                                    Orders
                                </h3>
                                <div class="flex gap-6">
                                    <div class="relative">
                                        <i
                                            class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                        </i>
                                        <input class="input input-sm pl-8" data-datatable-search="#members_table"
                                            placeholder="Search Members" type="text" />
                                    </div>
                                    <label class="switch switch-sm">
                                        <input class="order-2" name="check" type="checkbox" value="1" />
                                        <span class="switch-label order-1">
                                            Pending Orders
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div data-datatable="true" data-datatable-page-size="10">
                                    <div class="scrollable-x-auto">
                                        <table class="table table-border" id="orders-table" data-datatable-table="true">
                                            <thead>
                                                <tr>
                                                    <th class="w-[60px] text-center">
                                                        <input class="checkbox checkbox-sm" data-datatable-check="true" type="checkbox">
                                                    </th>
                                                    <th class="min-w-[165px]">
                                                        <span class="sort asc">
                                                            <span class="sort-label text-gray-700 font-normal">Order Date</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="text-gray-700 font-normal min-w-[100px]">Order Code</th>
                                                    <th class="min-w-[165px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Invoice Number</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th><th class="min-w-[100px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Customer</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="min-w-[100px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Seller</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    
                                                    <th class="min-w-[140px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Amount</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th><th class="min-w-[100px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Delivery Status</span>
                                                            <span class="sort-icon">
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="min-w-[165px]">
                                                        <span class="sort">
                                                            <span class="sort-label text-gray-700 font-normal">Payment Method</span>
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
                                                            <div class="flex flex-col gap-0.5">
                                                                <span class="text-xs text-gray-700 font-normal">17-02-2025 11:05 AM</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-wrap gap-2.5 mb-2">
                                                            <span class="badge badge-sm badge-light badge-outline">20250217-11055472</span>   
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <span class="text-xs text-gray-700 font-normal">GM/ES/0045/24-25</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <span class="text-xs text-gray-700 font-normal">Tejraj Padmakar Rule</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <span class="text-xs text-gray-700 font-normal">Inhouse Order</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <div class="flex flex-col gap-0.5">
                                                                <span class="text-xs text-gray-700 font-normal">11199.00 </span>                                                                
                                                                <span class="badge text-danger">
                                                                    Uppaid
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-primary badge-outline">
                                                            In Progress
                                                        </span>
                                                    </td>
                                                    <td class="text-gray-800 font-normal">
                                                        <div class="flex items-center gap-1.5 pb-2">
                                                            <span class="text-xs text-gray-700 font-normal">Cash on Delivery</span>
                                                        </div>                                                        
                                                    </td>
                                                    <td class="w-[60px]">
                                                        <div class="menu" data-menu="true">
                                                            <div class="menu-item menu-item-dropdown" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
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
   
    <script>
$(document).ready(function () {
    const token = localStorage.getItem('auth_token');
    let itemsPerPage = 10;
    let currentPage = 1;
    let totalItems = 0;

    const fetchOrders = () => {
        const offset = (currentPage - 1) * itemsPerPage;

        $.ajax({
            url: `<?php echo BASE_URL; ?>/fetch_all`,
            type: 'POST',
            headers: { Authorization: `Bearer ${token}` },
            data: { limit: itemsPerPage, offset: offset },
            success: (response) => {
                if (response?.success && response.data) {
                    totalItems = response.total ?? response.data.length;
                    console.log("Count:", response.data.length);
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
        const tbody = $("#orders-table tbody");
        tbody.empty();

        data.forEach((order) => {
            tbody.append(`
                <tr>
                    <td class="text-center">
                        <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="${order.id}">
                    </td>
                    <td>
                        <div class="flex items-center gap-2.5">
                            <div class="flex flex-col gap-0.5">
                                <span class="text-xs text-gray-700 font-normal">${order.created_at}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex flex-wrap gap-2.5 mb-2">
                            <span class="badge badge-sm badge-light badge-outline">${order.id}</span>   
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center gap-1.5 pb-2">
                            <span class="text-xs text-gray-700 font-normal">${order.razorpay_order_id || "N/A"}</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center gap-1.5 pb-2">
                            <span class="text-xs text-gray-700 font-normal">${order.user?.name || "N/A"}</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center gap-1.5 pb-2">
                            <span class="text-xs text-gray-700 font-normal">${order.user?.role || "N/A"}</span>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs text-gray-700 font-normal">₹${order.total_amount}</span>  
                        <span class="badge text-danger">Unpaid</span>
                    </td>
                    <td><span class="badge badge-primary badge-outline ${order.status === 'pending' ? 'badge-warning' : 'badge-success'}">${order.status}</span></td>
                    <td class="text-gray-800 font-normal">
                        <div class="flex items-center gap-1.5 pb-2">
                            <span class="text-xs text-gray-700 font-normal">${order.payment_status}</span>
                        </div>                                                        
                    </td>
                    <td class="w-[60px]">${generateActionButtons(order)}</td>
                </tr>
            `);
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
        $("#count-orders").text(`COUNT : ${totalItems} Orders`);
    };

    $(".pagination").on("click", "button", function () {
        currentPage = parseInt($(this).data("page"));
        fetchOrders();
    });

    $("[data-datatable-size]").on("change", function () {
        itemsPerPage = parseInt($(this).val());
        currentPage = 1;
        fetchProducts();
    });

    const perPageSelect = $("[data-datatable-size]");
    [5, 10, 25, 50, 100].forEach((size) => {
        perPageSelect.append(`<option value="${size}">${size}</option>`);
    });
    perPageSelect.val(itemsPerPage);

    fetchOrders();
});

const generateActionButtons = (order) => {
    return `
        <div class="menu" data-menu="true">
                                                            <div class="menu-item menu-item-dropdown" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
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
    `;
};
    </script>
    
    <!-- Footer -->
    <?php include("footer1.php"); ?>