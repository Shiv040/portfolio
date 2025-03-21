<?php
include('../conn.php');
// SQL query to fetch vendor categories
$sql = "SELECT `category_id`, ucase(category_name) as category_name, `category_image`, `description`,status FROM `vendor_categories` ORDER BY `category_name`";
$result = $conn->query($sql);

$categories = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $category_id = $row['category_id'];
        $vendor_sql = "SELECT COUNT(*) as vendor_count
         FROM `vendor` WHERE `category_id` = $category_id";
        $vendor_result = $conn->query($vendor_sql);
        $vendor_count = $vendor_result->fetch_assoc();
        $row['vendor_count'] = $vendor_count['vendor_count'];
        $categories[] = $row;
        
        // Sort the categories array by vendor_count in descending order
        usort($categories, function($a, $b) {
        return $b['vendor_count'] - $a['vendor_count'];
        });

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