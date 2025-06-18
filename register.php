<?php include("header.php"); ?>
<?php include("configs/config.php"); ?> 

<main class="main">
    <div class="container login-container padding_top_100">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="login_reg_container">
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                        </div>

                        <form id="registerForm">
                            <label for="register-name">
                                Full Name <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input form-wide" id="register-name" required />

                            <label for="register-mobile">
                                Mobile <span class="required">*</span>
                            </label>
                            <input type="tel" class="form-input form-wide" id="register-mobile" required />

                            <label for="register-email">
                                Email address <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="register-email" required />

                            <label for="register-password">
                                Password <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="register-password" required />

                            <div class="form-footer mb-2">
                                <button type="submit" class="btn register_btn btn-md w-100 mr-0">REGISTER</button>                                        
                            </div>
                            <p>Already have an account?
                                <a href="login.php" class="forget-password text-dark form-footer-right">Login</a>
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
document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Get input values
    const name = document.getElementById("register-name").value;
    const mobile = document.getElementById("register-mobile").value;
    const email = document.getElementById("register-email").value;
    const password = document.getElementById("register-password").value;

    // API endpoint
    const apiUrl = "<?php echo BASE_URL; ?>/register";

    // Request body
    const requestData = {
        name: name,
        mobile: mobile,
        email: email,
        password: password,
        role: "customer" // Default role
    };

    fetch(apiUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(requestData)
    })
    .then(response => response.json())
    .then(data => {
        console.log("API Response:", data); // Debugging

        if (data.message === "User registered successfully!" && data.data) {
            // Store user details in localStorage
            localStorage.setItem("auth_token", data.data.token);  // Assuming API returns a token
            localStorage.setItem("user_name", data.data.name);
            localStorage.setItem("user_email", data.data.email);
            localStorage.setItem("user_mobile", data.data.mobile);
            localStorage.setItem("user_role", "customer");

            // Redirect to home page after successful registration
            window.location.href = "index.php";
        } else {
            document.getElementById("error-message").innerText = data.message || "Registration failed.";
            document.getElementById("error-message").style.display = "block";
        }
    })
    .catch(error => {
        console.error("Fetch Error:", error);
        document.getElementById("error-message").innerText = "Something went wrong. Please try again.";
        document.getElementById("error-message").style.display = "block";
    });
});
</script>

<?php include("footer.php"); ?>
