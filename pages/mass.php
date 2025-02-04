<?php include("../header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">M.A.S.S®</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="containe text-left">
        <h1 class="text-uppercase about_section">M.A.S.S ( More Air, Slow Speed )</h1>
    </div>
    <div class="container"> 
        <style type="text/css" media="all">
            /* General Section Styling */
            .brands-section {
                padding: 50px 20px;
                /* background-color: #f9f9f9; */
                text-align: center;
            }
            .mass {
                padding: 20px 0px;
                padding-top: 1rem;
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
                max-width: 65%;
                text-align: left;
                padding: 10px 0px;
                text-align: justify;
            }
            .brand-content h2, .head h2{
                font-weight: 400;
                margin-bottom: 1.2rem;
            }
            .head p {
                font-size: 18px;
                color: #222;
                font-family: 'Barlow Condensed';
            }
            .brand-content p {
                font-size: 18px;
                line-height: 24px;
                text-align: justify;
                color: #555;
                font-family: 'Barlow Condensed';
            }
            .brand-content li{
                font-size: 18px;
                color: #222;
                font-family: 'Barlow Condensed';
            }
            .brand-content strong {
                font-weight: 600;
                font-size: 18px;
            }

            .brand-image {
                flex: 1;
                max-width: 35%;
                display: flex;
                align-items: flex-start;
                justify-content: center;
                padding-top: 15px;
            }

            .brand-image img {
                width: 100%;
                max-width: 500px;
                height: auto;
                object-fit: contain;
                border-radius: 0px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
        </style>                          
        <section id="mass" class="mass">
            <?php include("inc_files/pillar_technology/mass_tech.php"); ?>
        </section>
    </div>
</main><!-- End .main -->

<?php include("../footer.php"); ?>