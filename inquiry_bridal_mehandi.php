<div class="form-group">
    <label for="number_of_days">Number of Days</label>
    <input type="number" class="form-control" id="number_of_days" name="number_of_days" required>
</div>
<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" required>
</div>
<div class="form-group">
    <label for="time">Time</label>
    <input type="time" class="form-control" id="time" name="time" required>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="package">Package</label>
            <select class="form-control" name="package">
                <option value="basic">Basic(₹3,500)</option>
                <option value="premium">Premium(₹7,000)</option>
                
                <option value="luxury">luxury(₹12,000)</option>
                
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="budget">Expected Budget</label>
            <input type="number" class="form-control" name="budget" placeholder="Enter expected budget">
        </div>
    </div>
</div>
