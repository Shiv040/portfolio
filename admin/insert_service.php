<?php
include('../conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Get form data
    echo $serviceName = $_POST['serviceName'];
    echo $serviceDescription = $_POST['serviceDescription'];
    echo $categoryId = $_POST['categoryId'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO service (service_name, category_id, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $serviceName, $categoryId, $serviceDescription);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Record insert successfully');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>