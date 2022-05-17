<?php
$role_name = '';
if($maKhoaHoc == '0'){
    // Lấy tất cả các lớp
    if($level_point == '0'){
        $msg = 'ĐIỂM RÈN LUYỆN KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point, 
            role 
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop 
            and
            students.role_id = role.id
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
        ";

        
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '1'){
    $msg = 'ĐIỂM RÈN LUYỆN XUẤT SẮC Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 90
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '2'){
    $msg = 'ĐIỂM RÈN LUYỆN GIỎI Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 80
            and
            point.point_teacher <= 89
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '3'){
        $msg = 'ĐIỂM RÈN LUYỆN KHÁ Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 70
            and
            point.point_teacher <= 79
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '4'){
        $msg = 'ĐIỂM RÈN LUYỆN TRUNG BÌNH Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 50
            and
            point.point_teacher <= 59
            
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '9'){
        $msg = 'ĐIỂM RÈN LUYỆN TRUNG BÌNH KHÁ Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 60
            and
            point.point_teacher <= 69
            
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '5'){
        $msg = 'ĐIỂM RÈN LUYỆN TRÊN 70 Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 70
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '6'){
        $msg = 'ĐIỂM RÈN LUYỆN < 50 Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher <= 49
        ";
        // var_dump($sql_student_point);
        // exit;
       
        
    }

    if($level_point == '7'){
        $msg = 'ĐIỂM RÈN LUYỆN YẾU Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher >= 30
            and
            point.point_teacher <= 49
        ";
        // var_dump($sql_student_point);
        // exit;
        // $sql_student_point_run = $connect->query($sql_student_point);
       
        
    }

    if($level_point == '8'){
        $msg = 'ĐIỂM RÈN LUYỆN KÉM Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role 
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and 
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and
            point.point_teacher <= 29
            
        ";
        // var_dump($sql_student_point);
        // exit;
       
        
    }

    $sql_count_point = "
            SELECT COUNT(point.maSv) as count_student
            from 
                students, class, point_teacher, department, course, semester, point 
            where 
                department.maKhoa = class.maKhoa 
                and students.maLop = class.maLop 
                and class.maKhoaHoc = course.maKhoaHoc 
                and students.maSv = point_teacher.maSv 
                and students.maSv = point.maSv 
                and semester.maHK = point.maHK 
                and department.maKhoa = '$maKhoa' 
                and semester.maHK = '$maHK' 
                
        ";
}

// Theo khóa
else{
    $sql_course = "select * from course where maKhoaHoc = '$maKhoaHoc'";
    $sql_course_run = $connect->query($sql_course);
    if($sql_course_run->num_rows > 0){
        $sql_course_item = $sql_course_run->fetch_assoc();
        $course_name = $sql_course_item['name'];
        // var_dump($course_name);
        // exit;
    }
    // var_dump($sql_course_run);
    // exit;
    if($level_point == '0'){
        $msg = 'ĐIỂM RÈN LUYỆN '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
        ";
        
        
    }

    if($level_point == '1'){
        $msg = 'ĐIỂM RÈN LUYỆN XUất sắc '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 90
        ";
        
    }

    if($level_point == '2'){
        $msg = 'ĐIỂM RÈN LUYỆN Giỏi '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 80
            and
            point.point_teacher <= 89
        ";
        
    }

    if($level_point == '3'){
        $msg = 'ĐIỂM RÈN LUYỆN Khá '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 70
            and
            point.point_teacher <= 79
        ";
        
    }

    if($level_point == '4'){
        $msg = 'ĐIỂM RÈN LUYỆN Trung Bình '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 50
            and
            point.point_teacher <= 59
        ";
        
    }

    if($level_point == '9'){
        $msg = 'ĐIỂM RÈN LUYỆN Trung Bình Khá '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 60
            and
            point.point_teacher <= 69
        ";
        
    }

    if($level_point == '5'){
        $msg = 'ĐIỂM RÈN LUYỆN >= 70 '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 70
        ";
        
    }

    if($level_point == '6'){
        $msg = 'ĐIỂM RÈN LUYỆN < 50 '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher <= 49
        ";
        
    }

    if($level_point == '7'){
        $msg = 'ĐIỂM RÈN LUYỆN Yếu '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop
            and
            students.role_id = role.id 
            and 
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher >= 30
            and
            point.point_teacher <= 49
        ";
        
    }

    if($level_point == '8'){
        $msg = 'ĐIỂM RÈN LUYỆN Kém '.$course_name.' Của KHOA '.$sql_department_item['name'] .'-'. $sql_semester_item['name'];

        $sql_student_point = "
        SELECT 
            students.*, 
            class.class_name, 
            point_teacher.*, 
            point.*,
            role.name as role_name 
        from 
            students, 
            class, 
            point_teacher, 
            department, 
            course, 
            semester, 
            point,
            role  
        where 
            department.maKhoa = class.maKhoa 
            and 
            students.maLop = class.maLop 
            and 
            students.role_id = role.id
            and
            class.maKhoaHoc = course.maKhoaHoc 
            and 
            students.maSv = point_teacher.maSv 
            and 
            students.maSv = point.maSv
            and 
            semester.maHK = point.maHK
            and
            department.maKhoa = '$maKhoa' 
            and 
            semester.maHK = '$maHK' 
            and 
            course.maKhoaHoc = '$maKhoaHoc'
            and
            point.point_teacher <= 29
        ";
        
    }

    $sql_count_point = "
            SELECT COUNT(point.maSv) as count_student
            from 
                students, class, point_teacher, department, course, semester, point 
            where 
                department.maKhoa = class.maKhoa 
                and students.maLop = class.maLop 
                and class.maKhoaHoc = course.maKhoaHoc 
                and students.maSv = point_teacher.maSv 
                and students.maSv = point.maSv 
                and semester.maHK = point.maHK 
                and department.maKhoa = '$maKhoa' 
                and semester.maHK = '$maHK' 
                and course.maKhoaHoc = '$maKhoaHoc'
        ";
}
?>