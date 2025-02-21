<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $businessInfo = [
        'business_name' => $_POST['txtBn'] ?? '',
        'phone_number' => $_POST['txtPn'] ?? '',
        'email' => $_POST['txtEmail'] ?? '',
        'city' => $_POST['city'] ?? '',
        'area' => $_POST['area'] ?? '',
        'business_address' => $_POST['txtBa'] ?? ''
    ];

    echo '<pre>';
    print_r($businessInfo);
    echo '</pre>';
}
?>