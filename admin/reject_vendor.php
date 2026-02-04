<?php
include '../conn.php';

if (isset($_GET['id'])) {
    $vendor_id = $_GET['id'];

    // Update vendor status to rejected securely
    $query = "UPDATE vendor SET verification_status = 2 WHERE vender_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $vendor_id);

    if ($stmt->execute()) {
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Vendor has been rejected successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.history.back();
                            
                        }
                    });
                });
              </script>";
    } else {
        echo "Error rejecting vendor: {$conn->error}";
    }

    $stmt->close();
} else {
    echo "No vendor ID provided.";
}

$conn->close();
?>
