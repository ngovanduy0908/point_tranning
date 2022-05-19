<?php

    $sql_get_point = "SELECT 
                    point_citizen.point as point_citizen, point_medium.point_average as point_average
                    from 
                    students 
                    LEFT JOIN point_citizen 
                    on students.maSv = point_citizen.maSv 
                    LEFT JOIN point_medium 
                    on students.maSv = point_medium.maSv 
                    where 
                    students.maSv = '$maSv' 
                    and 
                    point_citizen.maHK = '$maHK' and point_medium.maHK = '$maHK'";
    $sql_get_point_run = $connect->query($sql_get_point);
    // var_dump($sql_get_point_run);
    // exit;
    $point_citizen = $point_average = $status_to_show_table = 0;
    if($sql_get_point_run->num_rows > 0){    
        $sql_get_point_item = $sql_get_point_run->fetch_assoc();
        $point_citizen = $sql_get_point_item['point_citizen'];
        $point_average = (float)$sql_get_point_item['point_average'];
        $status_to_show_table = 1;
    }
    // echo $status_to_show_table; 
?>