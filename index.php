<?php include("header.php"); ?>

<!-- Category section  -->
<main class="main">
    <!-- Slider section -->
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big">
        <div class="home-slide home-slide1 banner d-flex align-items-center">
            <img class="slide-bg" src="images/Slider1.jpg"
                style="background-color: #ecc;" alt="home banner">
            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                <h1><strong>A true</strong><br><span> revolution</span></h1>
                <p class="slider_text">Haneri is the brainchild of a passionate team with over 75 years of collective <br>
                experience in the consumer durable industry. With expertise spanning <br>
                product creation, innovation, engineering, and manufacturing, we envisioned <br>
                Haneri as a brand that caters to consumers seeking products that seamlessly <br>
                blend with modern living. At Haneri, our mission is to inspire everyday life by <br>
                offering thoughtfully designed, functional, and future-ready solutions.</p>
                    <a href="#" class="btn btn-dark slider_btn btn-xl" role="button">Shop Now</a>
            </div><!-- End .banner-layer -->
        </div><!-- End .home-slide -->
    </div><!-- End .home-slider -->

    <div class="container">
        <!-- Featured Products section -->
        <!-- <section class="heading_1">
                <h2 class="heading_1">Featured Products</h2>
                <div class="product-grid">
                    <?php
                    $products = [
                        ["src" => "images/f1.png", "alt" => "Black Fan"],
                        ["src" => "images/f2.png", "alt" => "Wooden Fan"],
                        ["src" => "images/f3.png", "alt" => "White Fan"],
                        ["src" => "images/f4.png", "alt" => "Black Fan 2"]
                    ];
                    foreach ($products as $product) {
                        echo "<div class='product'>
                                <a href='#'><img src='{$product['src']}' alt='{$product['alt']}'></a>
                              </div>";
                    }
                    ?>
                </div>
            </section> -->
        <?php include("inc_files/featured_products.php"); ?>

        <!-- About Haneri section -->
        <section class="about-haneri">
            <div class="about-content">
                <div class="about-image">
                    <!-- Replace this placeholder with the actual image -->
                    <img src="images/about13.jpg" alt="Haneri Image">
                </div>
                <div class="about-text">
                    <div class="q_head">
                        <h3>What is</h3>
                        <p><span>HANERI?</span></p>
                    </div>
                    <div class="q_answer">
                        <p>
                            Haneri is the brainchild of a passionate team with over 75 years of collective experience in the consumer durable industry.
                            With expertise spanning product creation, innovation, engineering, and manufacturing, we envisioned Haneri as a brand
                            that caters to consumers seeking products that seamlessly blend with modern living. At Haneri, our mission is to inspire
                            everyday life by offering thoughtfully designed, functional, and future-ready solutions.
                        </p>
                        <p>
                            Our founding team is a diverse mix of individuals across different age groups and backgrounds, reflecting the aspirations
                            of today’s consumers and those of the future. Together, we aim to redefine the experience with products that resonate with
                            evolving lifestyles, delivering value and inspiration in every interaction. Haneri seeks to create solutions for all your
                            needs, including home, office, and commercial spaces.
                        </p>
                        <button class="btn-know-more">KNOW MORE</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us section -->
        <section class="why-choose-us">
            <div class="icons-container">
                <div class="icon-item">
                    <img src="images/Logo1.png" alt="Quality">
                </div>
                <div class="icon-item">
                    <img src="images/Logo2.png" alt="Innovation">
                </div>
                <div class="icon-item">
                    <img src="images/Logo3.png" alt="Customer Focus">
                </div>
            </div>
        </section>
    </div>

    <section class="container pb-3 mb-1">
        <h2 class="heading_1">Best Sellers</h2>
        <div class="row py-4">
            <?php
            $best_sellers = [
                ["src" => "images/f5.png", "alt" => "Product 1"],
                ["src" => "images/f6.png", "alt" => "Product 2"],
                ["src" => "images/f13.png", "alt" => "Product 3"],
                ["src" => "images/f8.png", "alt" => "Product 4"],
                ["src" => "images/f9.png", "alt" => "Product 5"],
                ["src" => "images/f10.png", "alt" => "Product 6"]
            ];
            foreach ($best_sellers as $product) {
                echo "<div class='col-6 col-sm-4 col-md-3 col-xl-2 appear-animate' data-animation-name='fadeIn' data-animation-delay='300' data-animation-duration='1000'>
                            <div class='product-default inner-quickview inner-icon'>
                                <figure>
                                    <a href='#'>
                                        <img src='{$product['src']}' width='273' height='273' alt='{$product['alt']}' />
                                    </a>
                                    <div class='btn-icon-group'>
                                        <a href='#' class='btn-icon btn-add-cart product-type-simple'><i class='icon-shopping-cart'></i></a>
                                    </div>
                                    <a href='#' class='btn-quickview' title='Quick View'>Quick View</a>
                                </figure>
                            </div>
                        </div>";
            }
            ?>
        </div>
    </section>

    <div class="bespoke-content">
        <div class="bespoke-text">
            <img src="images/Haneri_Bespoke.jpg" alt="Haneri_Bespoke.jpg">
        </div>
        <div class="bespoke-image">
            <img src="images/Haneri_Website_Wireframe_V1.1.png" alt="Crafting Image">
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="container">
        <div class="row faq">
            <div class="col-lg-6">
                <h2 class="heading_1">Frequently Asked Questions</h2>
                <div id="accordion">
                    <?php
                    $faqs = [
                        ["id" => "collapseOne", "question" => "What makes Haneri’s design approach different from other brands?", "answer" => "At Haneri, our design philosophy integrates advanced engineering with aesthetics to create solutions that are visually striking and functionally superior..."],
                        ["id" => "collapse2", "question" => "How does Haneri ensure the quality and durability of its products?", "answer" => "Each Haneri product undergoes extensive testing, uses high-quality materials, and meets global industry standards..."],
                        ["id" => "collapse3", "question" => "Are Haneri products designed with sustainability in mind?", "answer" => "Sustainability is at the heart of our production process. We prioritize eco-friendly materials and energy-efficient manufacturing..."],
                        ["id" => "collapse4", "question" => "What kind of technology is used in Haneri products?", "answer" => "Haneri leverages IoT integration, automation, and precision engineering to offer seamless, intuitive solutions..."],
                        ["id" => "collapse5", "question" => "Are your products compatible with other smart home devices?", "answer" => "Many Haneri products integrate with smart home ecosystems like Alexa, Google Home, and IoT devices..."],
                        ["id" => "collapse6", "question" => "Can I customize a Haneri product to suit my needs?", "answer" => "We offer customization options for select products. Contact our support team to discuss your requirements..."]
                    ];
                    foreach ($faqs as $faq) {
                        echo "<div class='card card-accordion'>
                                    <a class='card-header override-color collapsed' href='#' data-toggle='collapse' data-target='#{$faq['id']}' aria-expanded='true' aria-controls='{$faq['id']}'>
                                        {$faq['question']}
                                    </a>
                                    <div id='{$faq['id']}' class='collapse' data-parent='#accordion'>
                                        <p>{$faq['answer']}</p>
                                    </div>
                                </div>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="heading_1">Send Us a Message</h2>
                <form class="mb-0" action="#">
                    <div class="form-group">
                        <label class="mb-1" for="contact-name">Your Name <span class="required">*</span></label>
                        <input type="text" class="form-control" id="contact-name" name="contact-name" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="contact-email">Your E-mail <span class="required">*</span></label>
                        <input type="email" class="form-control" id="contact-email" name="contact-email" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="contact-message">Your Message <span class="required">*</span></label>
                        <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
                    </div>
                    <div class="form-footer mb-0">
                        <button type="submit" class="btn btn-dark font-weight-normal">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Blogs Section -->
    <div class="container">
        <?php include("inc_files/index_blogs.php"); ?>
    </div>
</main><!-- End .main -->
<?php include("footer.php"); ?>

<!-- <style>
 .blog-item{
    min-height: 580px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    border-radius: 50px;
    gap:20px;
    box-shadow: 0 4px 10px rgb(0 0 0 / 16%); 
 } 
 .read-more-button{
    border-radius: 10px;
    padding: 1em 1.6em;
    font-size: 12px;
    margin-bottom: 10px;
 }
 .blog-item img {
    width: 100%;
    height: 100%;
    border-radius: 50px;
    /* object-fit: contain; */
 }
 .contents{
    min-height: 530px;
    display: flex;
    /* background: antiquewhite; */
    justify-content: space-between;
    flex-direction: column;
 }  
 .blog-content{
    min-height: 235px;
 }
 .blog-content p{
    display: flex;
    text-align: justify;
    padding: 0px 15px;

 }
 .blog-content h3{
    margin-top: 20px;
 }
 .btns{
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
 }
 .btns a{

 }
 .blog-image{
    height: 280px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
 }
</style> -->