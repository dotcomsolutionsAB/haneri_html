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
                        <p>
                            Lost your password? 
                            <br>
                            Please enter your username or email address. You will receive a link to create a new password via email.
                        </p>

                        <form id="loginForm">
                            <label for="reset-email">
                                Username or email address <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="reset-email" name="reset-email" required />

                            <div class="form-footer">
                                <a href="forgot-password.php" class="forget-password text-dark form-footer-right">
                                    Forgot Password?
                                </a>
                            </div>
                            <button type="submit" class="btn reset_btn btn-md w-100 mb-2">LOGIN</button>
                            <br>
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
