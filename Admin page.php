<!DOCTYPE html>
<html>
	<head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<title>Admin page</title>
		<link rel = "stylesheet" href = "styles/admin.css">
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
				<li><a href = "#"><i class="fa-solid fa-pen-to-square"></i><p>Manage Sales</p></a></li>
				<div class = "active"></div>
			</ul>
			<ul class = "logout">
			<li><a href = "admin logout.php"><i class="fa-solid fa-right-to-bracket fa-rotate-180"></i><p>Logout</p></a></li>
			<div class = "active"></div>
			</ul>
			</div>

			<br>

			<div class = "container">
				<div class = "Dashboard">
					<h1>Dashboard</h1>
				</div>
				<!-- <form class="search-bar" action="#" method="get"> -->
					<!-- <input type="text" name="search" placeholder="Search..."> -->
					<!-- <button type="submit">Search</button> -->
				<!-- </form> -->
				<div class = "profile">
				<!-- <i class="fa-solid fa-user"></i> -->
				<img src = "images/user.jpg" class = "user">
				</div>
				<div class = "buttons">
					<div class = "box box 1">
						<i class="fa-solid fa-users"></i>
						<span class = "text">Customers</span>
						<span class = "number">944</span>
					</div>
					<div class = "box box 2">
						<i class="fa-solid fa-comment"></i>
						<span class = "text">Comments</span>
						<span class = "number">300</span>
					</div>
					<div class = "box box 3">
						<i class="fa-solid fa-cart-shopping"></i>
						<span class = "text">Sold products</span>
						<span class = "number">380</span>
					</div>
					<div class = "box box 4">
						<i class="fa-solid fa-money-bill"></i>
						<span class = "text">Monthly Income</span>
						<span class = "number">90,140</span>
					</div>
					
				</div>
				<br>
			
				<div class="center">
				  <table class="tbl">
					<tr>
					  <td id="td1">
						<a href="Manage items.php">
						<img src = "images/item.jpg" class = "img1"> <br> <br>
						Item list</a>
					  </td>
					  <td id="td1"><a href="#">
						<img src = "images/fashion_logo.png" class = "img1"> <br> <br>
						Discounts list</a>
					  </td>
					</tr>
				  </table>
				</div>


				
			</div>
	
		</div>

	</body>
</html>