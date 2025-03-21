<?php
include('../conn.php');
$service=$_GET['serviceId'];    
$query = "SELECT * 
FROM `vendor_wise_services` vs 
join vendor v 
on vs.vender_id=v.vender_id
WHERE `service_id`='$service'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<tr>";
    echo "<th>Vendor Name</th>";
    echo "<th>Price</th>";
    echo "<th>View Vendor</th>";
    echo "</tr>";    
    while($row = mysqli_fetch_assoc($result)) {
        if($row['price']>0)
        {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>₹" . $row['price'] . "</td>";
        echo "<td><a href='view_vendor.php?vender_id={$row['vender_id']}'>View More</a></td>";
        echo "</tr>";
        }
        else{
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>Service not available</td>";
            echo "</tr>";
        }
    }
} else {
    echo "<tr><td>No results found</td></tr>";
}
?>