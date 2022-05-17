<?php
session_start();
// var_dump($_SESSION);
require_once('../db/dbhelper.php');

$maLop = $_SESSION['user']['maLop'];
$maHK = $_SESSION['maHK'];
$msg = "";
$sql_student_no_exists = "
        SELECT * 
        from 
        students 
        where 
        maLop = '$maLop' 
        AND 
        maSv 
        not in 
            (SELECT (students.maSv) 
            from students 
            LEFT JOIN 
            point 
            on students.maSv = point.maSv 
            LEFT JOIN 
            semester 
            on point.maHK = semester.maHK 
            WHERE 
            students.maLop = '$maLop' 
            and point.maHK = '$maHK');
    ";

$sql_student_exists_run = $connect->query($sql_student_no_exists);
if($sql_student_exists_run->num_rows > 0){
    while($sql_student_exists_item = $sql_student_exists_run->fetch_assoc()){
        $maSv = $sql_student_exists_item['maSv'];

        $sql_point = "insert into point
                    (maSv, maHK, status, status_teacher, point_monitor, point_teacher) 
                    values
                    ('$maSv', '$maHK', 1, 1, 0, 0)";

        $sql_point_student = "insert into point_student (maSv, maHK) values('$maSv', '$maHK')";
        $sql_point_monitor = "insert into point_monitor (maSv, maHK) values('$maSv', '$maHK')";
        $sql_point_teacher = "insert into point_teacher (maSv, maHK) values('$maSv', '$maHK')";

        if($connect->query($sql_point) && $connect->query($sql_point_student) && $connect->query($sql_point_monitor) && $connect->query($sql_point_teacher)){
            $_SESSION['success'] = 'Xét thành công điểm cho những SV không chấm ĐRL';
            header('Location: ./index.php');
        }
        else{
            echo $connect->error.'<br>'.$sql_point;
        }
    }
}
echo $msg;