<?php
	require_once('../../../db/dbhelper.php');
    if(isset($_GET['maKhoa'])){
        $maKhoa = $_GET['maKhoa'];
        $sql = "select * from department where maKhoa = '$maKhoa'";
        $result=$connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

        }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-Xóa Khoa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../assets/css/grid.css">
    <link rel="stylesheet" href="../../../assets/css/base.css">
    <link rel="stylesheet" href="../../../assets/css/khoaCss.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 

</head>
<body>
    <div class="main">
        <form action="" method="post">
            <h2>Bạn có muốn xóa <?= $row['name']?></h2>
            <input type="radio" name="chooseValue" value="yes"> có
            <input type="radio" name="chooseValue" value="no"> không
            <button>Chọn</button>
        </form>
        <?php
            if(isset($_POST['chooseValue']) && $_POST['chooseValue'] == 'yes'){
                $sql = "delete from department where maKhoa = '$maKhoa'";
                if($connect->query($sql)){
                    header('Location: index.php');  
                }
            }
            if(isset($_POST['chooseValue']) && $_POST['chooseValue'] == 'no'){
               
                    header('Location: index.php');  
                
            }
            // else{
            //     header('Location: index.php');
            // }
        ?>
    </div>
</body>

</html>