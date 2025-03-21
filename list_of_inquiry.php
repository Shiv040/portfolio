<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:13:45 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Utsav Hub</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.html">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<?php include('up_link.php');?>
    
</head>
<body class="sl-home">
    <!-- Preloader Start -->
    <div class="preloader-outer">
        <div class="sl-preloader-holder">
            <img src="images/loader.png" alt="loader img">
            <div class="sl-loader"></div>
        </div>
    </div>
    <!-- Preloader End -->
    <!-- HEADER START -->
    <header>
        <?php include('header.php');?>
    </header>
    <!-- HEADER END -->
    <!-- MAIN START -->
    <main class="sl-main">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <?php
            $api_url = 'http://localhost/UTSAV_HUB/api/list_inquiry.php?user_id='.$user_id;
            $response = file_get_contents($api_url);
            $inquiries = json_decode($response, true);
        ?>

        <div class="container">
            <h2>List of Inquiries</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Other Fields</th>
                        <th>Created At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    foreach ($inquiries as $inquiry):
                        
                         ?>
                        <?php if ($inquiry['status'] == $_GET['status']): ?>
                        <tr>
                        <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['service_name']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['name']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['phone_number']); ?></td>
                            <td>
                                <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#inquiryModal<?php echo $inquiry['id']; ?>'>View More</button>
                            </td>
                            <div class='modal fade' id='inquiryModal<?php echo $inquiry['id']; ?>' tabindex='-1' aria-labelledby='inquiryModalLabel<?php echo $inquiry['id']; ?>' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='inquiryModalLabel<?php echo $inquiry['id']; ?>'>Inquiry Details</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <?php 
                                                $other_fields = json_decode($inquiry['other_fields'], true);
                                                if (!empty($other_fields)): 
                                            ?>
                                                <ul class='list-group'>
                                                    <?php foreach ($other_fields as $key => $value): ?>
                                                        <li class='list-group-item'>
                                                            <strong><?php echo ucfirst(htmlspecialchars($key)); ?>:</strong> <?php echo htmlspecialchars($value); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else: ?>
                                                <p>No additional details available</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td><?php echo date('d-m-y', strtotime($inquiry['created_at'])); ?></td>
                            <td>
                                <?php 
                                    if ($inquiry['status'] == 0) {
                                        echo 'Pending';
                                    } else {
                                        if ($inquiry['status'] == 1) {
                                            echo '<a href="send_to_package.php?id=' . $inquiry['id'] . '" class="btn btn-success" onclick="showAlert()">Add into Package</a>';
                                        }
                                        ?>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <!-- MAIN END -->
    <!-- FOOTER START -->
    <footer>
        <?php include("footer.php");?>
    </footer>
    <!-- FOOTER END -->
    <?php include("down_link.php");?>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:31 GMT -->
</html>