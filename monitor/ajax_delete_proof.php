<?php
    session_start();
    require_once('../db/dbhelper.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "delete from student_proof_mark where id = '$id'";
        $connect->query($sql);
    }
?>