<?php include("header.php"); ?>

<!-- Category section  -->
<main class="main">
    <!-- Slider section -->
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big">
        <div class="home-slide home-slide1 banner d-flex align-items-center">
            <img class="slide-bg" src="images/Slider1_old.jpg"
                style="background-color: #ecc;" alt="home banner">
            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                <h1><strong>A true</strong><br><span> revolution</span></h1>
                <p class="slider_text">Haneri is the brainchild of a passionate team with over 75 years of collective <br>
                experience in the consumer durable industry. With expertise spanning <br>
                product creation, innovation, engineering, and manufacturing, we envisioned <br>
                Haneri as a brand that caters to consumers seeking products that seamlessly <br>
                blend with modern living. At Haneri, our mission is to inspire everyday life by <br>
                offering thoughtfully designed, functional, and future-ready solutions.</p>
                    <a href="#" class="btn btn-dark slider_btn btn-xl" role="button">Buy Now</a>
            </div><!-- End .banner-layer -->
        </div><!-- End .home-slide -->
    </div><!-- End .home-slider -->

    

    <div class="container">
        <!-- Featured Products section -->
            <?php include("inc_files/featured_products.php"); ?>

            <!-- About Haneri section -->
            <section class="about-haneri">
                <div class="about-content">
                    <div class="about-image">
                        <!-- Replace this placeholder with the actual image -->
                        <img src="images/home_about.png" alt="Haneri Image">
                    </div>
                    <div class="about-text">
                        <div class="q_head">
                            <span class="q_head_1">What is</span> 
                            <span class="q_head_2">HANERI?</span>
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
                            <a class="btn-know-more">KNOW MORE</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Desktop Slider -->
            <!-- <div class="home-slider1 desktop-slider owl-carousel owl-theme">
                <div class="home-slide"><img src="images/Slider1_old.jpg" alt="Desktop Slide 1"></div>
                <div class="home-slide"><img src="images/Slider2.jpg" alt="Desktop Slide 2"></div>
                <div class="home-slide"><img src="images/Slider3.jpg" alt="Desktop Slide 3"></div>
            </div> -->
        `   <div class="home-slider desktop-slider1 slide-animate owl-carousel owl-theme show-nav-hover nav-big">
                <div class="home-slide home-slide1 banner d-flex align-items-center">
                    <img class="slide-bg" src="images/Slider.jpg"
                        style="background-color: #ecc;" alt="home banner">
                </div>
                <div class="home-slide home-slide1 banner d-flex align-items-center">
                    <img class="slide-bg" src="images/Slider2.jpg"
                        style="background-color: #ecc;" alt="home banner">
                </div>
                <div class="home-slide home-slide1 banner d-flex align-items-center">
                    <img class="slide-bg" src="images/Slider3.jpg"
                        style="background-color: #ecc;" alt="home banner">
                </div>
            </div>
            <!-- Mobile Slider -->
            <div class="home-slider mobile-slider owl-carousel owl-theme">
                <div class="home-slide"><img src="images/Slide1_mobile.jpg" alt="Mobile Slide 1"></div>
                <!-- <div class="home-slide"><img src="images/Slide2_mobile.jpg" alt="Mobile Slide 2"></div> -->
                <div class="home-slide"><img src="images/Slide3_mobile.jpg" alt="Mobile Slide 3"></div>
            </div>

            <script>
                $(document).ready(function(){
                    $(".desktop-slider1").owlCarousel({
                        items: 1,
                        loop: true,
                        nav: true,
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 5000
                    });

                    $(".mobile-slider").owlCarousel({
                        items: 1,
                        loop: true,
                        nav: true,
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 5000
                    });
                });
            </script>

            <?php include("inc_files/best_sellers.php"); ?>
    </div>
    
    <div class="container">
        <div class="bespoke-content">
            <div class="bespoke-text">
                <img src="images/Haneri_Bespoke.jpg" alt="Haneri_Bespoke.jpg">
            </div>
            <div class="bespoke-image">
                <img src="images/Haneri_Website_Wireframe_V1.1.png" alt="Crafting Image">
            </div>
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
                        <a type="submit" class="btn-send-msg">Send Message</a>
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

