<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc'];
	//image upload
	if($_FILES["img"]["error"] === 4)
	{
		echo
		"<script> alert ('Image does not exist');</script>";
	}
	else
	{
		$fileName = $_FILES["img"]["name"];
		$fileSize = $_FILES["img"]["size"];
		$tmpName = $_FILES["img"]["tmp_name"];
		
		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $fileName);
		$imageExtension = strtolower(end($imageExtension));
		
		if(!in_array($imageExtension, $validImageExtension))
		{
			echo "<script> alert ('Invalid Image Extension');</script>";
		}
		else if($fileSize > 1000000)
		{
			echo "<script> alert ('Image size is too large');</script>";
		}
		else
		{
			$newImageName = uniqid();
			$newImageName .='.' .$imageExtension;
			
			move_uploaded_file($tmpName, 'upload/' . $newImageName);
			$sql = "INSERT INTO item (Item_id, Item_name, Category, Price, Quantity, Description, Image)
			VALUES ('$id', '$name', '$category', '$price', '$quantity', '$desc', '$newImageName')";
			mysqli_query($conn, $sql);
			
			echo "<script>alert('Successfully Added');
				  document.location.href = 'Manage items.php';
				  </script>";
			
		}
		
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/add.css">
    <title>Add items</title>
</head>
<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="add.php">
            <div class="form">
                <label for="name">Item ID</label><br>
                <input type="text" class="form-cntrl" id="id" placeholder="Enter Item ID" name="id" required>
            </div>
            <div class="form">
                <label for="name">Item name</label><br>
                <input type="text" class="form-cntrl" id="name" placeholder="Enter Item name" name="name" required>
            </div>
            <div class="form">
                <label for = "category">Item category</label><br>
				<select name = "category" id = "category">
					<option value = "select"> Select a category </option>
					<option value = "Women"> Women </option>
					<option value = "Men"> Men </option>
					<option value = "Unisex"> Unisex </option>
					<option value = "Kids"> Kids </option>
					<option value = "Accessories"> Accessories </option>
				</select>	
            </div>
            <div class="form">
                <label for="price">Price</label><br>
                <input type="number" class="form-cntrl" step="0.01" id="price" placeholder="Enter Item price" name="price" min="0" required>
            </div>
            <div class="form">
                <label for="Quanity">Quantity</label><br>
                <input type="number" class="form-cntrl" step="1" id="quantity" placeholder="Enter quantity" name="quantity" min="1" required>
            </div>
            <div class="form">
                <label for="description">Item description</label><br>
                <textarea type="text" class="form-cntrl" id="desc" placeholder="Enter Item description" name="desc" required></textarea>
            </div>
            <div class="form">
                <label for="image">Item image</label><br>
                <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png"><br><br>
            </div>

            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>

    <div class="container">
        <?php
        // Display uploaded image if available
        if (isset($_FILES['img']['name'])) {
            $targetDirectory = "upload/";
            $targetFile = $targetDirectory . basename($_FILES["img"]["name"]);

            echo '<img src="' . $targetFile . '" alt="Uploaded Image">';
        }
        ?>
    </div>
</body>
</html>