<?php
include('../conn.php');
// Get category_id from AJAX request
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Fetch data from vendor table
$sql = "SELECT *
 FROM vendor v
 join business_info b 
 on b.vender_id=v.vender_id
  WHERE category_id = $category_id";
$result = $conn->query($sql);

?>

        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Business Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $i=1;
                    while($row = $result->fetch_assoc()) {
                        $bname=strtoupper($row['business_name']);
                        echo "<tr>
                                <td>{$i}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['mobile_number']}</td>
                                <td>{$bname}</td>
                                <td>
                                    <a href='view_vendor.php?vender_id={$row['vender_id']}' class='btn btn-primary'>View More</a>
                                </td>
                              </tr>";
                              $i++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

  
<?php
$conn->close();
?>