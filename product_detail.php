<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<!-- <style>
    .variants{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .variant{
        background: #222529;
        width: fit-content;
        padding: 0px 10px;
        height: fit-content;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .variant p{
        padding: 5px;
        margin: 0px;
        font-size: 18px;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 1.2rem;
        line-height: 1.5;
    }
    .variant.selected {
        background-color: #0c9a9a !important;
    }
    .select_variant{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        gap: 10px;
        margin-bottom: 20px;
        /* justify-content: center; */
        align-items: center;
        flex-direction: row;
    }
    .select_variant p{
        margin: 0px;
        text-transform: uppercase;
        font-size: 1.2rem;
        line-height: 1.5;
    }
</style> -->
<!-- Product Detail Page -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');
    const token = localStorage.getItem('auth_token');
    const addCartBtn = $('#add-to-cart-btn');
    const viewCartBtn = $('#view-cart-btn');
    const quantityElem = $('#quantity');
    const priceElem = $('#selling-price');
    const singlePriceElem = $('#product-price');
    const cartItemIds = $('#cartId');
    let cartItemId = null; // Store the cart item ID

    if (productId) {
        $.ajax({
            url: `<?php echo BASE_URL; ?>/products/get_products/${productId}`,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ product_id: productId }),
            success: function (data) {
                if (data.success) {
                    $('#product-title').text(data.data.name);
                    $('#product-category').text(data.data.category);
                    $('#product-brand').text(data.data.brand);
                    priceElem.text(`₹${data.data.variants[0].selling_price}`);
                    priceElem.attr("data-price", data.data.variants[0].selling_price);
                    $('#regular-price').text(`₹${data.data.variants[0].regular_price}`);
                    $('#product-price').text(`₹${data.data.variants[0].selling_price}`);
                    $('#product-description').html(data.data.description || 'No description available');
                    $('#features-list').html(data.data.features.map(f => `<li>${f.feature_value}</li>`).join(''));
                    $('.about_section, .breadcrumb-title').text(data.data.name);

                    // Load Variants
                    const variantsContainer = $('.variants');
                    variantsContainer.html(data.data.variants.map((variant, index) => 
                        `<div class="variant ${index === 0 ? 'selected' : ''}" onclick="updateVariant(${variant.id}, '${variant.variant_type}', ${variant.selling_price}, ${variant.regular_price}, this)">
                            <p>${variant.variant_type}</p>
                        </div>`
                    ).join(''));

                    // Select first variant by default
                    if (data.data.variants.length > 0) {
                        updateVariant(data.data.variants[0].id, data.data.variants[0].variant_type, data.data.variants[0].selling_price, data.data.variants[0].regular_price, $('.variant').first()[0]);
                    }
                }
            },
            error: function (error) {
                console.error('Error fetching product details:', error);
            }
        });
    }

    function updateVariant(variantId, variantType, sellingPrice, regularPrice, element) {
        priceElem.text(`₹${sellingPrice}`);
        priceElem.attr("data-price", sellingPrice);
        $('#regular-price').text(`₹${regularPrice}`);
        $('#selected-variant').val(variantId);

        $('.variant').removeClass('selected');
        $(element).addClass('selected');
    }

    function updatePrice() {
        const quantity = parseFloat(quantityElem.val()) || 1;
        const sellingPrice = parseFloat(priceElem.attr("data-price")) || 0;

        if (!isNaN(sellingPrice)) {
            const updatedPrice = (quantity * sellingPrice).toFixed(2);
            priceElem.text(`₹${updatedPrice}`);
        }
    }

    function checkCart() {
        $.ajax({
            url: `<?php echo BASE_URL; ?>/cart/fetch`,
            type: "POST",
            headers: { "Authorization": `Bearer ${token}` },
            contentType: "application/json",
            success: function (data) {
                if (data.data && data.data.length > 0) {
                    const cartItem = data.data.find(item => item.product_id == productId);
                    if (cartItem) {
                        addCartBtn.hide();
                        viewCartBtn.show();
                        quantityElem.val(cartItem.quantity);
                        // cartItemId = cartItem.id;
                        cartItemIds.hide();
                        updatePrice();
                    } else {
                        addCartBtn.show();
                        viewCartBtn.hide();
                        quantityElem.val(1);
                        updatePrice();
                    }
                }
            },
            error: function (error) {
                console.error("Error checking cart:", error);
            }
        });
    }

    checkCart(); // Check cart on page load

    function addToCart() {
        console.log("addToCart() function invoked.");

        const variantId = $('#selected-variant').val();
        const quantity = quantityElem.val() || 1;

        $.ajax({
            url: `<?php echo BASE_URL; ?>/cart/add`,
            type: "POST",
            headers: { "Authorization": `Bearer ${token}` },
            contentType: "application/json",
            data: JSON.stringify({ product_id: productId, variant_id: variantId || null, quantity: quantity }),
            success: function (data) {
                console.log("API response received:", data);
                location.reload();
                if (data.success) {
                    // Reload the page after successful cart addition
                    cartItemIds.hide();
                    addCartBtn.hide();
                    viewCartBtn.show();
                    checkCart();
                } else {
                    console.error("API response unsuccessful:", data);
                }
            },
            error: function (error) {
                console.error('Error adding product to cart:', error);
            }
        });
    }

    function updateCartQuantity() {
        const newQuantity = quantityElem.val() || 1;

        if (!cartItemId) {
            console.error("Cart item ID is missing.");
            return;
        }

        $.ajax({
            url: `<?php echo BASE_URL; ?>/cart/update/${cartItemId}`,
            type: "POST",
            headers: { "Authorization": `Bearer ${token}` },
            contentType: "application/json",
            data: JSON.stringify({ quantity: newQuantity }),
            success: function (data) {
                console.log("Cart quantity updated:", data);
                updatePrice();
            },
            error: function (error) {
                console.error("Error updating cart quantity:", error);
            }
        });
    }

    addCartBtn.click(function (e) {
        e.preventDefault();
        addToCart();
    });

    quantityElem.change(function () {
        updateCartQuantity();
    });
});
</script>




<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active breadcrumb-title" id="breadcrumb-title" aria-current="page">
                    Load...
                </li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="containe text-left">
        <h1 class="text-uppercase about_section">
            Product Details
        </h1>
    </div>
    <div class="page-wrapper">

        <main class="main">

            <div class="container product-single-container product-single-default product-full-width">
                <div class="cart-message d-none">
                    "<strong class="single-cart-notice breadcrumb-title"></strong>" 
                    <span> has been added to your cart.</span>
                </div>

                <div class="container-fluid pl-lg-0 padding-right-lg">
                    <div class="row">
                        <div class="col-lg-5 product-single-gallery">
                            <div class="sidebar-wrapper">
                                <div class="product-slider-container">
                                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="images/f1.png"
                                                data-zoom-image="images/f1.png"
                                                width="915" height="915" alt="product" />
                                        </div>
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="images/f2.png"
                                                data-zoom-image="images/f2.png"
                                                width="915" height="915" alt="product" />
                                        </div>
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="images/f3.png"
                                                data-zoom-image="images/f3.png"
                                                width="915" height="915" alt="product" />
                                        </div>
                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                                <div class="prod-thumbnail owl-dots transparent-dots flex-column"
                                    id='carousel-custom-dots'>
                                    <div class="owl-dot">
                                        <img src="assets/images/products/zoom/product-1.jpg" width="98" height="98"
                                            alt="product" />
                                    </div>
                                    <div class="owl-dot">
                                        <img src="assets/images/products/zoom/product-2.jpg" width="98" height="98"
                                            alt="product" />
                                    </div>
                                    <div class="owl-dot">
                                        <img src="assets/images/products/zoom/product-3.jpg" width="98" height="98"
                                            alt="product" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 pb-1">
                            <div class="single-product-custom-block">
                                <div class="porto-block">
                                    <h5 class="porto-heading d-inline-block">Free Shipping</h5>
                                    <h5 class="porto-heading d-inline-block">100% Money Back Guarantee</h5>
                                    <h5 class="porto-heading d-inline-block">Online Support 24/7</h5>
                                </div>
                            </div>

                            <div class="product-single-details mb-1">
                                <h1 class="product-title" id="product-title">Loading...</h1>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-link">( 6 Reviews )</a>
                                </div><!-- End .ratings-container -->

                                <ul class="single-info-list">
                                    <li>Category: <strong><span id="product-category">Loading...</span></strong></li>
                                </ul>

                                <ul class="single-info-list">
                                    <li>Brand: <strong><span id="product-brand">Loading...</span></strong></li>
                                </ul>
                                <div class="select_variant">
                                    <p>Select The Variant:</p>
                                    <input type="hidden" id="selected-variant" value="">
                                    <div class="variants">                                    
                                        <div class="variant">
                                            <p>variant ..</p>                                        
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="price-box">
                                    <div class="_price">
                                            <del class="old-price">
                                                <span id="regular-price">₹1000.00</span>
                                            </del>
                                            <span class="new-price" id="product-price">₹11000.00</span>
                                    </div>
                                    <div class="s_price">
                                        <span class="special-price">₹11000.00</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p id="product-description">Loading...</p>
                                </div>
                                <div class="product-action">
                                    <div class="price-box">
                                        <span class="product-price" id="selling-price" data-price="0">₹0.00</span>
                                    </div>
                                    <div class="product-single-qty" id="cartId">
                                        <input class="horizontal-quantity form-control" type="number" id="quantity" value="1" min="1" onchange="updatePrice()">
                                    </div>

                                    <!-- <a href="javascript:void(0);" class="btn btn-dark add-cart icon-shopping-cart mr-2"
                                        title="Add to Cart" onclick="addToCart()">Add to Cart</a> -->
                                    <a href="#" id="add-to-cart-btn" class="btn btn-dark add-cart icon-shopping-cart mr-2" title="Add to Cart">
                                        Add to Cart
                                    </a>

                                    <a href="cart.php" class="btn btn-gray view-cart" id="view-cart-btn">View cart</a>
                                </div>

                                <hr class="divider mb-0 mt-0">

                                <div class="product-single-share custom-product-single-share">
                                    <label class="sr-only">Share:</label>

                                    <div class="social-icons mt-0">
                                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                            title="Facebook"></a>
                                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                            title="Twitter"></a>
                                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in"
                                            target="_blank" title="Linkedin"></a>
                                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g"
                                            target="_blank" title="Google +"></a>
                                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                            title="Mail"></a>
                                    </div><!-- End .social-icons -->
                                </div><!-- End .product single-share -->

                                <a href="wishlist.html" class="btn-icon-wish add-wishlist justify-content-start mb-lg-0 mb-1"
                                    title="Add to Wishlist">
                                    <i class="icon-wishlist-2"></i>
                                    <span>Add to Wishlist</span>
                                </a>
                                
                                <div class="product-single-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="product-features" data-toggle="tab" href="#product-tabs-features" role="tab">Features</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="product-tabs-features">
                                            <div class="product-desc-content">
                                                <ul id="features-list"></ul>
                                                
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="feature-box feature-box-simple text-center">
                                                            <div class="feature-icon">
                                                                <i class="fa fa-star"></i>
                                                            </div>

                                                            <div class="feature-box-content">
                                                                <h3>Dedicated Service</h3>
                                                                <p>Consult our specialists for help with an order,
                                                                    customization, or design advice</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="feature-box feature-box-simple text-center">
                                                            <div class="feature-icon">
                                                                <i class="fa fa-reply"></i>
                                                            </div>

                                                            <div class="feature-box-content">
                                                                <h3>Free Returns</h3>
                                                                <p>Consult our specialists for help with an order,
                                                                    customization, or design advice</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-4">
                                                        <div class="feature-box feature-box-simple text-center">
                                                            <div class="feature-icon">
                                                                <i class="fa fa-paper-plane"></i>
                                                            </div>

                                                            <div class="feature-box-content">
                                                                <h3>International Shipping</h3>
                                                                <p>Consult our specialists for help with an order,
                                                                    customization, or design advice</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End .product-single-container -->
            </div>
            <style>
                .product-desc-content .feature-box p {
                    font-size: 14px;
                    line-height: 27px;
                    color: #4a505e;
                    letter-spacing: 0;
                    text-align: justify;
                }
                .product-single-details .new-price {
                    color: #585f66;
                    font-size: 1.9rem;
                    letter-spacing: -0.02em;
                    vertical-align: middle;
                    line-height: 0.8;
                    margin-left: 3px;
                    text-decoration: line-through;
                }
                .special-price{
                    color:#f0340efa;
                    font-size: 2.3rem;
                    letter-spacing: -0.02em;
                    vertical-align: middle;
                    line-height: 0.8;
                    margin-left: 3px;
                    /* font-family: 'Barlow Condensed'; */
                    /* text-decoration: line-through; */
                }
            </style>
            <div class="container-fluid">
                <div class="products-section pt-0">
                    <h2 class="section-title">Related Products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-1.jpg" width="451" height="451"
                                        alt="product">
                                    <img src="assets/images/products/product-1-2.jpg" width="451" height="451"
                                        alt="product">
                                </a>
                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Haneri AirElite AEW2</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <del class="old-price">₹59.00</del>
                                    <span class="product-price">₹49.00</span>
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-3.jpg" width="451" height="451"
                                        alt="product">
                                    <img src="assets/images/products/product-3-2.jpg" width="451" height="451"
                                        alt="product">
                                </a>
                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Haneri AirElite AEW3</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <del class="old-price">₹59.00</del>
                                    <span class="product-price">₹49.00</span>
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-7.jpg" width="451" height="451"
                                        alt="product">
                                    <!-- <img src="assets/images/products/product-7-2.jpg" width="451" height="451"
                                        alt="product"> -->
                                </a>
                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Haneri AirLux ALR1</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <del class="old-price">₹59.00</del>
                                    <span class="product-price">₹49.00</span>
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-6.jpg" width="451" height="451"
                                        alt="product">
                                    <!-- <img src="assets/images/products/product-6-2.jpg" width="451" height="451"
                                        alt="product"> -->
                                </a>
                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Haneri AirLux ALR2</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <del class="old-price">₹59.00</del>
                                    <span class="product-price">₹49.00</span>
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-4.jpg" width="451" height="451"
                                        alt="product">
                                    <img src="assets/images/products/product-4-2.jpg" width="451" height="451"
                                        alt="product">
                                </a>
                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Haneri Airlux ALR3</a>
                                </h3>
                                <!-- <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div> -->
                                <div class="price-box">
                                    <del class="old-price">₹59.00</del>
                                    <span class="product-price">₹49.00</span>
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .products-slider -->
                </div>
            </div><!-- End .products-section -->

            <!-- <div class="container">
                <hr class="mt-0 m-b-5" />

                <div class="product-widgets-container row pb-2">
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Featured Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-1.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-1-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-2.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-2-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Brown Women Casual HandBag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-3.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-3-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Circled Ultimate 3D Speaker</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Best Selling Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-4.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-4-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young - S</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-5.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-5-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-6.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-6-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Men Black Gentle Belt</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Latest Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-7.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-7-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Men Black Sports Shoes</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-8.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-8-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Brown-Black Men Casual Glasses</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-9.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-9-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Black Men Casual Glasses</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Top Rated Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-10.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-10-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Basketball Sports Blue Shoes</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-11.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-11-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Men Sports Travel Bag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/small/product-12.jpg" width="74" height="74"
                                        alt="product">
                                    <img src="assets/images/products/small/product-12-2.jpg" width="74" height="74"
                                        alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="product.html">Brown HandBag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>

                                <div class="price-box">
                                    <span class="product-price">₹49.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>End .row
            </div> -->
        </main><!-- End .main -->
        <?php include("footer.php"); ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
</main><!-- End .main -->


