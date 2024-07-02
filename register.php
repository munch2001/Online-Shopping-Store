<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Register Page</title>
	<link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/register.css">
    <script src = "js/myScript.js"></script>
</head>

<?php
    include_once 'header.php';
?>

<div class="container_reg">
        <h2>Registration Form</h2>
        <form action="includes/register.inc.php" method="post">
            <div class="form-section">
            <label>Personal Information</label>
            <input name="fname" type="text" placeholder="First Name (e.g. Ruwan)" required>
            <input name="lname" type="text" placeholder="Last Name (e.g. Perera)">
            <input name="email" type="email" placeholder="Email (e.g. voguehaven@store.com)" required>
            <input name="phone" type="text" placeholder="Phone Number (e.g. 0715869758)" required>
            Date Of Birth : 
            <input name="dob" type="date" placeholder="Date Of Birth">
            </div>
            <div class="form-section">
            <label>Account Information</label>
            <input name="uname" type="text" placeholder="Username (Use only a-z / A-Z / 0-9)" required>
            <input name="pwd" type="password" placeholder="Password" required>
            <input name="pwdrepeat" type="password" placeholder="Re-enter Password" required>
            </div>
            <div class="form-section">
            <label>Shipping Address Information</label>
                <input name="add_no" type="text" placeholder="Address No (e.g. 173A 1/1)" required>
                <input name="add_street" type="text" placeholder="Street (e.g. Main Road)" required>
                <div class="abc">
                    <input name="city" type="text" placeholder="City (e.g. Malabe)" required>
                    <input name="district" type="text" placeholder="District(e.g. Colombo)" required>
                </div>
                <div class="abc">
                    <input name="pcode" type="text" placeholder="Postal code" required>
                    <select name="country" id="country">
                        <option value="" disabled selected>Select your country</option>
                        <option value="SL">Sri Lanka</option>
                        <option value="IND">India</option>
                        <option value="CIN">China</option>
                        
                    </select>
                </div>
            </div>
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I accept the terms and conditions</label>
            <p id="tnc">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
            <input name="reg_submit" id="reg_submit" type="submit" value="Register">
        </form>
    </div>

    <script>
        displayAlert();
        function displayAlert() {
            var currentUrl = window.location.href;
                
            if (currentUrl.includes("http://localhost/Online%20fashion%20store/register.php?error=usernametaken")) {
            alert("This Username Or Email is already taken !");
            }
            else if (currentUrl.includes("http://localhost/Online%20fashion%20store/register.php?error=invalidusername")) {
            alert("Invalid Username !");
            } 
            else if (currentUrl.includes("http://localhost/Online%20fashion%20store/register.php?error=invalidemail")) {
            alert("Invalid Email !");
            }
            else if (currentUrl.includes("http://localhost/Online%20fashion%20store/register.php?error=passworddontmatch")) {
            alert("Password don't match !");
            }
            else if (currentUrl.includes("http://localhost/Online%20fashion%20store/login.php?error=none")) {
            alert("Account create Successfully !");
            }
        }
    </script>

<?php
    include_once 'footer.php';
?>