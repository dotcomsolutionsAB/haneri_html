<section class="featured">
    <h2 class="heading_1">Featured Products</h2>
    <div class="featured-products-carousel owl-carousel owl-theme" id="featured-carousel"></div>
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
                const carousel = document.getElementById("featured-carousel");

                product.variants.forEach(variant => {
                    const imageName = variant.variant_value.replace(/\s+/g, '_') + ".png"; // e.g. Espresso_Walnut.png
                    const card = `
                        <div class="card">
                            <div class="card_image">
                                <img src="images/${imageName}" alt="${variant.variant_value}" class="img-fluid">
                            </div>
                            <h4 class="heading2">${product.brand.name} ${product.name} <span>${product.category.name}</span></h4>
                            <p class="product-price">MRP ₹${variant.selling_price}</p>
                            <a href="/product_details.php?sku=${variant.id}" class="btn rounded-pill bgremoved px-4">Know More</a>
                        </div>
                    `;
                    carousel.innerHTML += card;
                });

                // Initialize Owl Carousel after adding products
                $('.featured-products-carousel').owlCarousel({
                    loop: false,
                    margin: 20,
                    nav: true,
                    dots: false,
                    items: 4,
                    slideBy: 2,
                    navText: [
                        '<span class="owl-prev-btn fetured-next">‹</span>',
                        '<span class="owl-next-btn fetured-next">›</span>'
                    ],
                    responsive: {
                        0: { items: 1, slideBy: 1 },
                        576: { items: 2, slideBy: 2 },
                        768: { items: 3, slideBy: 2 },
                        992: { items: 4, slideBy: 2 }
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
