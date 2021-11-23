<?php
    include "db.php";

    $sql = "SELECT * FROM contact";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    // Reference: https://html5-tutorial.net/tables/changing-column-width/

    $output = '
    <table class="table table-hover table-striped contactTable" id="mainContactTable">
        <col style="width:30%">
        <col style="width:10%">
        <col style="width:40%">
        <col style="width:10%">
        <col style="width:10%">
        <thead>
            <tr class="table-success">
                <th> Name </th>
                <th> Local </th>
                <th> Cell </th>
                <th> Update </th>
                <th> Delete </th>
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
                    <td><nobr><strong>'.$row["contactName"].'</strong></nobr></td>
                    <td><nobr>'.$row["contactLocal"].'</nobr></td>
                    <td><nobr>'.$row["contactCell"].'</nobr></td>
                    <td style="text-align:center;">
                        <button type="button" name="update_contact" class="btn btn-primary btn-xs update_contact" id="'.$row["contactID"].'">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    <td style="text-align:center;">
                        <button type="button" name="delete_contact" class="btn btn-danger btn-xs delete_contact" id="'.$row["contactID"].'">
                            <i class="fa fa-trash"></i>
                        </button>
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

    $output .= '<script>$(document).ready(function() {
        $("#mainContactTable").DataTable({
                "paging":   false, 
                "info":     false, 
                "searching":false,
                stateSave:  true
            });
        });
        </script>';

    echo $output;
?>