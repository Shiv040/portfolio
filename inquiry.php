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
include('conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $vendor_id=$_POST['vendor_id'];
    $data = $_POST;
    unset($data['name'], $data['email'], $data['phone'], $data['vendor_id']);
    $other_fields = json_encode($data);
    $created_at = date('Y-m-d');

    $sql = "INSERT INTO inquiry (name, email, phone_number, vender_id, other_fields, created_at) VALUES 
    (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $phone, $vendor_id, $other_fields, $created_at);

    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Your inquiry has been generated successfully!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'list_inquiry.php';
            }
            });
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>