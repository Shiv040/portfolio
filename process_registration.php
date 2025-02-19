<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    include 'conn.php';
    // Print form data in array
   
    // Get form data
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $address = $_POST['address'];
    $area_id = $_POST['area_id'];
    $email = $_POST['email'];
    $phone = $_POST['mobile_number'];   
    $password = $_POST['password'];
    $created_at = date("Y-m-d");
    

    // Insert data into database
    $sql = "INSERT INTO vendor (email, password, name, mobile_number, category_id, address, area_id, created_at) 
            VALUES ('$email', '$password', '$name', '$phone', '$category_id', '$address', '$area_id', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>