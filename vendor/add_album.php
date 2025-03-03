<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<?php 
session_start();
$vendor_id = $_SESSION['vendor_id'];
include('../conn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $album_name = $_POST['album_name'];
    $sql = "INSERT INTO `vendor_work_album`(`album_name`, `vender_id`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $album_name, $vendor_id);

    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Album added successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = 'manage_album.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error adding album',
                    text: '" . $stmt->error . "'
                });
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>



</body>
</html>