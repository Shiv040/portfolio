
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <style>
        .container {
            margin-top: 50px;
        }
        .alert {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }
        .alert-heading {
            color: #3c763d;
        }
        .alert p {
            font-size: 16px;
        }
    </style>
    <div class="container mt-5">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $businessInfo = json_decode($_POST['business_info'], true);
    include 'conn.php';
    $businessName = $businessInfo['business_name'];
    $phoneNumber = $businessInfo['phone_number'];
    $email = $businessInfo['email'];
    $city = $businessInfo['city'];
    $areaId = $businessInfo['area'];
    $vendorid = $_POST['vendor_id'];
    $businessAddress = $businessInfo['business_address'];
    $logo = $businessInfo['documents']['logo']['name'];
    $visitingCard = $businessInfo['documents']['visiting_card']['name'];
    $businessLicense = $businessInfo['documents']['business_licence']['name'];

    $sql = "INSERT INTO `business_info`(`business_name`, `location`, `area_id`, `mobile_number`, `email_id`, `visiting_card`, `logo`, `business_license`,vender_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssssi", $businessName, $businessAddress, $areaId, $phoneNumber, $email, $visitingCard, $logo, $businessLicense,$vendorid);

    if ($stmt->execute()) {
        $businessId = $stmt->insert_id;
        $instagram = $businessInfo['social_media_links']['instagram'];
        $facebook = $businessInfo['social_media_links']['facebook'];
        $telegram = $businessInfo['social_media_links']['telegram'];
        $googleMyBusiness = $businessInfo['social_media_links']['google_my_business'];
        $youtube = $businessInfo['social_media_links']['youtube'];

        $sqlSocial = "INSERT INTO `business_social_info`(`business_id`, `insta_id`, `facebook_id`, `telegram_link`, `google_my_business`, `youtube_chennel`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtSocial = $conn->prepare($sqlSocial);
        $stmtSocial->bind_param("isssss", $businessId, $instagram, $facebook, $telegram, $googleMyBusiness, $youtube);

        if ($stmtSocial->execute()) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your data has been saved. Please wait for 48 hours for the activation of your account. Check your email for further updates and verification status.'
            }).then(function() {
                window.location = 'vendor/login.php';
            });
            </script>";
        } else {
            echo "Error: " . $sqlSocial . "<br>" . $conn->error;
        }

        $stmtSocial->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
   // print_r($businessInfo);
}
?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success!</h4>
            <p>Your data has been saved. Please wait for 48 hours for the activation of your account. Check your email for further updates and verification status.</p>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>