<?php
include('../conn.php');
// SQL query to fetch vendor categories
$sql = "SELECT `category_id`, ucase(category_name) as category_name, `category_image`, `description` FROM `vendor_categories` ORDER BY `category_name`";
$result = $conn->query($sql);

$categories = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
} else {
    echo json_encode(array("message" => "No categories found."));
    exit();
}

$conn->close();

// Return the categories as JSON
header('Content-Type: application/json');
echo json_encode($categories);
?>