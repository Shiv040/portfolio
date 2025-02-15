<?php
include('../conn.php');

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 5;

$query = "SELECT `service_id`, `service_name`, s.`category_id`, s.`description`, vc.description as vc_description, vc.category_name
          FROM `service` s 
          JOIN vendor_categories vc 
          ON vc.category_id = s.category_id
          WHERE vc.category_id = $category_id";

$result = mysqli_query($conn, $query);

$services = array();
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

header('Content-Type: application/json');
echo json_encode($services);