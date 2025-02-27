<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<main class="main about shop_page">
    <div class="page-wrapper">

        <main class="main">

            <div class="container mb-3">
                <div class="row">
                    <div class="col-lg-9 main-content">
                        <!-- For Mobile And Desktop View -->
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="https://haneri.ongoingsites.xyz/domex" class="sidebar-toggle">
                                    <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                        <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                        <path
                                            d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                        <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                        <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                        <path
                                            d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                    </svg>
                                    <span>Filter</span>
                                </a>

                                <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div><!-- End .select-custom -->


                                </div><!-- End .toolbox-item -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="perpage" class="form-control" data-datatable-size="true">

                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div><!-- End .layout-modes -->
                            </div><!-- End .toolbox-right -->
                        </nav>
                        <!-- End Mobile view -->

                        <div class="row" id="products-table">
                            <!-- products showing here  -->
                        </div>

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="perpage" class="form-control" data-datatable-size="true">
                                        <!-- options for each page count product -->
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                
                            </ul>
                        </nav>
                    </div><!-- End .main-content -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                        aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-category-1" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-1">
                                                    Accessories<span class="products-count">(3)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-1">
                                                    <ul class="cat-sublist">
                                                        <li>Caps<span class="products-count">(1)</span></li>
                                                        <li>Watches<span class="products-count">(2)</span></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#widget-category-2" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-2">
                                                    Electronics<span class="products-count">(4)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-2">
                                                    <ul class="cat-sublist">
                                                        <li>Shoes<span class="products-count">(4)</span></li>
                                                        <li>Bag<span class="products-count">(2)</span></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-price">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                        aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0%, 0px) scale(1, 1);"></div></div><div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="90.0" aria-valuenow="0.0" aria-valuetext="0.00"></div></div><div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="10.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="1000.00"></div></div></div></div><!-- End #price-slider -->
                                            </div><!-- End .price-slider-wrapper -->

                                            <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range">$0 - $1000</span>
                                                </div><!-- End .filter-price-text -->

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div><!-- End .filter-price-action -->
                                        </form>
                                    </div>
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-color">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true"
                                        aria-controls="widget-body-6">Color</a>
                                </h3>

                                <div class="collapse show" id="widget-body-6">
                                    <div class="widget-body">
                                        <ul class="config-swatch-list flex-column">
                                            <li class="active">
                                                <a href="#" style="background-color: #dda756;"></a>
                                                <span>Brown</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #7bbad1;"></a>
                                                <span>Light-Blue</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #81d742;"></a>
                                                <span>Green</span>
                                            </li>                                            
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-size">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
                                        aria-controls="widget-body-5">Size</a>
                                </h3>

                                <div class="collapse show" id="widget-body-5">
                                    <div class="widget-body">
                                        <ul class="config-size-list">
                                            <li class="active"><a href="#">XL</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">S</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-brand">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-7" role="button" aria-expanded="true"
                                        aria-controls="widget-body-7">Brand</a>
                                </h3>

                                <div class="collapse show" id="widget-body-7">
                                    <div class="widget-body pb-0">
                                        <ul class="cat-list">
                                            <li><a href="#">Haneri</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
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