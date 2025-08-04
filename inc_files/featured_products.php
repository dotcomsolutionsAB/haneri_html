<?php include("configs/config.php"); ?>
<section class="featured">
    <h2 class="heading_1">Featured Products</h2>

    <!-- Grid wrapper for cards -->
    <div class="featured-products-grid" id="featured-carousel">
        <!-- Cards will be inserted here -->
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem("auth_token");
        // const tempId = localStorage.getItem("temp_id");
        const apiUrl = "<?php echo BASE_URL; ?>/products/get_products";

        fetch(apiUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`
            },
            body: JSON.stringify({ search_product: "Fengshui" })
        })
        .then(response => response.json())
        .then(res => {
            if (res.success && res.data.length > 0) {
                const product = res.data[0];
                const container = document.getElementById("featured-carousel");

                product.variants.forEach(variant => {
                    // const imageName = variant.variant_value.replace(/\s+/g, '_') + ".png";
                    const imageName = variant.file_urls[0] || [];
                    const card = document.createElement("div");
                    card.className = "card";
                    card.setAttribute("data-product-id", product.id); // Add product ID for redirection
                    card.innerHTML = `
                        <div class="card_image">
                            <img src="${imageName}" alt="${variant.variant_value}" class="img-fluid-card">
                        </div>
                        <h4 class="heading2">${product.name} <span></span></h4>
                        <p class="product-price">MRP ₹${variant.selling_price}</p>
                        <div class="card-foot">
                            <div class="qty-selector">
                                <button class="qty-btn minus">−</button>
                                <input type="text" class="qty-input" value="1" min="1" readonly>
                                <button class="qty-btn plus">+</button>
                            </div>
                            <div class="add-to-cart">
                                <a href="#" id="addcart" class="add-to-cart-btn" data-product-id="${product.id}" 
                                   data-variant-id="${variant.id}">Add to Cart</a>
                            </div>
                        </div>

                    `;
                    container.appendChild(card);
                });

                // Make entire card clickable (excluding controls)
                document.addEventListener("click", function (e) {
                    const card = e.target.closest(".card");

                    if (
                        card &&
                        !e.target.closest(".qty-btn") &&
                        !e.target.closest(".qty-input") &&
                        !e.target.closest(".add-to-cart-btn")
                    ) {
                        const productId = card.getAttribute("data-product-id");
                        if (productId) {
                            window.location.href = `product_detail.php?id=${productId}`;
                        }
                    }
                });


                // Quantity control
                document.addEventListener('click', function (e) {
                    if (e.target.classList.contains('plus')) {
                        const input = e.target.previousElementSibling;
                        input.value = parseInt(input.value) + 1;
                    } else if (e.target.classList.contains('minus')) {
                        const input = e.target.nextElementSibling;
                        if (parseInt(input.value) > 1) {
                            input.value = parseInt(input.value) - 1;
                        }
                    }

                    // Add to Cart handler using id="addcart"
                    if (e.target.id === 'addcart') {
                        e.preventDefault();

                        const productId = e.target.dataset.productId;
                        const variantId = e.target.dataset.variantId;
                        const quantity = e.target.closest(".card-foot").querySelector(".qty-input").value;

                        let cartPayload = {
                            product_id: parseInt(productId),
                            quantity: parseInt(quantity)
                        };
                        if (variantId) {
                            cartPayload.variant_id = parseInt(variantId);
                        }

                        const authToken = localStorage.getItem("auth_token");
                        const existingTempId = localStorage.getItem("temp_id");

                        const headers = {
                            "Content-Type": "application/json"
                        };

                        if (authToken) {
                            headers["Authorization"] = `Bearer ${authToken}`;
                        } else if (existingTempId) {
                            cartPayload.cart_id = existingTempId;
                        }

                        fetch("<?php echo BASE_URL; ?>/cart/add", {
                            method: "POST",
                            headers,
                            body: JSON.stringify(cartPayload)
                        })
                        .then(response => response.json())
                        .then(cartRes => {
                            if (cartRes.data) {
                                // Save temp_id if first time (you can use user_id or generate cart_id depending on your backend logic)
                                const existingTempId = localStorage.getItem("temp_id");
                                const authToken = localStorage.getItem("auth_token");
                                if(existingTempId){
                                    console.log("Temp ID is:", existingTempId);
                                }else{
                                    console.log("Auth token is:", authToken)
                                }
                                if (!authToken && !existingTempId && cartRes.data.user_id) {
                                    localStorage.setItem("temp_id", cartRes.data.user_id);
                                }

                                const cardFoot = e.target.closest(".card-foot");
                                cardFoot.innerHTML = `
                                    <a href="cart.php" class="go-to-cart-btn heading2">View Cart</a>
                                `;
                            } else {
                                alert("Failed to add product to cart.");
                            }
                        })
                        .catch(err => {
                            console.error("Cart Add Error:", err);
                            alert("An error occurred while adding to cart.");
                        });

                    }
                });
            } else {
                document.getElementById("featured-carousel").innerHTML = "<p>No featured products found.</p>";
            }
        })
        .catch(error => {
            console.error("Error fetching product:", error);
        });
    });
</script>
