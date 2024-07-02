<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="styles/styles.css"></link>
    <link rel="stylesheet" href="styles/profile.css"></link>
    
</head>

<?php
    include_once 'header.php';
?>
    <div class="container_profile">
        <div class="profileinfor">
            <h2>User Profile</h2>
            <?php
            
            if (isset($_SESSION["userId"]) && isset($_SESSION["username"])) {
                // Include the database connection and retrieve user details
                require_once 'includes/config.php';

                $userId = $_SESSION["userId"];
                $sql = "SELECT * FROM user WHERE userId = ?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo '<p class="error">Database error!</p>';
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $userId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {

                    // Display profile photo if available
                    if (!empty($row["image"])) {
                        echo '<img class="pro_4to" src="uploads/' . $row["image"] . '" alt="Profile Photo" width="200px" heigth="200px">';
                    }

                        // Display user details
                        echo '<p><strong>Full Name:</strong> ' . $row["firstName"] . " " . $row["lastName"] . '</p>';
                        echo '<p><strong>Date of Birth:</strong> ' . $row["dob"] . '</p>';
                        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
                        echo '<p><strong>Phone Number:</strong> ' . $row["phoneNo"] . '</p>';
                        echo '<p><strong>Username:</strong> ' . $row["userName"] . '</p>';
                        echo '<p><strong>Address:</strong> ' . $row["addressNo"] . ", " . $row["street"] . ", " . $row["city"] . ", " . $row["district"] . "." . '</p>';
                        echo '<p><strong>Postal Code:</strong> ' . $row["postalCode"] . '</p>';
                        echo '<p><strong>Country:</strong> ' . $row["country"] . '</p>';

                        // Provide options to edit and delete profile
                        echo '<button onclick="logoutProfile()">Logout Profile</button>';
                        echo '<button onclick="deleteProfile()">Delete Profile</button>';
                    } else {
                        echo '<p class="error">User not found!</p>';
                    }
                }
            ?>
        </div>
    

        <div class="container_reg">
            <h2>Edit Profile</h2>
            <form action="includes/edit_profile.inc.php" method="post" enctype="multipart/form-data">
                <div class="form-section">
                    <label>Personal Information</label>
                    First Name
                    <input name="fname" type="text" placeholder="First Name" value="<?php echo $row['firstName']; ?>" required>
                    Last Name
                    <input name="lname" type="text" placeholder="Last Name" value="<?php echo $row['lastName']; ?>">
                    Date Of Birth
                    <input name="dob" type="date" placeholder="Date Of Birth" value="<?php echo $row['dob']; ?>">
                    Email
                    <input name="email" type="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                    Phone Number
                    <input name="phone" type="text" placeholder="Phone Number" value="<?php echo $row['phoneNo']; ?>" required>
                    
                    <label for="profile_photo" class="custom-file-upload">
                        <span>Upload Profile Picture</span>
                        <input id="profile_photo" name="profile_photo" type="file" accept="image/*">
                    </label>
                </div>
                    
                <div class="form-section">
                    <label>Account Information</label>
                    Username
                    <input name="uname" type="text" placeholder="Username" value="<?php echo $row['userName']; ?>" required>
                    Passward
                    <input name="pwd" type="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                </div>
                    
                
                <div class="form-section">
                    <label>Shipping Address Information</label>
                    Number
                    <input name="add_no" type="text" placeholder="Address No" value="<?php echo $row['addressNo']; ?>" required>
                    
                    Street
                    <input name="add_street" type="text" placeholder="Street" value="<?php echo $row['street']; ?>" required>
                    
                    City
                    <input name="city" type="text" placeholder="City" value="<?php echo $row['city']; ?>" required>
                    
                    District
                    <input name="district" type="text" placeholder="District" value="<?php echo $row['district']; ?>" required>
                    
                    Postal Code
                    <input name="pcode" type="text" placeholder="Postal code" value="<?php echo $row['postalCode']; ?>" required>
                    
                    Country
                    <select name="country" id="country">
                        <option value="" disabled selected>Select your country</option>
                        <option value="Sri Lanka" <?php if ($row['country'] == 'Sri Lanka') echo 'selected'; ?>>Sri Lanka</option>
                        <option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
                        <option value="China" <?php if ($row['country'] == 'China') echo 'selected'; ?>>China</option>    
                    </select>

                    <input name="update_submit" type="submit" value="Update Profile">
                
                </div>
            </form>
  
        </div>
    

        <?php } else {
            header("Location: login.php?message=accountnotfound");
            exit();
        }
        ?>
    </div>
    
    <script>
        function logoutProfile() {
            // Display confirmation dialog for logout the profile
            confirm("Are you sure you want to logout your profile? This action cannot be undone.");
                // Redirect to the logout profile script
                window.location.href = "includes/logout.inc.php";
            
        }

        function deleteProfile() {
            // Display confirmation dialog for deleting the profile
            if (confirm("Are you sure you want to delete your profile? This action cannot be undone.")) {
                // Redirect to the delete profile script
                window.location.href = "includes/delete_profile.inc.php";
            }
        }
        
        displayAlert();
        function displayAlert() {
            var currentUrl = window.location.href;
                
            if (currentUrl.includes("localhost/Online%20fashion%20store/profile.php?message=profileupdated")) {
              alert("Update account details succussfully!");
            }
            else if (currentUrl.includes("http://localhost/Online%20fashion%20store/profile.php?message=welcome")) {
              alert("Welcome to Vogue Haven !");
            }
        }

    </script>
    
<?php
    include_once 'footer.php';
?>
