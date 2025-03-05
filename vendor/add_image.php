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
// Include the database connection file
include('../conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $album_id = $_POST['album_id'];
   
    $image_name = $_FILES['image_file']["name"];
    // Define the target directory for image uploads
    $target_dir = "vendor_work/";
    $target_file = $target_dir . basename($_FILES["image_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image_file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>Swal.fire('Error', 'File is not an image.', 'error');</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>Swal.fire('Error', 'Sorry, file already exists.', 'error');</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image_file"]["size"] > 500000) {
        echo "<script>Swal.fire('Error', 'Sorry, your file is too large.', 'error');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ( $imageFileType != "webp" && $imageFileType != "avif" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>Swal.fire('Error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.', 'error');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>Swal.fire('Error', 'Sorry, your file was not uploaded.', 'error');</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
            $image_name = basename($_FILES["image_file"]["name"]);
        } else {
            echo "<script>Swal.fire('Error', 'Sorry, there was an error uploading your file.', 'error');</script>";
        }
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO vendor_wise_work_image (album_id,  image_name) VALUES (?, ?)";

    // Initialize the prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("ss", $album_id, $image_name);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>
                    Swal.fire('Success', 'New record created successfully', 'success').then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'manage_album.php';
                        }
                    });
                  </script>";
        } else {
            echo "<script>Swal.fire('Error', 'Error: " . $stmt->error . "', 'error');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>Swal.fire('Error', 'Error: " . $conn->error . "', 'error');</script>";
    }

    // Close the connection
    $conn->close();
}
?>
</body>
</html>