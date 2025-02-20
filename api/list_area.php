<?php
include('../conn.php');
// SQL query to fetch vendor categories
$sql = "SELECT `area_id`, `area_name`, `pincode`, `city_id` FROM `area` ORDER BY `area_name`";
$result = $conn->query($sql);

$categories = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $areas[] = $row;
    }
} else {
    echo json_encode(array("message" => "No area found."));
    exit();
}

$conn->close();

// Return the categories as JSON
header('Content-Type: application/json');
echo json_encode($areas);
?>