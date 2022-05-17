<?php
    session_start();
    $maKhoa = $_SESSION['user']['maKhoa'];
	require_once('../../db/dbhelper.php');
    $path = '../../';
    $maLop = $class_name = $msg = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Lớp Học</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/base_1.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
    <div class="main ">
       <?php
            require_once '../../header.php';
       ?>
        <div class="main__body">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Quản Lý Lớp Học</h4>  
            <div class="main__body_container mb-3 ">
                <ul class="body__container_list grid wide row">
                    <li class="body__container_item">
                        <a href="../../khoa/index.php" class="body__container_link">Trang Chủ</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../teacher/index.php" class="body__container_link">Quản Lý Giáo Viên</a>
                    </li>
                    <li class="body__container_item">
                        <a href="#" class="body__container_link">Quản Lý Lớp Học</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../../khoa/selection.php" class="body__container_link">Thống kê Điểm Rèn Luyện</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../../login/logout.php" class="body__container_link">Đăng Xuất</a>
                    </li>
                </ul>
            </div>
            <div class="row grid wide">
                <div class="main__body-button col-lg-4">
                    <!-- <a href="../../khoa/index.php"><button class="btn btn-warning"><i class="fas fa-home"></i> Trang Chủ</button></a> -->
                    <a href="./add.php"><button class="btn btn-success">Thêm Lớp Mới</button></a>

                </div>
                <div class="col-lg-4"></div>

                <div class="main__body_form col-lg-4">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Mã Lớp Học</label>
                            <input type="text" class="form-control" name="maLop" placeholder="Nhập mã lớp học..." value="<?php if(isset($_POST['maLop'])){
                                echo $_POST['maLop'];
                            }
                            else{
                                echo "";
                            }?>">
                        </div>
                        <button class="btn btn-success">Tìm Kiếm</button>
                    </form>
                </div>
            </div>

            <div class="row grid wide">
                <div class="main__body_table col-lg-12">
                    <h2 class="main__body_table-heading" style="margin-bottom: 38px">
                        Danh Sách Lớp Học
                    </h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50px">STT</th>
                                <th width="150px">Mã Lớp học</th>
                                <th width="180px">Tên Lớp Học</th>
                                <th>Tên Giáo Viên Chủ Nhiệm</th>
                                <th>Khóa</th>
                                <th>Khoa</th>
                                <th width="50px">Sửa</th>
                                <th width="50px">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_POST['maLop'])){
                                    $maLop = $_POST['maLop'];
                                    $sql = "select class.*, teacher.name as teacher_name, course.name as course_name, department.name as department_name  
                                    from class, teacher, course, department 
                                    where 
                                    class.maGv = teacher.maGv 
                                    and class.maKhoaHoc = course.maKhoaHoc 
                                    and class.maKhoa = department.maKhoa 
                                    and class.maKhoa = '$maKhoa' and class.maLop = '$maLop'";
                                    $result = $connect->query($sql);
                                    if($result->num_rows > 0){
                                        $row = $result->fetch_assoc();
                                        echo '
                                                <tr>
                                                    <th></th>
                                                    <td>'.$row['maLop'].'</td>
                                                    <td>'.$row['class_name'].'</td>
                                                    <td>'.$row['teacher_name'].'</td>
                                                    <td>'.$row['course_name'].'</td>
                                                    <td>'.$row['department_name'].'</td>
    
                                                    <td>
                                                        <a href="editor.php?id='.$row['maLop'].'"><button class="btn btn-warning">Sửa</button></a>
                                                    </td>
        
                                                    <td>
                                                        <a href="delete.php?id='.$row['maLop'].'"><button class="btn btn-danger">Xóa</button></a>
                                                    </td>
                                                    
                                                </tr>
                                            ';
                                    }
                                    else{
                                        $msg = "Không có mã lớp này";
                                    }
                                }

                                else{
                                    $page = 1;
                                    $limit = 2;
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    }
                                    $start = ($page - 1) * $limit;
                                    if($start < 1){
                                        $page = 1;
                                    }
                                    $sql = "select count(maLop) as count from class where maKhoa = '$maKhoa'";
        
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
                                    $sql = "select class.*, teacher.name as teacher_name, course.name as course_name, department.name as department_name  
                                    from class, teacher, course, department 
                                    where 
                                    class.maGv = teacher.maGv 
                                    and class.maKhoaHoc = course.maKhoaHoc 
                                    and class.maKhoa = department.maKhoa 
                                    and class.maKhoa = '$maKhoa' limit $start,$limit";
                                    // $sql = "select class.*, teacher.tenGv as tenGv, khoaHoc.tenKhoaHoc as tenKhoaHoc, khoa.tenKhoa as tenKhoa  from class, teacher, khoaHoc, khoa where class.maGv = teacher.maGv and class.maKhoaHoc = khoaHoc.maKhoaHoc and class.maKhoa = khoa.maKhoa and class.maKhoa = '$maKhoa' limit $start,$limit";
                                    $result = $connect->query($sql);
                                    if($result->num_rows > 0){
                                        $index = 0;
                                        while($row = $result->fetch_assoc()){
                                            
                                            echo '
                                                <tr>
                                                    <th>'.(++$start).'</th>
                                                    <td>'.$row['maLop'].'</td>
                                                    <td>'.$row['class_name'].'</td>
                                                    <td>'.$row['teacher_name'].'</td>
                                                    <td>'.$row['course_name'].'</td>
                                                    <td>'.$row['department_name'].'</td>
    
                                                    <td>
                                                        <a href="editor.php?id='.$row['maLop'].'"><button class="btn btn-warning">Sửa</button></a>
                                                    </td>
        
                                                    <td>
                                                        <button class="btn_delete btn btn-danger" data-id='.$row['maLop'].'>Xóa</button>
                                                        
                                                    </td>
                                                    
                                                </tr>
                                            ';
                                        }
                                        // <a href="delete.php?id='.$row['maLop'].'"><button class="btn btn-danger">Xóa</button></a>

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
        </div>

        <?php
            require_once '../../footer.php';
        ?>
    </div>

    <script>
        $(document).ready(function(){
            $('.btn_delete').click(function(){
                let maLop = $(this).data('id')
                var option = confirm('Bạn có chắc chắn muốn xóa danh mục này không? ');
                if(!option){
                    return;
                }
                $.ajax({
                    url: 'ajax.php',
                    method: 'POST',
                    data:{
                        maLop: maLop,
                    },
                    success: function(data){
                        alert('Xóa thành công')
                        location.reload();
                    }
                })
            })
        })
    </script>
    <style>
        .main__body_form{
            border: 2px solid #79cff3;
            border-radius: 4px;
            padding-top: 5px; 
            padding-bottom: 5px; 
        }
    </style>
</body>

</html>