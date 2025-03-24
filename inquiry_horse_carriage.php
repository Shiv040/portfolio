<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d'); ?>">
</div>

<div class="form-group">
    <label for="time">Time</label>
    <input type="time" class="form-control" id="time" name="time">
</div>

<div class="form-group">
    <label for="carriageType">Carriage Type</label>
    <select class="form-control" id="carriageType" name="carriageType">
        <option value="ac">AC</option>
        <option value="non-ac">Non-AC</option>
    </select>
</div>

<div class="form-group">
    <label for="package">Package</label>
    <select class="form-control" id="package" name="package">
        <option value="basic">Basic Package (₹15000)</option>
        <option value="premium">Premium Carriage (₹35000)</option>
    </select>
</div>