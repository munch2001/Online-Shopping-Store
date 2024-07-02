<?php

// session_start(); // Start the session

// Check if the user is not logged in
//if (!isset($_SESSION['username'])) {
//    header('Location: login.html');
//    exit();
//}

include 'config.php';

if (isset($_GET['updateid'])) {
    $updateid = $_GET['updateid'];

    if (isset($_POST['submit'])) {
        $color = $_POST['color'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE cart SET Colour='$color', Size='$size', Quantity='$quantity'
                WHERE CartID='$updateid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Data updated successfully";
            // Redirect to the appropriate page
            header("Location: viewcart.php");
            exit;
        } else {
            die(mysqli_error($conn));
        }
    }

    // Retrieve the item details for pre-filling the form
    $itemDetailsQuery = "SELECT * FROM test1 WHERE CartID='$updateid'";
    $itemDetailsResult = mysqli_query($conn, $itemDetailsQuery);
    if ($itemDetailsResult) {
        $itemDetails = mysqli_fetch_assoc($itemDetailsResult);
        $itemId = $itemDetails['ItemID'];
        $itemColor = $itemDetails['Colour'];
        $itemSize = $itemDetails['Size'];
        $itemQuantity = $itemDetails['Quantity'];
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="styles/form.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="styles/styles.css">
		
		<script>
			function validateForm() {
			  var quantityInput = document.getElementsByName("quantity")[0].value;
			  if (quantityInput <= 0) {
				alert("Invalid quantity. Please enter a positive number.");
				return false;
			  }
			  return true;
			}
		</script>
</head>

<?php
		include_once 'header.php';
?>

<div class="container12">
    <form method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label>Item ID</label>
            <input type="text" class="form-control" placeholder="Enter the item" name="item" autocomplete="off" value="<?php echo $itemId; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <select class="form-control" name="color" id="color">
                <option value="red" <?php if ($itemColor == 'red') echo 'selected'; ?>>Red</option>
                <option value="blue" <?php if ($itemColor == 'blue') echo 'selected'; ?>>Blue</option>
                <option value="green" <?php if ($itemColor == 'green') echo 'selected'; ?>>Green</option>
                <option value="black" <?php if ($itemColor == 'black') echo 'selected'; ?>>Black</option>
                <option value="purple" <?php if ($itemColor == 'purple') echo 'selected'; ?>>Purple</option>
            </select>
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <select class="form-control" name="size" id="size">
                <option value="XS" <?php if ($itemSize == 'XS') echo 'selected'; ?>>XS</option>
                <option value="S" <?php if ($itemSize == 'S') echo 'selected'; ?>>S</option>
                <option value="M" <?php if ($itemSize == 'M') echo 'selected'; ?>>M</option>
                <option value="L" <?php if ($itemSize == 'L') echo 'selected'; ?>>L</option>
                <option value="XL" <?php if ($itemSize == 'XL') echo 'selected'; ?>>XL</option>
                <option value="XXL" <?php if ($itemSize == 'XXL') echo 'selected'; ?>>XXL</option>
            </select>
        </div>
		
				
			<div class="container2">
    <div class="table-container">
      <h3>Men's Body Measurements in inches</h3>
      <table>
        <thead>
          <tr>
            <th>Size</th>
            <th>Chest</th>
            <th>Waist</th>
            <th>Hip</th>
            <th>Body Height</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>XS</td>
            <td>34-36</td>
            <td>29-31</td>
            <td>34-36</td>
            <td>5ft 5 - 5ft 8</td>
          </tr>
          <tr>
            <td>S</td>
            <td>36-38</td>
            <td>31-33</td>
            <td>36-38</td>
            <td>5ft 7 - 5ft 10</td>
          </tr>
          <tr>
            <td>M</td>
            <td>38-40</td>
            <td>33-35</td>
            <td>38-40</td>
            <td>5ft 8 - 5ft 11</td>
          </tr>
          <tr>
            <td>L</td>
            <td>40-42</td>
            <td>35-37</td>
            <td>40-42</td>
            <td>5ft 10 - 6ft 1</td>
          </tr>
          <tr>
            <td>XL</td>
            <td>42-45</td>
            <td>37-40</td>
            <td>42-45</td>
            <td>6ft - 6ft 4</td>
          </tr>
          <tr>
            <td>XXL</td>
            <td>45-48</td>
            <td>40-43</td>
            <td>45-48</td>
            <td>6ft 1 - 6ft 6</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="table-container">
      <h3>Women's Body Measurements in inches</h3>
      <table>
        <thead>
          <tr>
            <th>Size</th>
            <th>Chest</th>
            <th>Waist</th>
            <th>Hip</th>
            <th>Body Height</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>XS</td>
            <td>31-33</td>
            <td>24-26</td>
            <td>34-38</td>
            <td>5ft 1 - 5ft 5</td>
          </tr>
          <tr>
            <td>S</td>
            <td>33-35</td>
            <td>26-28</td>
            <td>36-38</td>
            <td>5ft 3 - 5ft 7</td>
          </tr>
          <tr>
            <td>M</td>
            <td>35-37</td>
            <td>28-30</td>
            <td>38-40</td>
            <td>5ft 5 - 5ft 9</td>
          </tr>
          <tr>
            <td>L</td>
            <td>37-39</td>
            <td>30-32</td>
            <td>40-42</td>
            <td>5ft 7 - 5ft 11</td>
          </tr>
          <tr>
            <td>XL</td>
            <td>39-42</td>
            <td>32-35</td>
            <td>42-45</td>
            <td>5ft 7 - 6ft 1</td>
          </tr>
          <tr>
            <td>XXL</td>
            <td>42-45</td>
            <td>35-38</td>
            <td>45-48</td>
            <td>5ft 9 - 6ft 3</td>
          </tr>
        </tbody>
      </table>
    </div>

    
      <img src="images/m.png" alt="Image" />
    
  </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" placeholder="Enter the quantity" name="quantity" autocomplete="off" value="<?php echo $itemQuantity; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>

<?php
		include_once 'footer.php';
?>