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

	<div class="contact_section">
		<!-- Contact Section -->
		<div class="contact_101">
		<div class="contact_102">
			<img src="images/contact_image.png" alt="Family" class="contact_103" />
		</div>
		<div class="contact_104">
			<h2 class="contact_105">Get In Touch</h2>
			<form class="contact_106">
			<div class="contact_107">
				<input type="text" class="contact_108" placeholder="Full Name" required />
				<input type="email" class="contact_109" placeholder="Email" required />
			</div>
			<div class="contact_110">
				<input type="tel" class="contact_111" placeholder="Phone Number" required />
				<input type="text" class="contact_112" placeholder="Your Message" required />
			</div>
			<button type="submit" class="contact_113">Submit</button>
			</form>
		</div>
		</div>

		<!-- Map Section -->
		<div class="contact_114">
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


	<div class="mb-8"></div>
</main>
<style>
	/* Main contact container */
	.contact_101 {
		display: flex;
		flex-wrap: wrap;
		background-color: #003d29;
		color: white;
	}

	/* Left section (image) */
	.contact_102 {
		flex: 1 1 50%;
		min-width: 300px;
	}

	.contact_103 {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	/* Right section (form) */
	.contact_104 {
		flex: 1 1 50%;
		padding: 40px 30px;
		display: flex;
		flex-direction: column;
		/* justify-content: center; */
	}

	.contact_105 {
		font-size: 30px;
		margin-bottom: 40px;
		color: #fff;
		font-family: 'Barlow Condensed';
		font-family: 'Barlow Condensed';
    	font-weight: 300;
	}

	.contact_106 {
		display: flex;
		flex-direction: column;
		gap: 20px;
	}

	/* Row 1 */
	.contact_107 {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
	}

	/* Row 2 */
	.contact_110 {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
	}

	/* Individual input fields */
	.contact_108,
	.contact_109,
	.contact_111,
	.contact_112 {
		flex: 1 1 45%;
		padding: 10px;
		border-radius: 5px;
		border: none;
		height: 60px;
		font-size: 16px;
		background: #003d29;
		border: 1px solid #fff;
		margin-bottom: 30px;
	}

	/* Submit button */
	.contact_113 {
		width: 120px;
		padding: 10px;
		border: none;
		background-color: white;
		color: #003d29;
		font-weight: bold;
		border-radius: 5px;
		cursor: pointer;
		transition: background-color 0.3s;
	}

	.contact_113:hover {
		background-color: #e0e0e0;
	}

	/* Map section */
	.contact_114 {
		margin-top: 20px;
	}

	/* Responsive styles */
	@media screen and (max-width: 768px) {
		.contact_101 {
			flex-direction: column;
		}

		.contact_107,
		.contact_110 {
			flex-direction: column;
		}

		.contact_108,
		.contact_109,
		.contact_111,
		.contact_112 {
			flex: 1 1 100%;
		}
	}
</style>
<?php include("footer.php"); ?>