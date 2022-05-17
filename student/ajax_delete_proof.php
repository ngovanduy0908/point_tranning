<?php
    session_start();
    require_once('../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from student_proof_mark where id = '$id'";
        if($connect->query($sql)){
            header("Location: ./upload_image_proof.php");
        }
    }
?>