<?php
include('../conn.php');
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $serviceName = $_POST['serviceName'];
    $serviceDescription = $_POST['serviceDescription'];
    $categoryId = $_POST['categoryId'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO service (service_name, category_id, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $serviceName, $categoryId, $serviceDescription);
    if ($stmt->execute()) {
        echo "<script>
    window.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Service added successfully!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'vendor_categories.php';
        });
    });
</script>";

    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Failed to add service',
                text: 'Please try again.',
                showConfirmButton: true
            });
        </script>";
    }
    }
        // Check if the statement was executed successfully
?>