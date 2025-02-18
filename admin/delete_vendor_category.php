<?php
include '../conn.php';

// Get category_id from request
$category_id = $_GET['id'];

// SQL to delete a record
$sql = "DELETE FROM vendor_categories WHERE category_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);

if ($stmt->execute() === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>