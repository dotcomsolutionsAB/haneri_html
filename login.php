<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<main class="main">
    <div class="page-header">
    </div>
    <div class="container login-container padding_top_100">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="login_reg_container">
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Login</h2>
                        </div>

                        <form id="loginForm">
                            <label for="login-email">
                                Username or email address <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="login-email" required />

                            <label for="login-password">
                                Password <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="login-password" required />

                            <div class="form-footer">
                                <div class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" id="remember-me" />
                                    <label class="custom-control-label mb-0" for="remember-me">Remember me</label>
                                </div>
                                <a href="forgot-password.php" class="forget-password text-dark form-footer-right">
                                    Forgot Password?
                                </a>
                            </div>
                            <button type="submit" class="btn login_btn btn-md w-100 mb-2">LOGIN</button>
                            <br>
                            <p class="">Don't have an account yet?
                                <a href="register.php" class="forget-password text-dark form-footer-right">
                                    Register
                                </a>
                            </p>
                        </form>

                        <p id="error-message" class="text-danger mt-2" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.getElementById("login-email").value;
        const password = document.getElementById("login-password").value;

        fetch("<?php echo BASE_URL; ?>/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ email: email, password: password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                localStorage.setItem("auth_token", data.data.token);
                localStorage.setItem("user_name", data.data.name);
                localStorage.setItem("user_role", data.data.role);
                localStorage.setItem("user_id", data.data.id);

                // Redirect based on role
                if (data.data.role === "customer" || data.data.role === "vendor") {
                    window.location.href = "index.php"; // Redirect to customer dashboard
                } else if (data.data.role === "admin") {
                    window.location.href = "admin/index.php"; // Redirect to admin dashboard
                }
            } else {
                document.getElementById("error-message").innerText = data.message;
                document.getElementById("error-message").style.display = "block";
            }
        })
        .catch(error => {
            console.error("Error:", error);
            document.getElementById("error-message").innerText = "Something went wrong. Please try again.";
            document.getElementById("error-message").style.display = "block";
        });
    });
</script>

<?php include("footer.php"); ?>
