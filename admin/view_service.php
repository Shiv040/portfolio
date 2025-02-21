<?php
include '../conn.php';

// Ensure service_id and category_id are provided in the URL
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Fetch data from the API using category_id
    $url = "http://localhost/utsav_hub/api/list_vendor_wise_service.php?category_id=" . $category_id;
    $response = file_get_contents($url);
    $services = json_decode($response, true);
}

// Delete service logic (Check if the "delete" button is clicked)
if (isset($_GET['delete']) && isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $category_id = $_GET['category_id'];  // Ensure category_id is passed as well

    // SQL query to delete the service
    $sql = "DELETE FROM service WHERE service_id = ?";

    // Prepare and bind
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $service_id);
        if ($stmt->execute()) {
            echo "Service deleted successfully.";
            // Redirect after deletion
            header("Location: view_service.php?category_id=" . $category_id);
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Service List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .button-container {
            margin-top: 50px;
            text-align: center;
        }

        .btn-custom {
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn-update {
            background-color: green;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Service List</h1>
    <table>
        <thead>
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Category ID</th>
                <th>Description</th>
                <th>Vendor Description</th>
                <th>Category Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($services) && !empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['service_name']); ?></td>
                        <td><?php echo htmlspecialchars($service['category_id']); ?></td>
                        <td><?php echo htmlspecialchars($service['description']); ?></td>
                        <td><?php echo htmlspecialchars($service['vc_description']); ?></td>
                        <td><?php echo htmlspecialchars($service['category_name']); ?></td>
                        <td>
                            <!-- Update Button with Link -->
                            <a href="update_service.php?service_id=<?php echo $service['service_id']; ?>&category_id=<?php echo $category_id; ?>" class="btn btn-update btn-custom bi bi-pencil-square"></a>
                        </td>
                        <td>
                            <!-- Delete Form with Confirmation -->
                            <form method="GET" action="" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                                <input type="hidden" name="service_id" value="<?php echo $service['service_id']; ?>">
                                <button type="submit" name="delete" class="btn btn-delete btn-custom bi bi-trash"></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">No services found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
