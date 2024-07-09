<?php include
    "header.php"
    ?>
<link rel="stylesheet" href="css/login.css">
<div class="login-container" id="login-container">
    <div class="form-container log-in-container">
        <form action="proses_login.php" method="post">
            <h1>Login</h1>
            <input autocomplete="off" type="text" name="username" value="" class="form-control" />
            <input type="password" name="password" id="password" class="form-control" />
            <div class="d-flex">
                <p>Show Password </p>
                <div class="mt-3 ms-2">
                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                </div>
            </div>
            <button type="submit" id="Login">Log In</button>
            <a href="signup.php" class="fw-normal fs-6">Or Sign Up Here</a>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>HTML CSS Login Form</h1>
                        <p>This login form is created using pure HTML and CSS. For social icons, FontAwesome is
                            used.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPassword");

        if (showPasswordCheckbox.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
</body>

</html>