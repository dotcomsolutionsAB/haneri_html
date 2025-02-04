
<div class="aab">
    <!-- Row 1 -->
    <div class="row-container">
        <div class="capability-row">
            <div class="capability-content">
                <h2 class="heading2 primary">Excellence in Manufacturing, R&D, and Innovation</h2>
                <p class="paragraph1">
                    At Haneri, we seamlessly integrate design, innovation, and precision manufacturing, ensuring every product exemplifies quality, functionality, and elegance.
                </p>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Excellence in Manufacturing">
            </div>
        </div>
        <div class="capability-row reverse">
            <div class="capability-content">
                <h2 class="heading2 primary">Product-Specific R&D and Prototyping Facilities</h2>
                <p class="paragraph1">
                    Innovation is at the heart of Haneri. Our dedicated research and development teams focus on creating products that redefine everyday living.
                </p>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="R&D and Prototyping Facilities">
            </div>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="row-container">
        <div class="capability-row">
            <div class="capability-content">
                <h2 class="heading2 primary">Comprehensive Manufacturing Processes</h2>
                <p class="paragraph1">
                    Our robust manufacturing capabilities allow us to oversee every aspect of production.
                </p>
                <ul class="ulclass">
                    <li>Injection Moulding</li>
                    <li>Sheet Metal Forming</li>
                    <li>Specialized assembly lines for FG and BLDC motors</li>
                </ul>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Comprehensive Manufacturing">
            </div>
        </div>
        <div class="capability-row reverse">
            <div class="capability-content">
                <h2 class="heading2 primary">Superior Surface Finishing Capabilities</h2>
                <p class="paragraph1">
                    Haneri’s advanced surface finishing ensures that every product meets the highest standards of aesthetics and longevity.
                </p>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Surface Finishing Capabilities">
            </div>
        </div>
    </div>

    <!-- Row 3 -->
    <div class="row-container">
        <div class="capability-row">
            <div class="capability-content">
                <h2 class="heading2 primary">Design & Tooling Expertise</h2>
                <p class="paragraph1">
                    Our in-house tool room for mold manufacturing and sophisticated 3D CAD design capabilities empower us to innovate with precision.
                </p>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Design & Tooling Expertise">
            </div>
        </div>
    </div>

    <p style="text-align: justify; margin-top: 20px;">
        With a relentless focus on R&D, superior manufacturing capabilities, and rigorous quality control, Haneri creates products that set a new benchmark in innovation, durability, and style.
    </p>

    <h5 class="capability-conclusion">
        <strong>At Haneri, we don’t just make products—we craft experiences.</strong>
    </h5>
</div>
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