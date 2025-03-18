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
                        <h1 class="text-xl font-medium leading-none text-gray-900" id="count-categories">
                            00 Categories
                        </h1>
                        <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                            Overview of all users and Categories.
                        </div>
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
                            Categories
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
                                                            Photo
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
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

        const fetchCategories = () => {
            const offset = (currentPage - 1) * itemsPerPage;

            $.ajax({
                url: `<?php echo BASE_URL; ?>/categories`,
                type: 'GET',
                headers: { Authorization: `Bearer ${token}` },
                success: (response) => {
                    if (response?.data) {
                        totalItems = response.data.length;
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
            const tbody = $("#categories-table tbody");
            tbody.empty();

            if (!data.length) {
                tbody.append('<tr><td colspan="6" class="text-center">No categories found</td></tr>');
                return;
            }

            data.forEach((category) => {
                tbody.append(`
                    <tr>
                        <td class="text-center">
                            <input class="checkbox checkbox-sm" type="checkbox" value="${category.name}">
                        </td>
                        <td>
                            <div class="flex items-center gap-2.5">
                                <div class="">
                                    <img class="h-9 rounded-full" src="${category.photo ? category.photo : 'assets/media/default-category.png'}" />
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
                                ${category.custom_sort}
                            </span>
                        </td>
                        <td class="w-[60px]">${generateActionButtons(category)}</td>
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
                pagination.append(`<button class="btn btn-sm page-number ${page === currentPage ? 'active' : ''}" data-page="${page}">${page}</button>`);
            }
            if (currentPage < totalPages) {
                pagination.append(`<button class="btn btn-sm next-page" data-page="${currentPage + 1}">Next</button>`);
            }
            $("#count-categories").text(`COUNT : ${totalItems} Categories`);
        };

        $(".pagination").on("click", "button", function () {
            currentPage = parseInt($(this).data("page"));
            fetchCategories();
        });

        $("[data-datatable-size]").on("change", function () {
            itemsPerPage = parseInt($(this).val());
            currentPage = 1;
            fetchCategories();
        });

        const perPageSelect = $("[data-datatable-size]");
        [5, 10, 25, 50, 100].forEach((size) => {
            perPageSelect.append(`<option value="${size}">${size}</option>`);
        });
        perPageSelect.val(itemsPerPage);

        fetchCategories();
    });

    const generateActionButtons = (category) => {
        return `
            <div class="menu" data-menu="true">
                <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                    <i class="ki-filled ki-dots-vertical"></i>
                </button>
                <div class="menu-dropdown w-full max-w-[175px]">
                    <a class="menu-link" href="#">
                        <i class="ki-filled ki-search-list"></i> View
                    </a>
                    <div class="menu-separator"></div>
                    <a class="menu-link" href="#">
                        <i class="ki-filled ki-pencil"></i> Edit
                    </a>
                    <div class="menu-separator"></div>
                    <a class="menu-link" href="#">
                        <i class="ki-filled ki-trash"></i> Remove
                    </a>
                </div>
            </div>
        `;
    };
</script>
    <!-- Footer -->
<?php include("footer1.php"); ?>