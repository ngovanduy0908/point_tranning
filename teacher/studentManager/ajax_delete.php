<?php
require_once('../../db/dbhelper.php');
if(isset($_POST['maSv'])){
    $maSv = $_POST['maSv'];
    $sql = "delete from students where maSv = '$maSv'";
    mysqli_query($connect, $sql);
}
