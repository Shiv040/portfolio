<?php
include('../conn.php'); // Include your database connection file

header('Content-Type: application/json');

$response = array();

if (isset($_GET['image_id'])) {
    $imageId = $_GET['image_id'];

    // Fetch the image name from the database before deleting the record
    $stmt = $conn->prepare("SELECT image_name FROM vendor_wise_work_image WHERE image_id = ?");
    $stmt->bind_param("i", $imageId);
    $stmt->execute();
    $stmt->bind_result($imageName);
    $stmt->fetch();
    $stmt->close();

    if ($imageName) {
        $imagePath = 'vendor_work/' . $imageName;

        // Prepare and execute the SQL statement to delete the image record
        $stmt = $conn->prepare("DELETE FROM vendor_wise_work_image WHERE image_id = ?");
        $stmt->bind_param("i", $imageId);

        if ($stmt->execute()) {
            // Delete the image file from the server
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $response['status'] = 'success';
            $response['message'] = 'Image record deleted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error deleting the image record.';
        }

        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Image not found in the database.';
    }

    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'No image ID provided.';
}

echo json_encode($response);
?>