<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<!-- Product Detail Page -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        const token = localStorage.getItem('auth_token'); // token if logged in
        const userRole = localStorage.getItem("user_role"); // Get user role

        // UI Elements
        const addCartBtn      = $('#add-to-cart-btn');
        const viewCartBtn     = $('#view-cart-btn');
        const quantityElem    = $('#quantity');
        const tPriceElem      = $('#selling-tprice');   // The final displayed price
        const specialPriceElem= $('#special_price');
        const regularPriceElem= $('#regular-price');
        const productPriceElem= $('#product-price');
        const sPriceContainer = $('.s_price'); // Special price container
        const cartItemIds     = $('#cartId');

        // Hide special price by default if the user is not a vendor
        if (userRole !== "vendor") {
            sPriceContainer.hide();
        }

        // test
        // function setImageSection(variantId) {
        //     let imageHtml = '', thumbHtml = '';

        //     let videoUrl = "https://youtu.be/MaX_zCDMyWc";

        //     const getEmbedUrl = (url) => {
        //         const videoId = url.includes("youtu.be")
        //             ? url.split("youtu.be/")[1].split("?")[0]
        //             : url.split("v=")[1].split("&")[0];
        //         return `https://www.youtube.com/embed/${videoId}`;
        //     };

        //     const imageMap = {
        //         14: ["Natural_Pine.png", "Natural_Pine2.png", "Natural_Pine3.png", "Natural_Pine4.png", "Natural_Pine5.png", videoUrl],
        //         13: ["Espresso_Walnut.png", "Espresso_Walnut2.png", "Espresso_Walnut3.png", "Espresso_Walnut4.png", "Espresso_Walnut5.png",videoUrl],
        //         15: ["Moonlit_White.png", "Moonlit_White2.png", "Moonlit_White3.png", "Moonlit_White4.png", videoUrl],
        //         16: ["Velvet_Black.png", "Velvet_Black2.png", "Velvet_Black3.png", "Velvet_Black4.png",videoUrl]
        //     };

        //     const images = (productId == 14 && imageMap[variantId]) 
        //         ? imageMap[variantId] 
        //         : ["f1.png", "f2.png", "f3.png"];

        //     images.forEach((item, index) => {
        //         const isVideo = item.includes("youtu");

        //         if (isVideo) {
        //             const embedUrl = getEmbedUrl(item);
        //             imageHtml += `
        //                 <div class="product-item">
        //                     <iframe
        //                         width="635"
        //                         height="355"
        //                         src="${embedUrl}"
        //                         frameborder="0"
        //                         allow="autoplay; encrypted-media"
        //                         allowfullscreen>
        //                     </iframe>
        //                 </div>
        //             `;
        //             thumbHtml += `
        //                 <div class="owl-dot" data-index="${index}">
        //                     <img src="images/video-thumb.png" width="98" height="98" alt="video" />
        //                 </div>
        //             `;
        //         } else {
        //             imageHtml += `
        //                 <div class="product-item">
        //                     <img class="product-single-image"
        //                         src="images/${item}"
        //                         data-zoom-image="images/${item}"
        //                         width="635"
        //                         height="355"
        //                         alt="product" />
        //                 </div>
        //             `;
        //             thumbHtml += `
        //                 <div class="owl-dot small_thumb" data-index="${index}">
        //                     <img src="images/${item}" width="98" height="98" alt="product" />
        //                 </div>
        //             `;
        //         }
        //     });

        //     const fullImageHtml = `
        //         <div class="product-slider-container">
        //             <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
        //                 ${imageHtml}
        //             </div>
        //             <div class="prod-thumbnail horizontal-thumbs">
        //                 <div class="thumbnail-carousel owl-carousel owl-theme">
        //                     ${thumbHtml}
        //                 </div>
        //             </div>
        //         </div>
        //     `;


        //     $('#product-image-section').html(fullImageHtml);

        //     // Main image carousel
        //     $('.product-single-carousel').owlCarousel({
        //         items: 1,
        //         nav: true,
        //         dots: false,
        //         loop: true
        //     });

        //     // Thumbnail slider (scrollable)
        //     $('.thumbnail-carousel').owlCarousel({
        //         items: 5,
        //         margin: 10,
        //         nav: true,
        //         dots: false,
        //         responsive: {
        //             0: { items: 3 },
        //             600: { items: 4 },
        //             1000: { items: 5 }
        //         }
        //     });

        //     // Sync thumbnail click with main carousel
        //     $(document).on('click', '.owl-dot', function () {
        //         const index = $(this).data('index');
        //         $('.product-single-carousel').trigger('to.owl.carousel', [index, 300]);
        //     });
        // }

        // Overwrite this function completely
        function setImageSectionFromVariant(variant) {
            let imageHtml = '', thumbHtml = '';

            const images = variant.file_urls || [];
            const videoUrl = variant.video_url || '';

            const getEmbedUrl = (url) => {
                const videoId = url.includes("youtu.be")
                    ? url.split("youtu.be/")[1].split("?")[0]
                    : url.split("v=")[1].split("&")[0];
                return `https://www.youtube.com/embed/${videoId}`;
            };

            images.forEach((item, index) => {
                imageHtml += `
                    <div class="product-item">
                        <img class="product-single-image"
                            src="${item}"
                            data-zoom-image="${item}"
                            width="635"
                            height="355"
                            alt="product" />
                    </div>
                `;
                thumbHtml += `
                    <div class="owl-dot small_thumb" data-index="${index}">
                        <img src="${item}" width="98" height="98" alt="product" />
                    </div>
                `;
            });

            // Add video as last item if exists
            if (videoUrl) {
                const embedUrl = getEmbedUrl(videoUrl);
                const index = images.length;

                imageHtml += `
                    <div class="product-item">
                        <iframe
                            width="635"
                            height="355"
                            src="${embedUrl}"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </div>
                `;
                thumbHtml += `
                    <div class="owl-dot" data-index="${index}">
                        <img src="images/video-thumb.png" width="98" height="98" alt="video" />
                    </div>
                `;
            }

            const fullImageHtml = `
                <div class="product-slider-container">
                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                        ${imageHtml}
                    </div>
                    <div class="prod-thumbnail horizontal-thumbs">
                        <div class="thumbnail-carousel owl-carousel owl-theme">
                            ${thumbHtml}
                        </div>
                    </div>
                </div>
            `;

            $('#product-image-section').html(fullImageHtml);

            // Init Owl Carousels
            $('.product-single-carousel').owlCarousel({
                items: 1,
                nav: true,
                dots: false,
                loop: true
            });

            $('.thumbnail-carousel').owlCarousel({
                items: 5,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: { items: 3 },
                    600: { items: 4 },
                    1000: { items: 5 }
                }
            });

            $(document).on('click', '.owl-dot', function () {
                const index = $(this).data('index');
                $('.product-single-carousel').trigger('to.owl.carousel', [index, 300]);
            });
        }


        // Fetch product details
        if (productId) {
            $.ajax({
                url: `<?php echo BASE_URL; ?>/products/get_products/${productId}`,
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({ product_id: productId }),
                success: function (data) {
                    if (data.success) {
                        console.log("Product details fetched:", data);

                        // Populate product details
                        $('#product-title').text(data.data.name);
                        $('#product-category').text(data.data.category);
                        // $('#product-brand').text(data.data.brand);
                        $('#product-description').html(data.data.description || 'No description available');
                        $('#features-list').html(data.data.features.map(f => `<li>${f.feature_value}</li>`).join(''));
                        $('.about_section, .breadcrumb-title').text(data.data.name);

                        // Handle variants
                        if (data.data.variants.length > 0) {
                            window.allVariants = data.data.variants; // ✅ IMPORTANT
                            const variants = data.data.variants;
                            const variantsContainer = $('.variants');

                            // Variant color name to background mapping
                            const colorMap = {
                                "Espresso Walnut": "#4b3621",
                                "Natural Pine": "#d4b483",
                                "Moonlit White": "#f5f5f5",
                                "Velvet Black": "#000000"
                            };

                            // Generate color swatch options
                            variantsContainer.html(variants.map((variant, index) => {
                                const colorName = variant.variant_value;
                                const bgColor = colorMap[colorName] || "#ccc";

                                return `
                                    <div class="variant-color-circle ${index === 0 ? 'selected' : ''}" 
                                        title="${colorName}"
                                        data-variant-id="${variant.id}" 
                                        data-selling-price="${variant.selling_price}" 
                                        data-regular-price="${variant.regular_price}" 
                                        data-vendor-price="${variant.sales_price_vendor}" 
                                        onclick="updateVariant(this)"
                                        style="background-color: ${bgColor};">
                                    </div>`;
                            }).join(''));

                            // Now that variants are rendered, select the first one
                            const firstVariantElem = $('.variant-color-circle').first();
                            $('#selected-variant').val(firstVariantElem.data("variant-id"));
                            updateVariant(firstVariantElem[0]); // This will call setImageSection internally
                        } else {
                            setImageSectionFromVariant(null);
                        }

                    }
                },
                error: function (error) {
                    console.error('Error fetching product details:', error);
                }
            });
        }

        window.updateVariant = function(element) {
            const variantId    = $(element).data("variant-id");
            const sellingPrice = $(element).data("selling-price");
            const regularPrice = $(element).data("regular-price");
            const vendorPrice  = $(element).data("vendor-price");

            // Update UI
            $('.variant').removeClass('selected');
            $(element).addClass('selected');
            $('#selected-variant').val(variantId);

            // Show regular price with strike-through
            regularPriceElem.text(`₹${regularPrice}`).css("text-decoration", "line-through");

            if (userRole === "vendor") {
                productPriceElem.text(`₹${sellingPrice}`).css("text-decoration", "line-through");
                specialPriceElem.text(`₹${vendorPrice}`).show();
                sPriceContainer.show();
                tPriceElem.attr("data-price", vendorPrice).text(`₹${vendorPrice}`);
            } else {
                productPriceElem.text(`₹${sellingPrice}`).css("text-decoration", "none");
                specialPriceElem.hide();
                sPriceContainer.hide();
                tPriceElem.attr("data-price", sellingPrice).text(`₹${sellingPrice}`);
            }

            // Update image section based on selected variant
            const selectedVariant = (window.allVariants || []).find(v => v.id == variantId);
            if (selectedVariant) {
                setImageSectionFromVariant(selectedVariant);
            }


            // ✅ CHECK if selected variant is already in cart
            checkVariantInCart(variantId);

            updatePrice();
        };

        // Add to Cart function
        function addToCart() {
            // console.log("addToCart() function invoked.");

            const variantId = $('#selected-variant').val();
            const quantity  = quantityElem.val() || 1;
            const token     = localStorage.getItem("auth_token");
            let tempId      = localStorage.getItem("temp_id");

            // Ensure variantId is set correctly
            if (!variantId) {
                // alert("Please select a variant before adding to cart.");
                return;
            }
            let requestData = {
                product_id: productId,
                variant_id: variantId,
                quantity: quantity
            };
            if (!token && tempId) {
                requestData.cart_id = tempId;
            }
            const ajaxOptions = {
                url: `<?php echo BASE_URL; ?>/cart/add`,
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(requestData),
                success: function (data) {
                    console.log("API response received:", data);

                    if (data.success === true || data.message.includes("successfully")) {
                        $('#quantity').hide();     // ❗ hide Quantity box after adding
                        $('#cartId').hide();       // ❗ hide the wrapper row

                        addCartBtn.hide();         // hide Add to Cart
                        viewCartBtn.show();        // show View Cart
                        checkCart();

                        // Store temp_id if user is not authenticated
                        if (!token && !tempId && data.data.user_id) {
                            localStorage.setItem("temp_id", data.data.user_id);
                        }
                    } else {
                        console.error("API response unsuccessful:", data);
                        alert("Error: " + data.message);
                    }
                },
                error: function (error) {
                    console.error('Error adding product to cart:', error);
                    alert("There was an error adding the product to your cart.");
                }
            };

            if (token) {
                ajaxOptions.headers = { "Authorization": `Bearer ${token}` };
            }

            $.ajax(ajaxOptions);
        }

        // Check the current state of the cart
        function checkCart() {
            const token  = localStorage.getItem("auth_token");
            const tempId = localStorage.getItem("temp_id");

            if (!token && !tempId) {
                console.warn("No auth token or temp_id found in localStorage. Skipping cart check.");
                return;
            }

            let requestData = {};
            if (token) {
                requestData = {};
            } else if (tempId) {
                requestData = { cart_id: tempId };
            }

            $.ajax({
                url: `<?php echo BASE_URL; ?>/cart/fetch`,
                type: "POST",
                headers: token ? { "Authorization": `Bearer ${token}` } : {},
                contentType: "application/json",
                data: JSON.stringify(requestData),
                success: function (data) {
                    if (data.data && data.data.length > 0) {
                        const cartItem = data.data.find(item => item.product_id == productId);
                        if (cartItem) {
                            cartItemId = cartItem.id;

                            addCartBtn.hide();         // hide Add to Cart
                            viewCartBtn.show();        // show View Cart

                            $('#quantity').hide();     // ❗ hide Quantity box
                            $('#cartId').hide();       // ❗ hide the entire row if needed
                        } else {
                            cartItemId = null;

                            addCartBtn.show();
                            viewCartBtn.hide();

                            $('#quantity').val(1).show();  // show quantity box
                            $('#cartId').show();           // show the wrapper row
                        }
                    }
                },
                error: function (error) {
                    console.error("Error checking cart:", error);
                }
            });
        }

        // function checkVariantInCart(variantId) {
        //     const token  = localStorage.getItem("auth_token");
        //     const tempId = localStorage.getItem("temp_id");

        //     if (!token && !tempId) {
        //         console.warn("No auth token or temp_id found in localStorage. Skipping cart check.");
        //         return;
        //     }

        //     let requestData = token ? {} : { cart_id: tempId };

        //     $.ajax({
        //         url: `<?php echo BASE_URL; ?>/cart/fetch`,
        //         type: "POST",
        //         headers: token ? { "Authorization": `Bearer ${token}` } : {},
        //         contentType: "application/json",
        //         data: JSON.stringify(requestData),
        //         success: function (data) {
        //             if (data.data && data.data.length > 0) {
        //                 const cartItem = data.data.find(item => item.product_id == productId && item.variant_id == variantId);
        //                 if (cartItem) {
        //                     cartItemId = cartItem.id;
        //                     addCartBtn.hide();
        //                     viewCartBtn.show();
        //                     quantityElem.val(cartItem.quantity);
        //                     cartItemIds.show();
        //                 } else {
        //                     addCartBtn.show();
        //                     viewCartBtn.hide();
        //                     quantityElem.val(1);
        //                     cartItemIds.hide();
        //                 }
        //             } else {
        //                 addCartBtn.show();
        //                 viewCartBtn.hide();
        //                 quantityElem.val(1);
        //                 cartItemIds.hide();
        //             }
        //         },
        //         error: function (error) {
        //             console.error("Error checking cart for variant:", error);
        //         }
        //     });
        // }

        function checkVariantInCart(variantId) {
    const token  = localStorage.getItem("auth_token");
    const tempId = localStorage.getItem("temp_id");

    if (!token && !tempId) {
        console.warn("No auth token or temp_id found in localStorage. Skipping cart check.");
        return;
    }

    let requestData = token ? {} : { cart_id: tempId };

    $.ajax({
        url: `<?php echo BASE_URL; ?>/cart/fetch`,
        type: "POST",
        headers: token ? { "Authorization": `Bearer ${token}` } : {},
        contentType: "application/json",
        data: JSON.stringify(requestData),
        success: function (data) {
            if (data.data && data.data.length > 0) {
                const cartItem = data.data.find(item => item.product_id == productId && item.variant_id == variantId);
                if (cartItem) {
                    cartItemId = cartItem.id;

                    addCartBtn.hide();
                    viewCartBtn.show();

                    quantityElem.hide();         // ✅ HIDE Quantity input
                    $('#cartId').hide();         // ✅ HIDE wrapper row
                } else {
                    cartItemId = null;

                    addCartBtn.show();
                    viewCartBtn.hide();

                    quantityElem.val(1).show();  // ✅ SHOW Quantity
                    $('#cartId').show();         // ✅ SHOW wrapper row
                }
            } else {
                cartItemId = null;

                addCartBtn.show();
                viewCartBtn.hide();

                quantityElem.val(1).show();
                $('#cartId').show();
            }
        },
        error: function (error) {
            console.error("Error checking cart for variant:", error);
        }
    });
}


        // Price update function based on quantity change
        window.updatePrice = function() {
            const quantity = parseFloat(quantityElem.val()) || 1;
            // Pull the base price from #selling-tprice's data-price
            const basePrice = parseFloat(tPriceElem.attr("data-price")) || 0;

            if (!isNaN(basePrice)) {
                const updatedPrice = (quantity * basePrice).toFixed(2);
                // Update #selling-tprice text to reflect the total
                tPriceElem.text(`₹${updatedPrice}`);
            }
        }

        // Update cart quantity function
        function updateCartQuantity() {
            const newQuantity = parseInt(quantityElem.val()) || 1;
            const token = localStorage.getItem("auth_token");
            const tempId = localStorage.getItem("temp_id");
            const variantId = $('#selected-variant').val();

            if (!variantId) {
                console.error("No variant selected.");
                return;
            }
            let requestData = token ? {} : { cart_id: tempId };

            $.ajax({
                url: `<?php echo BASE_URL; ?>/cart/fetch`,
                type: "POST",
                headers: token ? { "Authorization": `Bearer ${token}` } : {},
                contentType: "application/json",
                data: JSON.stringify(requestData),
                success: function (data) {
                    if (data.data && data.data.length > 0) {
                        const cartItem = data.data.find(item => item.product_id == productId && item.variant_id == variantId);
                        if (!cartItem) {
                            console.warn("Cart item not found for this variant.");
                            return;
                        }

                        const requestDataUpdate = {
                            quantity: newQuantity,
                            ...(tempId && !token ? { cart_id: tempId } : {})
                        };

                        $.ajax({
                            url: `<?php echo BASE_URL; ?>/cart/update/${cartItem.id}`,
                            type: "POST",
                            headers: token ? { "Authorization": `Bearer ${token}` } : {},
                            contentType: "application/json",
                            data: JSON.stringify(requestDataUpdate),
                            success: function (data) {
                                console.log("Cart quantity updated:", data);
                                updatePrice();
                            },
                            error: function (error) {
                                console.error("Error updating cart quantity:", error);
                            }
                        });
                    } else {
                        console.warn("No items in cart.");
                    }
                },
                error: function (error) {
                    console.error("Error fetching cart for quantity update:", error);
                }
            });
        }

        // Call the checkCart function when the page loads
        checkCart();

        // Update the cart quantity whenever the user changes the input
        $('#quantity').on('change', function() {
            updateCartQuantity();
            updatePrice();
        });

        // Event Listeners
        $(document).ready(function() {
            checkCart();
            addCartBtn.click(function (e) {
                e.preventDefault();
                addToCart();
            });
            quantityElem.change(function () {
                // If you also want to update the cart on quantity change (in case item already in cart):
                // updateCartQuantity();
                // But to simply re-calc the price on the page:
                updatePrice();
            });
        });
    });
</script>
<style>
    #cartId {
        transition: all 0.3s ease-in-out;
    }

</style>
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
    <div class="containe text-left pro_detail">

    </div>
    <div class="page-wrapper">
        <main class="main">
            <div class="container product-single-container product-single-default product-full-width fst_product_section">
                
                <div class="container-fluid pl-lg-0 padding-right-lg">
                    <div class="row">
                        <div class="col-lg-6 product-single-gallery">
                            <div class="sidebar-wrapper" id="product-image-section">
                                <!--  -->
                            </div>
                        </div>

                        <div class="col-lg-6 pb-1">
                            <!-- <div class="single-product-custom-block">
                                <div class="porto-block">
                                    <h5 class="porto-heading d-inline-block">Free Shipping</h5>
                                    <h5 class="porto-heading d-inline-block">100% Money Back Guarantee</h5>
                                    <h5 class="porto-heading d-inline-block">Online Support 24/7</h5>
                                </div>
                            </div> -->

                            <div class="product-single-details mb-1">
                                <h1 class="product-title primary_light" id="product-title"></h1>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <strong>
                                        <a href="#" class="rating-link primary_light">( 6 Reviews )</a>
                                    </strong>
                                </div><!-- End .ratings-container -->

                                <!-- Shrt description -->
                                <!-- <div class="product-desc">
                                    <p id="product-short-description">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quasi repudiandae animi architecto nobis ipsum cum dolore recusandae eaque quia porro minus nam laborum itaque quas, ut cumque ad, expedita amet fuga natus. Modi numquam explicabo cum veritatis sequi quasi reprehenderit a illo, fuga sapiente ut porro perspiciatis deleniti nulla?
                                    </p>
                                </div> -->

                                <ul class="single-info-list">
                                    <!-- <li>Brand: <strong><span id="product-brand"></span></strong></li> -->
                                    <div class="brand_image">
                                        <img src="images/Haneri Logo.png" alt="Haneri">
                                    </div>
                                     
                                </ul>
                                <ul class="single-info-list">
                                    <strong>
                                        <li class="primary_light">Category: <span id="product-category"></span></li>
                                    </strong>
                                </ul>
                                <div class="select_variant">
                                    <strong>
                                        <p class="primary_light">Select The Variant:</p>
                                    </strong>
                                    <input type="hidden" id="selected-variant" value="">
                                    <div class="variants">                                    
                                        <div class="variant">
                                            <p>variant ..</p>                                        
                                        </div>
                                    </div>
                                </div>                              
                                <div class="price-box p_box">
                                    <div class="prices">
                                        <span class="mrp">MRP</span>
                                        <div class="_price"> 
                                            <del class="old-price">
                                                <span id="regular-price">₹0.00</span>
                                            </del>
                                            <span class="new-price" id="product-price">₹0.00</span>
                                        </div>
                                        <div class="s_price">
                                            <span class="txt">
                                                Special Price: 
                                            </span>
                                            <span class="special_price" id="special_price">₹0.00</span>
                                        </div>
                                    </div>
                                    <span class="in-ex paragraph2 primary_light">Inclusive All Taxes</span>
                                </div>

                                <!-- description -->
                                <!-- <div class="product-desc">
                                    <p id="product-description"></p>
                                </div> -->
                                <div class="product-action">
                                    <div class="price-box">
                                        <span class="product-price primary_light" id="selling-tprice" data-price="0">₹0.00</span>
                                    </div>
                                    <div class="product-single-qty" id="cartId" data-cart-id="">
                                    <!-- <div class="product-single-qty" id="cartId"> -->
                                        <!-- <input class="horizontal-quantity form-control" type="number" id="quantity" value="1" min="1" onchange="updatePrice()"> -->
                                        <input class="horizontal-quantity form-control" type="number" id="quantity" value="1" min="1">

                                    </div>
                                    <a href="#" id="add-to-cart-btn" class="btn btn-primary_light add-cart icon-shopping-cart mr-2" title="Add to Cart">
                                        Add to Cart
                                    </a>

                                    <a href="cart.php" class="btn btn-view_light view-cart" id="view-cart-btn">View cart</a>
                                </div>

                                <hr class="divider mb-0 mt-0">

                                <div class="product-single-share custom-product-single-share">
                                    <label class="sr-only">Share:</label>

                                    <!-- <div class="social-icons mt-0">
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
                                    </div> -->
                                </div>

                                <!-- <a href="#" class="btn-icon-wish add-wishlist justify-content-start mb-lg-0 mb-1"
                                    title="Add to Wishlist">
                                    <i class="icon-wishlist-2"></i>
                                    <span>Add to Wishlist</span>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div><!-- End .product-single-container -->
            </div>
            <hr class="divider mb-0 mt-0">
            <div class="detail-data">

            </div>
            <div class="secure-section container">
                <div class="secure-item">
                    <img src="//www.crompton.co.in/cdn/shop/files/shopping-cart_1_80x.svg?v=1701772745" alt="Buy in store or online" title="Buy in store or online">
                    <div class="secure-text">Buy in store or online</div>
                </div>
                <div class="secure-item">
                    <img src="//www.crompton.co.in/cdn/shop/files/gear_80x.svg?v=1701772745" alt="Service and Installation" title="Service and Installation">
                    <div class="secure-text">Service and Installation</div>
                </div>
                <div class="secure-item">
                    <img src="//www.crompton.co.in/cdn/shop/files/certification_80x.svg?v=1701772745" alt="Product Warranty" title="Product Warranty">
                    <div class="secure-text">Product Warranty</div>
                </div>
                <div class="secure-item">
                    <img src="//www.crompton.co.in/cdn/shop/files/Group_53380_80x.svg?v=1701772744" alt="Top Rated Products" title="Top Rated Products">
                    <div class="secure-text">Top Rated Products</div>
                </div>
            </div>
            <div class="container specification-section">
                <h2 class="fw-normal head_1 text-center">Specifications</h2>
                <ul class="specification-list">
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705434338/5-Year-warranty-v1695793624897.png?7019x7017" alt="5 year warranty" title="5 year warranty">
                    </figure>
                    <!-- <p>5 year warranty</p> -->
                    </li>
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705434338/Activbldc-v1695793626211-(1)-v1697452065695.png?500x428" alt="ActivBldc" title="ActivBldc">
                    </figure>
                    <!-- <p>ActivBldc</p> -->
                    </li>
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705434338/Anti-Dust@4x-(3)-v1695793627523.png?4899x4039" alt="Anti dust" title="Anti dust">
                    </figure>
                    <!-- <p>Anti dust</p> -->
                    </li>
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705434338/Layer-559-v1695793629801.png?4590x4807" alt="50% energy savings" title="50% energy savings">
                    </figure>
                    <!-- <p>50% energy savings</p> -->
                    </li>
                </ul>
            </div>
            <div style="display: flex; flex-direction: column; align-items:center;">
                <img src="/assets/images/1.jpeg" alt="Underlight with Dimming Options" style="max-width: 100%; height: auto;">
                <img src="/assets/images/2.jpeg" alt="ActivBLDC Technology" style="max-width: 100%; height: auto;">
                <img src="/assets/images/3.jpeg" alt="Nature Driven Design" style="max-width: 100%; height: auto;">
                <img src="/assets/images/4.jpeg" alt="SilentPro Blossom Smart" style="max-width: 100%; height: auto;">
            </div>

            <div class="container specification-section">
                <h2 class="fw-normal head_1 text-center">Why To Choose Haneri Fans</h2>
                <ul class="specification-list">
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705441032/Sup-Air-Delv@4x-(1)-v1711621950507.png?6312x6312" alt="5 year warranty" title="5 year warranty">
                    </figure>
                    <!-- <p>5 year warranty</p> -->
                    </li>
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705441032/High-Speed@4x-v1711621951279.png?5060x4545" alt="ActivBldc" title="ActivBldc">
                    </figure>
                    <!-- <p>ActivBldc</p> -->
                    </li>
                    <li>
                    <figure>
                        <img src="https://cdn.accentuate.io/46567661928752/-1695705441032/long-life--v1711621952090.webp?350x350" alt="Anti dust" title="Anti dust">
                    </figure>
                    <!-- <p>Anti dust</p> -->
                    </li>
                </ul>
            </div>

            <div class="product-box-spec container">
                <h2 class="spec-title">Technical Specifications</h2>
                <table id="spec-table" class="specs-json-table"></table>
            </div>

            <script>
                const specsData = [
                    { label: "Model Name", value: "Fengshui" },
                    { label: "Brand Name", value: "Haneri" },
                    { label: "Colour", value: "Espesso Walnut, Natural Pine, Moonlight white and Velvet Black" },
                    { label: "Manufacturer", value: "Haneri Electricals LLP" },
                    { label: "Material", value: "ABS plastic" },
                    { label: "BEE Rating", value: "5" },
                    { label: "Manufacturer Contact Information", value: "Haneri Electricals LLP" },
                    { label: "Power Source", value: "Electric" },
                    { label: "Required Assembly", value: "Yes" },
                    { label: "Wattage", value: "45" },
                    { label: "Voltage", value: "230V" },
                    { label: "Mounting type", value: "Downrod Mount" },
                    { label: "Finish type", value: "Painted" },
                    { label: "Airflow Capacity", value: "280" },
                    { label: "Included components", value: "1 BLDC motor, Set of 3 Blades, 1 Remote, Shackle kit, Warranty Card" },
                    { label: "Unit count", value: "1 Unit" },
                    { label: "Recommended Uses For Product", value: "Air Circulation" },
                    { label: "Is Fragile ?", value: "Yes" },
                    { label: "Blade length", value: "1320mm" },
                    { label: "Blade Material", value: "ABS Plastic" },
                    { label: "Suggested Room type", value: "Living Room, Office, Dining Room, Bedroom, Kids Room" },
                    { label: "Speed", value: "260" },
                    { label: "Packer Information", value: "Haneri Electricals LLP" },
                    { label: "Number of Speeds", value: "5" },
                    { label: "Number of Blades", value: "3" },
                    { label: "Control Method", value: "Remote" },
                    { label: "Indoor/Outdoor Usage", value: "Indoor/Protected Outdoor Environments" },
                    { label: "Electric Fan Design", value: "Ceiling Fan" },
                    { label: "Country of Origin", value: "India" },
                    { label: "Warranty Description", value: "5 years from date of purchase" },
                    { label: "Care Instructions", value: "For any questions, Please contact us on ____________" },
                    { label: "Are Batteries Required?", value: "Yes" },
                    { label: "Are Batteries Included ?", value: "No" },
                    { label: "Contains Liquid Contents?", value: "No" },
                    { label: "Dimensions", value: "1320x1320mmx485mm" },
                    { label: "Items Per Inner Pack", value: "1" },
                    { label: "Number of Boxes", value: "1" },
                    { label: "Item Weight", value: "4.9kg" }
                ];

                const specTable = document.getElementById("spec-table");

                for (let i = 0; i < specsData.length; i += 2) {
                    const row = document.createElement("tr");

                    const th1 = document.createElement("th");
                    th1.textContent = specsData[i].label;
                    const td1 = document.createElement("td");
                    td1.textContent = specsData[i].value;

                    row.appendChild(th1);
                    row.appendChild(td1);

                    if (specsData[i + 1]) {
                    const th2 = document.createElement("th");
                    th2.textContent = specsData[i + 1].label;
                    const td2 = document.createElement("td");
                    td2.textContent = specsData[i + 1].value;

                    row.appendChild(th2);
                    row.appendChild(td2);
                    }

                    specTable.appendChild(row);
                }
            </script>

            <!-- Related Products -->
            <!-- <div class="container-fluid">
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
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="#" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Haneri AirElite AEW2</a>
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
                                    <a href="#" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="#" class="btn-quickview" title="Quick View"><i
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
                                    <img src="assets/images/products/product-7.jpg" width="451" height="451" alt="product">
                                </a>
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
                                    <img src="assets/images/products/product-6.jpg" width="451" height="451" alt="product">
                                </a>
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
                                    <img src="assets/images/products/product-4.jpg" width="451" height="451" alt="product">
                                    <img src="assets/images/products/product-4-2.jpg" width="451" height="451" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Haneri Airlux ALR3</a>
                                </h3>
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
                    </div>
                </div>
            </div> -->

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
                </div>
            </div> -->
        </main><!-- End .main -->
        <?php include("footer.php"); ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
</main><!-- End .main -->

