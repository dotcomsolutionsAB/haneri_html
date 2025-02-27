<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<main class="main about shop_page">
    <div class="page-wrapper">

        <main class="main">

        <!-- ============================= -->
        <!-- Page Container -->
        <!-- ============================= -->
        <div class="container mb-3">
            <div class="row">
                <div class="col-lg-12 main-content">
                    
                    <!-- ========== FILTER TOOLBOX AT TOP ========== -->
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left d-flex flex-wrap align-items-center">
                            
                            <!-- Category Filter (Dropdown) -->
                            <div class="toolbox-item mr-2">
                                <label for="categorySelect">Category:</label>
                                <select id="categorySelect" class="form-control">
                                    <option value="">All Categories</option>
                                    <!-- Populated by JS -->
                                </select>
                            </div>

                            <!-- Brand Filter (Dropdown) -->
                            <div class="toolbox-item mr-2">
                                <label for="brandSelect">Brand:</label>
                                <select id="brandSelect" class="form-control">
                                    <option value="">All Brands</option>
                                    <!-- Populated by JS -->
                                </select>
                            </div>

                            <!-- Variant Type Filter (Dropdown) -->
                            <div class="toolbox-item mr-2">
                                <label for="variantSelect">Variant:</label>
                                <select id="variantSelect" class="form-control">
                                    <option value="">All Variants</option>
                                    <!-- Populated by JS -->
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class="toolbox-item mr-2">
                                <label for="minPrice">Min Price:</label>
                                <input type="number" id="minPrice" class="form-control" value="500" style="width:100px"/>
                            </div>
                            <div class="toolbox-item mr-2">
                                <label for="maxPrice">Max Price:</label>
                                <input type="number" id="maxPrice" class="form-control" value="10000" style="width:100px"/>
                            </div>

                            <!-- Filter Button -->
                            <div class="toolbox-item">
                                <button type="button" id="applyFilterBtn" class="btn btn-primary">
                                    Filter
                                </button>
                            </div>
                        </div>
                        
                        <!-- Items per page (on the right) -->
                        <div class="toolbox-right d-flex align-items-center">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>
                                <div class="select-custom">
                                    <select name="perpage" class="form-control" id="itemsPerPageSelect">
                                        <!-- Populated by JS -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- Product Listing -->
                    <div class="row mt-3" id="products-table">
                        <!-- Products appended here -->
                    </div>

                    <!-- Pagination -->
                    <nav class="toolbox toolbox-pagination">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>
                            <div class="select-custom">
                                <select name="perpage" class="form-control" id="itemsPerPageSelectBottom">
                                    <!-- Populated by JS -->
                                </select>
                            </div>
                        </div>
                        <ul class="pagination toolbox-item" id="paginationUl">
                            <!-- Pagination links appended here -->
                        </ul>
                    </nav>
                </div><!-- End .main-content -->
            </div><!-- End .row -->
        </div><!-- End .container -->


        </main>
<script>
    // Global variables for pagination
    let itemsPerPage = 10;
    let currentPage  = 1;
    let totalItems   = 0;

    // We'll store the filters in this object:
    const filters = {
        // "search": "",            // If needed, but not using a text search here
        "category": "",             // Will store selected category name or ID
        "brand": "",                // Will store selected brand name or ID
        "variant_type": "",         // Will store selected variant type
        "price_range": "",          // e.g., "500k_10000k"
        "limit": itemsPerPage,
        "offset": 0
    };

    $(document).ready(function() {
        // 1. Populate Items-Per-Page select
        populateItemsPerPageSelect([5, 10, 20, 30]);

        // 2. Fetch categories, brands, and variant types to populate the dropdowns
        fetchCategories();
        fetchBrands();
        fetchVariantTypes();

        // 3. Initial product load (with default filters)
        fetchProducts();

        // 4. When user changes items-per-page, update and re-fetch
        $("#itemsPerPageSelect, #itemsPerPageSelectBottom").on("change", function() {
            itemsPerPage = parseInt($(this).val());
            currentPage = 1;
            fetchProducts();
        });

        // 5. When user clicks the "Filter" button, gather selections & re-fetch
        $("#applyFilterBtn").on("click", function() {
            // Build the price_range string (if your API expects "500k_10000k")
            const min = parseInt($("#minPrice").val()) || 0;
            const max = parseInt($("#maxPrice").val()) || 0;
            filters.price_range = `${min}k_${max}k`;

            // Category & Brand: might be ID or name, depending on your API
            filters.category = $("#categorySelect").val() || "";
            filters.brand    = $("#brandSelect").val() || "";

            // Variant Type
            filters.variant_type = $("#variantSelect").val() || "";

            // Reset to page 1
            currentPage = 1;
            fetchProducts();
        });
    });

    /**
     * MAIN FUNCTION: fetchProducts
     * Sends a POST request to your backend with the filters.
     */
    function fetchProducts() {
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
     * Populate the product grid area (#products-table).
     */
    function populateProductGrid(data) {
        const $grid = $("#products-table");
        $grid.empty();

        data.forEach(product => {
            // Fallback image
            let productImage = (product.image && product.image.length > 0)
                ? product.image[0]
                : "assets/images/placeholder.jpg";

            let regularPrice = product.variants?.[0]?.regular_price || "00";
            let sellingPrice = product.variants?.[0]?.selling_price || "00";
            let productId    = product.variants?.[0]?.product_id || "NA";

            // Example for category-based images (adjust or remove if not needed)
            let categoryImage = 'assets/images/products/product-1.jpg';
            if (product.category?.id == 1) categoryImage = 'images/f1.png';
            else if (product.category?.id == 2) categoryImage = 'images/f2.png';
            else if (product.category?.id == 3) categoryImage = 'images/f3.png';

            $grid.append(`
                <div class="col-6 col-sm-4 col-md-3 col-xl-3">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="javascript:void(0)" onclick="openProductDetail('${productId}')">
                                <img src="${categoryImage}" alt="product" />
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
     * Update pagination based on totalItems and currentPage.
     */
    function updatePagination() {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const $pagination = $("#paginationUl");
        $pagination.empty();

        if (totalPages <= 1) return;

        // Prev button
        const prevDisabled = (currentPage === 1) ? 'disabled' : '';
        $pagination.append(`
            <li class="page-item ${prevDisabled}">
                <a class="page-link" href="javascript:void(0)" data-page="${currentPage - 1}">Prev</a>
            </li>
        `);

        for (let i = 1; i <= totalPages; i++) {
            const active = (i === currentPage) ? 'active' : '';
            $pagination.append(`
                <li class="page-item ${active}">
                    <a class="page-link" href="javascript:void(0)" data-page="${i}">
                        ${i}
                    </a>
                </li>
            `);
        }

        // Next button
        const nextDisabled = (currentPage === totalPages) ? 'disabled' : '';
        $pagination.append(`
            <li class="page-item ${nextDisabled}">
                <a class="page-link" href="javascript:void(0)" data-page="${currentPage + 1}">Next</a>
            </li>
        `);

        // Handle clicks
        $("#paginationUl .page-link").on("click", function() {
            const page = parseInt($(this).data("page"));
            if (!isNaN(page) && page >= 1 && page <= totalPages && page !== currentPage) {
                currentPage = page;
                fetchProducts();
            }
        });
    }

    /**
     * Populate the items-per-page selects (top & bottom).
     */
    function populateItemsPerPageSelect(options) {
        const $top    = $("#itemsPerPageSelect");
        const $bottom = $("#itemsPerPageSelectBottom");

        $top.empty();
        $bottom.empty();

        options.forEach(opt => {
            $top.append(`<option value="${opt}">${opt}</option>`);
            $bottom.append(`<option value="${opt}">${opt}</option>`);
        });

        // Set default
        $top.val(itemsPerPage);
        $bottom.val(itemsPerPage);
    }

    /**
     * FETCH CATEGORIES
     * Adjust if your API returns different fields, e.g.:
     * {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Ceiling Fans",
     *       ...
     *     }, ...
     *   ]
     * }
     */
    function fetchCategories() {
        $.ajax({
            url: '<?php echo BASE_URL; ?>/categories',
            type: 'GET',
            success: function(response) {
                if (response && response.data) {
                    populateCategorySelect(response.data);
                }
            },
            error: function(err) {
                console.error("Error fetching categories:", err);
            }
        });
    }

    function populateCategorySelect(categories) {
        const $select = $("#categorySelect");
        // Start by preserving the first <option value="">All Categories</option>
        // Then append each category.
        categories.forEach(cat => {
            // If your API provides an `id`, consider using `value="${cat.id}"`
            // or if it expects category name in "search", use `cat.name`.
            $select.append(`
                <option value="${cat.name}">${cat.name}</option>
            `);
        });
    }

    /**
     * FETCH BRANDS
     * Example response:
     * {
     *   "data": [
     *     { "id": 1, "name": "Haneri", ... },
     *     ...
     *   ]
     * }
     */
    function fetchBrands() {
        $.ajax({
            url: '<?php echo BASE_URL; ?>/brands',
            type: 'GET',
            success: function(response) {
                if (response && response.data) {
                    populateBrandSelect(response.data);
                }
            },
            error: function(err) {
                console.error("Error fetching brands:", err);
            }
        });
    }

    function populateBrandSelect(brands) {
        const $select = $("#brandSelect");
        brands.forEach(b => {
            $select.append(`<option value="${b.name}">${b.name}</option>`);
        });
    }

    /**
     * FETCH VARIANT TYPES
     * Example response:
     * {
     *   "data": [
     *     { "type": "size",  "value": "XXL,XL,L,M,S" },
     *     { "type": "color", "value": "red,blue,..." },
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
                    const variantTypes = [];
                    response.data.forEach(item => {
                        // Add only the unique "type"
                        if (item.type && !variantTypes.includes(item.type)) {
                            variantTypes.push(item.type);
                        }
                    });
                    populateVariantSelect(variantTypes);
                }
            },
            error: function(err) {
                console.error("Error fetching variant types:", err);
            }
        });
    }

    function populateVariantSelect(types) {
        const $select = $("#variantSelect");
        types.forEach(t => {
            $select.append(`<option value="${t}">${t}</option>`);
        });
    }

    /**
     * Example function to open product detail or do something else.
     */
    function openProductDetail(productId) {
        alert("Open product detail for product ID: " + productId);
        // e.g., window.location.href = "product_detail.php?id=" + productId;
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