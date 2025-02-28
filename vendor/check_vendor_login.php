<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('../conn.php');
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $query = "SELECT * FROM vendor WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $row=mysqli_fetch_assoc($result);
        $_SESSION['vendor_id'] = $row['vender_id'];
        $_SESSION['vender_name'] = $row['name'];
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Login successful',
            });
        </script>";
        header('Refresh: 2; URL=index.php');
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'password not match',
        });
        </script>";
        header('Refresh: 2; URL=login.php');

    }

?>
    
    </body>
</html>
