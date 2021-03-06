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
            <a href="./showSemester.php"><button class="btn btn-primary mt-3">Quay L???i</button></a>
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - ??i???m R??n Luy???n <?= $hkItem['name']?></h4>
            <div class="main__body-container">
                <table class="table table-bordered table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="5">??i???m Do SV T??? ????nh Gi??</th>
                        </tr>
                        <tr>
                            <th>T???ng M???c 1</th>
                            <th>T???ng M???c 2</th>
                            <th>T???ng M???c 3</th>
                            <th>T???ng M???c 4</th>
                            <th>T???ng M???c 5</th>
                            <th style=" color: red">T???ng : </th>
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
                            <th colspan="5">??i???m Do L???p ????nh Gi??</th>
                        </tr>
                    <?php
                    if($checkOne == '1'){
                        echo '
                            <tr>
                                <th>T???ng M???c 1</th>
                                <th>T???ng M???c 2</th>
                                <th>T???ng M???c 3</th>
                                <th>T???ng M???c 4</th>
                                <th>T???ng M???c 5</th>
                                <th style=" color: red">T???ng : </th>
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
                                <td>Ghi ch?? c???a l???p tr?????ng</td>
                                <td colspan="5">'.$ltNote.'</td>
                            
                            </tr>
                        </tbody>';
                    }
                    else{
                        echo '
                        <tr class="table-danger">
                            <td style="color: black" colspan="6">L???p Tr?????ng ??ang Ch???m. Vui l??ng quay l???i sau. </td>
                        </tr>
                        
                        ';
                    }
                    ?>
                    <thead>
                        <tr>
                            <th colspan="5">??i???m Do H???i ?????ng Khoa ????nh Gi??</th>
                        </tr>
                    <?php
                    if($checkTwo == '1'){
                        echo '
                            <tr>
                                <th>T???ng M???c 1</th>
                                <th>T???ng M???c 2</th>
                                <th>T???ng M???c 3</th>
                                <th>T???ng M???c 4</th>
                                <th>T???ng M???c 5</th>
                                <th style=" color: red">T???ng : </th>
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
                                <td>Ghi ch?? c???a H???i ?????ng Khoa</td>
                                <td colspan="5">'.$gvNote.'</td>
                            </tr>
                        </tbody>';
                    }
                    else{
                        echo '
                        <tr class="table-warning">
                            <td style="color: black" colspan="6">H???i ?????ng Khoa ??ang Ch???m. Vui l??ng quay l???i sau. </td>
                        </tr>
                        
                        ';
                    }
                    ?>
                </table>

                <button class="btn-detail btn btn-success mr-2 mb-2">Xem Chi Ti???t</button>
                <?php
                    $sql_student_proof = "select * from student_proof_mark where maSv = '$maSv' and maHK = '$maHK'";
                    $sql_student_proof_run = $connect->query($sql_student_proof);
                    if($sql_student_proof_run->num_rows > 0){
                        echo '
                            <button class="btn-proof btn btn-info mr-2 mb-2">???n/Hi???n Minh Ch???ng</button>
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
                                <p class="" style="margin-bottom: 0px">B??? GI??O D???C V?? ????O T???O</p>
                                <p class="container__header-title-school">TR?????NG ?????I H???C M??? - ?????A CH???T</p>
                            </span>
                            <span class="container__header-title-two">
                                <p class="container__header-title-school">C???NG H??A X?? H???I CH??? NGH??A VI???T NAM</p>
                                <p style="font-weight: bold; "><u>?????c l???p - T??? do - H???nh ph??c</u></p>
                            </span>
                        </div>
                        <div class="container__header-heading">
                            <h5 style="text-align: center">PHI???U ????NH GI?? K???T QU??? R??N LUY???N CHO SINH VI??N</h5>
                            <p style="text-align: center; font-style: italic;">(Ban h??nh k??m theo Quy???t ?????nh s???: 148 /Q??-M??C ng??y 05 th??ng 3 n??m 2021)</p>
                        </div>
                        <div class="container__header-info">
                            <div class="row">
                                <div class="col-lg-6">H??? t??n: <?= $row['name']?></div>
                                <div class="col-lg-6">M?? s??? SV: <?=$maSv?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">L???p:<?=$row['class_name']?></div>
                                <div class="col-lg-2">Kho??: <?=$row['course_name']?></div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-6">Khoa: <?=$row['department_name']?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">H???c k???: <?=$hkItem['semester']?></div>    
                                <div class="col-lg-6">N??m h???c: <?=$hkItem['year']?></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="container__content">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th class="textCenter" style="width: 70%">N???i dung ????nh gi??</th>
                                    <th class="textCenter" style="width: 10%">??i???m do SV t??? ????nh gi??</th>
                                    <?php
                                        if($check == 2){
                                            echo '                                            
                                            <th class="textCenter" style="width: 10%">??i???m do l???p ????nh gi??</th>
                                            ';
                                        }
                                        if($check == 3){
                                            echo '                                            
                                            <th class="textCenter" style="width: 10%">??i???m do l???p ????nh gi??</th>
                                            <th class="textCenter" style="width: 10%">??i???m do h???i ?????ng Khoa ????nh gi??</th>
                                            ';
                                        }
                                    ?>
                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold">I. <u>????nh gi?? v??? ?? th???c v?? k???t qu??? h???c t???p</u></span> <span style="font-style: italic;">(T??nh ??i???m thi l???n 1. T???ng ??i???m: 0 - 30 ??i???m)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Ph???n c???ng ??i???m</span> (t???ng ??i???m c?? th??? ch???m qu?? 30 khi SV ?????t gi???i NCKH, thi Olimpic c???p B??? ho???c c???p Qu???c gia)</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                    a). K???t qu??? h???c t???p:
                                    <br> - ??i???m TBCHT ??? 3,6: ..............................................................?????????.......(+20??)
                                    <br> - ??i???m TBCHT t??? 3,2 ?????n 3,59: ............................................................(+18)
                                    <br> - ??i???m TBCHT t??? 2,5 ?????n 3,19: ...........................................................(+16??)
                                    <br> - ??i???m TBCHT t??? 2,0 ?????n 2,49: ..........................................................(+12??)
                                    <br> - ??i???m TBCHT t??? 1,5 ?????n 1,99: ..........................................................(+10??)
                                    <br> - ??i???m TBCHT t??? 1,0 ?????n 1,49: ............................................................(+8??)

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
                                        b). Nghi??n c???u khoa h???c, thi Olympic, Robocon v?? c??c cu???c thi kh??c:
                                        <span>(c???ng ??i???m th?????ng theo Q?? s??? 1171/Q??-M??C ng??y 12/11/2020 v??? qu???n l?? KHCN c???a tr?????ng ?????i h???c M???-?????a ch???t)*</span>
                                        <br>
                                        <br> - ?????t gi???i NCKH c???p B??? v?? gi???i t????ng ??????ng t???i ??a??????????????????..???.(+8??)
                                        <br> - ?????t gi???i NCKH c???p Tr?????ng, Ti???u ban chuy??n m??n t???i ??a: ?????????..... (+6??)
                                        <br> - ?????t gi???i NCKH kh??c t???i ??a: ??????....???????????????..???????????????...??????.(+6??)
                                        <br> - ?????t gi???i Olympic c???p Qu???c gia t???i ??a: ?????????...????????????????????????.(+10??)
                                        <br> - Tham gia Olympic c???p Qu???c gia t???i ??a: ?????????...?????? ..?????????.???....(+6??)
                                        <br> - ?????t gi???i Olympic c???p Tr?????ng t???i ??a: ???........................................................(+5??)
                                        <br> - Tham gia Olympic c???p Tr?????ng t???i ??a: ?????????...?????????. ??????.............(+2??)
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
                                        c) Vi???c th???c hi???n n???i quy h???c t???p, quy ch??? thi, ki???m tra
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        - Kh??ng vi ph???m quy ch??? thi, ki???m tra:?????????????????????.????????????.......(+3??)
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
                                        - ??i h???c ?????y ?????, ????ng gi???: ?????????????????????.......................????????????....(+2??)
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
                                        <p><span style="font-weight: bold; font-style: italic;">2. Ph???n tr??? ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>

                                    <td width="70%">
                                        a). ???? ????ng k??, nh??ng b??? kh??ng tham tham gia nghi??n c???u khoa h???c, thi Olympic, Robocon v?? c??c cu???c thi kh??c t????ng ??????ng: ........................ (-15??)</td>                    
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
                                        b). Kh??ng ??i h???c, ??i kh??ng ????ng gi???: .??????????????????...?????????......(-2??/bu???i)
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
                                                <h5>C???ng m???c I</h5>
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
                                                <h5>C???ng m???c I</h5>
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
                                                <h5>C???ng m???c I</h5>
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
                                        <p><span style="font-weight: bold">II.<u>????nh gi?? v??? ?? th???c v?? k???t qu??? ch???p h??nh n???i quy, quy ch??? c???a Tr?????ng</u></span> <span style="font-style: italic;">(T???ng ??i???m: 0 - 25 ??i???m)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Ph???n c???ng ??i???m</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">a). Ch???p h??nh t???t n???i quy, quy ch??? c???a Tr?????ng, kh??ng vi ph???m k??? lu???t???.(+10??)</td>
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
                                        b). K???t qu??? h???c t???p Tu???n sinh ho???t c??ng d??n sinh vi??n
                                       <br> ??i???m l???n 1 ??? 90:??????????????????...........................................................(+15??)
                                       <br> ??i???m l???n 1 t??? 65 ?????n 89 ??i???m:???...................................................(+10??)
                                       <br> ??i???m l???n 1 t??? 50 ?????n 65 ??i???m:???.....................................................(+5??)

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
                                        <p><span style="font-weight: bold; font-style: italic;">2. Ph???n tr??? ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">a). Kh??ng tham gia h???c t???p ?????y ?????, nghi??m t??c ngh??? quy???t, n???i quy, quy ch???, tu???n sinh ho???t c??ng d??n sinh vi??n:..???....................................................(-10??)</td>     
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
                                        b). Kh??ng ??eo th??? sinh vi??n trong khu??n vi??n Tr?????ng:..............???....(-5??/l???n)
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
                                        c). Kh??ng tham gia c??c bu???i sinh ho???t l???p, h???p, h???i ngh???, giao ban, t???p hu???n v?? c??c ho???t ?????ng kh??c khi Nh?? tr?????ng y??u c???u:..................................(-5??/l???n)
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
                                        d). ????ng h???c ph?? kh??ng ????ng quy ?????nh trong h???c k???:???.........................(-10??)
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
                                                <h5>C???ng m???c II</h5>
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
                                                <h5>C???ng m???c II</h5>
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
                                                <h5>C???ng m???c II</h5>
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
                                        <p><span style="font-weight: bold">III.<u> ????nh gi?? v??? ?? th???c v?? k???t qu??? tham gia c??c ho???t ?????ng ch??nh tr???, x?? h???i, v??n ho??, v??n ngh???, th??? thao, ph??ng ch???ng c??c t??? n???n x?? h???i</u></span> <span style="font-style: italic;">(T???ng ??i???m: 0 - 20 ??i???m)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Ph???n c???ng ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        a). Tham gia ?????y ????? c??c ho???t ?????ng, sinh ho???t do Tr?????ng, Khoa, L???p, ??o??n TN, H???i SV t??? ch???c:......................................................................??????.(+13??)
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
                                        b). C?? th??nh t??ch ho???t ?????ng ch??nh tr???, x?? h???i, v??n ho??, v??n ngh???, th??? thao, ??o??n th??? v?? ?????u tranh ph??ng ch???ng c??c t??? n???n x?? h???i ???????c tuy??n d????ng, khen th?????ng (l???y m???c khen th?????ng cao nh???t):
                                        <br> - C???p Tr?????ng: ???????????????????????????.??????????????????.???????????????...??? (+3??)
                                        <br> - C???p t???nh, th??nh ph??? tr??? l??n:??????...??????...??????????????????..................... (+5??)
                                    
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
                                        c). Tham gia c??c ho???t ?????ng t?? v???n tuy???n sinh (c?? x??c nh???n c???a ph??ng QHCC&DN):????????????????????????????????????????????????( +2??/l???n)
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
                                        <p><span style="font-weight: bold; font-style: italic;">2. Ph???n tr??? ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Kh??ng tham gia ho???t ?????ng, sinh ho???t khi ???????c ph??n c??ng: ?????????.(-5??/l???n)</td>     
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
                                        - Vi ph???m Quy ?????nh v??? v??n ho?? h???c ???????ng cho sinh vi??n:.................(-5??/l???n)
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
                                                <h5>C???ng m???c III</h5>
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
                                                <h5>C???ng m???c III</h5>
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
                                                <h5>C???ng m???c III</h5>
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
                                        <p><span style="font-weight: bold">IV.<u> ????nh gi?? v??? ph???m ch???t c??ng d??n v?? quan h??? c??ng ?????ng </u></span> <span style="font-style: italic;">(T???ng ??i???m: 0 - 15 ??i???m)</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Ph???n c???ng ??i???m</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                    a). T??ch c???c tham gia h???c t???p, t??m hi???u v?? ch???p h??nh t???t ch??? tr????ng c???a ?????ng, ch??nh s??ch, ph??p lu???t c???a Nh?? n?????c:???.........................................(+10??)
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
                                    b). T??ch c???c tham gia c??c ho???t ?????ng nh??n ?????o, t??? thi???n v?? c???ng ?????ng; phong tr??o thanh ni??n t??nh nguy???n; phong tr??o gi??p ????? nh??n d??n v?? b???n b?? khi g???p thi??n tai, kh?? kh??n, ho???n n???n:...................................................................(+5??)
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
                                        <p><span style="font-weight: bold; font-style: italic;">2. Ph???n tr??? ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- G??y m???t ??o??n k???t trong t???p th??? l???p:........................................................(-5??)</td>     
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
                                        - Kh??ng ????ng BHYT ????ng h???n: .............................................................(-20??)
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
                                                <h5>C???ng m???c IV</h5>
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
                                                <h5>C???ng m???c IV</h5>
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
                                                <h5>C???ng m???c IV</h5>
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
                                        <p><span style="font-weight: bold">V.<u>????nh gi?? v??? ?? th???c v?? k???t qu??? tham gia ph??? tr??ch l???p, c??c ??o??n th??? t??? ch???c kh??c trong Tr?????ng</u></span> <span style="font-style: italic;">(T???ng ??i???m: 0 - 10 ??i???m)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if($check == 1) {echo '2';} if($check == 2) {echo '3';} if($check == 3) {echo '4';}?>">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Ph???n c???ng ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1">a). L?? th??nh vi??n Ban c??n s??? l???p qu???n l?? sinh vi??n, c??n b??? ??o??n TN, H???i SV ho??n th??nh nhi???m v???:
                                        <br> - L???p tr?????ng, Ph?? B?? th?? Li??n chi, B?? th?? Chi ??o??n:???..??????.................(+7??)
                                        <br> - L???p ph??, Ph?? B?? th?? Chi ??o??n, H???i tr?????ng H???i SV:........????????????......(+5??)

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
                                    b). ???????c c??c c???p khen th?????ng: ....???.................???.................?????????......(+3??)
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
                                        <p><span style="font-weight: bold; font-style: italic;">2. Ph???n tr??? ??i???m</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- L?? th??nh vi??n Ban c??n s??? l???p qu???n l?? sinh vi??n, l???p h???c ph???n; c??n b??? ??o??n TN, H???i SV thi???u tr??ch nhi???m v???i t???p th??? l???p:...................................(-5??/l???n)</td>     
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
                                                <h5>C???ng m???c V</h5>
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
                                                <h5>C???ng m???c V</h5>
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
                                                <h5>C???ng m???c V</h5>
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
                                        <h5 style="color: red">T???ng: </h5>
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
                        <button class="btn_hidden btn btn-danger">???n</button>
                        
                    </div>
                    
                </div>
                <?php
                    if($check == '3'){
                        echo '
                        <a href="exploreFile.php?maHK='.$maHK.'" target="_blank"><button class="btn btn-warning mb-2">Xu???t File</button></a>
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
                    btnDetail.innerText = '???n Chi ti???t';
                }
                else{
                    tableMark.style.display = 'none';
                    btnDetail.innerText = 'Xem Chi Ti???t';

                }
            }

            btnHidden.onclick = function(){
                tableMark.style.display = 'none';
                btnDetail.innerText = 'Hi???n Chi ti???t';
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