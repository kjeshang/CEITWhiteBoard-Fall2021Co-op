<?php require_once "page/header.php";?>
<!-- Shift Data -->
<div class="panel panel-default">
    <!-- Add Shift Button -->
    <!--
    <button type="button" name="add_shift" id="add_shift" class="btn btn-success btn-xs" style="margin-left: 0.1%; margin-bottom: 0.5%;"><i class="fa fa-plus"> <STRONG>ADD SHIFT</STRONG></i></button> -->

    <!-- Shift Table -->
    <div id="shift_data" class="table table-responsive table-body"></div>
</div>

<!-- Shift Pop-Up -->
<?php include "form/popUp-shift.php" ?>

<!-- Manager and General Service Contact Data -->
<div class="panel panel-default">
    <!-- Show Contacts Button -->
    <button type="button" id="toggle_contacts" class="btn btn-primary btn-xs" style="margin-left: 0.1%; margin-bottom: 1%;">Show Contacts</button>

    <!-- Contact Tables -->
    <div class="row" id="primary_contacts">
		<!-- Manager Contact Table -->
		<div class= "table-responsive col-md-6">
		<h3>Manager Contact</h3>
        <div id="person_manager_data"></div>
		</div>
	
		<!-- General Contact Table -->
		<div class= "table-responsive col-md-6">
		
		<h3>General Contact</h3>
		<!-- Add Button for Contact Table -->
            <button type="button" id="add_contact" class="btn btn-success btn-sm" style="float:right;" ><i class="fa fa-plus"> <STRONG>ADD CONTACT</STRONG> </i></button>
		<div id="contact_data"></div>
		</div>
    </div>
</div>

<!-- Contact Pop-Up -->
<?php include "form/popUp-contact.php" ?>
<hr>

<!-- Employee Data -->
<div class="panel-body">
     <!-- Employee Table -->
    <div id="employee_data" class="table-responsive" style="width:100%;"></div>
</div>

 <!-- Add Employee Button -->
<div class="mb-3">
    <h2><a href="add.php" class="btn btn-success"> <i class="fa fa-plus"> ADD EMPLOYEE </i> </a></h2>
</div>

<!-- Pop-Up (Update Status/Comment) -->
<?php include "form/popUp-person.php" ?>

<?php require_once "page/footer.php"; ?>

<script src="page/interact.js"></script>

