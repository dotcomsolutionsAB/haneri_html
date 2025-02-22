<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="https://haneri.ongoingsites.xyz/domex">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Domex</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="containe text-left">
        <h1 class="text-uppercase about_section">Domex</h1>
    </div>
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
                                            <!-- <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option> -->
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
                                            <li>
                                                <a href="#widget-category-3" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-3">
                                                    Fashion<span class="products-count">(2)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-3">
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
                                                <div id="price-slider"></div><!-- End https://haneri.ongoingsites.xyz/domexprice-slider -->
                                            </div><!-- End .price-slider-wrapper -->

                                            <div
                                                class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range"></span>
                                                </div><!-- End .filter-price-text -->

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div><!-- End .filter-price-action -->
                                        </form>
                                    </div><!-- End .widget-body -->
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
                                            <li>
                                                <a href="#" style="background-color: #6085a5;"></a>
                                                <span>Indego</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #333;"></a>
                                                <span>Black</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #0188cc;"></a>
                                                <span>Blue</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #ab6e6e;"></a>
                                                <span>Red</span>
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
                                            <li><a href="#">Adidas</a></li>
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
            $(document).ready(function () {
                // const token = localStorage.getItem('auth_token');

                let itemsPerPage = 10; // Default items per page
                let currentPage = 1; // Current page number
                let totalItems = 0; // Total items from API response

                const fetchProducts = () => {
                    const offset = (currentPage - 1) * itemsPerPage;

                    $.ajax({
                        url: '<?php echo BASE_URL; ?>/products/get_products',
                        type: 'POST',
                        // headers: { Authorization: `Bearer ${token}` },
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
                    const tbody = $("#products-table");
                    tbody.empty();

                    data.forEach((product) => {
                        // Check if the product has an image, otherwise use a placeholder
                            let productImage = product.image.length > 0 ? product.image[0] : "assets/images/placeholder.jpg";

                            // Ensure variants exist before accessing them
                            let regularPrice = product.variants?.[0]?.regular_price || "00";
                            let sellingPrice = product.variants?.[0]?.selling_price || "00";

                        // Append a single row for each product
                        tbody.append(`
                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col" >
                                <div class="product-default inner-quickview inner-icon" id="pro-table">
                                    <figure>
                                        <a href="javascript:void(0)" onclick="openProductDetail('${product.variants[0]?.product_id || "NA"}')">
                                            <img src="assets/images/products/product-1.jpg" width="500"
                                                height="500" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="https://haneri.ongoingsites.xyz/domex" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="javascript:void(0)" onclick="openProductDetail('${product.variants[0]?.product_id || "NA"}')""
                                            title="Quick View">Quick
                                            View</a>
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
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div>
                                        <div class="price-box">
                                            <span class="old-price">${sellingPrice}</span>
                                            <span class="product-price">${regularPrice}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                };

                // function openProductDetail(productId) {
                //     window.location.href = 'product_detail.php?id=' + productId;
                // }

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