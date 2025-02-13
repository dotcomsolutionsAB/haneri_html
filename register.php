<?php include("header.php"); ?>

		<main class="main">
			<div class="page-header">
			</div>

			<div class="container login-container padding_top_100">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="login_reg_container">
                            <div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Register</h2>
								</div>

								<form action="#">
                                    <label for="register-mobile">
										Mobbile
										<span class="required">*</span>
									</label>
									<input type="mobile" class="form-input form-wide" id="register-mobile" required />
									<label for="register-email">
										Email address
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide" id="register-email" required />

									<label for="register-password">
										Password
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide" id="register-password"
										required />

									<div class="form-footer mb-2">
										<button type="submit" class="btn btn-dark btn-md w-100 mr-0">
											REGISTER
										</button>                                        
									</div>
                                    <p>Already have an account?
                                        <a href="login.php" class="forget-password text-dark form-footer-right">
                                            Login
                                        </a>
                                    </p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->

<?php include("footer.php"); ?>