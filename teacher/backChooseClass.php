<?php
    session_start();
    if(isset($_SESSION['maLop'])){
        unset($_SESSION['maLop']);
        header('Location: ./chooseClass.php');
    }

?>