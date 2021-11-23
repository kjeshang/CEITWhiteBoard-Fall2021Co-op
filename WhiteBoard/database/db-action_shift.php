<?php
    include "db.php";

    date_default_timezone_set('America/Vancouver');

    if(isset($_POST["actionShift"]))
    {
        if($_POST["actionShift"] == "insertShift")
        {
            $shiftName = $_POST['shiftName'];
            $fieldTechName = $_POST['fieldTechName'];
            $updateShiftDate = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM shift WHERE shiftName=?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo '<p>SQL Error</p>';
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $shiftName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);
                if($rowCount > 0){
                    echo '<p>Shift already exists!</p>';
                }
                else{
                    $sql = "INSERT INTO shift (shiftName, fieldTechName, updateShiftDate) VALUES(?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo '<p>SQL Error</p>';
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "sss", $shiftName, $fieldTechName, $updateShiftDate);
                        mysqli_stmt_execute($stmt);
                        echo '<p>Shift inserted!</p>';
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }

        if($_POST["actionShift"] == "fetch_singleShift")
        {
            $fetchedShiftID = $_POST['shiftID'];
            $result = mysqli_query($conn, "SELECT * FROM shift WHERE shiftID='$fetchedShiftID'");
            foreach($result as $row){
                $output['shiftName'] = $row['shiftName'];
                $output['fieldTechName'] = $row['fieldTechName'];
            }
            echo json_encode($output);
        }

        if($_POST["actionShift"] == "updateShift")
        {
            $shiftID = $_POST['hidden_shiftID'];
            //$shiftName = $_POST['shiftName'];
            $fieldTechName = $_POST['fieldTechName'];
            $updateShiftDate = date('Y-m-d H:i:s');

            $sql = "UPDATE shift SET  fieldTechName=?, updateShiftDate=? WHERE shiftID=?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo '<p>SQL Error</p>';
            }
            else{
                mysqli_stmt_bind_param($stmt, "ssi", $fieldTechName, $updateShiftDate, $shiftID);
                mysqli_stmt_execute($stmt);
                echo '<p>Shift updated!</p>';
            }
            mysqli_stmt_close($stmt);
        }

        if($_POST["actionShift"] == 'deleteShift')
        {
            $shiftIDToDelete = $_POST['shiftID'];
            $sql = "DELETE FROM shift WHERE shiftID = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "<p>SQL Error</p>";
            }
            else{
                mysqli_stmt_bind_param($stmt, "i", $shiftIDToDelete);
                mysqli_stmt_execute($stmt);
                echo '<p>Shift deleted!</p>';
            }
            mysqli_stmt_close($stmt);
        }
    }
?>