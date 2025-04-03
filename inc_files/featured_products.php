<?php include("configs/config.php"); ?>
<style>
    .featured-products-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
}

.featured-products-grid .card {
    width: calc(25% - 20px); /* 4 in a row with gap */
    min-width: 220px;
    box-sizing: border-box;
}
.featured .card {
    margin-bottom: 3rem;
    border: 1px solid #ddd;
    border-radius: 0;
    font-size: 1.4rem;
    min-height: 400px;
    background: radial-gradient(#ecf6f6d1, #00473e3d);
    margin-top: 10px;
    border-radius: 20px;
    padding: 20px;
    text-align: justify;
    border: none;
    width: 299.462px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);

}
.featured .featured-products-carousel .card {
    border-radius: 20px;
    padding: 20px;
    text-align: justify;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
.featured .card .bgremoved{
    border-top: 1px solid #315858;
    text-align: left;
    padding-left: 0px !important;
}
/* Responsive adjustments */
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
                        <a href="/product_details.php?sku=${variant.id}" class="btn rounded-pill bgremoved px-4">Know More</a>
                    `;
                    container.appendChild(card);
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
