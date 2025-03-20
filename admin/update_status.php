<?php
include("../conn.php"); 
if (isset($_POST['category_id']) && isset($_POST['status'])) {
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    $query = "UPDATE `vendor_categories` SET `status`='$status' WHERE `category_id`='$category_id'";
    if (mysqli_query($conn, $query)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>