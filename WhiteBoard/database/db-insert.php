<?php
	include "db.php";
    date_default_timezone_set('America/Vancouver');

    // Flag key:
    // 0 = sql error (no alert shows up at the top of the screen)
    // 1 = record already exists
    // 2 = record inserted
    $flag = 0;

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $local = $_POST['local'];
        $cell = $_POST['cell'];
        $status = $_POST['status'];
        $comment = $_POST['comment'];
        $updateDate = date('Y-m-d H:i:s');
        $teamInput = $_POST['team'];
        $team = implode(', ',$teamInput);
        $isManager = $_POST['isManager'];
        $isFieldTech = $_POST['isFieldTech'];

        $sql = "SELECT name FROM person WHERE name = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $flag = 0;
            // exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            if($rowCount > 0){
                $flag = 1;
            }
            else{
                $sql = "INSERT INTO person (name, local, cell, status, comment, updateDate, team, isManager, isFieldTech) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    $flag = 0;
                }
                else{
                    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $local, $cell, $status,$comment, $updateDate, $team, $isManager, $isFieldTech);
                    mysqli_stmt_execute($stmt);
                    $flag = 2;
                }
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
?>