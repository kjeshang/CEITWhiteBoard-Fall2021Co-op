<?php
    include "db.php";

    $sql = "SELECT name FROM person WHERE isFieldTech = 'Yes'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    function getFieldTechList($result){
        $list = '';
        $list .= '<option value=""></option>';
        foreach($result as $row){
            $list .= '<option value="'.$row["name"].'">'.$row['name'].'</option>';
        }
        return $list;
    }

    $output = getFieldTechList($result);

    // echo getFieldTechList($result);
    echo $output;
?>