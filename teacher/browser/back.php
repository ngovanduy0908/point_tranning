<?php
    session_start();
    unset($_SESSION['maHK']);
    header('Location: ./chooseSemConsider.php');

