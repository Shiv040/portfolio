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
session_destroy();
echo "<script>
Swal.fire({
    title: 'Logged out!',
    text: 'You have been successfully logged out.',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'index.php';
    }
});
</script>";

?>
    
    </body>
</html>
