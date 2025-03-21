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
