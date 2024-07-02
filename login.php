<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css"></link>
    <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<?php
    include_once 'header.php';
?>
    <div class="container">
        <h1>Login</h1>

        <form action="includes/login.inc.php" method="POST">
            <div class="input-group">
                <label for="username">Username or Email:</label>
                <input type="text" id="username" name="username" required>

                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "nouser") {
                            echo '<p class="error">Username or email not found. Please try again.</p>';
                        }
                    }
                ?>

            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "wrongpassword") {
                            echo '<p class="error">Invalid password. Please try again.</p>';
                        }
                    }
                    ?>    

            </div>
            <div class="input-group">
                <button type="submit" name="login_submit" class="btn">Login</button>
            </div>

            <p id="reg">New for Vogue Haven Store ? <a href="register.php">Create an account</a></p>
            <a href="admin_login.php">Login as admin</a>
        </form>
    </div>

    <script>
    displayAlert();
        function displayAlert() {
            var currentUrl = window.location.href;
                
            if (currentUrl.includes("http://localhost/Online%20fashion%20store/login.php?error=none")) {
              alert("Account created succussfully!");
            }
            else if (currentUrl.includes("http://localhost/Online%20fashion%20store/login.php?message=accountnotfound")) {
                alert("You have to login!");
            }
        }
    </script>

<?php
    include_once 'footer.php';
?>