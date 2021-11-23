<?php
    require_once "page/header.php";
    require_once "database/db-insert.php";
?>

<div class="panel panel-default">
    <!-- Messages that display whether or not employee is inserted in database -->
    <?php if($flag == 1) {?>
    <div class="alert alert-danger">
        <strong>Employee already exists!</strong>
    </div>
    <?php }?>
    <?php if($flag == 2) {?>
    <div class="alert alert-success">
        <strong>Employee successfully inserted!</strong>
    </div>
    <?php }?>
    

    <div class="form">
	<h5 class = "mb-4">| ADD NEW EMPLOYEE |</h5>
	 <!-- Back button -->
    <div class="panel-heading">
        <a class="btn btn-secondary" href="index.php"><i class="fa fa-arrow-left"> </i> Back</a>
    </div>
	
        <form action="add.php" method="post">
            <!-- Name -->
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required> 
            </div>
            <!-- Local -->
            <div class="mb-3">
                <label for="local">Local</label>
                <input type="text" name="local" placeholder="Enter 4 Digit Local No." pattern="[0-9]{4}" maxlength="4" title="#### Eg: 1234" id="local" class="form-control"> 
            </div>
            <!-- Cell -->
            <div class="mb-3">
                <label for="cell">Cell</label>
                <input type="text" name="cell" placeholder="Enter 10 Digit Cell No. ###-###-####" pattern="[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}" maxlength="12" title="###-###-#### Eg: 123-456-7890" id="cell" class="form-control"> 
            </div>
            <!-- Status -->
            <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select" required>
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
            <div class="mb-3">
                <label for="team">Team:</label>
                <select name="team[]" id="team" class="selectpicker" data-width="300px" data-style="btn-primary" multiple="multiple" required>
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
        <div class="mb-3">
            <label for="isManager">Manager?</label>
            <select name="isManager" id="isManager" class="form-select">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>
        </div>
        <!-- Is Field Tech -->
        <div class="mb-3">
            <label for="isFieldTech">Field Tech?</label>
            <select name="isFieldTech" id="isFieldTech" class="form-select">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
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

<?php require_once "page/footer.php"; ?>

