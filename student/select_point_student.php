<?php
$role_name = '';
if($level_point == '0'){
    $msg = 'ĐIỂM RÈN LUYỆN KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1";
    // echo $sql_student_point;
    // exit;
}

if($level_point == '1'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Xuất Sắc -'. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >= 90";
}

if($level_point == '2'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Giỏi -'. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv 
                        and students.role_id = role.id
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >=  80
                        and point.point_teacher <= 89
                        ";
}

if($level_point == '3'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Khá - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv 
                        and students.role_id = role.id
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >= 70
                        and point.point_teacher <= 79
                        ";
}

if($level_point == '4'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Trung Bình - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >= 50
                        and point.point_teacher <= 59

                        ";
}

if($level_point == '9'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Trung Bình Khá - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >= 60
                        and point.point_teacher <= 69

                        ";
}

if($level_point == '7'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Yếu - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >= 30
                        and point.point_teacher <= 49

                        ";
}

if($level_point == '8'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN Kém - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        
                        and point.point_teacher <= 29

                        ";
}

if($level_point == '5'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN KHÁ - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher >= 70
                        ";
}

if($level_point == '6'){
    $msg = 'DANH SÁCH SINH VIÊN CÓ ĐIỂM RÈN LUYỆN KÉM - '. $sql_semester_item['name'];
    $sql_student_point= "select students.*, point.*, point_teacher.*, role.name as role_name 
                        from students, semester, point, point_teacher, role 
                        where 
                        students.maSv = point.maSv
                        and students.role_id = role.id 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK' 
                        and point.status_teacher = 1
                        and point.point_teacher <= 49
                        ";
}
?>