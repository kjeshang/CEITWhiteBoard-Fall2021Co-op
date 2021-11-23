<div class="form-group row" id="shift_dialog" title="Update Shift Data">
    <form action="post" id="shift_form">
        <!-- Shift Name -->
        <div class="mb-3">
            <label for="shiftName">Shift Name</label>
            <select name="shiftName" id="shiftName" class="form-select">
                <option value="NW Primary Field Tech">NW Primary Field Tech</option>
                <option value="NW Backup Field Tech">NW Backup Field Tech</option>
                <option value="NW Night Field Tech">NW Night Field Tech</option>
                <option value="COQ Primary Field Tech">COQ Primary Field Tech</option>
                <option value="COQ Backup Field Tech">COQ Backup Field Tech</option>
                <option value="COQ Night Field Tech">COQ Night Field Tech</option>
            </select>
        </div>
        <!-- Field Tech Name -->
        <div class="mb-3">
            <label for="fieldTechName">Field Tech Name</label>
            <select name="fieldTechName" id="fieldTechName" class="form-select"></select>
        </div>
        <!-- Shift Submit -->
        <div class="button">
            <input type="hidden" name="actionShift" id="actionShift" value="insertShift" />
			<input type="hidden" name="hidden_shiftID" id="hidden_shiftID" />
			<input type="submit" name="form_actionShift" id="form_actionShift" class="btn btn-primary" value="Insert Shift" />
        </div>
    </form>
    <div id="actionShift_alert" title="Action Shift"></div>
    <div id="deleteShift_confirmation" title="confirmationShift">
        <p>Are you sure you want to delete this shift?</p>
    </div>
</div>