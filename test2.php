<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<main class="main about shop_page">
    <div class="page-wrapper">

        <main class="main">

            <!-- ============================= -->
<!-- Your Modified HTML Structure -->
<!-- ============================= -->
<div class="container mb-3">
    <div class="row">
        <div class="col-lg-9 main-content">
            <!-- Toolbox (top filter + sorting) -->
            <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                <div class="toolbox-left">
                    <!-- (Optional) Sorting or any other controls can go here -->
                </div>
                
                <div class="toolbox-right">
                    <!-- Items per page -->
                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>
                        <div class="select-custom">
                            <select name="perpage" class="form-control" id="itemsPerPageSelect">
                                <!-- Will be populated by JS -->
                            </select>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Product Listing -->
            <div class="row" id="products-table">
                <!-- Products will be appended here -->
            </div>

            <!-- Pagination -->
            <nav class="toolbox toolbox-pagination">
                <div class="toolbox-item toolbox-show">
                    <label>Show:</label>
                    <div class="select-custom">
                        <select name="perpage" class="form-control" id="itemsPerPageSelectBottom">
                            <!-- Will be populated by JS -->
                        </select>
                    </div>
                </div>
                <ul class="pagination toolbox-item" id="paginationUl">
                    <!-- Pagination links will be appended here -->
                </ul>
            </nav>
        </div><!-- End .main-content -->

        <!-- SIDEBAR -->
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
            <div class="sidebar-wrapper">
                <!-- ========== VARIANT TYPE FILTER ========== -->
                <div class="widget widget-variant">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-variant" role="button" aria-expanded="true"
                           aria-controls="widget-body-variant">Variant Types</a>
                    </h3>
                    <div class="collapse show" id="widget-body-variant">
                        <div class="widget-body">
                            <ul id="variantTypeFilterList">
                                <!-- Populated by JS with variant types only -->
                            </ul>
                        </div>
                    </div>
                </div><!-- End .widget -->

                <!-- ========== PRICE FILTER ========== -->
                <div class="widget widget-price">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-price" role="button" aria-expanded="true"
                           aria-controls="widget-body-price">Price</a>
                    </h3>
                    <div class="collapse show" id="widget-body-price">
                        <div class="widget-body">
                            <div class="form-group">
                                <label for="minPrice">Min Price</label>
                                <!-- Default value: 500 -->
                                <input type="number" id="minPrice" class="form-control" value="500" />
                            </div>
                            <div class="form-group">
                                <label for="maxPrice">Max Price</label>
                                <!-- Default value: 10000 -->
                                <input type="number" id="maxPrice" class="form-control" value="10000" />
                            </div>
                            <button type="button" class="btn btn-primary" id="priceFilterBtn">Filter</button>
                        </div>
                    </div>
                </div><!-- End .widget -->
            </div>
        </aside><!-- End .sidebar-shop -->
    </div><!-- End .row -->
</div><!-- End .container -->

        </main>
        <script>
    // Global variables
    let itemsPerPage = 10;
    let currentPage  = 1;
    let totalItems   = 0;

    // Filter state object
    const filters = {
        search       : "",           // If your API merges brand/category/product name into 'search'
        price_range  : "",           // We'll store "500k_10000k" (for example) or another format
        variant_type : "",           // We'll store whichever variant type is selected
        limit        : itemsPerPage,
        offset       : 0
    };

    $(document).ready(function() {
        // Populate the items per page dropdown
        populateItemsPerPageSelect([5, 10, 20, 30]);

        // Fetch the distinct variant types
        fetchVariantTypes();

        // Initial fetch of products (unfiltered except default pagination)
        fetchProducts();

        // Handle changing items per page (top & bottom selects)
        $("#itemsPerPageSelect, #itemsPerPageSelectBottom").on("change", function() {
            itemsPerPage = parseInt($(this).val());
            currentPage  = 1;
            fetchProducts();
        });

        // Handle the Price Filter button
        $("#priceFilterBtn").on("click", function() {
            const min = parseInt($("#minPrice").val()) || 0;
            const max = parseInt($("#maxPrice").val()) || 0;
            // If your backend expects "500k_10000k" format, do this:
            filters.price_range = `${min}k_${max}k`;
            // If your backend wants numeric or different format, adapt accordingly.

            currentPage = 1;
            fetchProducts();
        });
    });

    /**
     * Fetch all products based on the filters object and current pagination.
     */
    function fetchProducts() {
        // Update limit & offset in filters
        filters.limit  = itemsPerPage;
        filters.offset = (currentPage - 1) * itemsPerPage;

        $.ajax({
            url: '<?php echo BASE_URL; ?>/products/get_products',
            type: 'POST',
            data: filters,
            success: function(response) {
                if (response && response.data) {
                    totalItems = response.total_records || 0;
                    populateProductGrid(response.data);
                    updatePagination();
                } else {
                    console.error("Unexpected response format:", response);
                }
            },
            error: function(error) {
                console.error("Error fetching products:", error);
            }
        });
    }

    /**
     * Populate the products table (grid) with the returned product data.
     */
    function populateProductGrid(data) {
        const $grid = $("#products-table");
        $grid.empty();

        data.forEach(product => {
            let productImage = (product.image && product.image.length > 0)
                ? product.image[0]
                : "assets/images/placeholder.jpg";

            let regularPrice = product.variants?.[0]?.regular_price || "00";
            let sellingPrice = product.variants?.[0]?.selling_price || "00";
            let productId    = product.variants?.[0]?.product_id || "NA";

            // Example fallback or logic for category-based images
            // (adjust as needed, or remove if not needed)
            let categoryImage = 'assets/images/products/product-1.jpg';

            if (product.category?.id == 1) categoryImage = 'images/f1.png';
            else if (product.category?.id == 2) categoryImage = 'images/f2.png';
            else if (product.category?.id == 3) categoryImage = 'images/f3.png';

            $grid.append(`
                <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                    <div class="product-default inner-quickview inner-icon" id="pro-table">
                        <figure>
                            <a href="javascript:void(0)" onclick="openProductDetail('${productId}')">
                                <img src="${categoryImage}" width="500" height="500" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="#" class="product-category">
                                        ${product.category?.name || "Uncategorized"}
                                    </a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="javascript:void(0)" onclick="openProductDetail('${productId}')">
                                    ${product.name}
                                </a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <span class="old-price">${regularPrice}</span>
                                <span class="product-price">${sellingPrice}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    /**
     * Update pagination links at the bottom of the page.
     */
    function updatePagination() {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const $pagination = $("#paginationUl");
        $pagination.empty();

        if (totalPages <= 1) return;

        // Previous button
        const prevDisabled = (currentPage === 1) ? 'disabled' : '';
        $pagination.append(`
            <li class="page-item ${prevDisabled}">
                <a class="page-link" href="javascript:void(0)" data-page="${currentPage - 1}">
                    Prev
                </a>
            </li>
        `);

        // Page number buttons
        for (let i = 1; i <= totalPages; i++) {
            const activeClass = (i === currentPage) ? 'active' : '';
            $pagination.append(`
                <li class="page-item ${activeClass}">
                    <a class="page-link" href="javascript:void(0)" data-page="${i}">${i}</a>
                </li>
            `);
        }

        // Next button
        const nextDisabled = (currentPage === totalPages) ? 'disabled' : '';
        $pagination.append(`
            <li class="page-item ${nextDisabled}">
                <a class="page-link" href="javascript:void(0)" data-page="${currentPage + 1}">
                    Next
                </a>
            </li>
        `);

        // Handle page click
        $("#paginationUl .page-link").on("click", function() {
            const page = parseInt($(this).data("page"));
            if (!isNaN(page) && page >= 1 && page <= totalPages && page !== currentPage) {
                currentPage = page;
                fetchProducts();
            }
        });
    }

    /**
     * Populate the 'items per page' selects (top and bottom).
     */
    function populateItemsPerPageSelect(options) {
        const $selectTop    = $("#itemsPerPageSelect");
        const $selectBottom = $("#itemsPerPageSelectBottom");

        $selectTop.empty();
        $selectBottom.empty();

        options.forEach(opt => {
            $selectTop.append(`<option value="${opt}">${opt}</option>`);
            $selectBottom.append(`<option value="${opt}">${opt}</option>`);
        });

        // Set default selection
        $selectTop.val(itemsPerPage);
        $selectBottom.val(itemsPerPage);
    }

    /**
     * Fetch the variant types from your API.
     * If your endpoint returns something like:
     * {
     *   "data": [
     *     { "type": "size", "value": "XXL, XL, ..."},
     *     { "type": "color", "value": "red, blue,..."},
     *     ...
     *   ]
     * }
     */
    function fetchVariantTypes() {
        $.ajax({
            url: '<?php echo BASE_URL; ?>/variants',
            type: 'GET',
            success: function(response) {
                if (response && response.data) {
                    // Build a unique list of variant types
                    let variantTypes = [];
                    response.data.forEach(item => {
                        let t = item.type;
                        if (t && !variantTypes.includes(t)) {
                            variantTypes.push(t);
                        }
                    });
                    populateVariantTypeFilter(variantTypes);
                }
            },
            error: function(err) {
                console.error("Error fetching variant types:", err);
            }
        });
    }

    /**
     * Dynamically create the list of variant types for filtering.
     */
    function populateVariantTypeFilter(variantTypes) {
        const $list = $("#variantTypeFilterList");
        $list.empty();

        variantTypes.forEach(type => {
            // Example: just list each variant type as a clickable link
            $list.append(`
                <li>
                    <a href="javascript:void(0)" class="variant-type-link" data-type="${type}">
                        ${type}
                    </a>
                </li>
            `);
        });

        // Handle clicks on any variant type link
        $(".variant-type-link").on("click", function() {
            const selectedType = $(this).data("type");
            filters.variant_type = selectedType; // set the filter
            currentPage = 1;
            fetchProducts();
        });
    }

    /**
     * Example function for opening product detail (stub).
     * Adjust to your actual detail page logic.
     */
    function openProductDetail(productId) {
        alert("Open product detail for Product ID: " + productId);
        // Possibly redirect or open a modal, e.g.:
        // window.location.href = `product-detail.php?id=${productId}`;
    }
</script>

        <script>
            function openProductDetail(productId) {
                window.location.href = 'product_detail.php?id=' + productId;
            }
        </script>
            <!-- End .main -->
        <?php include("footer.php"); ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
</main><!-- End .main -->