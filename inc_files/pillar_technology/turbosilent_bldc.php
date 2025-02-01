

<style>
    .wave-box {
      overflow-x: hidden;
      background: linear-gradient(135deg, #00473E, #011d19, #64f4e0);
      background-size: 200% 200%;
      animation: bgFlow 10s ease-in-out infinite;
      position: relative;
      color: #fff;
    }

    /* Gentle background gradient flow */
    @keyframes bgFlow {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    /* FIRST WAVE */
    .wave1 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 15vh;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 100% 100% 0 0;
      animation: wave1Move 6s infinite linear;
      transform: translateX(0);
      z-index: 1;
    }

    @keyframes wave1Move {
      0% {
        transform: translateX(-50%) translateY(0);
      }
      50% {
        transform: translateX(-45%) translateY(5px);
      }
      100% {
        transform: translateX(-50%) translateY(0);
      }
    }

    /* SECOND WAVE */
    .wave2 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 20vh;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 100% 100% 0 0;
      animation: wave2Move 8s infinite ease-in-out;
      transform: translateX(-25%);
      z-index: 2;
    }

    @keyframes wave2Move {
      0% {
        transform: translateX(-25%) translateY(0);
      }
      50% {
        transform: translateX(-20%) translateY(10px);
      }
      100% {
        transform: translateX(-25%) translateY(0);
      }
    }

    /* THIRD WAVE */
    .wave3 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 25vh;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 100% 100% 0 0;
      animation: wave3Move 10s infinite linear;
      transform: translateX(-50%);
      z-index: 3;
    }

    @keyframes wave3Move {
      0% {
        transform: translateX(-50%) translateY(0);
      }
      50% {
        transform: translateX(-45%) translateY(10px);
      }
      100% {
        transform: translateX(-50%) translateY(0);
      }
    }

    /* FOURTH WAVE */
    .wave4 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 30vh;
      background: rgba(255, 255, 255, 0.35);
      border-radius: 100% 100% 0 0;
      animation: wave4Move 12s infinite ease-in-out;
      transform: translateX(-75%);
      z-index: 4;
    }

    @keyframes wave4Move {
      0% {
        transform: translateX(-75%) translateY(0);
      }
      50% {
        transform: translateX(-70%) translateY(15px);
      }
      100% {
        transform: translateX(-75%) translateY(0);
      }
    }

    .content-container {
      position: relative;
      max-width: 800px;
      margin: 0 auto;
      padding: 2rem;
      margin-top: 10vh;
      animation: fadeDown 1.2s ease forwards;
      opacity: 0;
      transform: translateY(-20px);
      z-index: 5;
    }

    @keyframes fadeDown {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .content-container h1 {
      font-size: 2.3rem;
      margin-bottom: 1rem;
      text-shadow: 1px 1px 6px rgba(0,0,0,0.4);
    }

    .content-container h2 {
      font-size: 1.6rem;
      margin: 2rem 0 1rem;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
    }

    .content-container p {
      line-height: 1.7;
      margin-bottom: 1.2rem;
      font-size: 1.05rem;
    }

    strong {
      font-weight: 700;
    }
  </style>

<div class="containe wave-box">
    <div class="row row-bg">
        <div class="col-md-12">
            <p class="mb-2">
            <!-- Wave background elements -->
            <div class="wave1"></div>
            <div class="wave2"></div>
            <div class="wave3"></div>
            <div class="wave4"></div>
            <div class="content-container">
                <h1>Introducing TurboSilent BLDC Technology: Unleashing Unmatched Power and Efficiency</h1>
                <p>
                At Haneri, we redefine engineering excellence with our proprietary
                <strong>TurboSilent BLDC Technology</strong>. This advanced motor design not only delivers
                higher torque and exceptional durability but also ensures unmatched energy efficiency,
                setting a new benchmark for ceiling fan performance and contributing to a greener environment.
                </p>
                <p class="mb-2">
                <h2>What is TurboSilent BLDC Technology?</h2>
                <p>
                <strong>TurboSilent BLDC (Brushless Direct Current) Technology</strong> is an in-house developed
                motor system that employs high-tech electromagnetic and mechanical design principles. This
                cutting-edge innovation enhances torque delivery, minimizes energy losses, and ensures extended
                motor lifespan. TurboSilent motors are engineered to outperform conventional systems, offering
                industry-leading reliability and precision that you can trust.
                </p>
            </div>
        </div>
    </div><!-- End .row -->
</div><!-- End .container -->


<div class="history-section pb-3">
    <div class="containe">
        <div class="row row-bg">
            <div class="col-xl-5 col-lg-6">
                <div class="about-slider owl-carousel owl-theme dots-simple">
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                </div><!-- End .about-slider -->
            </div><!-- End .col-lg-5 -->
            <div class="col-xl-7 col-lg-6 contents">
                <h2>Unique Advantages of TurboSilent BLDC Technology</h2>
                <ul>
                    <li>
                        <strong>
                            Higher Torque for Optimized Performance:
                        </strong>
                        The TurboSilent motor stands out with its superior performance. It achieves higher torque through optimized magnetic flux density and reduced electromagnetic losses. Advanced stator and magnet designs enhance the torque constant (kT), providing superior air circulation, even at varying speeds.
                    </li>
                    <li>
                        <strong>
                            Long-Term Durability:
                        </strong>
                        Designed for long-term durability, the TurboSilent motors are constructed with premium-grade laminations and heat-resistant winding materials to minimize core losses and thermal degradation. The motor is fitted with high-precision ball bearings and balanced rotor assemblies, reducing mechanical wear and extending operational life.
                    </li>
                    <li>
                        <strong>
                            Enhanced Energy Efficiency:
                        </strong>
                        TurboSilent motors utilize sinusoidal commutation to reduce current ripple and improve efficiency. Power electronics are optimized to deliver consistent performance while consuming up to 65% less energy than traditional motors.
                    </li>
                    <li>
                        <strong>
                            Thermal Management of Electronics:
                        </strong>
                        Electronics PCBs are made in India and have been tested according to Indian conditions. A key focus is the thermal management of critical components to ensure longer life and better performance.
                    </li>
                    <li>
                        <strong>
                            In-House Innovation and Testing:
                        </strong>
                        Developed using simulation tools for computational electromagnetic analysis (CEM). Rigorously validated under real-world conditions to ensure robustness across a wide range of operating environments.
                    </li>
                </ul>
            </div><!-- End .col-lg-7 -->
        </div><!-- End .row -->

        <div class="row row-bg">
            <div class="col-xl-5 col-lg-6">
                <div class="about-slider owl-carousel owl-theme dots-simple">
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                </div><!-- End .about-slider -->
            </div><!-- End .col-lg-5 -->
            <div class="col-xl-7 col-lg-6 order-lg-first contents">
                <h2>
                    The Science Behind TurboSilent BLDC Technology
                </h2>
                <ul>
                    <li>
                        <strong>
                            Electromagnetic Optimization:
                        </strong>
                        Uses Finite Element Analysis (FEA) to design and validate the magnetic circuit, maximizing flux density while minimizing losses.
                    </li>
                    <li><strong>Thermal Management:</strong>
                        Employs advanced cooling designs, including optimized ventilation paths and materials, to maintain motor efficiency under continuous operation.
                    </li>
                    <li><strong>Smart Power Electronics:</strong>
                        Integrated drivers, meticulously designed for seamless operation, instil confidence with precise speed control and minimal switching losses. Advanced motor control algorithms, including Field-Oriented Control (FOC), enable precise torque and speed regulation.
                    </li>
                    <li><strong>Structural Engineering:</strong>
                        The magnet rotor dynamics are meticulously optimized, providing reassuring stability and minimizing resonance at all operating speeds. Lightweight, high-strength materials not only reduce the motor's overall weight but also enhance its durability and performance, achieving the perfect balance between these factors.
                    </li>
                </ul>                
            </div>
        </div><!-- End .row -->

        <div class="row row-bg">
            <div class="col-xl-5 col-lg-6">
                <div class="about-slider owl-carousel owl-theme dots-simple">
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                    <div class="about-slider-item">
                        <img class="owl-lazy" data-src="images/place.jpg"
                            src="images/place.jpg" alt="About image description">
                    </div>
                </div><!-- End .about-slider -->
            </div><!-- End .col-lg-5 -->
            <div class="col-xl-7 col-lg-6 contents">
                <h2>
                    Benefits for Customers
                </h2>
                <ul>
                    <li><strong>Enhanced Cooling Performance:</strong>
                        High torque output ensures rapid and consistent airflow delivery, optimized for varied room sizes and ceiling heights.
                    </li>
                    <li><strong>Operational Cost Savings:</strong>
                        Energy efficiency translates to significant reductions in power consumption, aligning with green building standards and energy certifications.
                    </li>
                    <li><strong>Reliability in Extreme Conditions:</strong>
                        Designed to operate in high-temperature environments without compromising on performance or longevity.
                    </li>
                    <li><strong>Noise-Free Operation:</strong>
                        Meets stringent industry acoustic standards, ensuring negligible sound levels suitable for sensitive applications such as hospitals and libraries.
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- End .container -->
</div><!-- End .history-section -->

<div class="containe">
    <div class="row row-bg">
        <div class="col-md-12">
            <p class="mb-2">
                <h2>
                    Why Choose HANERI TurboSilent Ceiling Fans?
                </h2>
                <p>
                    HANERI’S TurboSilent BLDC Technology offers a sophisticated combination of engineering precision and operational excellence. Focusing on high torque, energy savings, and durability, TurboSilent motors set the gold standard in modern ceiling fan design.
                </p>
            </p>
        </div>
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-3"></div><!-- margin -->

<style>
    /* Main Heading Style */
    .about_section {
        color: #fff; /* White text color */
        padding: 5px 65px; /* Spacing inside the heading */
        position: relative; /* Enable pseudo-elements */
        display: inline-block; /* Allow background to wrap the text */
        background: linear-gradient(135deg, #047f89, #3a9aa2);
        border-radius: 0px; /* Rounded corners */
        overflow: hidden; /* Prevent overflow of child elements */
        width:100%;
    }

    /* Geometric Decorative Element */
     .about_section::before {
        content: '';
        position: absolute;
        top: -20px;
        left: -10px;
        width: 260px;
        height: 170px;
        background: #f4f4f42e;
        transform: rotate(45deg);
        z-index: 100;
    }

    .about_section::after {
        content: '';
        position: absolute;
        bottom: -10px;
        right: -15px;
        width: 230px;
        height: 150px;
        background: #dfdfdf;
        transform: rotate(45deg);
        z-index: 1;
    }

    /* Text Layer */
    .about_section span {
        position: relative; /* Ensure text is above pseudo-elements */
        z-index: 2; /* Bring text to the front */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .about_section {
            font-size: 2.5rem; /* Adjust font size for smaller screens */
            padding: 15px 20px; /* Reduce padding */
        }
    }

</style>