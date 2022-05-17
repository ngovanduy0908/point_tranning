<?php
    require_once('./get_mark.php');
    $path = '../';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Point</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/footer.css">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            <a href="./showSemester.php"><button class="btn btn-primary mt-3">Quay Lại</button></a>
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Điểm Rèn Luyện <?= $hkItem['name']?></h4>
            <div class="main__body-container">
                <table class="table table-bordered table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="5">Điểm Do SV Tự Đánh Giá</th>
                        </tr>
                        <tr>
                            <th>Tổng Mục 1</th>
                            <th>Tổng Mục 2</th>
                            <th>Tổng Mục 3</th>
                            <th>Tổng Mục 4</th>
                            <th>Tổng Mục 5</th>
                            <th style=" color: red">Tổng : </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            echo '
                            <tr>
                                <td>'.$sumOfOne.'</td>
                                <td>'.$sumOfTwo.'</td>
                                <td>'.$sumOfThree.'</td>
                                <td>'.$sumOfFour.'</td>
                                <td>'.$sumOfFive.'</td>
                                <td style="font-weight: bold">'.$sum.'</td>
                            </tr>
                            ';
                        ?>
                    </tbody>
                    <thead>
                        <tr>
                            <th colspan="5">Điểm Do Lớp Đánh Giá</th>
                        </tr>
                    <?php
                    if($checkOne == '1'){
                        echo '
                            <tr>
                                <th>Tổng Mục 1</th>
                                <th>Tổng Mục 2</th>
                                <th>Tổng Mục 3</th>
                                <th>Tổng Mục 4</th>
                                <th>Tổng Mục 5</th>
                                <th style=" color: red">Tổng : </th>
                            </tr>
                            

                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>'.$sumOfOneLT.'</td>
                                <td>'.$sumOfTwoLT.'</td>
                                <td>'.$sumOfThreeLT.'</td>
                                <td>'.$sumOfFourLT.'</td>
                                <td>'.$sumOfFiveLT.'</td>
                                <td style="font-weight: bold">'.$sumLT.'</td>
                            </tr>
                            <tr>
                                <td>Ghi chú của lớp trưởng</td>
                                <td colspan="5">'.$ltNote.'</td>
                            
                            </tr>
                        </tbody>';
                    }
                    else{
                        echo '
                        <tr class="table-danger">
                            <td style="color: black" colspan="6">Lớp Trưởng Đang Chấm. Vui lòng quay lại sau. </td>
                        </tr>
                        
                        ';
                    }
                    ?>
                    <thead>
                        <tr>
                            <th colspan="5">Điểm Do Hội Đồng Khoa Đánh Giá</th>
                        </tr>
                    <?php
                    if($checkTwo == '1'){
                        echo '
                            <tr>
                                <th>Tổng Mục 1</th>
                                <th>Tổng Mục 2</th>
                                <th>Tổng Mục 3</th>
                                <th>Tổng Mục 4</th>
                                <th>Tổng Mục 5</th>
                                <th style=" color: red">Tổng : </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>'.$sumOfOneGV.'</td>
                                <td>'.$sumOfTwoGV.'</td>
                                <td>'.$sumOfThreeGV.'</td>
                                <td>'.$sumOfFourGV.'</td>
                                <td>'.$sumOfFiveGV.'</td>
                                <td style="font-weight: bold">'.$sumGV.'</td>
                            </tr>
                            <tr>
                                <td>Ghi chú của Hội đồng Khoa</td>
                                <td colspan="5">'.$gvNote.'</td>
                            </tr>
                        </tbody>';
                    }
                    else{
                        echo '
                        <tr class="table-warning">
                            <td style="color: black" colspan="6">Hội đồng Khoa Đang Chấm. Vui lòng quay lại sau. </td>
                        </tr>
                        
                        ';
                    }
                    ?>
                </table>

                <button class="btn-detail btn btn-success mr-2 mb-2">Xem Chi Tiết</button>
                <?php
                    $sql_student_proof = "select * from student_proof_mark where maSv = '$maSv' and maHK = '$maHK'";
                    $sql_student_proof_run = $connect->query($sql_student_proof);
                    if($sql_student_proof_run->num_rows > 0){
                        echo '
                            <button class="btn-proof btn btn-info mr-2 mb-2">Ẩn/Hiện Minh Chứng</button>
                        ';
                        ?>

                    <div class="main__body_container_proof " style="width: 50%; display: block; margin: 0 auto">
                        <?php
                            while($sql_student_proof_item = $sql_student_proof_run->fetch_assoc()){
                                $name_img = explode(".", $sql_student_proof_item['name_img'])[0];
                                // var_dump($name_img);
                                // exit;
                                ?>
                                <div class="app__main_intro_slider_image">
                                    <h5 class="text-center"><?=$name_img?></h5>
                                    <img  src="<?=$path?>assets/img/<?=$sql_student_proof_item['name_img']?>" alt="" style="width: 100%;">
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                <?php
                    }
                ?>
                <div class="main__body_container-sub mb-2" style="display: none; border: 2px solid #ccc; padding: 10px 40px; margin-top: 10px">
                    <div class="container__header">
                        <div class="container__header-title">
                            <span class="container__header-title-one">
                                <p class="" style="margin-bottom: 0px">BỘ GIÁO DỤC VÀ ĐÀO TẠO</p>
                                <p class="container__header-title-school">TRƯỜNG ĐẠI HỌC MỎ - ĐỊA CHẤT</p>
                            </span>
                            <span class="container__header-title-two">
                                <p class="container__header-title-school">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                                <p style="font-weight: bold; "><u>Độc lập - Tự do - Hạnh phúc</u></p>
                            </span>
                        </div>
                        <div class="container__header-heading">
                            <h5 style="text-align: center">PHIẾU ĐÁNH GIÁ KẾT QUẢ RÈN LUYỆN CHO SINH VIÊN</h5>
                            <p style="text-align: center; font-style: italic;">(Ban hành kèm theo Quyết định số: 148 /QĐ-MĐC ngày 05 tháng 3 năm 2021)</p>
                        </div>
                        <div class="container__header-info">
                            <div class="row">
                                <div class="col-lg-6">Họ tên: <?= $row['name']?></div>
                                <div class="col-lg-6">Mã số SV: <?=$maSv?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">Lớp:<?=$row['class_name']?></div>
                                <div class="col-lg-2">Khoá: <?=$row['course_name']?></div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-6">Khoa: <?=$row['department_name']?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">Học kỳ: <?=$hkItem['semester']?></div>    
                                <div class="col-lg-6">Năm học: <?=$hkItem['year']?></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="container__content">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th class="textCenter" style="width: 70%">Nội dung đánh giá</th>
                                    <th class="textCenter" style="width: 10%">Điểm do SV tự đánh giá</th>
                                    <?php
                                        if($check == 2){
                                            echo '                                            
                                            <th class="textCenter" style="width: 10%">Điểm do lớp đánh giá</th>
                                            ';
                                        }
                                        if($check == 3){
                                            echo '                                            
                                            <th class="textCenter" style="width: 10%">Điểm do lớp đánh giá</th>
                                            <th class="textCenter" style="width: 10%">Điểm do hội đồng Khoa đánh giá</th>
                                            ';
                                        }
                                    ?>
                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold">I. <u>Đánh giá về ý thức và kết quả học tập</u></span> <span style="font-style: italic;">(Tính điểm thi lần 1. Tổng điểm: 0 - 30 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span> (tổng điểm có thể chấm quá 30 khi SV đạt giải NCKH, thi Olimpic cấp Bộ hoặc cấp Quốc gia)</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                    a). Kết quả học tập:
                                    <br> - Điểm TBCHT ≥ 3,6: ..............................................................……….......(+20đ)
                                    <br> - Điểm TBCHT từ 3,2 đến 3,59: ............................................................(+18)
                                    <br> - Điểm TBCHT từ 2,5 đến 3,19: ...........................................................(+16đ)
                                    <br> - Điểm TBCHT từ 2,0 đến 2,49: ..........................................................(+12đ)
                                    <br> - Điểm TBCHT từ 1,5 đến 1,99: ..........................................................(+10đ)
                                    <br> - Điểm TBCHT từ 1,0 đến 1,49: ............................................................(+8đ)

                                    </td>
                                    <td>
                                        <span>
                                            <?= $svDiemTBHK ?>
                                        </span>
                                    </td>
                                    <?php
                                        if($check == 2){
                                            echo '
                                            <td>
                                                <span>'.$ltDiemTBHK.'</span>
                                            </td>
                                            ';
                                        }

                                        if($check == 3){
                                            echo '
                                            <td>
                                                <span>'.$ltDiemTBHK.'</span>
                                            </td>
                                            <td>
                                                <span>'.$gvDiemTBHK.'</span>
                                            </td>
                                            ';
                                        }
                                    ?>
                                    
                                    
                                </tr>
                                
                                <tr>
                                    <td>
                                        b). Nghiên cứu khoa học, thi Olympic, Robocon và các cuộc thi khác:
                                        <span>(cộng điểm thưởng theo QĐ số 1171/QĐ-MĐC ngày 12/11/2020 về quản lý KHCN của trường Đại học Mỏ-Địa chất)*</span>
                                        <br>
                                        <br> - Đạt giải NCKH cấp Bộ và giải tương đương tối đa………………..….(+8đ)
                                        <br> - Đạt giải NCKH cấp Trường, Tiểu ban chuyên môn tối đa: ………..... (+6đ)
                                        <br> - Đạt giải NCKH khác tối đa: ……....……………..……………...…….(+6đ)
                                        <br> - Đạt giải Olympic cấp Quốc gia tối đa: ………...…………………….(+10đ)
                                        <br> - Tham gia Olympic cấp Quốc gia tối đa: ………...…… ..……….…....(+6đ)
                                        <br> - Đạt giải Olympic cấp Trường tối đa: …........................................................(+5đ)
                                        <br> - Tham gia Olympic cấp Trường tối đa: ………...………. …….............(+2đ)
                                    </td>

                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfOne = $svNCKH1 + $svNCKH2 + $svNCKH3 + $svOlympic1 + $svOlympic2 + $svOlympic3 + $svOlympic4;
                                                // if($sumSubOneOfOne > 0 ){
                                                    
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfOne;
                                            ?>
                                        </span>
                                    </td>

                                    <?php
                                        if($check == '2'){
                                    ?>

                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfOneLT = $ltNCKH1 + $ltNCKH2 + $ltNCKH3 + $ltOlympic1 + $ltOlympic2 + $ltOlympic3 + $ltOlympic4;
                                                // if($sumSubOneOfOneLT > 0 ){
                                                //     echo $sumSubOneOfOneLT;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfOneLT;
                                            ?>
                                        </span>
                                    </td>

                                    <?php
                                        }
                                        if($check == '3'){
                                    ?>

                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfOneLT = $ltNCKH1 + $ltNCKH2 + $ltNCKH3 + $ltOlympic1 + $ltOlympic2 + $ltOlympic3 + $ltOlympic4;
                                                // if($sumSubOneOfOneLT > 0 ){
                                                //     echo $sumSubOneOfOneLT;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfOneLT;
                                                
                                                
                                            ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfOneGV = $gvNCKH1 + $gvNCKH2 + $gvNCKH3 + $gvOlympic1 + $gvOlympic2 + $gvOlympic3 + $gvOlympic4;
                                                // if($sumSubOneOfOneGV > 0 ){
                                                //     echo $sumSubOneOfOneGV;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfOneGV;
                                                
                                            ?>
                                        </span>
                                    </td>

                                    <?php
                                        }
                                    ?>
                                </tr>
                                
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        c) Việc thực hiện nội quy học tập, quy chế thi, kiểm tra
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        - Không vi phạm quy chế thi, kiểm tra:………………….………….......(+3đ)
                                    </td>

                                    <td>   
                                        <span>
                                            <?php
                                                // if($svNoRegulation > 0){
                                                //     echo $svNoRegulation;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $svNoRegulation;

                                            ?>
                                        </span>                          
                                    </td>

                                    <?php
                                        if($check == '2'){
                                    ?>

                                    <td>   
                                        <span>
                                            <?php
                                                // if($ltNoRegulation > 0){
                                                //     echo $ltNoRegulation;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $ltNoRegulation;

                                            ?>
                                        </span>                          
                                    </td>

                                    <?php
                                    }
                                    if($check == '3'){
                                    ?>

                                    <td>   
                                        <span>
                                            <?php
                                                // if($ltNoRegulation > 0){
                                                //     echo $ltNoRegulation;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $ltNoRegulation;

                                            ?>
                                        </span>                          
                                    </td>

                                    <td>   
                                        <span>
                                            <?php
                                                // if($gvNoRegulation > 0){
                                                //     echo $gvNoRegulation;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $gvNoRegulation;

                                            ?>
                                        </span>                          
                                    </td>

                                </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td width="70%">
                                        - Đi học đầy đủ, đúng giờ: ………………….......................…………....(+2đ)
                                    </td>
                                    <td> 
                                        <span>
                                            <?php
                                                // if($svOnTime > 0){
                                                //     echo $svOnTime;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $svOnTime;

                                            ?>
                                        </span>                                
                                    </td>
                                    <?php
                                    if($check == '2'){
                                    ?>
                                    <td> 
                                        <span>
                                            <?php
                                                // if($ltOnTime > 0){
                                                //     echo $ltOnTime;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $ltOnTime;

                                            ?>
                                        </span>                                
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){
                                    ?>
                                    <td> 
                                        <span>
                                            <?php
                                                // if($ltOnTime > 0){
                                                //     echo $ltOnTime;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $ltOnTime;

                                            ?>
                                        </span>                                
                                    </td>
                                    <td> 
                                        <span>
                                            <?php
                                                // if($gvOnTime > 0){
                                                //     echo $gvOnTime;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $gvOnTime;

                                            ?>
                                        </span>                                
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>

                                    <td width="70%">
                                        a). Đã đăng ký, nhưng bỏ không tham tham gia nghiên cứu khoa học, thi Olympic, Robocon và các cuộc thi khác tương đương: ........................ (-15đ)</td>                    
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($svAbandon == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $svAbandon;
                                            // }
                                            echo $svAbandon;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltAbandon == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltAbandon;
                                            // }
                                            echo $ltAbandon;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){
                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltAbandon == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltAbandon;
                                            echo $ltAbandon;

                                            // }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($gvAbandon == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $gvAbandon;
                                            // }
                                            echo $gvAbandon;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        b). Không đi học, đi không đúng giờ: .………………...………......(-2đ/buổi)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($svUnTrueTime == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $svUnTrueTime;
                                            // }
                                            echo $svUnTrueTime;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltUnTrueTime == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltUnTrueTime;
                                            // }
                                            echo $ltUnTrueTime;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltUnTrueTime == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltUnTrueTime;
                                            // }
                                            echo $ltUnTrueTime;

                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($gvUnTrueTime == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $gvUnTrueTime;
                                            // }
                                            echo $gvUnTrueTime;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                // echo $check;
                                    if($check == 1){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục I</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfOne.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 2){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục I</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfOne.'</span>
                                            </td>
                                            
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfOneLT.'</span>
                                            </td>
                                        </tr>
                                        
                                        ';
                                    }

                                    if($check == 3){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục I</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfOne.'</span>
                                            </td>
                                            
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfOneLT.'</span>
                                            </td>

                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfOneGV.'</span>
                                            </td>
                                        </tr>
                                        
                                        ';
                                    }
                                ?>
                                
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold">II.<u>Đánh giá về ý thức và kết quả chấp hành nội quy, quy chế của Trường</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 25 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">a). Chấp hành tốt nội quy, quy chế của Trường, không vi phạm kỷ luật….(+10đ)</td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($svRightRule == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $svRightRule;
                                            // }
                                            echo $svRightRule;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltRightRule == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltRightRule;
                                            // }
                                            echo $ltRightRule;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltRightRule == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltRightRule;
                                            // }
                                            echo $ltRightRule;

                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($gvRightRule == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $gvRightRule;
                                            // }
                                            echo $gvRightRule;

                                            ?>
                                        </span>
                                    </td>
                                    
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>
                                        b). Kết quả học tập Tuần sinh hoạt công dân sinh viên
                                       <br> Điểm lần 1 ≥ 90:………………...........................................................(+15đ)
                                       <br> Điểm lần 1 từ 65 đến 89 điểm:…...................................................(+10đ)
                                       <br> Điểm lần 1 từ 50 đến 65 điểm:….....................................................(+5đ)

                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($svCitizen == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $svCitizen;
                                            // }
                                            echo $svCitizen;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltCitizen == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltCitizen;
                                            // }
                                            echo $ltCitizen;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                            // if($ltCitizen == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $ltCitizen;
                                            // }
                                            echo $ltCitizen;

                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                            // if($gvCitizen == '0'){
                                            //     echo '';
                                            // }
                                            // else{
                                            //     echo $gvCitizen;
                                            // }
                                            echo $gvCitizen;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">a). Không tham gia học tập đầy đủ, nghiêm túc nghị quyết, nội quy, quy chế, tuần sinh hoạt công dân sinh viên:..…....................................................(-10đ)</td>     
                                    <td>
                                        <span>
                                            <?php
                                                // if($svNoFullStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svNoFullStudy;
                                                // }
                                                echo $svNoFullStudy;
                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoFullStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoFullStudy;
                                                // }
                                                echo $ltNoFullStudy;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){
                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoFullStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoFullStudy;
                                                // }
                                                echo $ltNoFullStudy;

                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                    
                                        <span>
                                            <?php
                                                // if($gvNoFullStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvNoFullStudy;
                                                // }
                                                echo $gvNoFullStudy;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        b). Không đeo thẻ sinh viên trong khuôn viên Trường:..............…....(-5đ/lần)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svNoCard == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svNoCard;
                                                // }
                                                echo $svNoCard;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoCard == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoCard;
                                                // }
                                                echo $ltNoCard;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoCard == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoCard;
                                                // }
                                                echo $ltNoCard;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvNoCard == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvNoCard;
                                                // }
                                                echo $gvNoCard;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    
                                    <?php       
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        c). Không tham gia các buổi sinh hoạt lớp, họp, hội nghị, giao ban, tập huấn và các hoạt động khác khi Nhà trường yêu cầu:..................................(-5đ/lần)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svNoAtivities == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svNoAtivities;
                                                // }
                                                echo $svNoAtivities;

                                            ?>
                                        </span>
                                    
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoAtivities == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoAtivities;
                                                // }
                                                echo $ltNoAtivities;

                                            ?>
                                        </span>
                                    
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoAtivities == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoAtivities;
                                                // }
                                                echo $ltNoAtivities;

                                            ?>
                                        </span>
                                    
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvNoAtivities == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvNoAtivities;
                                                // }
                                                echo $gvNoAtivities;

                                            ?>
                                        </span>
                                    
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        d). Đóng học phí không đúng quy định trong học kỳ:….........................(-10đ)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svNoPayFee == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svNoPayFee;
                                                // }
                                                echo $svNoPayFee;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoPayFee == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoPayFee;
                                                // }
                                                echo $ltNoPayFee;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoPayFee == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoPayFee;
                                                // }
                                                echo $ltNoPayFee;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvNoPayFee == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvNoPayFee;
                                                // }
                                                echo $gvNoPayFee;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                    if($check == 1){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục II</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfTwo.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 2){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục II</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfTwo.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfTwoLT.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 3){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục II</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfTwo.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfTwoLT.'</span>
                                            </td>
                                            <td>
                                            <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfTwoGV.'</span>
                                        </td>
                                        </tr>
                                        ';
                                    }
                                ?>

                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold">III.<u> Đánh giá về ý thức và kết quả tham gia các hoạt động chính trị, xã hội, văn hoá, văn nghệ, thể thao, phòng chống các tệ nạn xã hội</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 20 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        a). Tham gia đầy đủ các hoạt động, sinh hoạt do Trường, Khoa, Lớp, Đoàn TN, Hội SV tổ chức:......................................................................…….(+13đ)
                                    </td>                      
                                    <td>
                                        <span>
                                            <?php
                                                // if($svFullActive == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svFullActive;
                                                // }
                                                echo $svFullActive;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltFullActive == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltFullActive;
                                                // }
                                                echo $ltFullActive;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltFullActive == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltFullActive;
                                                // }
                                                echo $ltFullActive;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvFullActive == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvFullActive;
                                                // }
                                                echo $gvFullActive;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td colspan="1">
                                        b). Có thành tích hoạt động chính trị, xã hội, văn hoá, văn nghệ, thể thao, đoàn thể và đấu tranh phòng chống các tệ nạn xã hội được tuyên dương, khen thưởng (lấy mức khen thưởng cao nhất):
                                        <br> - Cấp Trường: ……………………….……………….……………...… (+3đ)
                                        <br> - Cấp tỉnh, thành phố trở lên:……...……...………………..................... (+5đ)
                                    
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfTwo = $svAchievementSchool + $svAchievementCity;
                                                // if($sumSubOneOfTwo > 0){
                                                //     echo $sumSubOneOfTwo;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfTwo;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfTwoLT = $ltAchievementSchool + $ltAchievementCity;
                                                // if($sumSubOneOfTwoLT > 0){
                                                //     echo $sumSubOneOfTwoLT;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfTwoLT;

                                            ?>
                                        </span>
                                    </td>
                                    
                                    <?php
                                    }
                                    if($check == '3'){
                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfTwoLT = $ltAchievementSchool + $ltAchievementCity;
                                                // if($sumSubOneOfTwoLT > 0){
                                                //     echo $sumSubOneOfTwoLT;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfTwoLT;

                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                $sumSubOneOfTwoGV = $gvAchievementSchool + $gvAchievementCity;
                                                // if($sumSubOneOfTwoGV > 0){
                                                //     echo $sumSubOneOfTwoGV;
                                                // }
                                                // else{
                                                //     echo '';
                                                // }
                                                echo $sumSubOneOfTwoGV;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        c). Tham gia các hoạt động tư vấn tuyển sinh (có xác nhận của phòng QHCC&DN):…………………………………………( +2đ/lần)
                                    </td>

                                    <td>  
                                        <span>
                                            <?php
                                                // if($svAdvise == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svAdvise;
                                                // }
                                                echo $svAdvise;

                                            ?>
                                        </span>                                  
                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>  
                                        <span>
                                            <?php
                                                // if($ltAdvise == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltAdvise;
                                                // }
                                                echo $ltAdvise;

                                            ?>
                                        </span>                                     
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>  
                                        <span>
                                            <?php
                                                // if($ltAdvise == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltAdvise;
                                                // }
                                                echo $ltAdvise;

                                            ?>
                                        </span>                                     
                                    </td>
                                    <td>  
                                        <span>
                                            <?php
                                                // if($gvAdvise == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvAdvise;
                                                // }
                                                echo $gvAdvise;

                                            ?>
                                        </span>                                  
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Không tham gia hoạt động, sinh hoạt khi được phân công: ……….(-5đ/lần)</td>     
                                    <td>
                                        <span>
                                            <?php
                                                // if($svIrresponsible == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svIrresponsible;
                                                // }
                                                echo $svIrresponsible;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltIrresponsible == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltIrresponsible;
                                                // }
                                                echo $ltIrresponsible;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltIrresponsible == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltIrresponsible;
                                                // }
                                                echo $ltIrresponsible;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvIrresponsible == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvIrresponsible;
                                                // }
                                                echo $gvIrresponsible;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>         
                                <tr>
                                    <td width="70%">
                                        - Vi phạm Quy định về văn hoá học đường cho sinh viên:.................(-5đ/lần)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svNoCultural == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svNoCultural;
                                                // }
                                                echo $svNoCultural;

                                            ?>
                                        </span>
                                    </td>

                                    <?php
                                    if($check == '2'){
                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoCultural == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoCultural;
                                                // }
                                                echo $ltNoCultural;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoCultural == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoCultural;
                                                // }
                                                echo $ltNoCultural;

                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvNoCultural == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvNoCultural;
                                                // }
                                                echo $gvNoCultural;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                
                                <?php
                                    if($check == 1){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục III</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfThree.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 2){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục III</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfThree.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfThreeLT.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 3){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục III</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfThree.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfThreeLT.'</span>
                                            </td>
                                                <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfThreeGV.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                ?>  
                                   
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold">IV.<u> Đánh giá về phẩm chất công dân và quan hệ công đồng </u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 15 điểm)</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                    a). Tích cực tham gia học tập, tìm hiểu và chấp hành tốt chủ trương của Đảng, chính sách, pháp luật của Nhà nước:….........................................(+10đ)
                                    </td>                      
                                    <td>
                                        <span>
                                            <?php
                                                // if($svPositiveStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svPositiveStudy;
                                                // }
                                                echo $svPositiveStudy;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltPositiveStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltPositiveStudy;
                                                // }
                                                echo $ltPositiveStudy;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltPositiveStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltPositiveStudy;
                                                // }
                                                echo $ltPositiveStudy;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvPositiveStudy == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvPositiveStudy;
                                                // }
                                                echo $gvPositiveStudy;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                                <tr>
                                    <td>
                                    b). Tích cực tham gia các hoạt động nhân đạo, từ thiện vì cộng đồng; phong trào thanh niên tình nguyện; phong trào giúp đỡ nhân dân và bạn bè khi gặp thiên tai, khó khăn, hoạn nạn:...................................................................(+5đ)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svPositiveLove == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svPositiveLove;
                                                // }
                                                echo $svPositiveLove;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltPositiveLove == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltPositiveLove;
                                                // }
                                                echo $ltPositiveLove;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    
                                    <?php
                                    }
                                    if($check == '3'){
                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltPositiveLove == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltPositiveLove;
                                                // }
                                                echo $ltPositiveLove;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvPositiveLove == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvPositiveLove;
                                                // }
                                                echo $gvPositiveLove;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Gây mất đoàn kết trong tập thể lớp:........................................................(-5đ)</td>     
                                    <td>
                                        <span>
                                            <?php
                                                // if($svWarn == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svWarn;
                                                // }
                                                echo $svWarn;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltWarn == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltWarn;
                                                // }
                                                echo $ltWarn;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltWarn == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltWarn;
                                                // }
                                                echo $ltWarn;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvWarn == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvWarn;
                                                // }
                                                echo $gvWarn;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        - Không đóng BHYT đúng hạn: .............................................................(-20đ)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svNoProtect == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svNoProtect;
                                                // }
                                                echo $svNoProtect;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoProtect == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoProtect;
                                                // }
                                                echo $ltNoProtect;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltNoProtect == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltNoProtect;
                                                // }
                                                echo $ltNoProtect;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvNoProtect == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvNoProtect;
                                                // }
                                                echo $gvNoProtect;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                    if($check == 1){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục IV</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFour.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 2){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục IV</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFour.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFourLT.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 3){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục IV</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFour.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFourLT.'</span>
                                            </td>
                                            <td>
                                            <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFourGV.'</span>
                                        </td>
                                        </tr>
                                        ';
                                    }
                                ?>  
                                

                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold">V.<u>Đánh giá về ý thức và kết quả tham gia phụ trách lớp, các đoàn thể tổ chức khác trong Trường</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 10 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1">a). Là thành viên Ban cán sự lớp quản lý sinh viên, cán bộ Đoàn TN, Hội SV hoàn thành nhiệm vụ:
                                        <br> - Lớp trưởng, Phó Bí thư Liên chi, Bí thư Chi đoàn:…..…….................(+7đ)
                                        <br> - Lớp phó, Phó Bí thư Chi đoàn, Hội trưởng Hội SV:........…………......(+5đ)

                                    </td>
                                    <td colspan="1">
                                        <span>
                                            <?php
                                                // if($svMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svMonitor;
                                                // }
                                                echo $svMonitor;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td colspan="1">
                                        <span>
                                            <?php
                                                // if($ltMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltMonitor;
                                                // }
                                                echo $ltMonitor;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td colspan="1">
                                        <span>
                                            <?php
                                                // if($ltMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltMonitor;
                                                // }
                                                echo $ltMonitor;

                                            ?>
                                        </span>
                                    </td>
                                    <td colspan="1">
                                        <span>
                                            <?php
                                                // if($gvMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvMonitor;
                                                // }
                                                echo $gvMonitor;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                
                                <tr>
                                    <td>
                                    b). Được các cấp khen thưởng: ....….................….................………......(+3đ)
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($svBonus == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svBonus;
                                                // }
                                                echo $svBonus;

                                            ?>
                                        </span>
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltBonus == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltBonus;
                                                // }
                                                echo $ltBonus;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltBonus == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltBonus;
                                                // }
                                                echo $ltBonus;

                                            ?>
                                        </span>
                                       
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvBonus == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvBonus;
                                                // }
                                                echo $gvBonus;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Là thành viên Ban cán sự lớp quản lý sinh viên, lớp học phần; cán bộ Đoàn TN, Hội SV thiếu trách nhiệm với tập thể lớp:...................................(-5đ/lần)</td>     
                                    <td>
                                        <span>
                                            <?php
                                                // if($svIrresponsibleMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $svIrresponsibleMonitor;
                                                // }
                                                echo $svIrresponsibleMonitor;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    if($check == '2'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltIrresponsibleMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltIrresponsibleMonitor;
                                                // }
                                                echo $ltIrresponsibleMonitor;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    if($check == '3'){

                                    ?>
                                    <td>
                                        <span>
                                            <?php
                                                // if($ltIrresponsibleMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $ltIrresponsibleMonitor;
                                                // }
                                                echo $ltIrresponsibleMonitor;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                // if($gvIrresponsibleMonitor == '0'){
                                                //     echo '';
                                                // }
                                                // else{
                                                //     echo $gvIrresponsibleMonitor;
                                                // }
                                                echo $gvIrresponsibleMonitor;

                                            ?>
                                        </span>
                                        
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                    if($check == 1){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục V</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFive.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 2){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục V</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFive.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFiveLT.'</span>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    if($check == 3){
                                        echo '
                                        <tr>
                                            <td width="70%">
                                                <h5>Cộng mục V</h5>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFive.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFiveLT.'</span>
                                            </td>
                                            <td>
                                            <span class="sum_one" style="font-size: 16px; font-weight: bold">'.$sumOfFiveGV.'</span>
                                        </td>
                                        </tr>
                                        ';
                                    }
                                ?>  
                                <tr>
                                    <td width="70%">
                                        <h5 style="color: red">Tổng: </h5>
                                    </td>
                                    <td>
                                        <span class="sum_mark-student" style="color: red; font-weight: bold"> <?php echo $sum ?></span>
                                    </td>
                                    <?php
                                        if($check == '2'){
                                            echo '
                                            <td>
                                                <span class="sum_mark-student" style="color: red; font-weight: bold">'.$sumLT.'</span>
                                            </td>
                                            ';
                                        }
                                        if($check == '3'){
                                            echo '
                                            <td>
                                                <span class="sum_mark-student" style="color: red; font-weight: bold">'.$sumLT.'</span>
                                            </td>
                                            <td>
                                                <span class="sum_mark-student" style="color: red; font-weight: bold">'.$sumGV.'</span>
                                            </td>
                                            ';
                                        }
                                    ?>
                                </tr> 
                            </tbody>

                        </table>
                        <button class="btn_hidden btn btn-danger">Ẩn</button>
                        
                    </div>
                    
                </div>
                <?php
                    if($check == '3'){
                        echo '
                        <a href="exploreFile.php?maHK='.$maHK.'" target="_blank"><button class="btn btn-warning mb-2">Xuất File</button></a>
                        ';
                    }
                ?>
            </div>
        </div>
        <?php
            require_once '../footer.php';
        ?>
    </div>
    <style>
        .slick-next:before, 
        .slick-prev:before{
            color: #341919;
        }
        
    </style>
        <script>
            $(".btn-proof").click(function(){
                $(".main__body_container_proof").toggle();
            });
            
            var inputAll = document.getElementsByTagName('input')
            for(var i = 0; i < inputAll.length; i++){
                inputAll[i].disabled = true;

            }
            var optionAll = document.getElementsByTagName('option')
            for(var i = 0; i < optionAll.length; i++){
                if(optionAll[i].selected == true){
                    optionAll[i].parentNode.disabled = true;
                }
            }

            let btnDetail = document.querySelector('.btn-detail')
            let tableMark = document.querySelector('.main__body_container-sub');
            let btnHidden = document.querySelector('.btn_hidden');
        
            btnDetail.onclick = function(){
                if(tableMark.style.display == 'none'){
                    tableMark.style.display = 'block';
                    btnDetail.innerText = 'Ẩn Chi tiết';
                }
                else{
                    tableMark.style.display = 'none';
                    btnDetail.innerText = 'Xem Chi Tiết';

                }
            }

            btnHidden.onclick = function(){
                tableMark.style.display = 'none';
                btnDetail.innerText = 'Hiện Chi tiết';
            }

     </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.main__body_container_proof').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:true,
        speed:1000,
        
        });
        
        var filtered = false;
        
        $('.js-filter').on('click', function(){
        if (filtered === false) {
            $('.main__body_container_proof').slick('slickFilter',':even');
            $(this).text('Unfilter Slides');
            filtered = true;
        } else {
            $('.main__body_container_proof').slick('slickUnfilter');
            $(this).text('Filter Slides');
            filtered = false;
        }
        });
    </script> 
</body>
</html>