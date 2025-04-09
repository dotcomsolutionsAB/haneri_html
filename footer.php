<?php
// Include the loadData.php file
include('configs/read.php');

// Load the data from the JSON file
$data = loadData('configs/haneri.json');

// Use the data
echo '<pre>';
print_r($data); // This will show the contents of the $data array
echo '</pre>';
// die();
?>



    <footer class="footer">
        <div class="container">
            <div class="footer-top top-border d-flex align-items-center justify-content-between flex-wrap">
                <div class="footer-left widget-newsletter d-md-flex align-items-center">
                    <!-- <div class="widget-newsletter-info">
                        <h5 class="widget-newsletter-title text-uppercase m-b-1">subscribe newsletter</h5>
                        <p class="widget-newsletter-content mb-0">Get all the latest information on Events, Sales
                            and Offers.</p>
                    </div>
                    <form action="#">
                        <div class="footer-submit-wrapper d-flex">
                            <input type="email" class="form-control" placeholder="Email address..." size="40"
                                required>
                            <button type="submit" class="btn btn-dark btn-sm">Subscribe</button>
                        </div>
                    </form> -->

                    <!-- <div class="footer_logo">
                        <a href="#">
                            <img src="images/logo_white.png" alt="logo">
                        </a>
                    </div> -->

                </div>
                <!-- <div class="footer-right">
                    <div class="social-icons">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                        <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                    </div>
                </div> -->
            </div>

            <div class="footer-middle">
                <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="widget right">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="images/logo_white.png" alt="logo">
                                </a>
                            </div>
                        </div><!-- End .widget -->                            
                    </div>

                    <div class="col-sm-6 col-lg-3 col-xl-2">
                        <div class="widget center">
                            <h4 class="widget-title">Pillar Technology</h4>
                            <div class="links link-parts row">
                                <ul class="link-part col-xl-12 mb-0">
                                    <li><a href="air_curve_design.php">Air Curve Design</a></li>
                                    <li><a href="turbosilent_bldc.php">Turbosilent BLDC</a></li>
                                    <li><a href="mass.php">M.A.S.S</a></li>
                                    <li><a href="lumiambience.php">Lumiambience</a></li>
                                    <li><a href="scan.php">S.C.A.N</a></li>
                                </ul>
                                <!-- <ul class="link-part col-xl-6">
                                    <li class="pl-xl-2 ml-xl-1"><a href="#">Orders History</a></li>
                                    <li class="pl-xl-2 ml-xl-1"><a href="#">Advanced Search</a></li>
                                </ul> -->
                            </div>
                        </div><!-- End .widget -->
                    </div>
                    <div class="col-sm-6 col-lg-3 col-xl-2">
                        <div class="widget center">
                            <h4 class="widget-title">Our Policy</h4>
                            <div class="links link-parts row">
                                <ul class="link-part col-xl-12 mb-0">
                                    <li><a href="faqs.php">FAQs</a></li>
                                    <li><a href="privacy_policy.php">Privacy Policy</a></li>
                                    <li><a href="shipping_policy.php">Shipping Policy</a></li>
                                    <li><a href="wir_policy.php">WIR Policy</a></li>
                                </ul>
                                <!-- <ul class="link-part col-xl-6">
                                    <li class="pl-xl-2 ml-xl-1"><a href="#">Orders History</a></li>
                                    <li class="pl-xl-2 ml-xl-1"><a href="#">Advanced Search</a></li>
                                </ul> -->
                            </div>
                        </div><!-- End .widget -->
                    </div>

                    <div class="col-sm-6 col-lg-3 col-xl-4">
                        <div class="widget">
                            <h4 class="widget-title">Company Info</h4>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="contact-widget">
                                        <!-- <h4 class="widget-title">ADDRESS:</h4> -->
                                        <p><i class="fas fa-home"></i></p>
                                        <p>
                                            <span>
                                                HANERI ELECTRICALS LLP, A-48 
                                            <br>
                                                <?php 
                                                    if ($data['name']) {
                                                        echo  $data['name'];
                                                    }
                                                ?>
                                            </span>
                                        </p>
                                        <!-- <p>
                                            <span>
                                                HANERI ELECTRICALS LLP, A-48 
                                            <br>
                                                SECTOR 57 , NOIDA , UTTAR PRADESH
                                                PINCODE - 201301
                                            </span>
                                        </p> -->
                                    </div>
                                    <div class="contact-widget">
                                        <p><i class="fas fa-phone"></i></p>
                                        <p><a href="#">(123) 456-7890</a></p>
                                    </div>
                                    <div class="contact-widget email">
                                        <p><i class="fas fa-envelope"></i></p>
                                        <p><a href="mailto:info@haneri.in">info@haneri.in</a></p>
                                    </div>
                                    <div class="contact-widget">
                                        <p><i class="fas fa-clock"></i></p>
                                        <p><a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright">&copy; 2025 | Haneri </span>
                    <!-- <span class="footer-copyright">&copy; 2025 Dotcom Solutions. All rights reserved.</span> -->
                </div>
                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="social-icons">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                        <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                    </div>
                    <!-- <div class="payment-icons mr-0">
                        <span class="payment-icon visa"
                            style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                        <span class="payment-icon paypal"
                            style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                        <span class="payment-icon stripe"
                            style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                        <span class="payment-icon verisign"
                            style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <?php include("../inc_files/loading.php"); ?>
    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <!-- Mobile_sidebar code -->
         <?php include("../inc_files/mobile_sidebar.php"); ?>

    </div><!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <!-- Mobile sitky bottom nav -->
        <?php include("../inc_files/mobile_sticky_bottom_nav.php"); ?>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
    <!-- Loader JS -->
    <script>
        const letters = document.querySelectorAll('.dc-letter');
        let stopAnimation = false;

        function animateLetters() {
        if (stopAnimation) return;

        letters.forEach((l) => {
            l.classList.remove('center-style');
            l.style.opacity = 0;
            l.style.transform = 'translateX(-120%)';
            l.style.color = 'black';
        });

        letters.forEach((letter, index) => {
            setTimeout(() => {
            letter.style.opacity = 1;
            letter.style.transform = 'translateX(0)';
            }, index * 250);
        });

        const inTime = letters.length * 250 + 400;

        setTimeout(() => {
            letters.forEach((l) => l.classList.add('center-style'));
        }, inTime);

        const outStart = inTime + 800;
        setTimeout(() => {
            [...letters].reverse().forEach((letter, i) => {
            setTimeout(() => {
                letter.classList.remove('center-style');
                letter.style.opacity = 0;
                letter.style.transform = 'translateX(120%)';
            }, i * 250);
            });
        }, outStart);

        const finishTime = outStart + letters.length * 250 + 600;
        setTimeout(() => {
            animateLetters();
        }, finishTime);
        }

        function dcHideLoader() {
        stopAnimation = true;
        document.body.classList.add("dc-loaded");
        console.log("✅ All content (HTML + API) loaded – hiding loader...");
        }

        // Global tracking of fetch and XHR requests
        let pendingFetches = 0;

        // Track fetch()
        const originalFetch = window.fetch;
        window.fetch = function (...args) {
        pendingFetches++;
        return originalFetch(...args).finally(() => {
            pendingFetches--;
            checkIfReadyToHideLoader();
        });
        };

        // Track XMLHttpRequest (e.g., jQuery or other libs)
        (function (open) {
        XMLHttpRequest.prototype.open = function (...args) {
            this.addEventListener('loadend', () => {
            pendingFetches--;
            checkIfReadyToHideLoader();
            });
            pendingFetches++;
            open.apply(this, args);
        };
        })(XMLHttpRequest.prototype.open);

        // Check if all requests have finished
        function checkIfReadyToHideLoader() {
        if (pendingFetches === 0) {
            setTimeout(() => {
            if (pendingFetches === 0) {
                dcHideLoader();
            }
            }, 500); // slight delay to ensure rendering
        }
        }

        // Start animation when HTML & assets are loaded
        window.addEventListener("load", function () {
        console.log("⚡ Page loaded – starting HANERI animation...");
        animateLetters();

        // Optional fallback: hide loader after X sec in worst case
        setTimeout(() => {
            if (!document.body.classList.contains('dc-loaded')) {
            console.warn("⏱️ Force hiding loader after timeout...");
            dcHideLoader();
            }
        }, 15000); // failsafe after 15s
        });
    </script>

</body>

</html>