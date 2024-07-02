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
        <h1>Administrator Login</h1>

        <form action="includes/admin_login.inc.php" method="POST">
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

        </form>
    </div>


<?php
    include_once 'footer.php';
?>