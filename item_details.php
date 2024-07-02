<?php


// session_start(); // Start the session

// Check if the user is not logged in
//if (!isset($_SESSION['username'])) {
//    header('Location: login.html');
//    exit();
//}

include 'config.php';

// Retrieve item ID from query parameter
$id = $_GET['id'];

// Fetch item details from the database
$sql = "SELECT * FROM item WHERE Item_id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['Item_name'];
    $image = $row['Image'];
    $price = $row['Price'];
    $description = $row['Description'];
} else {
    // Handle database query error
    $name = 'Item Not Found';
    $image = 'placeholder.jpg';
    $price = 'N/A';
    $description = 'Sorry, the item details are not available.';
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
        <img src="upload/<?php echo $image; ?>" alt="Item">
        <div class="item-details">
            <h2><?php echo $name; ?></h2>
            <p>Price:Rs. <?php echo $price; ?></p>
            <p>Description: <?php echo $description; ?></p>
            <form action="form.php?id=<?php echo $id; ?>" method="POST">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>
        </div>
    </div>

<?php
		include_once 'footer.php';
	?>
