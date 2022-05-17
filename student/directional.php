<?php
    session_start();
    require_once('../db/dbhelper.php');
    $maSv = $_SESSION['user']['maSv'];
    $maHK = $_SESSION['maHK'];

    $sql = "select * from point where maSv = '$maSv' and maHK = '$maHK'";

    $result = $connect->query($sql);
    
    var_dump($result);
    if($result->num_rows > 0) {
        header('Location: afterMark.php');
    }
    else{
        header('Location: mark.php');
    }

