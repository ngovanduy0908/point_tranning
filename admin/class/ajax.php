<?php
require_once('../../db/dbhelper.php');
if(isset($_POST['maLop'])){
    $maLop = $_POST['maLop'];
    $sql = "delete from class where maLop = '$maLop'";
    mysqli_query($connect, $sql);
}
