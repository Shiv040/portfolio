<div class="main active">
    <small><i class="fa fa-smile-o"></i></small>
    <div class="text">
        <h2>Your business Information</h2>
        <p>Enter your business information to get closer to companies.</p>
    </div>

    <div class="input-text">
        <div class="input-div">
            <input type="text" name="txtBn">
            <span> Business Name</span>
        </div>
    </div>
    <div class="input-text">
        <div class="input-div">
            <input type="text" name="txtPn">
            <span>Phone number</span>
        </div>
        <div class="input-div">
            <input type="text" name="txtEmail">
            <span>E-mail Address</span>
        </div>
    </div>
    <div class="input-text">
        <div class="input-div">
            <select name="city">
                <option>Select City</option>
                <option>Surat</option>
            </select>
        </div>
        <div class="input-div">
            <select name="area">
                <option>Select Area</option>
                <?php
                $json = file_get_contents('http://localhost/utsav_hub/api/list_area.php');
                $areas = json_decode($json, true);
                foreach ($areas as $area) {
                    echo '<option value="' . $area['area_id'] . '">' . $area['area_name'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="input-text">
        <div class="input-div">
            <input type="text" required name="txtBa">
            <span> Business Address</span>
        </div>
    </div>
    <div class="buttons">
        <button type="button" class="next_button">Next Step</button>
    </div>

</div>