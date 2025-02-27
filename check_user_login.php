<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include SweetAlert CSS and JS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    
<?php
// Include the database connection file
include('conn.php');

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    // If result matched $username and $password, table row must be 1 row
    if ($count == 1) {
        $_SESSION['name']=$row['name'];
        $_SESSION['user_id']=$row['user_id'];
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Login successful!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        </script>";
        
    } else {
        echo "<script>
            Swal.fire({
            title: 'Error!',
            text: 'Your Login Name or Password is invalid',
            icon: 'error',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php';
            }
            });
        </script>";
    }
}
?>

</body>
</html>