<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    
<?php
// Include database connection file
include("../conn.php");
// Get the vendor_ws_id from the query string
$vendor_ws_id = isset($_GET['vendor_ws_id']) ? intval($_GET['vendor_ws_id']) : 0;

if ($vendor_ws_id > 0) {
    // Prepare the SQL DELETE statement
    $sql = "UPDATE `vendor_wise_services` SET description = '' WHERE vendor_ws_id = ?";
    
    // Initialize the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the vendor_ws_id parameter to the statement
        $stmt->bind_param("i", $vendor_ws_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'Record deleted successfully.',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'manage_service.php';
            });
            </script>";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid vendor_ws_id.";
}

// Close the database connection
$conn->close();
?>

</body>
</html>