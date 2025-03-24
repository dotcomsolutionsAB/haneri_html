<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>

<?php 
    $current_page = "Show Categories"; // Dynamically set this based on the page
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
                            Categories
                        </h1>
                        <!-- <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                            Overview of all users and Categories.
                        </div> -->
                    </div>
                    <div class="flex items-center gap-2.5">
                        <a class="btn btn-sm btn-light" href="#">
                            Import Categories
                        </a>
                        <a class="btn btn-sm btn-primary" href="#">
                            Add Categories
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
                                Overview of <span id="count-categories">00</span>
                            </h3>
                            <div class="flex gap-6">
                                <div class="relative">
                                    <i class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                    </i>
                                    <input class="input input-sm pl-8" data-datatable-search="#categories_table"
                                        placeholder="Search categories" type="text" />
                                </div>
                                <label class="switch switch-sm">
                                    <input class="order-2" name="check" type="checkbox" value="1" />
                                    <span class="switch-label order-1">
                                        Active Categories
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-datatable="true" data-datatable-page-size="10">
                                <div class="scrollable-x-auto">
                                    <table class="table table-border" data-datatable-table="true" id="categories-table">
                                        <thead>
                                            <tr>
                                                <th class="w-[60px] text-center">
                                                    <input class="checkbox checkbox-sm" data-datatable-check="true"
                                                        type="checkbox" />
                                                </th>
                                                <th class="min-w-[300px]">
                                                    <span class="sort asc">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Name
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="text-gray-700 font-normal min-w-[220px]">
                                                    Parent Id
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Custom Sort
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
                                        <select class="select select-sm w-16" data-datatable-size
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

        let itemsPerPage = 10;   // Default limit
        let currentPage = 1;     // Current page index
        let totalItems = 0;      // Will be set from response "records"
        let searchTerm = "";     // Will hold the search input text

        const $searchInput = $("input[data-datatable-search=\"#categories_table\"]");

        // Function to fetch categories from the server
        const fetchCategories = () => {
            // Calculate offset based on page number and limit
            const offset = (currentPage - 1) * itemsPerPage;
            
            // Build request data
            const requestData = {
                limit: itemsPerPage,
                offset: offset
            };
            // Include "name" in request if searchTerm >= 3
            if (searchTerm.length >= 3) {
                requestData.name = searchTerm;
            }

            $.ajax({
                url: `<?php echo BASE_URL; ?>/categories/fetch`,
                type: 'POST',
                headers: { Authorization: `Bearer ${token}` },
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify(requestData), // Send limit, offset, and name (if any)
                success: (response) => {
                    // Expecting:
                    // {
                    //   "message": "...",
                    //   "data": [...],
                    //   "count_perpage": 10,
                    //   "records": 14
                    // }
                    if (response?.data) {
                        totalItems = response.records;    // total category count
                        populateTable(response.data);     // fill table rows
                        updatePagination();               // rebuild pagination
                    } else {
                        console.error("Unexpected response format:", response);
                    }
                },
                error: (error) => {
                    console.error("Error fetching data:", error);
                }
            });
        };

        // Render categories into table
        const populateTable = (data) => {
            const $tbody = $("#categories-table tbody");
            $tbody.empty();

            if (!data.length) {
                $tbody.append('<tr><td colspan="6" class="text-center">No categories found</td></tr>');
                return;
            }

            // For each category, build a row
            data.forEach((category) => {
                $tbody.append(`
                    <tr>
                        <td class="text-center">
                            <input class="checkbox checkbox-sm" type="checkbox" value="${category.name}">
                        </td>
                        <td>
                            <div class="flex items-center gap-2.5">
                                <div>
                                    <img class="h-9 rounded-full" src="${category.photo ? category.photo : '../../images/default/df001.png'}" />
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">
                                        ${category.name}
                                    </a>
                                    <span class="text-xs text-gray-700 font-normal">
                                        ${category.description ? category.description : 'No description available'}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-sm badge-light badge-outline">
                                ${category.parent_id}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-sm badge-light badge-outline">
                                ${category.custom_sort ? category.custom_sort : 'NA'}
                            </span>
                        </td>
                        <td class="w-[60px]">${generateActionButtons(category)}</td>
                    </tr>
                `);
            });
        };

        // Rebuild pagination buttons
        const updatePagination = () => {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const $pagination = $(".pagination");
            $pagination.empty();

            // Previous button
            if (currentPage > 1) {
                $pagination.append(`<button class="btn btn-sm prev-page" data-page="${currentPage - 1}">Previous</button>`);
            }

            // Page number buttons
            for (let page = 1; page <= totalPages; page++) {
                $pagination.append(`
                    <button 
                        class="btn btn-sm page-number ${page === currentPage ? 'active' : ''}" 
                        data-page="${page}">
                        ${page}
                    </button>
                `);
            }

            // Next button
            if (currentPage < totalPages) {
                $pagination.append(`<button class="btn btn-sm next-page" data-page="${currentPage + 1}">Next</button>`);
            }

            // Show total items
            $("#count-categories").text(`${totalItems} Categories`);
        };

        // Handle pagination clicks (previous, next, or direct page)
        $(".pagination").on("click", "button", function () {
            currentPage = parseInt($(this).data("page"));
            fetchCategories();
        });

        // Handle page-size changes (itemsPerPage)
        $("[data-datatable-size]").on("change", function () {
            itemsPerPage = parseInt($(this).val());
            currentPage = 1;   // Reset to first page
            fetchCategories();
        });

        // Build page-size dropdown
        const $perPageSelect = $("[data-datatable-size]");
        [5, 10, 25, 50, 100].forEach((size) => {
            $perPageSelect.append(`<option value="${size}">${size}</option>`);
        });
        $perPageSelect.val(itemsPerPage);

        // Search input: trigger fetch when 3+ chars typed or cleared
        $searchInput.on("keyup", function () {
            searchTerm = $(this).val().trim();
            currentPage = 1;  // Always reset to page 1 on new search
            fetchCategories();
        });

        // Initial fetch on page load
        fetchCategories();
    });
</script>
<script>
    const generateActionButtons = (category) => {
        return `
            <div class="menu" data-menu="true">
                <div class="menu-item menu-item-dropdown" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                    <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                        <i class="ki-filled ki-dots-vertical">
                        </i>
                    </button>
                    <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true" style="">
                        <div class="menu-item">
                            <a class="menu-link" href="#" data-category-id="${category.id}">
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
                            <a class="menu-link" href="#" data-category-id="${category.id}">
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
                            <a class="menu-link" href="#" data-category-id="${category.id}">
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

<!-- Example snippet inside your HTML -->
<script>
    $(document).ready(function () {
        const token = localStorage.getItem('auth_token');

        // Listen for clicks on the "Remove" link
        $(document).on('click', '.delete-category-btn', function (e) {
            e.preventDefault(); // Prevent navigation

            // Get category ID from data attribute
            const categoryId = $(this).data('category-id');

            // Show SweetAlert2 confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will permanently delete the category.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, send DELETE request
                    $.ajax({
                        url: `<?php echo BASE_URL; ?>/categories/${categoryId}`,
                        type: 'DELETE',
                        headers: {
                            'Authorization': `Bearer ${token}`
                        },
                        success: function (data) {
                            // data = { "message": "Category deleted successfully!" }
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: data.message || 'Category deleted successfully!'
                            }).then(() => {
                                // Optionally refresh/reload categories if needed:
                                // fetchCategories();
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: xhr.responseJSON?.message || 'Unable to delete category.'
                            });
                        }
                    });
                }
            });
        });
    });
</script>

<!-- Footer -->
<?php include("footer1.php"); ?>