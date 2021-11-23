<?php
    include "db.php";
    date_default_timezone_set('America/Vancouver');

    if(isset($_POST["action"]))
    {
        if($_POST["action"] == "fetch_single")
        {
            $fetchedID = $_POST['id'];
            $result = mysqli_query($conn, "SELECT * FROM person WHERE id='$fetchedID'");
            foreach($result as $row){
                $output['name'] = $row['name'];
                // $output['local'] = $row['local'];
                // $output['cell'] = $row['cell'];
                $output['status'] = $row['status'];
                $output['comment'] = $row['comment'];
                // $output['team'] = $row['team'];
                // $output['isManager'] = $row['isManager'];
                // $output['isFieldTech'] = $row['isFieldTech'];
            }
            echo json_encode($output);
        }

        if($_POST["action"] == "update")
        {
            $id = $_POST['hidden_id'];
            // $name = $_POST['name'];
            // $local = $_POST['local'];
            // $cell = $_POST['cell'];
            $status = $_POST['status'];
            $comment = $_POST['comment'];
            $updateDate = date('Y-m-d H:i:s');
            // $teamInput = $_POST['team'];
            // $team = implode(', ',$teamInput);
            // $isManager = $_POST["isManager"];
            // $isFieldTech = $_POST["isFieldTech"];

            // $sql = "UPDATE person SET local=?, cell=?, status=?, comment=?, updateDate=?, team=?, isManager=?, isFieldTech=? WHERE id=?";
            $sql = "UPDATE person SET status=?, comment=?, updateDate=? WHERE id=?";
            
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo '<p>SQL Error</p>';
            }
            else{
                // mysqli_stmt_bind_param($stmt, "ssssssssi", $local, $cell, $status, $comment, $updateDate, $team, $isManager, $isFieldTech, $id);
                mysqli_stmt_bind_param($stmt, "sssi", $status, $comment, $updateDate, $id);
                mysqli_stmt_execute($stmt);
                echo '<p>Employee updated!</p>';
            }
            mysqli_stmt_close($stmt);
        }

        mysqli_close($conn);
    }

	
?>