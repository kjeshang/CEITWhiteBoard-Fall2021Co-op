<?php
    ob_start();
    require_once "page/header.php";
	require_once "database/db-update.php";
    ob_end_flush();
?>
<div class="panel panel-default">

    <div class="form">
	<h5 class = "mb-4">| EDIT EXISTING EMPLOYEE |</h5>
	   <!-- Back button -->
    <div class="panel-heading">
        <a class="btn btn-secondary" href="index.php"><i class="fa fa-arrow-left"> </i> Back</a>
		<td>
		
                            <a href="database/db-delete.php?id=<?php echo $fetchedID; ?>" onclick="return confirm('Are You Sure You Want to Delete Employee Record?')" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
    </div>
        <form action="edit.php" method="post">
            <!-- ID -->
            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $fetchedID; ?>">
            <!-- Name -->
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $fetchedName; ?>" required>
            </div>
            <!-- Local  -->
            <div class="mb-3">
                <label for="local">Local</label>
                <input type="text" name="local" placeholder="Enter 4 Digit Local No." pattern="[0-9]{4}" maxlength="4" title="#### Eg: 1234" id="local" class="form-control" value="<?php echo $fetchedLocal; ?>"> 
            </div>
            <!-- Cell -->
            <div class="mb-3">
                <label for="cell">Cell</label>
                <input type="text" name="cell" placeholder="Enter 10 Digit Cell No. ###-###-####" pattern="[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}" maxlength="12" title="###-###-#### Eg: 123-456-7890" id="cell" class="form-control" value="<?php echo $fetchedCell; ?>"> 
            </div>
            <!-- Status -->
            <div class="mb-3 ">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="ANVIL" <?php if($fetchedStatus == "ANVIL") echo 'selected="selected"'; ?>>Anvil</option>
                    <option value="COQ" <?php if($fetchedStatus == "COQ") echo 'selected="selected"'; ?>>COQ</option>
                    <option value="NW" <?php if($fetchedStatus == "NW") echo 'selected="selected"'; ?>>NW</option>
                    <option value="OUT" <?php if($fetchedStatus == "OUT") echo 'selected="selected"'; ?>>OUT</option>
                    <option value="TTG" <?php if($fetchedStatus == "TTG") echo 'selected="selected"'; ?>>TTG</option>
                    <option value="WFH" <?php if($fetchedStatus == "WFH") echo 'selected="selected"'; ?>>WFH</option>
                </select>
            </div>
            <!-- Comment -->
            <div class="mb-3">
                <label for="comment">Comment</label>
                <textarea type="text" name="comment" id="comment" class="form-control" value="<?php echo $fetchedComment; ?>"></textarea>
            </div>
            <!-- Team -->
            <div class="mb-3">
                <label for="team">Team:</label>
                
                <select name="team[]" id="team" class="selectpicker"  data-width="300px" data-style="btn-primary" multiple="multiple" required>
                    <!-- Administration -->
                    <option value="Administration" 
                        <?php 
                        if(strpos($fetchedTeam,"Administration") !== false) echo 'selected="selected"'; 
                        ?>>
                        Administration
                    </option>
                    <!-- App Services -->
                    <option value="App Services" 
                        <?php 
                        if(strpos($fetchedTeam,"App Services") !== false) echo 'selected="selected"'; 
                        ?>>
                        App Services
                    </option>
                    <!-- AV Integration -->
                    <option value="AV Integration" 
                        <?php 
                        if(strpos($fetchedTeam,"AV Integration") !== false) echo 'selected="selected"'; 
                        ?>>
                        AV Integration
                    </option>
                    <!-- AV Production -->
                    <option value="AV Production" 
                        <?php 
                        if(strpos($fetchedTeam,"AV Production") !== false) echo 'selected="selected"'; 
                        ?>>
                        AV Production
                    </option>
                    <!-- Desktop - Anvil -->
                    <option value="Desktop - Anvil" 
                        <?php 
                        if(strpos($fetchedTeam,"Desktop - Anvil") !== false) echo 'selected="selected"'; 
                        ?>>
                        Desktop - Anvil
                    </option>
                    <!-- Desktop - NW -->
                    <option value="Desktop - NW" 
                        <?php 
                        if(strpos($fetchedTeam,"Desktop - NW") !== false) echo 'selected="selected"'; 
                        ?>>
                        Desktop - NW
                    </option>
                    <!-- Desktop - DL -->
                    <option value="Desktop - DL" 
                        <?php 
                        if(strpos($fetchedTeam,"Desktop - DL") !== false) echo 'selected="selected"'; 
                        ?>>
                        Desktop - DL
                    </option>
                    <!-- Desktop - TTG -->
                    <option value="Desktop - TTG" 
                        <?php 
                        if(strpos($fetchedTeam,"Desktop - TTG") !== false) echo 'selected="selected"'; 
                        ?>>
                        Desktop - TTG
                    </option>
                    <!-- Endpoint -->
                    <option value="Endpoint" 
                        <?php 
                        if(strpos($fetchedTeam,"Endpoint") !== false) echo 'selected="selected"'; 
                        ?>>
                        Endpoint
                    </option>
                    <!-- IS - Communications & Id Management  -->
                    <option value="IS - Communications & Id Management" 
                        <?php 
                        if(strpos($fetchedTeam,"IS - Communications & Id Management") !== false) echo 'selected="selected"'; 
                        ?>>
                        IS - Communications & Id Management
                    </option>
                    <!-- IS - Data Centre -->
                    <option value="IS - Data Centre" 
                        <?php 
                        if(strpos($fetchedTeam,"IS - Data Centre") !== false) echo 'selected="selected"'; 
                        ?>>
                        IS - Data Centre
                    </option>
                    <!-- IS - Physical Network -->
                    <option value="IS - Physical Network" 
                        <?php 
                        if(strpos($fetchedTeam,"IS - Physical Network") !== false) echo 'selected="selected"'; 
                        ?>>
                        IS - Physical Network
                    </option>
                    <!-- Learning Designers -->
                    <option value="Learning Designers" 
                        <?php 
                        if(strpos($fetchedTeam,"Learning Designers") !== false) echo 'selected="selected"'; 
                        ?>>
                        Learning Designers
                    </option>
                    <!-- LMS -->
                    <option value="LMS" 
                        <?php 
                        if(strpos($fetchedTeam,"LMS") !== false) echo 'selected="selected"'; 
                        ?>>
                        LMS
                    </option>
                    <!-- Security -->
                    <option value="Security" 
                        <?php 
                        if(strpos($fetchedTeam,"Security") !== false) echo 'selected="selected"'; 
                        ?>>
                        Security
                    </option>
                    <!-- Service Desk -->
                    <option value="Service Desk" 
                        <?php 
                        if(strpos($fetchedTeam,"Service Desk") !== false) echo 'selected="selected"'; 
                        ?>>
                        Service Desk
                    </option>
                    <!-- VConf -->
                    <option value="VConf" 
                        <?php 
                        if(strpos($fetchedTeam,"VConf") !== false) echo 'selected="selected"'; 
                        ?>>
                        VConf
                    </option>
                    <!-- Projects and Business Solutions -->
                    <option value="Projects and Business Solutions" 
                        <?php 
                        if(strpos($fetchedTeam,"Projects and Business Solutions") !== false) echo 'selected="selected"'; 
                        ?>>
                        Projects and Business Solutions
                    </option>
                </select>
            </div>
			<!-- Is Manager -->
            <div class="mb-3">
                <label for="isManager">Manager?</label>
                <select name="isManager" id="isManager" class="form-select">
                    <option value="No" <?php if($fetchedIsManager == "No") echo 'selected="selected"'; ?>>No</option>
                    <option value="Yes" <?php if($fetchedIsManager == "Yes") echo 'selected="selected"'; ?>>Yes</option>
                </select>
            </div>
            <!-- Is Field Tech -->
            <div class="mb-3">
                <label for="isFieldTech">Field Tech?</label>
                <select name="isFieldTech" id="isFieldTech" class="form-select">
                    <option value="No" <?php if($fetchedIsFieldTech == "No") echo 'selected="selected"'; ?>>No</option>
                    <option value="Yes" <?php if($fetchedIsFieldTech == "Yes") echo 'selected="selected"'; ?>>Yes</option>
                </select>
            </div>
            <!-- Submit -->
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary" required> 
            </div>
        </form>
    </div>
	<br>
</div>

<?php require_once "page/footer.php";?>