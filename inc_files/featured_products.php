<?php include("configs/config.php"); ?>
<style>
.featured-products-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
}

.featured-products-grid .card {
    width: calc(25% - 20px);
    min-width: 220px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    background: #fff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card_image img {
    width: 100%;
    height: auto;
    object-fit: contain;
    margin-bottom: 10px;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.qty-selector {
    display: flex;
    align-items: center;
    gap: 5px;
}

.qty-input {
    width: 40px;
    text-align: center;
    padding: 3px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.qty-btn {
    background: #eee;
    border: 1px solid #ccc;
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 1;
    border-radius: 4px;
    cursor: pointer;
}

.add-to-cart-btn {
    background-color: #000;
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 50px;
    cursor: pointer;
    white-space: nowrap;
}

@media (max-width: 992px) {
    .featured-products-grid .card {
        width: calc(33.33% - 20px);
    }
}
@media (max-width: 768px) {
    .featured-products-grid .card {
        width: calc(50% - 20px);
    }
}
@media (max-width: 480px) {
    .featured-products-grid .card {
        width: 100%;
    }
}

</style>
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
                    const imageName = variant.variant_value.replace(/\s+/g, '_') + ".png";

                    const card = document.createElement("div");
                    card.className = "card";
                    card.innerHTML = `
                        <div class="card_image">
                            <img src="images/${imageName}" alt="${variant.variant_value}" class="img-fluid">
                        </div>
                        <h4 class="heading2">${product.brand.name} ${product.name} <span>${product.category.name}</span></h4>
                        <p class="product-price">MRP ₹${variant.selling_price}</p>
                        <div class="card-footer">
                            <div class="qty-selector">
                                <button class="qty-btn minus">−</button>
                                <input type="number" class="qty-input" value="1" min="1">
                                <button class="qty-btn plus">+</button>
                            </div>
                            <button class="btn add-to-cart-btn">Add to Cart</button>
                        </div>
                    `;
                    container.appendChild(card);
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
