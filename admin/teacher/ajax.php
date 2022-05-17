<?php
require_once('../../db/dbhelper.php');
if(isset($_POST['id'])){
    $maGv = $_POST['id'];
    $sql = "delete from teacher where maGv = '$maGv'";
    mysqli_query($connect, $sql);
    
}
