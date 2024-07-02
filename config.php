<?php

$conn = new mysqli('localhost', 'root', '', 'Fashion_Store');

if(!$conn){
		die(mysqli_error($conn));
}

?>