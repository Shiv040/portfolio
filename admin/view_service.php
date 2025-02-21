<?php
// Fetch data from the API
$category_id = $_GET['cat_id'];
$url = "http://localhost/utsav_hub/api/list_vendor_wise_service.php?category_id=" . $category_id;
$response = file_get_contents($url);
$services = json_decode($response, true);
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
            background-color:green;
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
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                    <td><?php echo htmlspecialchars($service['service_name']); ?></td>
                    <td><?php echo htmlspecialchars($service['category_id']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><?php echo htmlspecialchars($service['vc_description']); ?></td>
                    <td><?php echo htmlspecialchars($service['category_name']); ?></td>
                    <td><a href=""><button class="btn btn-update btn-custom bi bi-pencil-square"></button></a></td>
                    <td><a href=""><button class="btn btn-delete btn-custom bi bi-trash"></button></a></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>