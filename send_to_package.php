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
    $inq_id = $_GET['id'];
    include 'conn.php';
    $sql = "UPDATE `inquiry` SET `status` = '3' WHERE `inquiry`.`id` = $inq_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Add this service into package success'
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = 'package.php';
                }
            });
              </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

</body>
</html>