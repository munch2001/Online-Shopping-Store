<?php
include 'config.php'

?>




<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Shop/Men</title>
	<link rel="stylesheet" href="styles/styles.css"></link>
	<link rel="stylesheet" href="styles/Shop1.css"></link>
	<script src = "js/fashion.js"></script>
</head>

<?php
    include_once 'header.php';
?>
	
	
	
	<div class = "content">
	<table class = "table">
	<tr>
		<th>Category</th>
	</tr>
	<tr>
		<td><a href = "shop.php"><button>All</button></a></td>
	</tr>
	<tr>
		<td><a href = "Men.php"><button>Men</button></a></td>
	</tr>	
	<tr>
		<td><a href = "women.php"><button>Women</button></a></td>
	</tr>
	<tr>
		<td><a href = "kids.php"><button>Kids</button></a></td>
	</tr>
	<tr>
		<td><a href = "unisex.php"><button>Unisex</button></a></td>
	</tr>
	<tr>
		<td><a href = "accessories.php"><button>Accessories</button></a></td>
	</tr>		
	</table>
	
	<!--display code-->
	<?php
	$sql = "SELECT * from item WHERE Category = 'Women';";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		
		echo "<ol class = \"list\">";
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['Item_id'];
			$name = $row['Item_name']; 
			$image = $row['Image'];
			$price = $row['Price'];
			$d = $row['Description'];
	?>
			<li><a href="item_details.php?id=<?php echo $id; ?>">
				<div class="item">
					<img src="upload/<?php echo $image; ?>" class = "image" alt="Item" width = "250px">
					</a>
					<div class="item-details">
						<h3><?php echo $name; ?></h3>
						<p> Rs.<?php echo $price; ?></p>
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