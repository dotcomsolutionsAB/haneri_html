<?php include("header.php"); ?>

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="demo4.html"><i class="icon-home"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					Contact Us
				</li>
			</ol>
		</div>
	</nav>

<section class="contact_page container">
	<div class="row align-items-stretch">
		<!-- Map Section -->
		<div class="col-md-6">
			<div id="map" style="height: 100%;">
				<iframe 
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.4769961623215!2d78.05591217560216!3d29.96571882496337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390949ce6818bc2d%3A0x27f1806b2069b60!2sElza%20International!5e0!3m2!1sen!2sin!4v1742986450671!5m2!1sen!2sin" 
					width="100%" 
					height="100%" 
					style="border:0;" 
					allowfullscreen="" 
					loading="lazy" 
					referrerpolicy="no-referrer-when-downgrade">
				</iframe>
			</div>
		</div>

		<!-- Contact Info Section -->
		<div class="col-md-6">
			<div class="contact-info p-4">
				<h2 class="heading2 primary ls-n-25 mb-4">Contact Info</h2>
				<p class="paragraph2 mb-4">
					Haneri is the brainchild of a passionate team with over 75 years of collective experience in the consumer durable industry. With expertise spanning product creation, innovation, engineering, and manufacturing, we envisioned Haneri as a brand that caters to consumers seeking products that seamlessly blend with modern living. At Haneri, our mission is to inspire everyday life by offering thoughtfully designed, functional, and future-ready solutions.
				</p>

				<div class="row text-center">
					<div class="col-sm-6 col-lg-6 mb-4">
						<div class="feature-box">
							<i class="sicon-location-pin"></i>
							<div class="feature-box-content">
								<h4 class="heading4 primary">Address</h4>
								<p class="paragraph1">
									Elza International, Integrated Industrial Estate,<br>
									Sector 8A, BHEL Township, Haridwar, Uttarakhand 249403
								</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 mb-4">
						<div class="feature-box">
							<i class="fa fa-mobile-alt"></i>
							<div class="feature-box-content">
								<h4 class="heading4 primary">Phone Number</h4>
								<p class="paragraph1">(123) 456-7890</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 mb-4">
						<div class="feature-box">
							<i class="far fa-envelope"></i>
							<div class="feature-box-content">
								<h4 class="heading4 primary">E-mail Address</h4>
								<p class="paragraph1">info@haneri.in</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 mb-4">
						<div class="feature-box">
							<i class="far fa-calendar-alt"></i>
							<div class="feature-box-content">
								<h4 class="heading4 primary">Working Days/Hours</h4>
								<p class="paragraph1">Mon - Sun / 9:00AM - 8:00PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



	<div class="container contact-us-container">
		<!-- FAQ Section -->
		<div class="row faq">
			<div class="col-lg-6">
				<h2 class="mt-6 mb-1">Frequently Asked Questions</h2>
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
									<p class='paragraph1'>{$faq['answer']}</p>
								</div>
							</div>";
					}
					?>
				</div>
			</div>
			<div class="col-lg-6">
				<h2 class="mt-6 mb-2">Send Us a Message</h2>
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

	<div class="mb-8"></div>
</main>

<?php include("footer.php"); ?>