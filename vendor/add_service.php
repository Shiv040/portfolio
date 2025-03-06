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

    if (isset($_POST['btnAddImage'])) {
        foreach ($_POST['service_id'] as $index => $service_id) {
            if ($_FILES['cover_image' . $service_id]['size'] > 0) {
                print_r($_FILES['cover_image' . $service_id]);



                $target_dir = "cover_image/";
                $target_file = $target_dir . basename($_FILES['cover_image' . $service_id]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                move_uploaded_file($_FILES['cover_image' . $service_id]["tmp_name"], $target_file);

                // Database connection
                include('../conn.php');

                // Update the cover image in the database
                $sql = "UPDATE vendor_wise_services
                SET cover_image = ? WHERE service_id = ? AND vender_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sii", $target_file, $service_id, $vendor_id);
                $stmt->execute();

               

                $stmt->close();
                $conn->close();
                echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Cover image added successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'manage_service.php';
                        }
                    });
                </script>";
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnU'])) {
        $services = [];
        foreach ($_POST['service_id'] as $index => $service_id) {
            $status = 0;
            $services[] = [
                'service_id' => $_POST['service_id'][$index],
                'vender_id' => $vendor_id,
                'price' => $_POST['price'][$index],
                'status' => empty($_POST['status' . $service_id]) ? 0 : 1
            ];
        }

        // Database connection
        include('../conn.php');

        foreach ($services as $service) {
            $service_id = $service['service_id'];
            $vender_id = $service['vender_id'];
            $price = $service['price'];
            $status = $service['status'];

            // Check if the service_id and vendor_id exist in the table
            $sql = "SELECT * FROM vendor_wise_services WHERE service_id = ? AND vender_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $service_id, $vender_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Update the existing record
                $sql = "UPDATE vendor_wise_services SET price = ?, status = ? WHERE service_id = ? AND vender_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("diii", $price, $status, $service_id, $vender_id);
                $stmt->execute();
            } else {
                // Insert a new record
                $sql = "INSERT INTO vendor_wise_services (service_id, vender_id, price, status) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iidi", $service_id, $vender_id, $price, $status);
                $stmt->execute();
            }
        }

        $stmt->close();
        $conn->close();
        echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Service updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'manage_service.php';
            }
        });
    </script>";
    }

    ?>
</body>

</html>