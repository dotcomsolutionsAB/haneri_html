<div class="containe text-left">
    <h1 class="text-uppercase about_section">OUR BRANDS</h1>
</div>
<style>
    /* Main Heading Style */
.about_section {
    font-family: 'Poppins', sans-serif; /* Stylish and clean font */
    font-size: 3.5rem; /* Large heading size */
    font-weight: 700; /* Extra bold text */
    color: #fff; /* White text color */
    text-transform: uppercase; /* Ensure text is uppercase */
    padding: 20px 30px; /* Spacing inside the heading */
    margin: 20px 0; /* Space around the heading */
    position: relative; /* Enable pseudo-elements */
    display: inline-block; /* Allow background to wrap the text */
    background: linear-gradient(135deg, #ff416c, #ff4b2b); /* Vibrant gradient background */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Soft shadow for depth */
    overflow: hidden; /* Prevent overflow of child elements */
}

/* Geometric Decorative Element */
.about_section::before {
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2); /* Semi-transparent overlay */
    transform: rotate(45deg); /* Create a diamond shape */
    z-index: 1; /* Layer it below the text */
}

.about_section::after {
    content: '';
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1); /* Faint geometric accent */
    transform: rotate(45deg); /* Diamond shape */
    z-index: 1; /* Place below the text */
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
<!-- Row 1: Haneri -->
<div class="brand-row-container">
    <div class="brand-row">
        <div class="brand-content">
            <p>
                <strong>Haneri </strong> is a movement driven by a relentless passion to transform the way we live. By turning everyday routines into moments of inspiration, Haneri redefines what consumer experiences can be. At its heart lies innovation, seamlessly combining cutting-edge technology, exceptional quality, and luxurious design—all made accessible to everyone. Motivated by a vision to empower and elevate, Haneri crafts solutions that simplify life while enriching spaces with beauty and sophistication. It’s not just about creating products—it’s about delivering on a commitment to help people live better, dream bigger, and turn their environments into havens of comfort and joy. With Haneri, the future of living begins now—where inspiration meets innovation, and the ordinary becomes extraordinary.
            </p>
        </div>
        <div class="brand-image">
            <img src="images/place.jpg" alt="Haneri - Excellence in Manufacturing">
        </div>
    </div>
</div>

<!-- Row 2: Haneri Bespoke -->
<div class="brand-row-container">
    <div class="brand-row reverse">
        <div class="brand-content">
            <p>
                <strong>Haneri Bespoke </strong> Embodies personalization at its finest, bringing individuality and style to your living or workspace. With a focus on allowing consumers to select colors, finishes, and materials crafted to their preferences, it bridges the gap between functionality and self-expression. Whether you're refreshing your home décor or conceptualizing a modern office, "Haneri Bespoke" transforms your vision into reality. It is more than a product; it's an extension of your personality, crafted to reflect your unique identity while seamlessly blending with your environment. Experience the art of personalized luxury, designed exclusively for you.
            </p>
        </div>
        <div class="brand-image">
            <img src="images/place.jpg" alt="Haneri Bespoke - Personalized Living">
        </div>
    </div>
</div>

<!-- Row 3: Haneri Professional -->
<div class="brand-row-container">
    <div class="brand-row">
        <div class="brand-content">
            <p>
                <strong>Haneri Professional </strong> solutions are purpose-built to address the diverse and large-scale needs of industries and businesses. Engineered with precision, these products are designed to deliver exceptional performance and unwavering reliability, even in the most challenging environments. Crafted to endure rigorous demands, they combine robust durability with cutting-edge technology. By ensuring seamless functionality and consistent results, "Haneri Professional" empowers enterprises to enhance productivity, optimize operations, and achieve sustainable success with confidence.
            </p>
        </div>
        <div class="brand-image">
            <img src="images/place.jpg" alt="Haneri Professional - Industrial Solutions">
        </div>
    </div>
</div>
<div class="mb-3"></div><!-- margin -->
