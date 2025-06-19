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
		<div class="contact-container">
			<div class="contact-left">
			<img src="https://images.unsplash.com/photo-1605742950025-40ecfa1c47d1?auto=format&fit=crop&w=800&q=80" alt="Family" />
			</div>
			<div class="contact-right">
			<h2>Get In Touch</h2>
			<form>
				<div class="form-group">
				<input type="text" placeholder="Full Name" required />
				<input type="email" placeholder="Email" required />
				</div>
				<div class="form-group">
				<input type="tel" placeholder="Phone Number" required />
				<input type="text" placeholder="Your Message" required />
				</div>
				<button type="submit">Submit</button>
			</form>
			</div>
		</div>

		<div class="map-container">
			<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3475.3208960627936!2d78.10577727445244!3d29.93814077497026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390947ca6c70279f%3A0x26369ac64b8ea295!2sElza%20International!5e0!3m2!1sen!2sin!4v1718797695984!5m2!1sen!2sin"
			width="100%"
			height="400"
			style="border:0;"
			allowfullscreen=""
			loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"
			></iframe>
		</div>
	</div>


	<div class="mb-8"></div>
</main>

<?php include("footer.php"); ?>
<style>
	.contact-container {
  display: flex;
  flex-wrap: wrap;
  background-color: #003d29;
  color: #fff;
  padding: 20px;
}

.contact-left,
.contact-right {
  flex: 1 1 50%;
  min-width: 300px;
}

.contact-left img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.contact-right {
  padding: 40px 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.contact-right h2 {
  margin-bottom: 20px;
  font-size: 28px;
}

form {
  display: flex;
  flex-direction: column;
}

.form-group {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 20px;
}

.form-group input {
  flex: 1 1 45%;
  padding: 10px;
  border: none;
  border-radius: 5px;
}

button[type="submit"] {
  width: 100px;
  padding: 10px;
  border: none;
  background-color: #fff;
  color: #003d29;
  font-weight: bold;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #e0e0e0;
}

.map-container {
  margin-top: 20px;
}
</style>