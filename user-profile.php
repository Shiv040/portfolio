<?php
session_start();
include 'conn.php';

// Check if user ID exists in URL
if (!isset($_SESSION['user_id'])) {
    echo "User ID not provided.";
    exit;
}

$userId =$_SESSION['user_id'];

// Fetch user profile from database
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm" style="width: 22rem;">
        <div class="card-body text-center">
            <?php if ($user): ?>
                <h5 class="card-title mb-4">User Profile</h5>
                <form action="edit-profile.php" method="post">
                    <p class="card-text"><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                    <button type="submit" class="btn btn-primary mt-3">Edit Profile</button>
                </form>
                <a href="javascript:history.back()" class="btn btn-secondary mt-2">Back</a>
            <?php else: ?>
                <p class="text-danger">User not found.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
