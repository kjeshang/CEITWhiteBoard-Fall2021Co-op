<?php
    include "db.php";

    $sql = "SELECT * FROM person";
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

    $output = '
    <table class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0" width="100%" id="mainTable">
        <col style="width:15%">
        <col style="width:4%">
        <col style="width:15%">
        <col style="width:6%">
        <col style="width:25%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:5%">
        <col style="width:5%">
        <thead>
            <tr class="table-success">
                <th> Name </th>
                <th> Local </th>
                <th> Cell </th>
                <th> Status </th>
                <th> Comment </th>
                <th> Last Updated </th>
                <th> Team </th>
                <th hidden> is Manager </th>
                <th hidden> is Field Tech </th>
                <th style="text-align:center;">  Update </th>
                <th style="text-align:center;"> Edit</th>
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
                    <td id='.$row["name"].'><nobr>'.$row["name"].'</nobr></td>
                    <td>'.$row["local"].'</td>
                    <td><nobr>'.$row["cell"].'</nobr></td>
                    <td>'.$row["status"].'</td>
                    <td>'.$row["comment"].'</td>
                    <td><nobr>'.substr($row["updateDate"], 0, -9).'<nobr></td>
                    <td><nobr>'.showTeams($row["team"]).'</nobr></td>
                    <td hidden>'.$row["isManager"].'</td>
                    <td hidden>'.$row["isFieldTech"].'</td>
                    <td style="text-align:center;">
                        <button type="button" name="edit" class="btn btn-success update" id="'.$row["id"].'">
						<i class="	fa fa-chevron-up"></i>
        </a>
                        </button>
                    </td>
                    <td style="text-align:center;">                      				
					<a href="edit.php?id='.$row['id'].' " class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                    </td>
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

    $output .= '<script>
        $(document).ready(function() {
            $("#mainTable").DataTable({
                "pageLength": 100,
                "stateSave": true
            });
        });
        </script>';
    
    echo $output;
?>
