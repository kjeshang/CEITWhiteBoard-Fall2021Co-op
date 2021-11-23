$(document).ready(function(){

    // ----------------- FUNCTIONS --------------------------// 

    // Hide/Show Person Manager table and Contact table
    $("#primary_contacts").hide();
    $("#toggle_contacts").click(function(){
        $("#primary_contacts").slideToggle('slow');
    });

    // Scroll to the respective manager in the Person table by clicking on the name in the Person Manager table
    // https://stackoverflow.com/questions/24739126/scroll-to-a-specific-element-using-html
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        // https://stackoverflow.com/questions/3328640/how-to-highlight-a-div-for-a-few-seconds-using-jquery/3328713
        $($.attr(this,'href')).effect("highlight", {}, 3000);
    });

    // Clear/reset fields
    function clear(){
        $('#name').val('');
        $('#local').val('');
        $('#cell').val('');
        $('#status').val('NW');
        $('#comment').val('');
        $('#team').val('Administration');
        $('#isManager').val('No');
        $('#isFieldTech').val('No');
    }
	
	// Clear fields in the Contact form pop-up
    function clearContact(){
        $("#contactName").val('');
        $("#contactLocal").val('');
        $("#contactCell").val('');
    }

    // Hide unecessary fields quick status/comment edit
    function hideForEdit(){
        $('#name').prop("disabled",true);
        $('#local_hide').hide();
        $('#cell_hide').hide();
        $('#team_hide').hide();
        $('#isManager_hide').hide();
        $('#isFieldTech_hide').hide();
    }

    // ------------------ POP-UP -----------------------------//

    // user pop-up
    $('#user_dialog').dialog({
        autoOpen: false,
        width:400
    });
	
	// Contact form pop-up
	$('#contact_dialog').dialog({
        autoOpen: false,
        width:400
    });

    // Outcome pop-up
    $('#action_alert').dialog({
        autoOpen:false
    });
	// Contact CRUD action outcome pop-up
    $('#actionContact_alert').dialog({
        autoOpen:false
    });

    // ------------------ FETCH -------------------------------//

    // Fetch employees from the Person database table that are managers, and populate the Person Manager table
    function fetch_personManager(){
        $.ajax({
            url:"database/db-fetch_personManager.php",
            method:"POST",
            success:function(data){
                $("#person_manager_data").html(data);
            }
        });
    }
    fetch_personManager();

    // Fetch all employees from the Person database table, and populate the Employee html table
    function fetch_person(){
        $.ajax({
            url:"database/db-fetch.php",
            method:"POST",
            success:function(data){
                $("#employee_data").html(data);
            }
        });
    }
    fetch_person();

    // Fetch all shifts from the Shift database table, and populate the Shift table
    function fetchShift(){
        $.ajax({
            url:"database/db-fetch_shift.php",
            method:"POST",
            success:function(data){
                $("#shift_data").html(data);
            }
        });
    }
    fetchShift();

    // Fetch employees from the Person database table that are field technicians, and populate the dropdown list in the Shift form pop-up
    function fetchFieldTechName(){
        $.ajax({
            url:"database/db-fetch_personFieldTech.php",
            method:"POST",
            success:function(data){
                $("#fieldTechName").html(data);
            }
        });
    }
    fetchFieldTechName();

    // ------------- INSERT Employee Table --------------------------------------//

    // Validate and then insert to database
    $('#user_form').on('submit', function(event){
        event.preventDefault();

        // Validate Name
        var error_name = '';
        if($('#name').val() == '')
        {
            error_name = 'Name is required';
            $('#error_name').text(error_name);
            $('#name').css('border-color','#cc0000');
        }
        else
        {
            error_name = '';
            $('#error_name').text(error_name);
            $('#name').css('border-color','');
        }

        if(error_name == '')
        {
            $('#form_action').attr('disabled','disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"database/db-action_person.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#user_dialog').dialog('close');
                    $('#action_alert').html(data);
                    $('#action_alert').dialog('open');
                    fetch_person();
                    $('#form_action').attr('disabled',false);
                }
            });
        }
    });

    // Fetch selected employee, populate fields in pop-up, and update employee details in database
    $(document).on('click','.update', function(){
        var id = $(this).attr("id");
        var action = 'fetch_single';
        $.ajax({
            url:"database/db-action_person.php",
            method:"POST",
            data:{id:id, action:action},
            dataType:"json",
            success:function(data){
                $('#shift_dialog').dialog('close');
                $('#contact_dialog').dialog('close');
                $('#name').val(data.name);
                // $('#local').val(data.local);
                // $('#cell').val(data.cell);
                $('#status').val(data.status);
                $('#comment').val(data.comment);
                // $('#team').val(data.team);
                // $('#isManager').val(data.isManager);
                // $('#isFieldTech').val(data.isFieldTech);

                $('#user_dialog').attr('title','Update Data');
                $('#action').val('update');
                $('#hidden_id').val(id);
                $('#form_action').val('Update');
                $('#user_dialog').dialog('open');
                hideForEdit();
            }
        });
    });

    // ------------- SHIFT Table--------------------------------------//

    // Shift form pop-up
    $('#shift_dialog').dialog({
        autoOpen: false,
        width:400
    });

    // Shift CRUD action outcome pop-up 
    $('#actionShift_alert').dialog({
        autoOpen:false
    });

    // Add Shift button clicked
    $("#add_shift").click(function(){
        $('#user_dialog').dialog('close');
        $('#contact_dialog').dialog('close');
        $("#shiftName").prop("disabled",false);
        $('#shift_dialog').attr('title','Add Shift Data');
        $('#actionShift').val('insertShift');
        $('#form_actionShift').val("Insert Shift");
        $('#shift_dialog').dialog('open');
        fetchFieldTechName();
    });

    // Insert new shift into Shift table
    $('#shift_form').on('submit', function(event){
        event.preventDefault();

        // Validate Shift Name (not really needed)
        var error_shiftName = '';
        if($('#shiftName').val() == '')
        {
            error_shiftName = 'Shift Name is required';
            $('#error_shiftName').text(error_shiftName);
            $('#shiftName').css('border-color','#cc0000');
        }
        else
        {
            error_shiftName = '';
            $('#error_shiftName').text(error_shiftName);
            $('#shiftName').css('border-color','');
        }

        if(error_shiftName == '')
        {
            $('#form_actionShift').attr('disabled','disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"database/db-action_shift.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#shift_dialog').dialog('close');
                    $('#actionShift_alert').html(data);
                    // Shift pop-up alert disabled until a better solution is created
                    // $('#actionShift_alert').dialog('open'); //Shift Already Exists Alert
                    fetchShift();
                    $('#form_actionShift').attr('disabled',false);
                }
            });
        }
    });

     // Update an existing shift (i.e. change the field technician) in the Shift table
     $(document).on('click','.update_shift', function(){
        var shiftID = $(this).attr("id");
        var actionShift = 'fetch_singleShift';
        $.ajax({
            url:"database/db-action_shift.php",
            method:"POST",
            data:{shiftID:shiftID, actionShift:actionShift},
            dataType:"json",
            success:function(data){
                $('#user_dialog').dialog('close');
                $('#contact_dialog').dialog('close');
                $('#shiftName').val(data.shiftName);
                $('#fieldTechName').val(data.fieldTechName);

                $('#shift_dialog').attr('title','Update Shift Data');
                $('#actionShift').val('updateShift');
                $('#hidden_shiftID').val(shiftID);
                $('#form_actionShift').val('Update Shift');
                $('#shift_dialog').dialog('open');
                $("#shiftName").prop("disabled",true);
            }
        });
    });

    // Delete an existing shift from the Shift table
    $('#deleteShift_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var shiftID = $(this).data('shiftID');
				var actionShift = 'deleteShift';
				$.ajax({
					url:"database/db-action_shift.php",
					method:"POST",
					data:{shiftID:shiftID, actionShift:actionShift},
					success:function(data)
					{
						$('#deleteShift_confirmation').dialog('close');
						$('#actionShift_alert').html(data);
						//$('#actionShift_alert').dialog('open'); //Shift Deleted Alert
                        fetchShift();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete_shift', function(){
		var shiftID = $(this).attr("id");
        $('#user_dialog').dialog('close');
        $('#contact_dialog').dialog('close');
		$('#deleteShift_confirmation').data('shiftID', shiftID).dialog('open');
	});
	
	
	 // --------------- Contact Table --------------------------------------

    // Fetch contacts from the Contact database table that are managers, and populate the Contact table
    function fetchContact(){
        $.ajax({
            url:"database/db-fetch_contact.php",
            method:"POST",
            success:function(data){
                $("#contact_data").html(data);
            }
        });
    }
    fetchContact();

    // --------------- INSERT -----------------------------------------

    // Add Contact button clicked
    $("#add_contact").click(function(){
        $('#user_dialog').dialog('close');
        $('#shift_dialog').dialog('close');
        clearContact();
        $('#contact_dialog').attr('title','Add Contact Data');
        $('#actionContact').val('insertContact');
        $('#form_actionContact').val("Insert Contact");
        $('#contact_dialog').dialog('open');
    });

    // Insert new contact into Contact table
    $('#contact_form').on('submit', function(event){
        event.preventDefault();

        // Validate Contact Name
        var error_contactName = '';
        if($('#contactName').val() == '')
        {
            error_contactName = 'Contact Name is required';
            $('#error_contactName').text(error_contactName);
            $('#contactName').css('border-color','#cc0000');
        }
        else
        {
            error_contactName = '';
            $('#error_contactName').text(error_contactName);
            $('#contactName').css('border-color','');
        }

        if(error_contactName == '')
        {
            $('#form_actionContact').attr('disabled','disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"database/db-action_contact.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#contact_dialog').dialog('close');
                    $('#actionContact_alert').html(data);
                    //$('#actionContact_alert').dialog('open');  //Action confirmation Disabled
                    fetchContact();
                    $('#form_actionContact').attr('disabled',false);
                }
            });
        }
    });

    // ------------------ UPDATE -----------------------------------

    // Update existing contact in the Contact table
    $(document).on('click','.update_contact', function(){
        var contactID = $(this).attr("id");
        var actionContact = 'fetch_singleContact';
        $.ajax({
            url:"database/db-action_contact.php",
            method:"POST",
            data:{contactID:contactID, actionContact:actionContact},
            dataType:"json",
            success:function(data){
                $('#user_dialog').dialog('close');
                $('#shift_dialog').dialog('close');
                $('#contactName').val(data.contactName);
                $('#contactLocal').val(data.contactLocal);
                $('#contactCell').val(data.contactCell);

                $('#contact_dialog').attr('title','Update Contact Data');
                $('#actionContact').val('updateContact');
                $('#hidden_contactID').val(contactID);
                $('#form_actionContact').val('Update Contact');
                $('#contact_dialog').dialog('open');
            }
        });
    });

    // ------------------------- DELETE --------------------------------

    // Delete an existing contact from the Contact table
    $('#deleteContact_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var contactID = $(this).data('contactID');
				var actionContact = 'deleteContact';
				$.ajax({
					url:"database/db-action_contact.php",
					method:"POST",
					data:{contactID:contactID, actionContact:actionContact},
					success:function(data)
					{
						$('#deleteContact_confirmation').dialog('close');
						$('#actionContact_alert').html(data);
						//$('#actionContact_alert').dialog('open'); //Action confirmation Disabled
                        fetchContact();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete_contact', function(){
		var contactID = $(this).attr("id");
        $('#user_dialog').dialog('close');
        $('#shift_dialog').dialog('close');
		$('#deleteContact_confirmation').data('contactID', contactID).dialog('open');
	});


  

});