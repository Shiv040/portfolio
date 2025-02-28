<?php
session_start();
include('smtp/PHPMailerAutoload.php');
include('conn.php');

$msg = '';

if(isset($_POST['btnS'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if($count == 0) {
        $msg = "Email not found";
    } else {
        $otp = rand(100000, 999999); // Generate a random 6-digit OTP
        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $otp;

        // Store the OTP in the database
        $sql = "UPDATE admin SET otp='$otp' WHERE email='$email'";
        mysqli_query($conn, $sql);

        $msg = "OTP sent successfully! Please check your email.";
        smtp_mailer($email, 'OTP for Password Reset', 'Your OTP for password reset is: ' . $otp);
    }
}

if(isset($_POST['btnVerify'])) {
    $otp = $_POST['otp'];
    if($otp == $_SESSION['otp']) {
        $msg = "OTP verified successfully! You can now reset your password.";
        header('Location: reset_password.php');

        // Redirect to reset password page or handle password reset
    } else {
        $msg = "Invalid OTP. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .alert {
            display: <?php echo $msg ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <?php echo $msg;?>    
        </div>
        <form method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" name="btnS" class="btn btn-primary">Send OTP</button>
        </form>
        <form method="post" class="mt-3">
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" class="form-control" id="otp" name="otp" required>
            </div>
            <button type="submit" name="btnVerify" class="btn btn-primary">Verify OTP</button>
        </form>
    </div>
</body>
</html>
<?php
function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "utsavhub120@gmail.com";
    $mail->Password = "puiy tbma quct npmc";
    $mail->SetFrom("utsavhub120@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if(!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
?>