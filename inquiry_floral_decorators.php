<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d'); ?>">
</div>

<div class="form-group">
    <label for="time">Time</label>
    <input type="time" class="form-control" id="time" name="time">
</div>

<div class="form-group">
    <label for="number_of_days">Number of Days</label>
    <input type="number" class="form-control" id="number_of_days" name="number_of_days" min="1">
</div>
<div class="form-group">
        <label for="package">Package Interested In:</label>
        <select class="form-control" id="package" name="package" required>
            <option value="">Select a package</option>
            <option value="basic">Basic(₹15,000)</option>
            <option value="standard">Luxury(₹1,00,000)</option>
            <option value="premium">Premium(₹40,000)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="budget">Expected Budget:</label>
        <input type="number" class="form-control" id="budget" name="budget" placeholder="Enter your budget" required>
    </div>