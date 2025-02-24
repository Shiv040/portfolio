<?php
include('../conn.php');
if (isset($_GET['admin_id'])) {
    $admin_id = intval($_GET['admin_id']); // Get admin_id from session
} else {
    echo "Admin not logged in.";
}

// Include database connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin details from the database
$sql = "SELECT admin_name, email, mobile_number FROM admin WHERE admin_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the admin exists
if ($admin = $result->fetch_assoc()) {
    // Admin data fetched successfully
    $admin_name = htmlspecialchars($admin['admin_name']);
    $email = htmlspecialchars($admin['email']);
    $mobile_number = htmlspecialchars($admin['mobile_number']);
} else {
    echo "
    <div class='container mt-5'>
        <div class='alert alert-danger d-flex align-items-center text-center' role='alert'>
            <i class='bi bi-exclamation-circle-fill me-3' style='font-size: 1.5rem;'></i>
            <div>
                <strong>Error!</strong> Admin not found.
            </div>
        </div>
    </div>";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .profile-container { max-width: 500px; margin: 60px auto; padding: 30px; border-radius: 16px; background: #fff; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .profile-pic { width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 4px solid #0d6efd; }
        .profile-info { margin-top: 20px; }
        .profile-info h3 { font-weight: bold; }
        .info-item { margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="profile-container text-center">
    <div class="profile-info">
        <h3><?php echo $admin_name; ?></h3>
        <p class="text-muted"><?php echo $email; ?></p>

        <div class="info-item">
            <strong>Phone:</strong> <?php echo $mobile_number; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
