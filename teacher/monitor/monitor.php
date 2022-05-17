<?php
    session_start();
    require_once('../../db/dbhelper.php');
    $maSv = $msg = "";
    if(isset($_SESSION['maLop'])){
        $maLop = $_SESSION['maLop'];
        // var_dump($maLop);
    }
    if(isset($_GET['maSv'])){
        $maSv  = $_GET['maSv'];
    //     $sql = "select role_id from students where maSv <> '$maSv' and role_id = '3' and maLop = '$maLop'";
    //     if($connect->query($sql)){
    //         echo '
            
           
    //     Lớp này đã tồn tại lớp trưởng
    // ';
    //     }
    //     else{
            $sql = "update students set role_id = '3' where maSv = '$maSv' and maLop = '$maLop'";
            if($connect->query($sql)){
                header('Location: ./classMonitor.php');
            }
        // }
    }
    // var_dump($_SESSION['user']);
?>

