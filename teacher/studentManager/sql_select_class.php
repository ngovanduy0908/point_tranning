<?php
$path = "../../";
require_once $path . 'db/dbhelper.php';
// var_dump($_SESSION);
$maLop = $_SESSION['maLop'];
$sql_class = "select * from class where maLop = '$maLop'";
$sql_class_run = $connect->query($sql_class);
if ($sql_class_run->num_rows > 0) {
  $sql_class_item = $sql_class_run->fetch_assoc();
  $class_name = $sql_class_item['class_name'];
  // var_dump($class_name);
}
?>