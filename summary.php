<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $businessInfo = [
        'business_name' => $_POST['txtBn'] ?? '',
        'phone_number' => $_POST['txtPn'] ?? '',
        'email' => $_POST['txtEmail'] ?? '',
        'city' => $_POST['city'] ?? '',
        'area' => $_POST['area'] ?? '',
        'business_address' => $_POST['txtBa'] ?? '',
        'vendor_id' => $_POST['vendor_id'] ?? ''
    ];
    $businessDocuments = [
        'logo' => $_FILES['txtLogo'] ?? null,
        'visiting_card' => $_FILES['txtVc'] ?? null,
        'business_licence' => $_FILES['txtBl'] ?? null
    ];
    $businessInfo['documents'] = $businessDocuments;
    $socialMediaLinks = [
        'instagram' => $_POST['txtIL'] ?? '',
        'facebook' => $_POST['txtFL'] ?? '',
        'telegram' => $_POST['txtTL'] ?? '',
        'google_my_business' => $_POST['txtGL'] ?? '',
        'youtube' => $_POST['txtYL'] ?? ''
    ];
    $businessInfo['social_media_links'] = $socialMediaLinks;
  
    /* image upload code */
    $target_dir = "vendor/logo_image/";
    $target_file = $target_dir . $businessInfo['business_name'] . '_' . basename($_FILES["txtLogo"]["name"]);
    move_uploaded_file($_FILES["txtLogo"]["tmp_name"], $target_file);

    $target_dir = "vendor/visiting_card/";
    $target_file = $target_dir .$businessInfo['business_name'] . '_' . basename($_FILES["txtVc"]["name"]);
    move_uploaded_file($_FILES["txtVc"]["tmp_name"], $target_file);
    
    $target_dir = "vendor/business_licence/";
    $target_file = $target_dir .$businessInfo['business_name'] . '_' . basename($_FILES["txtBl"]["name"]);
    move_uploaded_file($_FILES["txtBl"]["tmp_name"], $target_file);
    
    //echo '<pre>';
    //print_r($businessInfo);
    //echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Summary</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #ffffff;
            font-family: Arial, sans-serif;
            color: #000000;
        }

        h1 {
            color: #343a40;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            color: #007bff;
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 0.25rem;
        }

        .card-text {
            color: #495057;
        }

        .img-fluid-custom {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 5px;
            background-color: #fff;
            max-width: 100%;
            height: auto;
            width: 200px;
            height: 200px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Business Summary</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Business Information</h5>
                <table>
                    <tr>
                        <th>Business Name</th>
                        <td width="50%"><?php echo htmlspecialchars($businessInfo['business_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo htmlspecialchars($businessInfo['phone_number']); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo htmlspecialchars($businessInfo['email']); ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo htmlspecialchars($businessInfo['city']); ?></td>
                    </tr>
                    <tr>
                        <th>Area</th>
                        <td><?php echo htmlspecialchars($businessInfo['area']); ?></td>
                    </tr>
                    <tr>
                        <th>Business Address</th>
                        <td><?php echo htmlspecialchars($businessInfo['business_address']); ?></td>
                    </tr>
                </table>
                
                <h5 class="card-title mt-4">Documents</h5>
                <table>
                    <tr>
                        <th>Logo</th>
                        <td width="50%"><img src="vendor/logo_image/<?php echo htmlspecialchars($businessInfo['business_name'] . '_' . $businessDocuments['logo']['name']); ?>" alt="Logo" class="img-fluid img-fluid-custom mb-3"></td>
                    </tr>
                    <tr>
                        <th>Visiting Card</th>
                        <td><img src="vendor/visiting_card/<?php echo htmlspecialchars($businessInfo['business_name'] . '_' . $businessDocuments['visiting_card']['name']); ?>" alt="Visiting Card" class="img-fluid img-fluid-custom mb-3"></td>
                    </tr>
                    <tr>
                        <th>Business Licence</th>
                        <td><img src="vendor/business_licence/<?php echo htmlspecialchars($businessInfo['business_name'] . '_' . $businessDocuments['business_licence']['name']); ?>" alt="Business Licence" class="img-fluid img-fluid-custom mb-3"></td>
                    </tr>
                </table>

                <h5 class="card-title mt-4">Social Media Links</h5>
                <table>
                    <tr>
                        <th>Instagram</th>
                        <td width="50%"><?php echo htmlspecialchars($socialMediaLinks['instagram']); ?></td>
                    </tr>
                    <tr>
                        <th>Facebook</th>
                        <td><?php echo htmlspecialchars($socialMediaLinks['facebook']); ?></td>
                    </tr>
                    <tr>
                        <th>Telegram</th>
                        <td><?php echo htmlspecialchars($socialMediaLinks['telegram']); ?></td>
                    </tr>
                    <tr>
                        <th>Google My Business</th>
                        <td><?php echo htmlspecialchars($socialMediaLinks['google_my_business']); ?></td>
                    </tr>
                    <tr>
                        <th>YouTube</th>
                        <td><?php echo htmlspecialchars($socialMediaLinks['youtube']); ?></td>
                    </tr>
                </table>
                <div class="text-center mt-4">
                    <form action="final_submit.php" method="post">
                        <input type="hidden" name="vendor_id" value="<?php echo $_POST['vendor_id']; ?>">
                        <input type="hidden" name="business_info" value="<?php echo htmlspecialchars(json_encode($businessInfo)); ?>">
                        <button type="submit" class="btn btn-success">Final Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
