<?php
include 'config.php'

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Shop Page</title>
	<link rel="stylesheet" href="styles/stylesnimsi.css"></link>
    
	<script src = "js/<script src="js/timer.js"></script>
	
</head>

<?php
    include_once 'header.php';
?>


	<div id="timer"></div>
	<script src="js/timer.js"></script>
	
	
	
	<div class = "content">
	
	
	<!--display code-->
	<?php
	$sql = "SELECT * from item_discount;";
	$result = mysqli_query($conn, $sql);
	
	echo "<h1>Item Sales Page</h1>" ;

	if ($result) {
		
		echo "<ol class = \"list\">";
		while ($row = mysqli_fetch_assoc($result)) {
			$itemID = $row['itemID'];
			$name = $row['name']; 
			$NewPrice = $row['NewPrice'];
			$OldPrice = $row['OldPrice'];
			$image = $row['image'];
	?>
	
			<li><a href="item_details.php?itemID=<?php echo $itemID; ?>">
				<div class="item">
					<img src="uploadimage/<?php echo $image; ?>" alt="Item" width = "250px">
					</a>
					<div class="item-details">
						<h2><?php echo $name; ?></h2>
						<h3>Price: Rs.<?php echo $NewPrice; ?></h3>
						<p class="oldprice">Previous Price: Rs.<?php echo $OldPrice; ?></p>
					</div>
				</div>
			</li>	
			
	<?php
		}
		echo "</ol>";
	}
	?>
	</div>
	
		<?php
		include_once 'footer.php';
	?>
	
	
	