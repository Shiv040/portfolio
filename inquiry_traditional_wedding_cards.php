<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d'); ?>">
</div>


<div class="form-group">
    <label for="carriageType">number of cards</label>
    <input type="number" class="form-control" id="number_of_cards" name="number_of_cards" min="1">
</div>
<div class="form-group">
    <label for="packages">Packages</label>
    <select class="form-control" id="packages" name="packages">
        <option value="basic">Basic(₹3000)</option>
        <option value="standard">Standard(₹10000+)</option>
        <option value="premium">Premium(₹10000)</option>
    </select>
</div>

<div class="form-group">
    <label for="expected_budget">Expected Budget</label>
    <input type="number" class="form-control" id="expected_budget" name="expected_budget" min="0" step="0.01" placeholder="Enter your budget">
</div>
