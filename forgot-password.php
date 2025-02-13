<?php include("header.php"); ?>

		<main class="main">
			<div class="page-header">
			</div>

			<div class="container reset-password-container padding_top_100">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="feature-box border-top-primary">
							<div class="feature-box-content">
								<form class="mb-0" action="#">
									<p>
										Lost your password? Please enter your
										username or email address. You will receive
										a link to create a new password via email.
									</p>
									<div class="form-group mb-0">
										<label for="reset-email" class="font-weight-normal">Username or email</label>
										<input type="email" class="form-control" id="reset-email" name="reset-email"
											required />
									</div>

									<div class="form-footer mb-0">
										<a href="login.php">Click here to login</a>

										<button type="submit"
											class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
											Reset Password
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->

<?php include("footer.php"); ?>