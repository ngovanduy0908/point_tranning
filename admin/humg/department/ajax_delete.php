<?php
require_once('../../../db/dbhelper.php');
if(isset($_POST['maKhoa'])){
    $maKhoa = $_POST['maKhoa'];
    $sql = "delete from department where maKhoa = '$maKhoa'";
    mysqli_query($connect, $sql);
}
