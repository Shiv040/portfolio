<?php
header('Content-Type: application/json');
include('../conn.php');
$vendor_id = $_GET['vendor_id'];
// SQL query to fetch vendor details
$sql = "
SELECT  v.vender_id,`email`, `password`, `name`, v.`mobile_number`, `category_name`,logo,business_name,`address`,  `profile_pic`, `verification_status`, `created_at` 
FROM `vendor` as v 
join vendor_categories vc 
on vc.category_id=v.category_id
join business_info b 
on b.vender_id=v.vender_id
where v.vender_id=$vendor_id";
$result = $conn->query($sql);

$vendors = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $services_sql = "
        SELECT service_name,price 
        FROM `vendor_wise_services` vs 
        join service s 
        on s.service_id=vs.service_id
        where vender_id=$vendor_id
        order by service_name
        ";
        $services_result = $conn->query($services_sql);
        $services = array();
        if ($services_result->num_rows > 0) {
            while ($service_row = $services_result->fetch_assoc()) {
                $services[] = $service_row;
            }
        }
        $row['services'] = $services;
        $vendors[] = $row;
    }
}

echo json_encode($vendors);

$conn->close();
