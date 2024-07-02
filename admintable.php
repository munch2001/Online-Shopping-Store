<?php
include 'config.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>sales-admin</title>
		<link rel = "stylesheet" href = "styles/stylesdisplaynew.css">
		<link rel = "stylesheet" href = "styles/admin.css">
		<script src="js/popupmassage_delete.js"></script>
		
	<script src="https://kit.fontawesome.com/2b57fcf674.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class = "header">
			<div class = "side-nav">
			<a class = "logo">
			<img src = "Images/Logo.png" class = "logo-img">
			</a>
			<ul class = "nav-links">
				<li><a href = "Admin page.php"><i class="fa-solid fa-house"></i><p>Dashboard</p></a></li>
				<li><a href = "#"><i class="fa-solid fa-users"></i><p>Customers</p></a></li>
				<li><a href = "#"><i class="fa-solid fa-star"></i></i><p>Customer reviews</p></a></li>
				<li><a href = "Manage items.php"><i class="fa-solid fa-pen-to-square"></i><p>Manage Items</p></a></li>
				<li><a href = "#"><i class="fa-solid fa-pen-to-square"></i><p>Manage Sales</p></a></li>
				
				<div class = "active"></div>
			</ul>
			<ul class = "logout">
			<li><a href = "#"><i class="fa-solid fa-right-to-bracket fa-rotate-180"></i><p>Logout</p></a></li>
			<div class = "active"></div>
			</ul>
			</div>
			<br>
			<h1 align="center">Manage Items</h1><br><br>
			<div class = "container-edit">
			<button><a href="addrecord.php">Add items</a>
			</button><br><br>

		<table>
		<thead>
  <tr>
    <th>Item ID</th>
    <th>Item Name</th>
    <th>New price</th>
    <th>Old Price</th>
    <th>Image</th>
	<th>Operation</th>
	
  </tr>
  </thead>
  </div>
  <tbody>
  <?php
  
	//$i = 1;
	$rows = mysqli_query($conn, "SELECT * FROM item_discount");
	?>
	<?php foreach($rows as $row): ?>
<tr>
    <td><?php echo $row["itemID"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["NewPrice"]; ?></td>
    <td><?php echo $row["OldPrice"]; ?></td>
    <td><img src="uploadimage/<?php echo $row['image']; ?>" width="100px"></td>
    <td>
        <a href="updaterecord.php?updateid=<?php echo $row['itemID']; ?>"><button class="update">Update</button></a>
        <a href="deleterecord.php?deleteid=<?php echo $row['itemID']; ?>" onclick="return confirm('Are you sure you want to delete this item?')"><button class="delete">Delete</button></a>
    </td>
</tr>
<?php endforeach; ?>

</tbody>
</table>
		</div>
				
	</div>
</div>	
			<script>
	function deleteItem() {
  // Code to delete the item goes here
  alert("The item has been deleted.");
}


</script>
</body>
</html>