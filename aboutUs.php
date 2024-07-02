<!DOCTYPE html>
<html>

<head>
	<title>About Us</title>
	<link rel="stylesheet" href="styles/stylesNew.css"></link>
	<link rel = "stylesheet" href = "styles/Buddhini.css"> </link>
	<script src = "js/script_buddhini.js">  </script>
</head>


	<!-- header -->
	<?php
		include_once 'header.php';
	?>
	
	
	<!--body content-->
	
	<center>
	<!--navigation buttons-->
	<div class = "col1" id = "c1">
		<br> <br> <br> <br>
		<br> <br>
		<br> <br>
		<button id = "btn_js" name = "btn1" onclick="loadData('btn1')"> About Us </button> 
		<br> <br>
		<button id = "btn_js" name = "btn2" onclick="loadData('btn2')"> Terms & Condtions </button>
	</div>
	
	<!--details-->
	<div class = "col1" id = "c2">
		<img src = "images/cover.png" class = "picture" id = "pic">  
		<br>
		<p id = "para"> </p>
	
	</div>
	</center>
		
	<!--footer-->
	<?php
		include_once 'footer.php';
	?>