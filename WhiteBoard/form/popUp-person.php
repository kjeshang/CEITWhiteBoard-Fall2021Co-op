<div class= "form-group row" id="user_dialog" title="Update Status/Comment">
    <form action="post" id="user_form" >
        <!-- Name -->
        <div class="mb-3" id="name_hide">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <span id="error_name" class="text-danger"></span> 
        </div>
        <!-- Local -->
        <div class="mb-3" id="local_hide">
            <label for="local">Local</label>
            <input type="text" name="local" id="local" class="form-control">
            <span id="error_local" class="text-danger"></span> 
        </div>
        <!-- Cell -->
        <div class="mb-3" id="cell_hide">
            <label for="cell">Cell</label>
            <input type="text" name="cell" id="cell" class="form-control">
            <span id="error_cell" class="text-danger"></span> 
        </div>
        <!-- Status -->
        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-select">
            <option value="ANVIL">ANVIL</option>
                    <option value="COQ">COQ</option>
                    <option value="NW">NW</option>
                    <option value="OUT">OUT</option>
                    <option value="TTG">TTG</option>
                    <option value="WFH">WFH</option>
            </select>
        </div>
        <!-- Comment -->
        <div class="mb-3">
            <label for="comment">Comment</label>
            <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
        </div>
        <!-- Team -->
        <div class="mb-3" id="team_hide">
            <label for="team">Team</label>
            <select name="team[]" id="team" class="form-select" multiple="multiple">
                <option value="Administration">Administration</option>
                <option value="App Services">App Services</option>
                <option value="AV Integration">AV Integration</option>
                <option value="AV Production">AV Production</option>
                <option value="Desktop - Anvil">Desktop - Anvil</option>
                <option value="Desktop - NW">Desktop - NW</option>
                <option value="Desktop - DL">Desktop - DL</option>
                <option value="Desktop - TTG">Desktop - TTG</option>
                <option value="Endpoint">Endpoint</option>
                <option value="IS - Communications & Id Management">IS - Communications & Id Management</option>
                <option value="IS - Data Centre">IS - Data Centre</option>
                <option value="IS - Physical Network">IS - Physical Network</option>
                <option value="Learning Designers">Learning Designers</option>
                <option value="LMS">LMS</option>
                <option value="Security">Security</option>
                <option value="Service Desk">Service Desk</option>
                <option value="VConf">VConf</option>
                <option value="Projects and Business Solutions">Projects and Business Solutions</option>
            </select>
        </div>
        <!-- Is Manager -->
        <div class="mb-3" id="isManager_hide">
            <label for="isManager">Manager?</label>
            <select name="isManager" id="isManager" class="form-select">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>
        </div>
        <!-- Is Field Tech -->
        <div class="mb-3" id="isFieldTech_hide">
            <label for="isFieldTech">Field Tech?</label>
            <select name="isFieldTech" id="isFieldTech" class="form-select">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>
        </div>
        <!-- Submit -->
        <div class="form-group">
            <input type="hidden" name="action" id="action" value="insert" />
			<input type="hidden" name="hidden_id" id="hidden_id" />
			<input type="submit" name="form_action" id="form_action" class="btn btn-primary" value="Insert" />
        </div>
    </form>
</div>