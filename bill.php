<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background: #eee;
            margin-top: 20px;
        }

        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }

        .receipt-main thead th {
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <div class="row">

            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <?php
                            $query = "SELECT * FROM `users` WHERE user_id=$user_id";
                            $result = mysqli_query($conn, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $user = mysqli_fetch_assoc($result);
                                echo '<h5><b>Customer Name:</b>' . htmlspecialchars($user['name']) . '</h5>';
                                echo '<p><b>Mobile :</b> ' . htmlspecialchars($user['phone']) . '</p>';
                                echo '<p><b>Email :</b> ' . htmlspecialchars($user['email']) . '</p>';
                                echo '<p><b>Address :</b> ' . "Surat" . '</p>';
                            } else {
                                echo '<h5>Customer Name</h5>';
                                echo '<p><b>Mobile :</b> N/A</p>';
                                echo '<p><b>Email :</b> N/A</p>';
                                echo '<p><b>Address :</b> N/A</p>';
                            }
                            ?>
                            <div class="receipt-right">

                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>Utsav Hub</h5>
                                <p>+91987654321 <i class="fa fa-phone"></i></p>
                                <p>utsavhub@gmail.com <i class="fa fa-envelope-o"></i></p>
                                <p>SURAT,GUJ<i class="fa fa-location-arrow"></i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">

                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h3>INVOICE # 102</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <?php
                        $query = "SELECT * 
FROM inquiry i 
JOIN vendor_wise_services vs 
ON vs.service_id = i.service_id
JOIN vendor v  
ON v.vender_id = i.vender_id
join service s
on s.service_id = i.service_id
WHERE vs.vender_id = i.vender_id AND i.status = 4 and i.user_id = $user_id";
                        $result = mysqli_query($conn, $query);
                        $total_price = 0;
                        ?>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $price = $row['price'];
                                $total_price = $price + $total_price;
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                                    <td><i class="fa fa-inr"></i> <?php echo htmlspecialchars($row['price']); ?></td>
                                </tr>
                                <?php } ?>
                                <td class="text-right">
                                    <p>
                                        <strong>Total Amount: </strong>
                                    </p>
                                    <p>
                                        <strong>Payable Amount: </strong>
                                    </p>
                                    <p>
                                        <strong>Balance Due: </strong>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong><i class="fa fa-inr"></i> <?php echo $total_price;?></strong>
                                    </p>
                                    <p>
                                        <strong><i class="fa fa-inr"></i> <?php echo $total_price/2;?></strong>
                                    </p>
                                    <p>
                                        <strong><i class="fa fa-inr"></i> <?php echo $total_price/2;?></strong>
                                    </p>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <h2><strong>Total: </strong></h2>
                                </td>
                                <td class="text-left text-danger">
                                    <h2><strong><i class="fa fa-inr"></i> <?php echo $total_price/2; 
                                    $pay=$total_price/2;
                                    $query = "UPDATE payment SET amount='$pay' WHERE user_id = $user_id";
        
                                    mysqli_query($conn, $query);
                                       ?></strong></h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <p><b>Date :</b> <?php echo date('d M Y'); ?></p>
                                <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>Have a nice day</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" onclick="printInvoice()">Print Invoice</button>
    </div>

    <script>
        function printInvoice() {
            var printContents = document.body.innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>