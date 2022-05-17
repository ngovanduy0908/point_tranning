<?php
$path = '../../';
require_once $path.'db/dbhelper.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $maSv = $_GET['maSv'];
    $sql = "delete from student_proof_mark where id = '$id'";
    if($connect->query($sql)){
        header('Location: ./browser_proof_student.php?maSv='.$maSv);
    }
}