    <div class="sl-faqs">
        <div class="sl-tab__text">
            <h4>Booking Policy</h4>
            <?php
            $query_policy = "SELECT * FROM booking_policy WHERE vendor_ws_id = ?";
            $stmt_policy = $conn->prepare($query_policy);
            $stmt_policy->bind_param("i", $vw_id);
            $stmt_policy->execute();
            $result_policy = $stmt_policy->get_result();
            if ($result_policy->num_rows > 0) {
                $policy_details = $result_policy->fetch_assoc();
                echo "<p>" . $policy_details['policy'] . "</p>";
            } else {
                echo "<p>No policy found</p>";
            }
            ?>
        </div>
    </div>
