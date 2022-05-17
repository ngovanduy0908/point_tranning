<?php
    if($status_to_show_table === 1){
        echo '<table class="table_display_point table table-bordered">
        <tr>
            <th>#</th>
            <th>Điểm</th>
        </tr>
        <tr>
            <td>Điểm TBHK</td>
            <td>'.$point_average.'</td>
        </tr>
        <tr>
            <td>Điểm tuần CDSV</td>
            <td>'.$point_citizen.'</td>
        </tr>
    </table>';
    }
?>

<style>
    .table_display_point{
        width: 169.9px;
        font-size: 14px;
        position: fixed;
        /* right: -36px; */
        left: 89.6%;
        bottom: 92px;
    }
</style>
