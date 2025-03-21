<?php
include('../conn.php');
header('Content-Type: application/json');
$vendor_id = isset($_GET['vendor_id']) ? intval($_GET['vendor_id']) : 0;
$where = $vendor_id > 0 ? " WHERE `vender_id` = $vendor_id" : "";
$sql = "SELECT `id`,service_name,user_id,`name`, `email`, `phone_number`, `vender_id`, `other_fields`, `created_at`,i.status
 FROM `inquiry` i 
 join service s 
 on s.service_id=i.service_id
 ". $where;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $inquiries = array();
    while($row = $result->fetch_assoc()) {
        $inquiries[] = $row;
    }
    echo json_encode($inquiries);
} else {
    echo json_encode(array());
}
$conn->close();
?>