<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>

<?php 
    $current_page = "Show Discounts"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                            Discounts
                        </h1>
                        <!-- <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                            Overview of all users and Categories.
                        </div> -->
                    </div>
                    <div class="flex items-center gap-2.5">
                        <!-- <a class="btn btn-sm btn-light" href="#">
                            Import Categories
                        </a> -->
                        <a class="btn btn-sm btn-primary" href="pages/add_discount.php">
                            Add Discounts
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
                                Overview of <span id="count-discounts">00</span>
                            </h3>
                            <div class="flex gap-6">
                                <div class="relative">
                                    <i class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                    </i>
                                    <input class="input input-sm pl-8" data-datatable-search="#discount_table"
                                        placeholder="Search Discounts By User Name" type="text" />
                                </div>
                                <label class="switch switch-sm">
                                    <input class="order-2" name="check" type="checkbox" value="1" />
                                    <span class="switch-label order-1">
                                        Active Discounts
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-datatable="true" data-datatable-page-size="10">
                                <div class="scrollable-x-auto">
                                    <table class="table table-border" data-datatable-table="true" id="discount-table">
                                        <thead>
                                            <tr>
                                                <th class="w-[60px] text-center">
                                                    <input class="checkbox checkbox-sm" data-datatable-check="true"
                                                        type="checkbox" />
                                                </th>
                                                <th class="min-w-[300px]">
                                                    <span class="sort asc">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            User Name
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="text-gray-700 font-normal min-w-[220px]">
                                                    Product-Variant
                                                </th>
                                                <th class="text-gray-700 font-normal min-w-[220px]">
                                                    Category
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Discount
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

        const $searchInput = $("input[data-datatable-search=\"#discount_table\"]");

        // Function to fetch categories from the server
        const fetchDiscounts = () => {
            // Calculate offset based on page number and limit
            const offset = (currentPage - 1) * itemsPerPage;
            
            // Build request data
            const requestData = {
                limit: itemsPerPage,
                offset: offset
            };
            // Include "name" in request if searchTerm >= 3
            if (searchTerm.length >= 3) {
                requestData.user_name = searchTerm;
            }

            $.ajax({
                url: `<?php echo BASE_URL; ?>/discount/fetch`,
                type: 'POST',
                headers: { Authorization: `Bearer ${token}` },
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify(requestData), // Send limit, offset, and name (if any)
                success: (response) => {
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
            const $tbody = $("#discount-table tbody");
            $tbody.empty();

            if (!data.length) {
                $tbody.append('<tr><td colspan="6" class="text-center">No Discounts found</td></tr>');
                return;
            }

            // For each category, build a row
            data.forEach((discount) => {
                $tbody.append(`
                    <tr>
                        <td class="text-center">
                            <input class="checkbox checkbox-sm" type="checkbox" value="${discount.id}">
                        </td>
                        <td>
                            <div class="flex items-center gap-2.5">
                                <div>
                                    <img class="h-9 rounded-full" src="${discount.photo ? discount.photo : '../../images/default/df001.png'}" />
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary" href="#">
                                        ${discount.user?.name}
                                    </a>
                                    <span class="text-xs text-gray-700 font-normal">
                                        ${discount.user?.email ? discount.user?.email : 'No Email'}
                                    </span>
                                    <span class="badge badge-sm badge-light badge-outline">
                                       Role : ${discount.user?.role ? discount.user?.role : 'No Role Selected'}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-sm badge-light badge-outline">
                                ${discount.product_variant?.product.name} - ${discount.product_variant?.variant_value}
                            </span>
                        </td>
                        <td>
                            ${discount.category?.name ? discount.category?.name : 'No Category'} 
                        </td>
                        <td>
                            <span class="badge badge-sm badge-light badge-outline">
                                ${discount.discount ? discount.discount : 'NA'} %
                            </span>
                        </td>
                        <td class="w-[60px]">${generateActionButtons(discount)}</td>
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
            $("#count-discounts").text(`${totalItems} Discounts`);
        };

        // Handle pagination clicks (previous, next, or direct page)
        $(".pagination").on("click", "button", function () {
            currentPage = parseInt($(this).data("page"));
            fetchDiscounts();
        });

        // Handle page-size changes (itemsPerPage)
        $("[data-datatable-size]").on("change", function () {
            itemsPerPage = parseInt($(this).val());
            currentPage = 1;   // Reset to first page
            fetchDiscounts();
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
            fetchDiscounts();
        });

        // Initial fetch on page load
        fetchDiscounts();
    });
</script>

<script>
    // This function generates the action buttons in your table
    const generateActionButtons = (discount) => {
        return `
            <div class="menu" data-menu="true">
                <div class="menu-item menu-item-dropdown" data-menu-item-offset="0, 10px"
                     data-menu-item-placement="bottom-end" data-menu-item-placement-rtl="bottom-start"
                     data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                    <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                        <i class="ki-filled ki-dots-vertical"></i>
                    </button>
                    <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                        
                        <div class="menu-item">
                            <a class="menu-link" href="#" data-discount-id="${discount.id}">
                                <span class="menu-icon">
                                    <i class="ki-filled ki-search-list"></i>
                                </span>
                                <span class="menu-title">
                                    View
                                </span>
                            </a>
                        </div>

                        <div class="menu-separator"></div>

                        <div class="menu-item">
                            <a class="menu-link edit-discount-btn" href="#" data-discount-id="${discount.product_variant.product.name}">
                                <span class="menu-icon"><i class="ki-filled ki-pencil"></i></span>
                                <span class="menu-title">Edit</span>
                            </a>
                        </div>

                        <div class="menu-separator"></div>

                        <!-- REMOVE -->
                        <div class="menu-item">
                            <a class="menu-link delete-discount-btn" href="#" data-discount-id="${discount.id}">
                                <span class="menu-icon">
                                    <i class="ki-filled ki-trash"></i>
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

<!-- DELETE Operation -->
<script>
    $(document).ready(function () {
        const token = localStorage.getItem('auth_token');

        // Listen for clicks on elements with .delete-category-btn
        $(document).on('click', '.delete-category-btn', function (e) {
            e.preventDefault(); // Prevent link navigation

            // Get category ID from data attribute
            const categoryId = $(this).data('discount-id');

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
                                fetchDiscounts();
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

<!-- UPDATE Operation -->
<!-- Custom styling for SweetAlert2 popup -->
<style>
  .swal2-my-small-popup {
    font-size: 0.85rem;      /* smaller text */
    line-height: 1.2;        /* tighter line spacing */
    /* We do NOT reduce width here, so default or custom width remains. */
    /* If you want to reduce width, set max-width here, e.g.: max-width: 600px; */
  }
  /* Forces the popup to be wider and reduces height/spacing */
  .swal2-wide-and-short {
    width: 700px !important;       /* Increase overall width */
    max-width: none !important;    /* Disable default max-width constraints */
    padding: 20px 30px !important; /* Adjust padding as needed */
  }

  /* Adjusts spacing between the HTML content and the action buttons */
  .swal2-wide-and-short .swal2-html-container {
    margin: 10px 0 !important;
  }
  
  /* Each label + input on one horizontal line */
  .swal2-field-row {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    justify-content: flex-start;
  }
  
  /* Label styling (fixed width to keep inputs aligned) */
  .swal2-field-row label {
    width: 130px;        /* Adjust as needed */
    margin-right: 10px;  /* Space between label and input */
    font-size: 0.9rem;   /* Slightly smaller text if desired */
  }

  /* Inputs occupy remaining space on the same row */
  .swal2-field-row input,
  .swal2-field-row textarea {
    flex: 1;               /* Fill remaining row width */
    margin: 0 !important;  /* Remove default SweetAlert margins */
    font-size: 0.9rem;     /* Match label size if you want */
  }

  /* Optional: reduce spacing on the "Update" and "Cancel" buttons area */
  .swal2-wide-and-short .swal2-actions {
    margin-top: 12px !important;
  }
</style>

<script>
    $(document).ready(function() {
        const token = localStorage.getItem('auth_token');

        // Listen for "Edit" link clicks (where data-discount-id holds the category's NAME)
        $(document).on('click', '.edit-discount-btn', function(e) {
            e.preventDefault();

            const discountProductName = $(this).data('discount-id');
            if (!discountProductName) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No Discount name found.'
                });
                return;
            }

            // Fetch the category by name
            $.ajax({
                url: `<?php echo BASE_URL; ?>/discount/fetch`,
                type: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({ product_name: discountProductName }),
                success: function (response) {
                    // Expecting { data: [ ... ], message: "...", records: ... }
                    if (response?.data && response.data.length > 0) {
                        const discountItem = response.data; // Use the first match
                        openEditDiscountPopup(discountItem);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Not Found',
                            text: `No Discount found with name: ${discountProductName}`
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Unable to fetch category.'
                    });
                }
            });
        });

        // Open SweetAlert2 with smaller font, labels, etc.
        function openEditDiscountPopup(discountData) {
            Swal.fire({
                title: 'Edit Category',
                // Use our custom class to reduce font size (except width)
                customClass: {
                popup: 'swal2-my-small-popup'
                },
                // Build the popup HTML with labels
                html: `
                    <div class="swal2-field-row">
                        <label for="swal-cat-name">User ID</label>
                        <input id="swal-cat-name" type="text" value="${discountData.user_id || null }" readonly>
                    </div>
                    
                    <div class="swal2-field-row">
                        <label for="swal-cat-parent">Variant ID</label>
                        <input id="swal-cat-parent" type="text" value="${discountData.product_variant_id || null }" readonly>
                    </div>
                    
                   
                    
                    <div class="swal2-field-row">
                        <label for="swal-cat-sort">Product</label>
                        <input id="swal-cat-sort" type="number" value="${discountData.product_variant.products.name || null }" readonly>
                    </div>

                    <div class="swal2-field-row">
                        <label for="swal-cat-sort">Variant</label>
                        <input id="swal-cat-sort" type="number" value="${discountData.product_variant.variant_value || null }" readonly>
                    </div>
                    
                    <div class="swal2-field-row">
                        <label for="swal-cat-description">Discount</label>
                        <textarea id="swal-cat-description">${discountData.discount || ''}%</textarea>
                    </div>
                `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Update',
                // Collect values before closing
                preConfirm: () => {
                    const name = document.getElementById('swal-cat-name').value.trim();
                    const parent_id = document.getElementById('swal-cat-parent').value.trim() || null;
                    const photo = document.getElementById('swal-cat-photo').value.trim() || null;
                    const custom_sort = document.getElementById('swal-cat-sort').value.trim() || 0;
                    const description = document.getElementById('swal-cat-description').value.trim() || null;
                    return { name, parent_id, photo, custom_sort, description };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // You said you are updating via /products/:id
                    // We use discountData.id from the fetch
                    updateCategoryViaProductsApi(discountData.id, result.value);
                }
            });
        }

        // PUT request to /products/:id (with the new data)
        function updateCategoryViaProductsApi(categoryId, payload) {
            $.ajax({
                url: `<?php echo BASE_URL; ?>/categories/${categoryId}`,
                type: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify(payload),
                success: function (data) {
                    // Example: { "message": "Category updated successfully!" }
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || 'Category updated successfully!'
                    }).then(() => {
                        // Optionally refresh your categories table/list:
                        fetchDiscounts();
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Unable to update category.'
                    });
                }
            });
        }
    });
</script>

<!-- Footer -->
<?php include("footer1.php"); ?>