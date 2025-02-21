<?php include("header.php"); ?>
<?php include("configs/auth_check.php"); ?>
<?php include("configs/config.php"); ?>

<!-- Product Detail Page -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        const token = localStorage.getItem('auth_token');
        if (productId) {
            fetch(`<?php echo BASE_URL; ?>/products/get_products/${productId}`, {
                method: "POST",
                headers: { Authorization: `Bearer ${token}`
                    // "Azar": "your-custom-header-value"
                },
                body: JSON.stringify({ product_id: productId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('product-title').textContent = data.data.name;
                        document.getElementById('product-category').textContent = data.data.category;
                        document.getElementById('product-brand').textContent = data.data.brand;
                        document.getElementById('product-price').textContent = `₹${data.data.variants[0].selling_price}`;
                        document.getElementById('selling-price').textContent = `₹${data.data.variants[0].selling_price}`;
                        document.getElementById('selling-price').setAttribute("data-price", data.data.variants[0].selling_price);
                        document.getElementById('regular-price').textContent = `₹${data.data.variants[0].regular_price}`;
                        document.getElementById('product-description').innerHTML = data.data.description || 'No description available';
                        document.getElementById('features-list').innerHTML = data.data.features.map(f => `<li>${f.feature_value}</li>`).join('');
                        document.querySelector('.about_section').textContent = data.data.name;
                        document.querySelector('.breadcrumb-title').textContent = data.data.name;
                        
                    }
                })
                .catch(error => console.error('Error fetching product details:', error));
        }
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

            <div class="product-single-container product-single-default product-full-width">
                <div class="cart-message d-none">
                    "<strong class="single-cart-notice breadcrumb-title"></strong>" 
                    <span> has been added to your cart.</span>
                </div>

                <div class="container-fluid pl-lg-0 padding-right-lg">
                    <div class="row">
                        <div class="col-lg-4 product-single-gallery">
                            <div class="sidebar-wrapper">
                                <div class="product-slider-container">
                                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="assets/images/products/zoom/product-1-big.jpg"
                                                data-zoom-image="assets/images/products/zoom/product-1-big.jpg"
                                                width="915" height="915" alt="product" />
                                        </div>
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="assets/images/products/zoom/product-2-big.jpg"
                                                data-zoom-image="assets/images/products/zoom/product-2-big.jpg"
                                                width="915" height="915" alt="product" />
                                        </div>
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="assets/images/products/zoom/product-3-big.jpg"
                                                data-zoom-image="assets/images/products/zoom/product-3-big.jpg"
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
                        <div class="col-lg-8 pb-1">
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
                                <div class="price-box">
                                    <span class="new-price" id="product-price">₹0.00</span>
                                </div>
                                <div class="product-desc">
                                    <p id="product-description">Loading...</p>
                                </div>
                                <div class="product-action">
                                    <div class="price-box">
                                        <del class="old-price">
                                            <span id="regular-price"></span>
                                        </del>
                                        <span class="product-price" id="selling-price" data-price="0"></span>
                                    </div>
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="number" id="quantity" value="1" min="1" onchange="updatePrice()">
                                    </div>
                                    <!-- <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="text">
                                    </div> -->

                                    <a href="cart.html" class="btn btn-dark add-cart icon-shopping-cart mr-2"
                                        title="Add to Cart">Add to Cart</a>

                                    <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
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
                                            <ul id="features-list"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End .product-single-container -->
            </div>

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

<script>
    function updatePrice() {
        const quantity = parseFloat(document.getElementById('quantity').value) || 1;
        const sellingPriceElement = document.getElementById('selling-price');
        const sellingPrice = parseFloat(sellingPriceElement.getAttribute("data-price")) || 0;

        if (!isNaN(sellingPrice)) {
            const updatedPrice = (quantity * sellingPrice).toFixed(2);
            sellingPriceElement.textContent = `₹${updatedPrice}`;
        }
    }

</script>
