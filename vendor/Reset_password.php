<?php
session_start();
include("../conn.php"); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email']; // Assuming email is stored in session
    if ($new_password === $confirm_password) {
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $new_password, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Password reset successfully.'); window.location.href = '..vendor/login.php';</script>";
        } else {
            echo "Error updating password: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="post">
            <div>
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div>
                <button type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>