<?php

//session_start(); // Start the session

// Check if the user is not logged in
//if (!isset($_SESSION['username'])) {
//    header('Location: login.html');
//    exit();
//}
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Credit Card Payment</title>
    <link rel ="stylesheet" href = "styles/payment.css">
</head>
<body>
    <div class="container">
        <h1>Credit Card Payment</h1>
		<div class="inlineimage">
            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png">
            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png">
            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Visa-Curved.png">
            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png">
        </div>
		<form action="payment.php" method="post" id="payment-form">
			<div class="form-group">
                <label for="card-number">Card Number</label> 
                <input type="text" id="card-number" name="card-number" placeholder="Enter card number" required>
            </div>
            <div class="form-group">
                <label for="card-holder">Card Holder Name</label>
                <input type="text" id="card-holder" name="card-holder" placeholder="Enter card holder name" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="expiry-date">Expiry Date</label>
                    <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="javascript/payment.js"></script>
</body>
</html>

