<?php

// session_start(); // Start the session

// Check if the user is not logged in
//if (!isset($_SESSION['username'])) {
//    header('Location: login.html');
//    exit();
//}

include 'config.php';

// Function to calculate total price
function calculateTotalPrice($conn) {
    $totalPrice = 0;
    $sql = "SELECT cart.Quantity, item.Price
            FROM cart
            JOIN item ON cart.ItemID = item.Item_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $quantity = $row['Quantity'];
            $price = $row['Price'];
            $totalPrice += $quantity * $price;
        }
    }
	  //(PHP code for formatting a number)
    return number_format($totalPrice, 2);
}

if (isset($_POST['submit-payment'])) {
    $paymentMethod = isset($_POST['payment-method']) ? $_POST['payment-method'] : '';

    if ($paymentMethod == 'credit-card') {
        // Redirect to credit card payment page
        header("Location: payment.php");
        exit;
    } elseif ($paymentMethod == 'paypal') {
        // Redirect to PayPal payment page
        header("Location: https://www.paypal.com/us/signin");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="styles/styles.css">
	<link rel="stylesheet" href="styles/view.css">
	<script src="javascript/viewcart.js"></script>
</head>

<?php
		include_once 'header.php';
?>

<h3>Your Shopping Cart</h3>
<div class="container11">
    <a href="shop.php" class="btn">Add Items</a>
    <table>
        <thead>
        <tr>
            <th>Item</th>
            <th>Name</th>
            <th>Price</th>
            <th>Colour</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT cart.ItemID, cart.CartID, item.Image, item.Item_name, item.Price, cart.Colour, cart.Size, cart.Quantity
                FROM cart
                JOIN item ON cart.ItemID = item.Item_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['ItemID'];
				$cart_id = $row['CartID'];
                $item = $row['Image'];
                $name = $row['Item_name'];
                $price = $row['Price'];
                $colour = $row['Colour'];
                $size = $row['Size'];
                $quantity = $row['Quantity'];
                ?>
                <tr>
                    <td><img src="upload/<?php echo $item; ?>" alt="Item" id="picture"></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $colour; ?></td>
                    <td><?php echo $size; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>
                        <a href="updatenew.php?updateid=<?php echo $cart_id; ?>" class="btn">Update</a>
                        <a href="deletenew.php?deleteid=<?php echo $cart_id; ?>" class="btn">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    <p id="totalPrice">Total Price: Rs.<?php echo calculateTotalPrice($conn); ?></p>
    <div class="payment-method" id="paymentForm">
        <h4>Select Payment Method</h4>
        <form method="post">
            <div class="form-group">
                <input type="radio" id="credit-card" name="payment-method" value="credit-card">
                <label for="credit-card">Credit Card</label>
            </div>
            <div class="form-group">
                <input type="radio" id="paypal" name="payment-method" value="paypal">
                <label for="paypal">PayPal</label>
            </div>
         <input type="hidden" id="total-price" value="<?php echo calculateTotalPrice($conn); ?>" ">
            <input type="submit" id="checkout-button" name="submit-payment" value="Proceed to Checkout" disabled>
         <!--   <button type="submit" name="submit-payment">Proceed to Checkout</button> -->
<!--		 <button id="checkout-button" type="submit1" name="submit-payment" onclick="validateCart()">Proceed to Checkout</button>-->

        </form>
    </div>
</div>

<?php
		include_once 'footer.php';
?>