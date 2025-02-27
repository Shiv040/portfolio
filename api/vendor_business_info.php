<?php
include('../conn.php');
/*
SELECT `vender_id`, `email`, `password`, `name`, `mobile_number`, `category_id`, `address`, `area_id`, `profile_pic`, `verification_status`, `aadhar_photo`, `pancard_photo`, `created_at`, `varify_at` FROM `vendor`
SELECT `business_id`, `business_name`, `location`, `area_id`, `mobile_number`, `email_id`, `visiting_card`, `logo`, `business_license` FROM `business_info` 
SELECT `vender_id`, `business_id` FROM `vendor_wise_business`
SELECT `area_id`, `area_name`, `pincode` FROM `area`
SELECT `category_id`, `category_name`, `category_image`, `description` FROM `vendor_categories`

*/

$sql = "SELECT v.`vender_id`, v.`email`, v.`password`, v.`name`, v.`mobile_number`, v.`category_id`, v.`address`, v.`area_id`, v.`profile_pic`, v.`verification_status`, v.`aadhar_photo`, v.`pancard_photo`, v.`created_at`, v.`varify_at`, 
    b.`business_id`, b.`business_name`, b.`location`, b.`area_id` AS `business_area_id`, b.`mobile_number` AS `business_mobile_number`, b.`email_id` AS `business_email_id`, b.`visiting_card`, b.`logo`, b.`business_license`
    FROM `vendor` v
    LEFT JOIN `vendor_wise_business` vwb ON v.`vender_id` = vwb.`vender_id`
    LEFT JOIN `business_info` b ON vwb.`business_id` = b.`business_id`";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $vendor_id = $row['vender_id'];
        if (!isset($data[$vendor_id])) {
            $data[$vendor_id] = array(
                'vender_id' => $row['vender_id'],
                'email' => $row['email'],
                'password' => $row['password'],
                'name' => $row['name'],
                'mobile_number' => $row['mobile_number'],
                'category_id' => $row['category_id'],
                'address' => $row['address'],
                'area_id' => $row['area_id'],
                'profile_pic' => $row['profile_pic'],
                'verification_status' => $row['verification_status'],
                'aadhar_photo' => $row['aadhar_photo'],
                'pancard_photo' => $row['pancard_photo'],
                'created_at' => $row['created_at'],
                'varify_at' => $row['varify_at'],
                'business_info' => array()
            );
        }
        if ($row['business_id']) {
            $data[$vendor_id]['business_info'][] = array(
                'business_id' => $row['business_id'],
                'business_name' => $row['business_name'],
                'location' => $row['location'],
                'business_area_id' => $row['business_area_id'],
                'business_mobile_number' => $row['business_mobile_number'],
                'business_email_id' => $row['business_email_id'],
                'visiting_card' => $row['visiting_card'],
                'logo' => $row['logo'],
                'business_license' => $row['business_license']
            );
        }
    }
} else {
    echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode(array_values($data));
?>
