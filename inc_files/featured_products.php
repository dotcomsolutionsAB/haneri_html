<section class="featured">
    <h2 class="heading_1">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme" id="featured-carousel">
        <!-- Products will be inserted here by JS -->
    </div>
</section>

<script>
    // Featured products array
    const featuredProducts = [
        {
            image: "images/Moonlit_White.png",
            title: "Haneri Fengshui",
            subtitle: "Ceiling Fan",
            price: "₹1049.00",
            link: "https://haneri.ongoingsites.xyz/shop.php"
        },
        {
            image: "images/Natura_Pine.png",
            title: "Haneri Fengshui",
            subtitle: "Ceiling Fan",
            price: "₹1049.00",
            link: "https://haneri.ongoingsites.xyz/shop.php"
        },
        {
            image: "images/Velvet_Black.png",
            title: "Haneri Fengshui",
            subtitle: "Ceiling Fan",
            price: "₹1049.00",
            link: "https://haneri.ongoingsites.xyz/shop.php"
        },
        {
            image: "images/Espresso_Walnut.png",
            title: "Haneri Fengshui",
            subtitle: "Ceiling Fan",
            price: "₹1049.00",
            link: "https://haneri.ongoingsites.xyz/shop.php"
        },
        {
            image: "images/Velvet_Black.png",
            title: "Haneri Fengshui",
            subtitle: "Ceiling Fan",
            price: "₹16,999.00",
            link: "#"
        }
    ];

    // Wait for the DOM to load
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("featured-carousel");

        // Populate carousel dynamically
        featuredProducts.forEach(product => {
            const productCard = `
                <div class="card">
                    <div class="card_image">
                        <img src="${product.image}" alt="${product.title}" class="img-fluid">
                    </div>
                    <h4 class="heading2">${product.title} <span>${product.subtitle}</span></h4>
                    <p class="product-price">MRP ${product.price}</p>
                    <a href="${product.link}" class="btn rounded-pill bgremoved px-4">Know More</a>
                </div>
            `;
            container.innerHTML += productCard;
        });

        // Initialize carousel after dynamic content is added
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
    });
</script>
