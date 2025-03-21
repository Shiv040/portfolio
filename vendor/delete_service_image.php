<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<?php
include('../conn.php'); // Include your database connection file
    $vwid=$_GET['vendor_ws_id'];
    $sql = "UPDATE `vendor_wise_services` SET cover_image='cover_image/no.jpg' WHERE vendor_ws_id=$vwid";
    
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Image deleted successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'manage_service.php';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Failed to delete image.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
    $stmt->close();
    $conn->close();
?>

</body>
</html>