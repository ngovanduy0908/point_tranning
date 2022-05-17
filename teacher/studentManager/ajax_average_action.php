<?php
session_start();
require_once '../../db/dbhelper.php';
$maLop = $_SESSION['maLop'];

if(isset($_POST['maHK'])){
    $maHK = $_POST['maHK'];
    $sql = "select students.*, point_medium.point_average 
            from 
            students left join point_medium on 
            students.maSv =  point_medium.maSv
            where 
            maHK = '$maHK'
            and
            students.maLop = '$maLop'";
    $sql_point_medium= mysqli_query($connect,$sql);
    $output = '';
    $output .= '
                    <thead>
                        <th>STT</th>

                        <th>MSV</th>
                        <th>Họ và tên</th>
                        <th width="180px">Điểm TBHK</th>
                    </thead>
                ';
    if($sql_point_medium->num_rows > 0) {
        $index = 0;
        while($sql_point_medium_item = $sql_point_medium->fetch_assoc()) {
            $output .= '
                <tbody>
                    <tr>
                        <td>'.++$index.'</td>
                        <td>'.$sql_point_medium_item['maSv'].'</td>
                        <td>'.$sql_point_medium_item['name'].'</td>
                        <td>'.$sql_point_medium_item['point_average'].'</td>
                    </tr>
                </tbody>
            
            ';
            
        }
    }
    echo $output;
}