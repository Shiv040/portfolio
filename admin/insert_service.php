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
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Record inserted successfully',
                icon: 'success',
            }).then(function() {
                window.location.href = 'vendor_categories.php';
            }); 
        </script>";
    } else {
        echo "<script>
            Swal.fire({
            title: 'Error!',
            text: 'Error: " . $stmt->error . "',
            icon: 'error',
            confirmButtonText: 'OK'
            });
        </script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>