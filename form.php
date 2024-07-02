<?php

// session_start(); // Start the session

// Check if the user is not logged in
//if (!isset($_SESSION['username'])) {
//    header('Location: login.html');
//    exit();
//}

include 'config.php';

if (isset($_POST['submit'])) {
    $item = $_POST['item'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO cart (CartID, ItemID, Colour, Size, Quantity)
            VALUES ('', '$item', '$color', '$size', '$quantity')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: viewcart.php");
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html>

<head>
    <title>Form</title>
	<link rel="stylesheet" href="styles/form.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="styles/styles.css">
	<script src="javascript/form.js"></script>
	
</head>

	<?php
		include_once 'header.php';
	?>
	
    <div class="container12">
       <form method="post" onsubmit="return validateForm()">
            <!-- Include item ID as a hidden input field -->
            <input type="hidden" name="item" value="<?php echo $_GET['id']; ?>">

          <div class="form-group">
			<label for="color">Color</label>
			<select class="form-control" name="color" id="color" onchange="displaySelectedColor()">
				<option value="">Select a color</option>
				<option value="red">Red</option>
				<option value="blue">Blue</option>
				<option value="green">Green</option>
				<option value="black">Black</option>
				<option value="purple">Purple</option>
			</select>
				<p id="selectedColor" style="display: none;"></p>
			</div>

		<div class="form-group">
			<label for="size">Size</label>
			<select class="form-control" name="size" id="size" onchange="displaySelectedSize()">
				<option value="">Select a size</option>
				<option value="XS">XS</option>
				<option value="S">S</option>
				<option value="M">M</option>
				<option value="L">L</option>
				<option value="XL">XL</option>
				<option value="XXL">XXL</option>
			</select>
			<p id="selectedsize" style="display: none;"></p>
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
                <input type="number" class="form-control" placeholder="Enter the quantity" name="quantity" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
		
	<?php
		include_once 'footer.php';
	?>