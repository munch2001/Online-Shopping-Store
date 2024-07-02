<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Perform the deletion query with a WHERE clause to delete only the selected row
    $deleteQuery = "DELETE FROM cart WHERE CartID = '$id'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Deletion successful
        echo "Item deleted successfully.";
        // Redirect to the shopping cart page
        header("Location: viewcart.php");
        exit;
    } else {
        // Deletion failed
        echo "Error deleting item: " . mysqli_error($conn);
    }
}
?>
