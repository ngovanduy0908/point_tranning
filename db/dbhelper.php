<?php
    require_once('config.php');
    // $connect = new mysqli()
    $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($connect, 'utf8');
    if($connect->connect_error){
        var_dump($connect->connect_error);
        die();
    }
  