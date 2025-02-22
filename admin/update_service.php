<?php
include '../conn.php';
if (isset($_GET['service_id']) && isset($_GET['cat_id'])) {
    $service_id = intval($_GET['service_id']);
    $category_id = intval($_GET['cat_id']);
    $sql_service = "SELECT * FROM service WHERE service_id = ?";
    if ($stmt = $conn->prepare($sql_service)) {
        $stmt->bind_param("i", $service_id);
        $stmt->execute();
        $result_service = $stmt->get_result();
        $service = $result_service->fetch_assoc();

        if (!$service) {
            echo "Service not found.";
            exit;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
        exit;
    }

    $sql_category = "SELECT category_name FROM vendor_categories WHERE category_id = ?";
    if ($stmt = $conn->prepare($sql_category)) {
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result_category = $stmt->get_result();
        $category = $result_category->fetch_assoc();

        if (!$category) {
            echo "Category not found.";
            exit;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $vc_description = $_POST['vc_description'];

    $sql = "UPDATE service s JOIN vendor_categories vc ON s.category_id = vc.category_id SET s.service_name = ?, s.description = ?, vc.description = ? WHERE s.service_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $service_name, $description, $vc_description, $service_id);
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

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
        textarea, input[type="text"] {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="mb-4 text-center">Update Service</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="service_name" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="service_name" name="service_name" value="<?= htmlspecialchars($service['service_name']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?= htmlspecialchars($service['description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="vc_description" class="form-label">Vendor Description</label>
                            <textarea class="form-control" id="vc_description" name="vc_description" rows="4" required><?= htmlspecialchars($service['vc_description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category_name" value="<?= htmlspecialchars($category['category_name']) ?>" readonly>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
