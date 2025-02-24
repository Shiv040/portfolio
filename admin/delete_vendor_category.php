<?php
include '../conn.php';

// Get category_id from request
$category_id = $_GET['id'];

// SQL to delete a record
$sql = "DELETE FROM vendor_categories WHERE category_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);

if ($stmt->execute() === TRUE) {
    echo "<script>alert('Record deleted successfully');</script>";
} else {
    echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
}

$stmt->close();
$conn->close();
?>