<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package History</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sl-newAppointments__items {
            list-style: none;
            padding: 0;
        }
        .sl-newAppointments__detail {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .sl-newAppointments__userLogo img {
            border-radius: 50%;
        }
        .sl-newAppointments__userText h5 {
            margin: 0;
            font-size: 18px;
        }
        .sl-newAppointments__services--description h6 {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Package History</h2>
        <ul class="sl-newAppointments__items">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            }
            include 'conn.php';

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch package history
            $sql = "SELECT * 
                    FROM inquiry i 
                    JOIN vendor_wise_services vs ON vs.service_id = i.service_id
                    JOIN vendor v ON v.vender_id = i.vender_id
                    JOIN service s ON s.service_id = i.service_id
                    WHERE vs.vender_id = i.vender_id AND i.status = 3 and i.user_id = $user_id ";
            $result = mysqli_query($conn, $sql);
            $total_price = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $price = $row['price'];
                    $total_price = $price + $total_price;
                    echo '<li class="sl-newAppointments__items sl-allAppointments-notification sl-allAppointments-notification__unread">';
                    echo '<div class="sl-newAppointments__detail">';
                    echo '<div class="sl-newAppointments__userDetail">';
                    echo '<div class="sl-newAppointments__userLogo">';
                    echo '<figure>';
                    echo '<img src="vendor/' . $row['cover_image'] . '" alt="Image Description" style="width: 100px; height: 100px; object-fit: cover;">';
                    echo '</figure>';
                    echo '</div>';
                    echo '<div class="sl-newAppointments__userText">';
                    echo '<div class="sl-slider__tags"></div>';
                    echo '<h5><a href="javascript:void(0);">' . $row['service_name'] . '</a></h5>';
                    echo '<p>' . date('M d, @ h:ia', strtotime($row['created_at'])) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="sl-newAppointments__services">';
                    echo '<div class="sl-newAppointments__services--description">';
                    echo '<h6>Vendor Information:</h6>';
                    echo '<ul>';
                    echo '<li><p>' . strtoupper($row['name']) . '</p></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '<a href="javascript:void(0);" class="btn btn-primary">₹' . number_format($price, 2) . '</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';
                }
            } else {
                echo '<li>No inquiries found.</li>';
            }
            ?>
        </ul>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>