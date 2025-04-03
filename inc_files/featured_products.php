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
        const apiUrl = "{{base_url}}/products/get_products";

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
