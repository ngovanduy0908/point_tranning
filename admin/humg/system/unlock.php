<?php
	require_once('../../../db/dbhelper.php');
    if(isset($_GET['maHK'])){
        $maHK = $_GET['maHK'];
        $sql = "update semester set status = '1' where maHK = '$maHK'";
        if($connect->query($sql)){
            header("Location: index.php");
        }
        else{
            echo $connect->error;
        }
    }
?>