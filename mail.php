<?php
session_start();
include('smtp/PHPMailerAutoload.php');
include('conn.php');
if(isset($_POST['btnS']))
{
	$email = $_POST['email'];
	$sql="select * from admin where email='$email'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		//echo "<script>alert('Email not found');</script>";
		$msg="Email not found";
	}
	else
	{
		$_SESSION['email']=$email;
	$msg="Email sent successfully! Please check your email.";
echo smtp_mailer($email,'Re-set','<a href="http://localhost/utsav_hub/admin/resetpassword.php">Click here to reset password</a>');

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Email Sent</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container mt-5">
		<div class="alert alert-success" role="alert">
			<?php echo $msg;?>	
		</div>
	</div>
</body>
</html>
<?php
function smtp_mailer($to,$subject, $msg){
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
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>