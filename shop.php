<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>

<main class="main about shop_page">
    <div class="page-wrapper">

        <main class="main">

            <div class="container mb-3">
                <div class="row">
                    <div class="col-lg-9 main-content shop">
                        <!-- images area -->
                        <div class="image_area">
                            <img class="slide-bg" src="images/categories.png" alt="banner"
                            width="100%">
                        </div>
                        <br><br>
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
                                        <select name="orderby" id="orderby-select" class="form-control">
                                            <option value="">-Select-</option> 
                                            <option value="ascending">low to high</option> 
                                            <option value="descending">high to low</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="perpage" class="form-control" data-datatable-size="true">

                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .toolbox-item -->
                            </div><!-- End .toolbox-right -->
                        </nav>
                        <!-- End Mobile view -->

                        <section class="shop-features-section">
                            <div class="shop-feature-card">
                                <img src="images/Group_19.png" alt="Pan India Delivery">
                                <span>Pan India Delivery</span>
                            </div>
                            <div class="shop-feature-card">
                                <img src="images/Group_20.png" alt="Free Delivery">
                                <span>Free Delivery</span>
                            </div>
                            <div class="shop-feature-card">
                                <img src="images/Group_18.png" alt="Easy Returns">
                                <span>Easy Returns</span>
                            </div>
                            <div class="shop-feature-card">
                                <img src="images/Group_.png" alt="GST Billing">
                                <span>GST Billing</span>
                            </div>
                        </section>


                        <div class="row products_area" id="products-table">
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

                            <script>
                                $(document).ready(function() {
                                    fetchCategories();
                                });
                                // 1. Fetch Categories
                                function fetchCategories() {
                                    $.ajax({
                                        url: '<?php echo BASE_URL; ?>/categories/fetch',
                                        type: 'POST',
                                        success: function(response) {
                                            if (response && response.data) {
                                                populateCategories(response.data);
                                            } else {
                                                console.error("Unexpected categories response format:", response);
                                            }
                                        },
                                        error: function(err) {
                                            console.error("Error fetching categories:", err);
                                        }
                                    });
                                }
                                // 2. Render Categories (with checkboxes) into the sidebar
                                function populateCategories(categories) {
                                    let htmlStr = '';
                                    categories.forEach(category => {
                                        // Example: each category gets a checkbox and a label
                                        htmlStr += `
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="category_list_check" name="category" value="${category.name}">
                                                    <span>${category.name}</span>
                                                </label>
                                            </li>
                                        `;
                                    });
                                    $('#categories-list').html(htmlStr);
                                }
                            </script>
                            <script>
                                $(document).ready(function() {
                                    // If you already have `fetchCategories()` somewhere
                                    fetchCategories();
                                    // 1. Fetch and display brands
                                    fetchBrands();

                                });

                                // -------------------------------------------
                                // 1. Fetch Brands from your API
                                function fetchBrands() {
                                    $.ajax({
                                        url: '<?php echo BASE_URL; ?>/brands/fetch', // Your API endpoint
                                        type: 'POST',
                                        success: function(response) {
                                            if (response && response.data) {
                                                populateBrands(response.data);
                                            } else {
                                                console.error("Unexpected brands response format:", response);
                                            }
                                        },
                                        error: function(err) {
                                            console.error("Error fetching brands:", err);
                                        }
                                    });
                                }
                                // 2. Render the Brands in the Brand widget
                                function populateBrands(brands) {
                                    let htmlStr = '';
                                    brands.forEach(brand => {
                                        htmlStr += `
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="brand" value="${brand.name}">
                                                    <span>${brand.name}</span>
                                                </label>
                                            </li>
                                        `;
                                    });
                                    // Make sure you have something like <ul id="brands-list"> in the Brand widget
                                    $('#brands-list').html(htmlStr);
                                }
                            </script>
                            <!-- Categories Widget -->
                            <div class="widget widget-category wid">
                                <h3 class="widget-title wid_title">
                                    <a data-toggle="collapse" href="#widget-body-categories" role="button" aria-expanded="true"
                                    aria-controls="widget-body-categories">
                                        Categories
                                    </a>
                                </h3>
                                <div class="collapse show" id="widget-body-categories">
                                    <div class="widget-body">
                                        <!-- The list where we'll insert category checkboxes -->
                                        <ul id="categories-list" class="cat-list">
                                            <!-- Dynamically populated via JS -->
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                            <div class="widget widget-brand wid">
                                <h3 class="widget-title wid_title">
                                    <a data-toggle="collapse" href="#widget-body-7" role="button" aria-expanded="true"
                                    aria-controls="widget-body-7">Brand</a>
                                </h3>

                                <div class="collapse show" id="widget-body-7">
                                    <div class="widget-body pb-0">
                                        <!-- Add an empty <ul> with an ID for the brand checkboxes -->
                                        <ul class="cat-list" id="brands-list"></ul>
                                    </div>
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <script>
                                $(document).ready(function() {
                                    // 1. Initialize noUiSlider
                                    const priceSlider = document.getElementById('price-slider');
                                    noUiSlider.create(priceSlider, {
                                        start: [100, 20000],  // Initial slider handles: [min, max]
                                        connect: true,     // Fill the bar between handles
                                        range: {
                                            min: 100,
                                            max: 50000      // Adjust as per your upper price limit
                                        },
                                        step: 100          // Adjust step if you like
                                    });
                                    
                                    // 2. Update the text display whenever slider changes
                                    priceSlider.noUiSlider.on('update', function(values) {
                                        // values = [minValue, maxValue]
                                        const min = parseFloat(values[0]).toFixed(2);
                                        const max = parseFloat(values[1]).toFixed(2);

                                        $('#filter-price-range').text(`Rs.${min} - Rs.${max}`);
                                    });
                                });
                            </script>
                            <div class="widget widget-price wid">
                                <h3 class="widget-title wid_title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                    aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <!-- This is where we'll create the slider -->
                                                <div id="price-slider"></div>
                                            </div>

                                            <div class="filter-price-action">
                                                <div class="filter-price-text">
                                                    Price: <span id="filter-price-range">Rs.0 - Rs.1000</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Get Variant Name -->
                            <script>
                                $(document).ready(function() {
                                    fetchVariants()
                                });
                                function fetchVariants() {
                                    $.ajax({
                                        url: '<?php echo BASE_URL; ?>/products/unique_variant', // GET
                                        type: 'GET',
                                        success: function(response) {
                                            if (response && response.data) {
                                                let htmlStr = '';
                                                // response.data might be ["color", "size", ...]
                                                response.data.forEach(variant => {
                                                    // Create a checkbox for each variant
                                                    htmlStr += `
                                                        <li>
                                                            <label>
                                                                <span>${variant}</span>
                                                                <input type="checkbox" name="variant" value="${variant}">                                                                
                                                            </label>
                                                        </li>
                                                    `;
                                                });
                                                $('#variant-list').html(htmlStr);
                                            } else {
                                                console.error("Unexpected response format for variants:", response);
                                            }
                                        },
                                        error: function(err) {
                                            console.error("Error fetching variants:", err);
                                        }
                                    });
                                }
                            </script>
                            <div class="widget widget-variant wid">
                                <h3 class="widget-title wid_title">
                                    <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
                                    aria-controls="widget-body-5">Variant</a>
                                </h3>

                                <div class="collapse show" id="widget-body-5">
                                    <div class="widget-body">
                                        <!-- We'll populate this UL with variant checkboxes dynamically -->
                                        <ul class="config-size-list" id="variant-list"></ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter Button - triggers product fetching -->
                             <div class="fil">
                                <button id="apply-filters" class="apply_filter">
                                    Apply Filters
                                </button>
                             </div>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
            <div id="flash-message" style="display: none; position: fixed; bottom: -100px; left: 50%; transform: translateX(-50%); 
                background: #b3e3dd; color: #00473E; padding: 14px 24px; border-radius: 8px; font-weight: 500; font-size: 16px;
                box-shadow: 0 6px 16px rgba(0,0,0,0.15); transition: bottom 0.4s ease; z-index: 9999; border: 1px solid 00473E;">
                Item added to cart!
            </div>


        <script>
            $(document).ready(function () {

                // Global or higher scope variables
                let currentPage = 1;
                let itemsPerPage = 10;
                // If you need them for pagination
                let totalItems = 0;

                
                // function fetchProducts() {
                //     const offset = (currentPage - 1) * itemsPerPage;

                //     // 1. Product name search
                //     const searchProduct = $('#search-product-input').val() || '';

                //     // 2. Brand filters
                //     const selectedBrands = [];
                //     $('input[name="brand"]:checked').each(function() {
                //         selectedBrands.push($(this).val());
                //     });
                //     const searchBrand = selectedBrands.join(',');

                //     // 3. Category filters from checkboxes
                //     const selectedCategories = [];
                //     $('input[name="category"]:checked').each(function() {
                //         selectedCategories.push($(this).val());
                //     });

                //     // --- Extract category from URL if exists ---
                //     const urlParams = new URLSearchParams(window.location.search);
                //     const categoryFromURL = urlParams.get('category');

                //     let searchCategory = selectedCategories.join(',');
                //     if (categoryFromURL && !searchCategory) {
                //         searchCategory = categoryFromURL;
                //     }

                //     // 4. Price range slider
                //     const priceSlider = document.getElementById('price-slider');
                //     const sliderValues = priceSlider.noUiSlider.get(); // [min, max]
                //     const minPrice = parseFloat(sliderValues[0]);
                //     const maxPrice = parseFloat(sliderValues[1]);

                //     // 5. Static price range select (optional)
                //     const priceRange = $('#price-range-select').val();

                //     // 6. Sorting option
                //     const orderValue = $('#orderby-select').val();
                //     const orderPrice = orderValue === 'ascending' ? 'Ascending' :
                //                     orderValue === 'descending' ? 'Descending' : '';

                //     // 7. Variant filters
                //     const selectedVariants = [];
                //     $('input[name="variant"]:checked').each(function() {
                //         selectedVariants.push($(this).val());
                //     });
                //     const variantType = selectedVariants.join(',');
                //     const getAuthToken = localStorage.getItem("auth_token");
                //     console.log(getAuthToken);
                //     // ---- AJAX Request ----
                //     $.ajax({
                //         url: '<?php echo BASE_URL; ?>/products/get_products',
                //         type: 'POST',
                //         headers: {
                //             "Content-Type": "application/json",
                //             "Authorization": `Bearer ${getAuthToken}`
                //         }
                //     data: JSON.stringify({
                //             search_product: searchProduct,
                //             search_brand: searchBrand,
                //             search_category: searchCategory,
                //             price_range: priceRange,
                //             limit: itemsPerPage,
                //             offset: offset,
                //             order_price: orderPrice,
                //             min_priceFilter: minPrice,
                //             max_priceFilter: maxPrice,
                //             variant_type: variantType,
                //         }),
                //         success: (response) => {
                //             if (response && response.data) {
                //                 totalItems = response.total_records || 0;
                //                 populateTable(response.data);
                //                 updatePagination();
                //             } else {
                //                 totalItems = 0;
                //                 updatePagination();
                //                 populateTable([]);  // Trigger "Coming Soon!" by passing an empty array
                //             }
                //         },
                //         error: (error) => {
                //             console.error("Error fetching products:", error);
                //         }
                //     });
                // }

                function fetchProducts() {
    const offset = (currentPage - 1) * itemsPerPage;

    // 1. Product name search
    const searchProduct = $('#search-product-input').val() || '';

    // 2. Brand filters
    const selectedBrands = [];
    $('input[name="brand"]:checked').each(function() {
        selectedBrands.push($(this).val());
    });
    const searchBrand = selectedBrands.join(',');

    // 3. Category filters from checkboxes
    const selectedCategories = [];
    $('input[name="category"]:checked').each(function() {
        selectedCategories.push($(this).val());
    });

    // --- Extract category from URL if exists ---
    const urlParams = new URLSearchParams(window.location.search);
    const categoryFromURL = urlParams.get('category');

    let searchCategory = selectedCategories.join(',');
    if (categoryFromURL && !searchCategory) {
        searchCategory = categoryFromURL;
    }

    // 4. Price range slider
    const priceSlider = document.getElementById('price-slider');
    const sliderValues = priceSlider.noUiSlider.get(); // [min, max]
    const minPrice = parseFloat(sliderValues[0]);
    const maxPrice = parseFloat(sliderValues[1]);

    // 5. Static price range select (optional)
    const priceRange = $('#price-range-select').val();

    // 6. Sorting option
    const orderValue = $('#orderby-select').val();
    const orderPrice = orderValue === 'ascending' ? 'Ascending' :
                        orderValue === 'descending' ? 'Descending' : '';

    // 7. Variant filters
    const selectedVariants = [];
    $('input[name="variant"]:checked').each(function() {
        selectedVariants.push($(this).val());
    });
    const variantType = selectedVariants.join(',');

    const getAuthToken = localStorage.getItem("auth_token");
    console.log(getAuthToken);

    // ---- AJAX Request ----
    $.ajax({
        url: '<?php echo BASE_URL; ?>/products/get_products',
        type: 'POST',
        headers: {
            "Content-Type": "application/json",  // Ensuring Content-Type is JSON
            "Authorization": `Bearer ${getAuthToken}`
        },
        data: JSON.stringify({
            search_product: searchProduct,
            search_brand: searchBrand,
            search_category: searchCategory,
            price_range: priceRange,
            limit: itemsPerPage,
            offset: offset,
            order_price: orderPrice,
            min_priceFilter: minPrice,
            max_priceFilter: maxPrice,
            variant_type: variantType,
        }),
        success: (response) => {
            if (response && response.data) {
                totalItems = response.total_records || 0;
                populateTable(response.data);
                updatePagination();
            } else {
                totalItems = 0;
                updatePagination();
                populateTable([]);  // Trigger "Coming Soon!" by passing an empty array
            }
        },
        error: (error) => {
            console.error("Error fetching products:", error);
        }
    });
}


                // When the user clicks "Apply Filters", fetch products again using selected filters
                $('#apply-filters').on('click', function() {
                    currentPage = 1; // reset to first page if needed
                    fetchProducts();
                });
                const populateTable = (data) => {
                    const tbody = $("#products-table");
                    tbody.empty();

                    // Show "Coming Soon!" if no products
                    if (!data || data.length === 0) {
                        tbody.html(`
                            <div class="col-12 text-center comming_soon">
                                <h3 class="text-danger my-5">Coming Soon!</h3>
                            </div>
                        `);
                        return;
                    }
                    const userRole = localStorage.getItem("user_role");

                    data.forEach((product) => {
                        if (!Array.isArray(product.variants)) return;

                        product.variants.forEach((variant) => {
                            let productImage = product.image?.length > 0 
                                ? product.image[0]
                                : "assets/images/placeholder.jpg";

                            let regularPrice = variant.regular_price || "00";
                            let sellingPrice = variant.selling_price || "00";
                            let vendor_price = variant.sales_price_vendor || "00";

                            // Price box
                            let priceSnippet = userRole === "vendor"
                                ? `
                                    <div class="price-box">
                                        <div class="c_price">
                                            <span class="old-price paragraph1">MRP ₹${regularPrice}</span>
                                            <span class="product-price cross paragraph1">MRP ₹${sellingPrice}</span>
                                        </div>
                                        <br>
                                        <div class="sp_price">
                                            Special Price : <span class="special_price">MRP ₹${vendor_price}</span>
                                        </div>
                                    </div>
                                `
                                : `
                                    <div class="price-box">
                                        <div class="c_price">
                                            <span class="old-price paragraph1">MRP ₹${regularPrice}</span>
                                            <span class="product-price paragraph1">MRP ₹${sellingPrice}</span>
                                        </div>
                                        <div class="sp_price none">
                                            Special Price : <span class="special_price paragraph1">MRP ₹${vendor_price}</span>
                                        </div>
                                    </div>
                                `;

                            // Image selection fallback
                            const imageName = variant.file_urls[0] || [];

                            tbody.append(`
                                <div class="col-6 col-sm-4 col-md-3 col-xl-5col shop_products">
                                    <div class="card featured pro-card" id="pro-table" data-product-id="${variant.product_id}">
                                        <div class="card_image">
                                            <img src="images/${imageName}" alt="${variant.variant_value}" class="img-fluid-card" />
                                        </div>
                                        <h4 class="heading4 mbo">${product.category?.name || "Uncategorized"}</h4>
                                        <h4 class="heading2 cardh">
                                            <a href="javascript:void(0)" onclick="openProductDetail('${variant.product_id}')">
                                                ${product.name}
                                            </a>
                                            <span>${variant.variant_value}</span>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        ${priceSnippet}
                                        <div class="cart_view_add">
                                            <a href="javascript:void(0)" onclick="openProductDetail('${variant.product_id}')" class="btn bgremoved view rounded-pill px-4">View Details</a>
                                            <a href="javascript:void(0)" onclick="addToCartFromList(event, '${product.id}', '${variant.id}')" class="btn bgremoved rounded-pill px-4">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    });
                };
                // const populateTable = (data) => {
                //     const tbody = $("#products-table");
                //     tbody.empty();

                //     // Grab role from localStorage
                //     const userRole = localStorage.getItem("user_role");

                //     data.forEach((product) => {
                //         for (let i = 0; i < 4; i++) {  // Repeat 4 times
                //             // Check if the product has an image; otherwise, use a placeholder
                //             let productImage = product.image?.length > 0 
                //                 ? product.image[0] 
                //                 : "assets/images/placeholder.jpg";

                //             // Safely extract prices (default to "00" if unavailable)
                //             let regularPrice = product.variants?.[0]?.regular_price || "00";
                //             let sellingPrice = product.variants?.[0]?.selling_price || "00";
                //             let vendor_price = product.variants?.[0]?.sales_price_vendor || "00";

                //             // Determine which price HTML snippet to use
                //             let priceSnippet = "";
                //             if (userRole === "vendor") {
                //                 priceSnippet = `
                //                     <div class="price-box">
                //                         <div class="c_price">
                //                             <span class="old-price paragraph1">MRP ₹${regularPrice}</span>
                //                             <span class="product-price cross paragraph1">MRP ₹${sellingPrice}</span>
                //                         </div>
                //                         <div class="sp_price">
                //                             Special Price : <span class="special_price">MRP ₹${vendor_price}</span>
                //                         </div>
                //                     </div>
                //                 `;
                //             } else {
                //                 priceSnippet = `
                //                     <div class="price-box">
                //                         <div class="c_price">
                //                             <span class="old-price paragraph1">MRP ₹${regularPrice}</span>
                //                             <span class="product-price paragraph1">MRP ₹${sellingPrice}</span>
                //                         </div>
                //                         <div class="sp_price none">
                //                             Special Price : <span class="special_price paragraph1">MRP ₹${vendor_price}</span>
                //                         </div>
                //                     </div>
                //                 `;
                //             }

                //             // Append the row for each product
                //             tbody.append(`
                //                 <div class="col-6 col-sm-4 col-md-3 col-xl-5col shop_products">
                //                     <div class="card featured pro-card" id="pro-table" data-product-id="${product.variants?.[0]?.product_id || ''}">
                //                         <div class="card_image">
                //                             <img src="${
                //                                     product.variants[0]?.product_id === 14 ? 'images/Natural_Pine.png' :
                //                                     product.category?.id === 1 ? 'images/f1.png' :
                //                                     product.category?.id === 2 ? 'images/f2.png' :
                //                                     product.category?.id === 3 ? 'images/f3.png' :                                                    
                //                                     'assets/images/products/product-1.jpg'
                //                                 }" alt="Product 1" class="img-fluid-card"
                //                             />
                //                         </div>
                //                         <h4 class="heading4 mbo">${product.category?.name || "Uncategorized"}</h4>
                //                         <h4 class="heading2">
                //                             <a href="javascript:void(0)" onclick="openProductDetail('${product.variants[0]?.product_id || "NA"}')">
                //                                 ${product.name}
                //                             </a>
                //                             <span>Ceiling Fan</span>
                //                         </h4>
                //                         <div class="ratings-container">
                //                             <div class="product-ratings">
                //                                 <span class="ratings" style="width:100%"></span>
                //                                 <span class="tooltiptext tooltip-top"></span>
                //                             </div>
                //                         </div>
                //                         ${priceSnippet}
                //                         <div class="cart_view_add">
                //                             <a href="javascript:void(0)" onclick="openProductDetail('${product.variants[0]?.product_id || "NA"}')" class="btn bgremoved view rounded-pill px-4">View Details</a>
                //                             <a href="javascript:void(0)" onclick="addToCartFromList(event, '${product.id}', '${product.variants?.[0]?.id || ''}')" class="btn bgremoved rounded-pill px-4">
                //                                 Add to Cart
                //                             </a>

                //                         </div>
                //                     </div>
                //                 </div>
                //             `);
                //         }
                //     });
                // };
                


                // Attach click handler after rendering
                $('#products-table').on('click', '.pro-card', function (event) {
                    const productId = $(this).data('product-id');

                    // Prevent if clicked inside a link or button
                    const tagName = event.target.tagName.toLowerCase();
                    const isInsideLinkOrButton = $(event.target).closest('a, button').length > 0;

                    if (!isInsideLinkOrButton) {
                        openProductDetail(productId);
                    }
                });

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
                [5, 10, 20, 40, 60, 100].forEach((size) => {
                    perPageSelect.append(`<option value="${size}">${size}</option>`);
                });
                perPageSelect.val(itemsPerPage);

                fetchProducts();
            });
        </script>
        <script>
            function addToCartFromList(event, productId, variantId = null) {
                event.stopPropagation();

                const token = localStorage.getItem("auth_token");
                let tempId  = localStorage.getItem("temp_id");
                const quantity = 1;

                if (!productId) {
                    alert("Product is missing.");
                    return;
                }

                const requestData = {
                    product_id: parseInt(productId),
                    quantity: quantity
                };

                if (variantId) {
                    requestData.variant_id = parseInt(variantId);
                }

                if (!token && tempId) {
                    requestData.cart_id = tempId;
                }

                const ajaxOptions = {
                    url: `<?php echo BASE_URL; ?>/cart/add`,
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(requestData),
                    success: function (data) {
                        if (data.success === true || data.message.includes("successfully")) {
                            if (!token && !tempId && typeof data.data.user_id === "string") {
                                localStorage.setItem("temp_id", data.data.user_id);
                            }
                            showFlashMessage("Item added to cart!");
                            window.location.href = 'cart.php'
                        } else {
                            showFlashMessage("Failed to add to cart", "#ffeaea", "#ff0000");
                        }
                    },
                    error: function (err) {
                        console.error("Add to cart failed:", err);
                        alert("There was an error adding the product to your cart.");
                    }
                };

                if (token) {
                    ajaxOptions.headers = { "Authorization": `Bearer ${token}` };
                }

                $.ajax(ajaxOptions);
            }

            function showFlashMessage(message = "Success!", background = '#b3e3dd', textColor = '#00473E') {
                const flash = document.getElementById("flash-message");

                flash.innerText = message;
                flash.style.background = background;
                flash.style.color = textColor;
                flash.style.bottom = "30px";
                flash.style.display = "block";

                // Hide after 3 seconds
                setTimeout(() => {
                    flash.style.bottom = "-100px";
                    setTimeout(() => {
                        flash.style.display = "none";
                    }, 400);
                }, 3000);
            }
        </script>

        <script>
            function openProductDetail(productId) {
                window.location.href = 'product_detail.php?id=' + productId;
            }
        </script>
        <style>
            .none{
                display:none;
            }
            .product-price {
                color: #495057;
                font-size: 1.5rem;
                line-height: 1;                
            }
            .cross{
                text-decoration: line-through;
            }
            .special_price{
                color: #f0340efa;
                font-size: 2.3rem;
                line-height: 1;
                font-family: 'Barlow Condensed';
            }
            .sp_price{
                font-size: 18px;
                font-family: 'Barlow Condensed';
                font-style: italic;
            }
        </style>
        <!-- End .main -->
        <?php include("footer.php"); ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
</main><!-- End .main -->