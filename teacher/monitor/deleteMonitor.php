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
        $sql = "update students set role_id = '4' where maSv = '$maSv' and maLop = '$maLop'";
        if($connect->query($sql)){
            header('Location: ./classMonitor.php');
        }
    }
    // var_dump($_SESSION['user']);
?>