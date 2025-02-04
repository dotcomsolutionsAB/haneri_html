<?php include("../header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Brands</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="containe text-left">
        <h1 class="text-uppercase about_section">OUR BRANDS</h1>
    </div>
    <div class="container">                
        <style type="text/css" media="all">
            /* General Section Styling */
            .brands-section {
                padding: 20px 0px;
                /* background-color: #f9f9f9; */
                text-align: center;
            }

            /* .brands-section .section-title {
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 40px;
                text-transform: uppercase;
                color: #333;
            } */

            /* Brand Rows */
            .brand-row-container {
                margin-bottom: 30px;
                padding: 20px 0px;
                /* border: 1px solid #ddd; */
                border-radius: 10px;
                background-color: #fff;
            }

            .brand-row {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 20px;
            }

            .brand-row.reverse {
                flex-direction: row-reverse;
            }

            .brand-content {
                flex: 1;
                max-width: 70%;
                text-align: left;
                padding: 10px 0px;
            }

            .brand-content p {
                font-size: 18px;
                line-height: 24px;
                text-align: justify;
                color: #555;
                font-family: 'Barlow Condensed';
            }

            .brand-content strong {
                font-weight: lighter;
                font-family: 'Barlow Condensed';
                color: #222;
                font-size: x-large;
            }

            .brand-image {
                flex: 1;
                max-width: 30%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .brand-image img {
                width: 100%;
                max-width: 300px;
                height: auto;
                object-fit: contain;
                border-radius: 10px;
                /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
            }
        </style>
        <section id="our-brands" class="brands-section">
            <?php include("inc_files/about/our-brands.php"); ?>
        </section>
    </div>

</main><!-- End .main -->

<?php include("../footer.php"); ?>