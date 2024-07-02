<?php
include 'config.php'

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<title>Manage Items</title>
		<link rel = "stylesheet" href = "styles/adminn.css">
		
		<link rel = "stylesheet" href = "styles/manage.css"> 
		<script src="https://kit.fontawesome.com/2b57fcf674.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class = "header">
			<div class = "side-nav">
			<a class = "logo">
			<img src = "Images/logo1.png" class = "logo-img">
			</a>
			<ul class = "nav-links">
				<li><a href = "Admin page.php"><i class="fa-solid fa-house"></i><p>Dashboard</p></a></li>
				<li><a href = "#"><i class="fa-solid fa-users"></i><p>Customers</p></a></li>
				<li><a href = "#"><i class="fa-solid fa-star"></i></i><p>Customer reviews</p></a></li>
				<li><a href = "Manage items.php"><i class="fa-solid fa-pen-to-square"></i><p>Manage Items</p></a></li>
				<li><a href = "admintable.php"><i class="fa-solid fa-pen-to-square"></i><p>Manage Sales</p></a></li>
				
				<div class = "active"></div>
			</ul>
			<ul class = "logout">
			<li><a href = "home.php"><i class="fa-solid fa-right-to-bracket fa-rotate-180"></i><p>Logout</p></a></li>
			<div class = "active"></div>
			</ul>
			</div>
			<div class = "container">
			<br>
			<h1>Manage Items</h1><br><br><br><br>
			<div class = "read">
			<button class = "btn"><a href="add.php">Add items</a>
			</button><br><br>

		<table class = "table">
  <tr>
    <th>Item ID</th>
    <th>Item Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Description</th>	
    <th>Image</th>
	<th>Operation</th>
	
  </tr>
  <?php
  
	//$i = 1;
	$rows = mysqli_query($conn, "SELECT * FROM item");
	?>
	<?php foreach($rows as $row): ?>
	<tr>
		<td><?php echo $row["Item_id"]; ?></td>
		<td><?php echo $row["Item_name"]; ?></td>
		<td><?php echo $row["Category"]; ?></td>
		<td><?php echo $row["Price"]; ?></td>
		<td><?php echo $row["Quantity"]; ?></td>
		<td><?php echo $row["Description"]; ?></td>
		<td><img src="upload/<?php echo $row['Image'];?>" width="100px"></td>
	
	<td>
	<a href="update1.php?updateid=<?php echo $row["Item_id"]; ?>" class="btn">Update</a>
	<a href="delete.php?deleteid=<?php echo $row["Item_id"]; ?>" class="btn" >Delete</a>
	
	</td>
	</tr>
	<?php endforeach; ?>

</table>
		</div>
				
	</div>
	<script>
	
		

}
</div>		
</body>
</html>