<?php


// session_start(); // Start the session

// Check if the user is not logged in
//if (!isset($_SESSION['username'])) {
//    header('Location: login.html');
//    exit();
//}

include 'connect1.php';

// Retrieve item ID from query parameter
$id = $_GET['id'];

// Fetch item details from the database
$sql = "SELECT * FROM item_discount WHERE itemID = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $oprice = $row['OldPrice'];
    $nprice = $row['NewPrice'];
    $image = $row['image'];
} else {
    // Handle database query error
    $name = 'Item Not Found';
    $image = 'placeholder.jpg';
    $oprice = 'N/A';
	$nprice = 'N/A';
    
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Item Details</title>
	<link rel="stylesheet" href="styles/details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="styles/styles.css">
    
  </head>

	<?php
		include_once 'header.php';
	?>

    <div class="item-details-container">
        <img src="images/<?php echo $image; ?>" alt="Item">
        <div class="item-details">
            <h2><?php echo $name; ?></h2>
            <p>Price:$ <?php echo $nprice; ?></p>
            <form action="form.php?id=<?php echo $id; ?>" method="POST">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>
        </div>
    </div>
<?php
		include_once 'footer.php';
	?>
