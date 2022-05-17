<?php
session_start();
require_once '../../db/dbhelper.php';
$maLop = $_SESSION['maLop'];

if(isset($_POST['maHK'])){
    $maHK = $_POST['maHK'];
    $sql = "select students.*, point_citizen.point 
            from 
            students left join point_citizen on 
            students.maSv =  point_citizen.maSv
            where 
            maHK = '$maHK'
            and
            students.maLop = '$maLop'";
    $sql_point_citizen= mysqli_query($connect,$sql);
    $output = '';
    $output .= '
                    <thead>
                        <th>STT</th>

                        <th>MSV</th>
                        <th>Họ và tên</th>
                        <th width="180px">Điểm thi tuần CDSV</th>
                    </thead>
                ';
    if($sql_point_citizen->num_rows > 0) {
        $index = 0;
        while($sql_point_citizen_item = $sql_point_citizen->fetch_assoc()) {
            $output .= '
                <tbody>
                    <tr>
                        <td>'.++$index.'</td>
                        <td>'.$sql_point_citizen_item['maSv'].'</td>
                        <td>'.$sql_point_citizen_item['name'].'</td>
                        <td>'.$sql_point_citizen_item['point'].'</td>
                    </tr>
                </tbody>
            
            ';
            
        }
    }
    echo $output;
}