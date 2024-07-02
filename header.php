<body>
	<header>
		
		<div class="header-content">
			
			<div class="header-selection"><br><br>
				<?php
						// Check if the session is started
						session_start();

						if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
							// If session is active, display logout button
							echo '<a href="includes/logout.inc.php"><button class="log">Logout</button></a><br>';
						} else {
							// If session is not active, display login button
							echo '<a href="login.php"><button class="log">Sign in</button></a><br>';
						}
				?>

				<a href="profile.php"><img src="images/account.png" alt="profile" class="icons"></a>
				<a href="viewcart.php"><img src="images/bag.png" alt="bag" class="icons"></a>
				<a href="feedback.php"><img src="images/feedback.png" alt="feedback" class="icons"></a>
				
			</div>
		</div>
	</header>
	
	<hr>
	
	<div class="navbar">
		<ul class="menu">
			<li class="menuItems"><a href="home.php">HOME</a></li>
			<li class="menuItems"><a href="shop.php">SHOP</a></li>
			<li class="menuItems"><a href="sales.php">SALES</a></li>
			<li class="menuItems"><a href="accessories.php">ACCESSORIES</a></li>
			<li class="menuItems"><a href="contactUs.php">  CONTACT US  </a></li>
		</ul>
		
		<form class="search-bar" action="#" method="get">
			<input type="text" name="search" placeholder="Search...">
			<button type="submit">Search</button>
		</form>
	</div>
	<hr>