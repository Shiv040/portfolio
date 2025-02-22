<?php
// view_service.php
include('../conn.php');

// Ensure category_id is provided
if (!isset($_GET['cat_id'])) {
    die('Category ID is required.');
}
$category_id = intval($_GET['cat_id']);

// Fetch data from the API using category_id
$url = "http://localhost/utsav_hub/api/list_vendor_wise_service.php?category_id=" . $category_id;
$response = @file_get_contents($url);
if ($response === FALSE) {
    die('Error fetching data from API');
}
$services = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON response');
}

// Delete service logic
if (isset($_GET['delete']) && isset($_GET['service_id'])) {
    $service_id = intval($_GET['service_id']);

    $sql = "DELETE FROM service WHERE service_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $service_id);
        if ($stmt->execute()) {
            header("Location: view_service.php?cat_id=" . $category_id);
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

mysqli_close($conn);  // Close DB connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Service List</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #343a40;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
        }

        thead {
            background-color: #343a40;
            color: #fff;
        }

        tbody tr:nth-child(odd) {
            background-color: #f1f1f1;
        }

        tbody tr:hover {
            background-color: #e0f7fa;
        }

        .btn-custom {
            padding: 10px 14px;
            font-size: 14px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-update {
            background-color: #28a745;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-update:hover {
            background-color: #218838;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="bi bi-list-task"></i> Service List</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                    <?php if (isset($services) && is_array($services) && !isset($services['message'])): ?>
                        <?php foreach ($services as $service): ?>
                            <tr>
                                <td><?= htmlspecialchars($service['service_id']) ?></td>
                                <td><?= htmlspecialchars($service['service_name']) ?></td>
                                <td><?= htmlspecialchars($service['category_id']) ?></td>
                                <td><?= htmlspecialchars($service['description']) ?></td>
                                <td><?= htmlspecialchars($service['vc_description']) ?></td>
                                <td><?= htmlspecialchars($service['category_name']) ?></td>
                                <td>
                                    <a href="update_service.php?service_id=<?= $service['service_id'] ?>&cat_id=<?= $category_id ?>" class="btn btn-update btn-custom" title="Update">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="GET" action="" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                        <input type="hidden" name="cat_id" value="<?= $category_id ?>">
                                        <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-delete btn-custom" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No services found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
