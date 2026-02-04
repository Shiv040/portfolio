<div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" class="form-control" id="start_date" name="start_date" required>
</div>

<div class="form-group">
    <label for="start_time">Start Time</label>
    <input type="time" class="form-control" id="start_time" name="start_time" required>
</div>
<div class="form-group">
    <label for="package">Package</label>
    <select class="form-control" id="package" name="package" required>
        <option value="">Select Package</option>
        <option value="gold">basic (₹10,000-₹15,000)</option>
        <option value="silver">standard(₹20,000-₹30,000)</option>
        <option value="bronze">Premium(₹40,000-₹60,000)</option>
    </select>
</div>

<div class="form-group">
    <label for="expected_budget">Expected Budget</label>
    <input type="number" class="form-control" id="expected_budget" name="expected_budget" placeholder="Enter expected budget" required>
</div>