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
                        <div class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Category:</label>
                                <select id="categoryFilter" class="form-control"></select>
                            </div>
                            
                            <div class="toolbox-item toolbox-show">
                                <label>Brand:</label>
                                <select id="brandFilter" class="form-control"></select>
                            </div>

                            <div class="toolbox-item toolbox-show">
                                <label>Price Range:</label>
                                <select id="priceFilter" class="form-control">
                                    <option value="">All Prices</option>
                                    <option value="0_5000">Under 5000</option>
                                    <option value="5000_10000">5000 - 10000</option>
                                    <option value="10000_25000">10k - 25k</option>
                                    <option value="25000_50000">25k - 50k</option>
                                    <option value="50000_100000">50k - 1 Lakh</option>
                                </select>
                            </div>

                            <div class="toolbox-item toolbox-show">
                                <label>Size:</label>
                                <select id="sizeFilter" class="form-control"></select>
                            </div>

                            <div class="toolbox-item toolbox-show">
                                <label>Color:</label>
                                <select id="colorFilter" class="form-control"></select>
                            </div>

                            <div class="toolbox-item">
                                <button class="btn btn-primary" onclick="fetchProducts()">Apply Filters</button>
                            </div>
                        </div>
                    </aside>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main>
        <script>
            $(document).ready(function () {
                const token = localStorage.getItem('auth_token');

                let itemsPerPage = 10; // Default items per page
                let currentPage = 1; // Current page number
                let totalItems = 0; // Total items from API response

                $(document).ready(() => {
                    loadFilters(); // Load categories, brands, and variants
                    fetchProducts(); // Fetch initial product list

                    // Apply filter on change
                    $("#categoryFilter, #brandFilter, #priceFilter, #sizeFilter, #colorFilter").change(fetchProducts);
                });

                const loadFilters = () => {
                    // Fetch Categories
                    $.get("<?php echo BASE_URL; ?>/categories", (response) => {
                        if (response.data) {
                            let categoryOptions = `<option value="">All Categories</option>`;
                            response.data.forEach(category => {
                                categoryOptions += `<option value="${category.name}">${category.name}</option>`;
                            });
                            $("#categoryFilter").html(categoryOptions);
                        }
                    });

                    // Fetch Brands
                    $.get("<?php echo BASE_URL; ?>/brands", (response) => {
                        if (response.data) {
                            let brandOptions = `<option value="">All Brands</option>`;
                            response.data.forEach(brand => {
                                brandOptions += `<option value="${brand.name}">${brand.name}</option>`;
                            });
                            $("#brandFilter").html(brandOptions);
                        }
                    });

                    // Fetch Variant Types (Size & Color)
                    $.get("<?php echo BASE_URL; ?>/variants", (response) => {
                        if (response.data) {
                            let sizeOptions = `<option value="">All Sizes</option>`;
                            let colorOptions = `<option value="">All Colors</option>`;

                            response.data.forEach(variant => {
                                if (variant.type === "size") {
                                    variant.value.split(", ").forEach(size => {
                                        sizeOptions += `<option value="${size}">${size}</option>`;
                                    });
                                } else if (variant.type === "color") {
                                    variant.value.split(", ").forEach(color => {
                                        colorOptions += `<option value="${color}">${color}</option>`;
                                    });
                                }
                            });

                            $("#sizeFilter").html(sizeOptions);
                            $("#colorFilter").html(colorOptions);
                        }
                    });
                };

                const fetchProducts = () => {
                    const offset = (currentPage - 1) * itemsPerPage;

                    let filters = {
                        search: $("#searchInput").val() || "",
                        limit: itemsPerPage,
                        offset: offset,
                        price_range: $("#priceFilter").val(),
                        category: $("#categoryFilter").val(),
                        brand: $("#brandFilter").val(),
                        variant_type: $("#sizeFilter").val() || $("#colorFilter").val()
                    };

                    $.ajax({
                        url: '<?php echo BASE_URL; ?>/products/get_products',
                        type: 'POST',
                        data: filters,
                        success: (response) => {
                            if (response && response.data) {
                                totalItems = response.total_records;
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
                    const tbody = $("#products-table");
                    tbody.empty();

                    data.forEach((product) => {
                        let productImage = product.image.length > 0 ? product.image[0] : "assets/images/placeholder.jpg";
                        let regularPrice = product.variants?.[0]?.regular_price || "00";
                        let sellingPrice = product.variants?.[0]?.selling_price || "00";

                        tbody.append(`
                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="javascript:void(0)" onclick="openProductDetail('${product.variants[0]?.product_id || "NA"}')">
                                            <img src="${productImage}" width="500" height="500" alt="product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#" class="product-category">${product.category?.name || "Uncategorized"}</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="javascript:void(0)" onclick="openProductDetail('${product.variants[0]?.product_id || "NA"}')">${product.name}</a>
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
                };

                const updatePagination = () => {
                    const totalPages = Math.ceil(totalItems / itemsPerPage);
                    const pagination = $(".pagination");
                    pagination.empty();

                    if (currentPage > 1) {
                        pagination.append(`<button class="page-link pagi" data-page="${currentPage - 1}">Previous</button>`);
                    }

                    for (let page = 1; page <= totalPages; page++) {
                        const isActive = page === currentPage ? "active" : "";
                        pagination.append(`<button class="page-link pagi ${isActive}" data-page="${page}">${page}</button>`);
                    }

                    if (currentPage < totalPages) {
                        pagination.append(`<button class="page-link pagi" data-page="${currentPage + 1}">Next</button>`);
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
                [10, 20, 40, 60, 100].forEach((size) => {
                    perPageSelect.append(`<option value="${size}">${size}</option>`);
                });
                perPageSelect.val(itemsPerPage);

                fetchProducts();
            });
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