<?php
    ob_start();
    session_start();
    $maKhoa = $_SESSION['user']['maKhoa'];
	require_once('../../db/dbhelper.php');
    $maGv = $name = $msg = "";
    $path = '../../';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Giáo Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/base_1.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Quản Lý Giáo Viên</h4>
        <div class="main__body_container mb-3">
            <ul class="body__container_list grid wide row">
                <li class="body__container_item">
                    <a href="../../khoa/index.php" class="body__container_link">Trang Chủ</a>
                </li>
                <li class="body__container_item">
                    <a href="#" class="body__container_link">Quản Lý Giáo Viên</a>
                </li>
                <li class="body__container_item">
                    <a href="../class/index.php" class="body__container_link">Quản Lý Lớp Học</a>
                </li>
                <li class="body__container_item">
                    <a href="../../khoa/selection.php" class="body__container_link">Thống kê Điểm Rèn Luyện</a>
                </li>
                <li class="body__container_item">
                    <a href="../../login/logout.php" class="body__container_link">Đăng Xuất</a>
                </li>
            </ul>
        </div>
        <div class="main__body row  grid wide">

            <div class="main__body_form col-lg-4">
                <h2 class="main__body_form-heading">
                    Thêm Giáo Viên
                </h2>
                
                <form action="" method="POST" class="main__body_form_add">
                    <div class="form-group">
                        <label for="">Mã Giáo Viên</label>
                        <input type="text" class="form-control" name="maGv">
                    </div>
                    <div class="form-group">
                        <label for="">Tên Giáo Viên</label>
                        <input type="text" class="form-control" name="tenGv">
                    </div>
                    <button class="btn btn-success">Thêm</button>
                    <a href="../../khoa/index.php">Trở Lại</a>
                </form>

                    <?php
                        if(!empty($_POST['maGv'])){
                            $maGv = $_POST['maGv'];
                            if(!empty($_POST['tenGv'])){
                                $name = $_POST['tenGv'];
                            }
                            $sql = "insert into teacher(maGv, name, maKhoa) values ('$maGv', '$name', '$maKhoa')";
                            $connect->query($sql);
                        }
                    ?>
            </div>
            <!-- <div class="col-lg-1">

            </div> -->
            <div class="main__body_form col-lg-8">
                <h2 class="main__body_form-heading" style="margin-bottom: 38px">
                    Danh Sách Giáo Viên
                </h2>
                <form action="" method="POST" class="form-search">
                    <div class="form-group form-search__input">
                        <input type="search" class="form-control" name="searchMaGv" placeholder="Nhập mã giáo viên...">
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th width="150px">Mã Giáo Viên</th>
                            <th  width="180px">Tên Giáo Viên</th>
                            <th>Email</th>
                            <th  width="50px">Xóa</th>
                            <th  width="50px">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['searchMaGv'])){
                                $searchMa = $_POST['searchMaGv'];
                                $sql = "select * from teacher where maGv = '$searchMa'";
                                $result = $connect->query($sql);
                                if($result->num_rows > 0){
                                    $row = $result->fetch_assoc();
                                    echo '
                                        <tr>
                                            <th>1</th>
                                            <td>'.$row['maGv'].'</td>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>
                                                <a href="editor.php?id='.$row['maGv'].'"><button class="btn btn-warning">Sửa</button></a>
                                            </td>
    
                                            <td>
                                                <a href="delete.php?id='.$row['maGv'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                            
                                        </tr>
    
                                    ';
                                }
                                else{
                                    $msg = "Không tồn tại giáo viên này";
                                }
                            }
                            else{

                                $page = 1;
                                $limit = 4;
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }
                                $start = ($page - 1) * $limit;
                                if($start < 1){
                                    $page = 1;
                                }
                                $sql = "select count(maGv) as count from teacher where maKhoa = '$maKhoa'";
    
                                $count = $connect->query($sql);
                                if($count->num_rows > 0){
                                    $dem = $count->fetch_assoc();
                                    // echo $dem['count'];
                                    // exit;
                                    $tongSoRecord = $dem['count'];
                                }
                                $tongSoTrang = ceil($tongSoRecord/$limit);
                                $from = $start -2;
                                if($from < 1){
                                    $from = 1;
                                }
                                $to = $start + 2;
                                if($to > $tongSoTrang){
                                    $to = $tongSoTrang;
                                }
    
                                $sql = "select * from teacher where maKhoa = '$maKhoa' limit $start,$limit";
                                $result = $connect->query($sql);
                                if($result->num_rows > 0){
                                    $index = 0;
                                    while($row = $result->fetch_assoc()){
                                        $maGv = (string)$row['maGv'];
                                        // var_dump($maGv);
                                        echo '
                                            <tr>
                                                <th>'.(++$start).'</th>
                                                <td>'.$row['maGv'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>
                                                    <a href="?id='.$row['maGv'].'"><button class="btn btn-warning">Sửa</button></a>
                                                </td>
    
                                                <td>
                                                    <button class="btn btn-danger btn-delete" data-id='."'$maGv'".'>Xóa</button>
                                                </td>
                                                
                                            </tr>
    
                                        ';
                                    }
                                    
                                    

                                    echo '
                                    <ul class="pagination" style="margin-top: 15px">
                                        <li class="page-item"><a class="page-link" href="index.php?page=1"><<</a></li>
    
                                    ';
                                    if($page > 1){
                                        echo '
                                            <li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'"><</a></li>
                                        ';
                                    }
                                
                                    for($i=$from; $i<=$to; $i++){
                                        if($page == $i){
                                            echo '
                                            <li class="page-item active"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>
                                        ';
                                        }
                                        else{
                                            echo '
                                                <li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>
                                            ';
                                        }
                                    }
                                    if($page < $tongSoTrang){
                                        echo '
                                        <li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">></a></li>
                                        
                                        ';
                                    }
                                    echo '
                                        <li class="page-item"><a class="page-link" href="index.php?page='.$tongSoTrang.'">>></a></li>
                                    </ul>
                                    ';
                                }
                            }
                            
                        ?>
                    </tbody>
                </table>
                <h3 style="color: red"><?=$msg?></h3>
                

    
            </div>
                        
        </div>
        <div class="grid wide" style="margin-bottom: 30px">
            <?php 
                if(isset($_GET['id'])){
                    $maGv = $_GET['id'];
                    $sql = "select * from teacher where maGv = '$maGv'";
                    $sql_run = $connect->query($sql);
                    if($sql_run->num_rows > 0){
                        $teacher = $sql_run->fetch_assoc();
                    }
            ?>

                <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Mã Giáo Viên</label>
                            <input type="text" class="form-control" name="maGvNew" value="<?= $teacher['maGv'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tên Giáo Viên</label>
                            <input type="text" class="form-control" name="tenGv" value="<?= $teacher['name'] ?>">
                        </div>
                        <button class="btn btn-success">Sửa</button>
                        <a href="index.php">Hủy</a>
                </form>
            <?php
            }
            if(isset($_POST['maGvNew'])){
                $maGvNew = $_POST['maGvNew'];
                $name = $_POST['tenGv'];
                $sql = "update teacher 
                        set
                        name = '$name',
                        maGv = '$maGvNew'
                        where maGv = '$maGv'";
                if($connect->query($sql)){
                    header('Location: index.php');
                }
                else{
                    echo $connect->error;
                }
            }
            $connect->close();
            ob_end_flush();
            
            ?>
        </div>
        <?php
            require_once '../../footer.php';
        ?>
    </div>

    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function(){
                let id = $(this).data('id');

                var option = confirm('Bạn có chắc chắn muốn xóa danh mục này không? ');
                if(!option){
                    return;
                }
                
                $.ajax({
                    url: 'ajax.php',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        alert('Xóa thành công');
                        location.reload();
                    }
                })
            })
        })
        // $(document).ready(function(){
        //     $('.btn-delete').click(function(){
        //         let btn = $(this)
        //         let id = btn.data('id');
                
        //         // $.ajax({
        //         //     url: 'ajax.php',
        //         //     type: 'POST',
        //         //     data: {id}
        //         // })
        //         $.post('ajax.php', 
        //     {
        //         'id': id,
        //         'action': 'delete'
        //     },
        //      function(data){
        //         location.reload();
        //     })

        //     })

        // })
        // function deleteTeacher(id){
            // var option = confirm('Bạn có chắc chắn muốn xóa danh mục này không? ');
            // if(!option){
            //     return;
            // }
            
        //   console.log(id)
            // $.post('ajax.php', 
            // {
            //     'id': id,
            //     'action': 'delete'
            // },
            //  function(data){
            //     location.reload();
            // })
        // }
    </script>
    <style>
        .form-search{
            width:50%;
            float: right;
        }

        .form-search__input{
            margin-bottom: 5px;
        }

        .form-search__btn{
            float: right;
            margin-bottom: 5px;
        }

        .main__body_form_add{
            box-shadow: 0 8px 9px;
            border: 2px solid;
            padding: 11px 14px;
            border-radius: 9px;
        }
    </style>
</body>

</html>