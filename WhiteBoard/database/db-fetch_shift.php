<?php
    include "db.php";

    $sql = "SELECT * FROM shift ORDER BY shiftName DESC";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    $output = '
    <table class="table table-hover table-striped">
        <thead>
            <tr class="table-success">
                <th> Shift Name </th>
                <th> Field Tech Name </th>
                <th> Last Updated </th>
                <th> Update </th>
                <th hidden> Delete </th>
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
                    <td><nobr><strong>'.$row["shiftName"].'</strong></nobr></td>
                    <td><nobr>'.$row["fieldTechName"].'</nobr></td>
                    <td><nobr>'.substr($row["updateShiftDate"], 0, -9).'<nobr></td>
                    <td>
                        <button type="button" name="update_shift" class="btn btn-success btn-xs update_shift" id="'.$row["shiftID"].'">
                            <i class="fa fa-chevron-up"></i>
                        </button>
                    </td>
                    <td hidden>
                        <button type="button" name="delete_shift" class="btn btn-danger btn-xs delete_shift" id="'.$row["shiftID"].'">
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
    
    echo $output;
?>