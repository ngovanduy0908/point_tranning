<?php
    require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "delete from class where maLop = '$id'";
        if($connect->query($sql)){
            
            header('Location: index.php');

        }
        else{
            
        }
        
    }



