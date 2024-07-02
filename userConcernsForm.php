<!DOCTYPE html>
<html>

<head>
	<title>Contact Us</title>
	<link rel = "stylesheet" href = "styles/Buddhini.css"> </link>
</head>

	<!-- header -->
	<?php
		include_once 'header.php';
	?>
		
	<div class = "col" id = "c1">
		<ul class = "feed">
			<li id = "list1" class = "active"><a href="feedback.php">
				<br><img src = "images/feedback.png"> <br> <br>
				Let us know what you think <br>
				We'd love to hear your thoughts <br> <br>
			</a></li>
			<li id = "list1"><a href="#">
				<br><img src = "images/concern.png"> <br> <br>
				Share your concerns <br>
				We are always here to help you <br> <br>
			</a></li>
		</ul>
	</div>
	
	<!--user concerns-->
	<div class = "col" id = "c2">
		
		<form method = "POST" action = "submitUserConcerns.php">
		
			<h2 align = "center"> Tell us your concern. We will help you </h2>
			<br><br>
			
			<label> Name </label><br>
			<input type = "text"
				   name = "name"
				   class = "text"
				   required>
			<br><br>
			
			<label> E-mail </label><br>
			<input type = "text"
				   name = "email"
				   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
				   class = "text"
				   required>
			<br><br>
			
			<label> Subject </label><br>
			<input type = "text"
				   name = "subject"
				   class = "text"
				   required>
			<br><br>
			
			<label> Message	</label><br>
			<textarea name = "message"
					  rows = "21"
					  cols = "90"
					  required>
			</textarea>
			<br><br>
			
			<input type = "submit"
				   id = "submit"
				   value = "Submit">
		</form>
	</div>
		
	<!--footer-->
	<?php
		include_once 'footer.php';
	?>