<?php
    include "db.php";

    $sql = "SELECT name, local, cell, team FROM person WHERE isManager = 'Yes'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    // https://stackoverflow.com/questions/36767492/php-newline-after-10th-comma
    function showTeams($team){
        $teamArray = explode(", ",$team);
        $teamOutput = "";
        foreach($teamArray as $teamElement){
            $teamOutput .= $teamElement ."<br>";
        }
        return $teamOutput;
    }

    // https://stackoverflow.com/questions/24739126/scroll-to-a-specific-element-using-html
    function managerName($name){
        $managerOutput = "<a href=#".$name.">".$name."</a>";
        return $managerOutput;
    }

    $output = '
    <table class="table table-hover table-striped nowrap" style="width:100%" id="mainManagerTable">
        <thead>
            <tr class="table-success">
                <th> Name </th>
                <th> Local </th>
                <th> Cell </th>
                <th> Team </th>
            </tr>
        </thead>
        <tbody>
    ';
    if($numRows > 0)
    {
        foreach($result as $row)
        {
            $output .= '
                <tr>
                    <td><nobr>'.managerName($row["name"]).'</nobr></td>
                    <td><nobr>'.$row["local"].'</nobr></td>
                    <td><nobr>'.$row["cell"].'</nobr></td>
                    <td><nobr>'.showTeams($row["team"]).'</nobr></td>
                </tr>
            ';
        }
    }
    else
    {
        $output .= '
            <tr colspan="4" align="center">Data not found</tr>
        ';
    }
    $output .= '</tbody></table>';
    
    // https://datatables.net/examples/basic_init/state_save.html

    $output .= '<script>$(document).ready(function() {
        $("#mainManagerTable").DataTable({
                "paging":   false, 
                "info":     false, 
                "searching":false,
                stateSave:  true
            });
        });
        </script>';

    echo $output;
?>