<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>

<?php 
    $current_page = "Show Users"; // Dynamically set this based on the page
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
                        <h1 class="text-xl font-medium leading-none text-gray-900" id="">
                            Users
                        </h1>
                        <!-- <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                            Overview of all users and brands.
                        </div> -->
                    </div>
                    <div class="flex items-center gap-2.5">
                        <a class="btn btn-sm btn-light" href="#">
                            Import Users
                        </a>
                        <a class="btn btn-sm btn-primary" href="#">
                            Add User
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
                                Overview of <span id="count-users"> 00 </span>
                            </h3>
                            <div class="flex gap-6">

                                <!-- Role Selection Filter -->
                                <div>
                                    <select class="select select-sm w-24" data-datatable-role>
                                        <option value="customer" selected>Customer</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="relative">
                                    <i
                                        class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                    </i>
                                    <input class="input input-sm pl-8" data-datatable-search="#users_table"
                                        placeholder="Search Users" type="text" />
                                </div>
                                <label class="switch switch-sm">
                                    <input class="order-2" name="check" type="checkbox" value="1" />
                                    <span class="switch-label order-1">
                                        Active Users
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-datatable="true" data-datatable-page-size="10">
                                <div class="scrollable-x-auto">
                                    <table class="table table-border" data-datatable-table="true" id="users-table">
                                        <thead>
                                            <tr>
                                                <th class="w-[60px] text-center">
                                                    <input class="checkbox checkbox-sm" data-datatable-check="true"
                                                        type="checkbox" />
                                                </th>
                                                <th class="min-w-[300px]">
                                                    <span class="sort asc">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Member
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="text-gray-700 font-normal min-w-[220px]">
                                                    Roles
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Mobile
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Status
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
                                            <!--  -->
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                    <div class="flex items-center gap-2 order-2 md:order-1">
                                        Show
                                        <select class="select select-sm w-16" data-datatable-size=""
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

        let searchQuery = ""; // Store the search query
        let selectedRole = ""; // Store selected role

        const fetchUsers = () => {
            const offset = (currentPage - 1) * itemsPerPage;

            let requestData = { 
                limit: itemsPerPage, 
                offset: offset 
            };

            // Include filters only if they have values
            if (searchQuery) requestData.user_name = searchQuery;
            if (selectedRole) requestData.role = selectedRole;

            $.ajax({
                url: `<?php echo BASE_URL; ?>/all_users`,
                type: 'POST',
                headers: { Authorization: `Bearer ${token}` },
                data: requestData,
                success: (response) => {
                    if (response?.success && response.data) {
                        totalItems = response.total_users;
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

        // Debounce function to limit API calls while typing
        const debounce = (func, delay) => {
            let timer;
            return function (...args) {
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(this, args), delay);
            };
        };

        // Search filter (triggers API call after 3 letters)
        $("[data-datatable-search]").on("input", debounce(function () {
            let query = $(this).val().trim();
            if (query.length >= 3) {
                searchQuery = query;
                currentPage = 1; // Reset to first page
                fetchUsers();
            } else if (query.length === 0) {
                searchQuery = ""; // Clear search
                fetchUsers();
            }
        }, 300)); // 300ms delay

        // Role filter (triggers API call when role is selected)
        $("[data-datatable-role]").on("change", function () {
            selectedRole = $(this).val(); // Get selected role
            currentPage = 1; // Reset to first page
            fetchUsers();
        });

        // Set default role in the select dropdown
        $("[data-datatable-role]").val(selectedRole);

        // Initial fetch with "Customer" pre-selected
        fetchUsers();

        const populateTable = (data) => {
            const tbody = $("#users-table tbody");
            tbody.empty();

            data.forEach((user) => {
                tbody.append(`
                    <tr>
                        <td class="text-center">
                            <input class="checkbox checkbox-sm" type="checkbox" value="${user.id}">
                        </td>
                        <td>
                            <div class="flex items-center gap-2.5">
                                <div class="">
                                    <img class="h-9 rounded-full" src="assets/media/avatars/300-3.png" />
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">
                                        ${user.name}
                                    </a>
                                    <span class="text-xs text-gray-700 font-normal">
                                        ${user.email}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-wrap gap-2.5 mb-2">
                                <span class="badge badge-sm badge-light badge-outline">
                                    ${user.role}
                                </span>
                            </div>
                        </td>
                        <td>
                            <span class="text-xs text-gray-700 font-normal">${user.mobile}</span>
                        </td>
                        <td>
                            <span class="badge badge-sm badge-outline ${user.is_present == 1 ? 'badge-success' : 'badge-danger'}">
                                ${user.is_present == 1 ? 'Present' : 'Absent'}
                            </span>
                        </td>
                        <td class="w-[60px]">${generateActionButtons(user)}</td>
                    </tr>
                `);
            });
        };

        const updatePagination = () => {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const pagination = $(".pagination");
            pagination.empty();

            if (currentPage > 1) {
                pagination.append(`<button class="btn btn-sm prev-page" data-page="${currentPage - 1}">Previous</button>`);
            }
            for (let page = 1; page <= totalPages; page++) {
                const isActive = page === currentPage ? "active" : "";
                pagination.append(`<button class="btn btn-sm ${isActive}" data-page="${page}">${page}</button>`);
            }
            if (currentPage < totalPages) {
                pagination.append(`<button class="btn btn-sm next-page" data-page="${currentPage + 1}">Next</button>`);
            }
            $("#count-users").text(`${totalItems} Users`);
        };

        $(".pagination").on("click", "button", function () {
            currentPage = parseInt($(this).data("page"));
            fetchUsers();
        });

        $("[data-datatable-size]").on("change", function () {
            itemsPerPage = parseInt($(this).val());
            currentPage = 1;
            fetchUsers();
        });

        const perPageSelect = $("[data-datatable-size]");
        [3, 10, 25, 50, 100].forEach((size) => {
            perPageSelect.append(`<option value="${size}">${size}</option>`);
        });
        perPageSelect.val(itemsPerPage);

        fetchUsers();
    });

    const generateActionButtons = (user) => {
        return `
            <div class="menu" data-menu="true">
                <div class="menu-item" data-menu-item-offset="0, 10px"
                    data-menu-item-placement="bottom-end"
                    data-menu-item-placement-rtl="bottom-start"
                    data-menu-item-toggle="dropdown"
                    data-menu-item-trigger="click|lg:click">
                    <button
                        class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                        <i class="ki-filled ki-dots-vertical">
                        </i>
                    </button>
                    <div class="menu-dropdown menu-default w-full max-w-[175px]"
                        data-menu-dismiss="true">
                        <div class="menu-item">
                            <a class="menu-link" href="users.php?id=${user.id}">
                                <span class="menu-icon">
                                    <i class="ki-filled ki-search-list">
                                    </i>
                                </span>
                                <span class="menu-title">
                                    View
                                </span>
                            </a>
                        </div>
                        <div class="menu-separator">
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="users.php?id=${user.id}">
                                <span class="menu-icon">
                                    <i class="ki-filled ki-pencil">
                                    </i>
                                </span>
                                <span class="menu-title">
                                    Edit
                                </span>
                            </a>
                        </div>
                        <div class="menu-separator">
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="users.php?id=${user.id}">
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