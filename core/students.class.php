<?php
    include_once 'db.class.php';

    class Students extends DB{

        function register($fullname,$gender,$picture,$email,$password){
            return DB::execute("INSERT INTO students(fullname,gender,picture,email,password) VALUES(?,?,?,?,?)", [$fullname,$gender,$picture,$email,$password]);
        }
        
        function fetch_students(){
            return DB::fetchAll("SELECT * FROM students ORDER BY fullname ASC",[]);
        }

        function fetch_student($email){
            return DB::fetch("SELECT * FROM students WHERE email = ? OR id = ?",[$email,$email] );
        }

        function update_student($fullname,$gender,$picture,$email,$id){
            return DB::execute("UPDATE students SET fullname =?, gender =?, picture =?, email =?, password =? WHERE id = ? ", [$fullname,$gender,$picture,$email,$id]);
        }
        
        function update_password($password,$id){
            return DB::execute("UPDATE students SET password =? WHERE id = ? ", [$password,$id]);
        }

        function students_num(){
            return DB::num_row("SELECT id FROM students ", []);
        }

        function check_email_existence($email){
            return DB::num_row("SELECT id FROM students WHERE email = ? ", [$email]);
        }

        function login($email,$password){
            if (DB::num_row("SELECT id FROM students WHERE email = ? AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        ###### student's course_enrollments
        function student_courses_num($student_id){
            return DB::num_row("SELECT id FROM course_enrollments WHERE student_id = ? ",[$student_id]);
        }

        function fetch_enrolled_courses($student_id){
            return DB::fetchAll("SELECT *,course_enrollments.id FROM course_enrollments
            JOIN courses on courses.id = course_enrollments.course_id
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE course_enrollments.student_id = ?  AND course_enrollments.complete_status = 0
            ORDER BY course_enrollments.id DESC ",[$student_id]);
        }

        function fetch_limited_enrolled_courses($student_id,$limit){
            return DB::fetchAll("SELECT *,course_enrollments.id FROM course_enrollments
            JOIN courses on courses.id = course_enrollments.course_id
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE course_enrollments.student_id = ?  AND course_enrollments.complete_status = 0 
            ORDER BY course_enrollments.id DESC LIMIT $limit",[$student_id]);
        }


        function fetch_completed_courses($student_id){
            return DB::fetchAll("SELECT *,course_enrollments.id FROM course_enrollments
            JOIN courses on courses.id = course_enrollments.course_id
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE course_enrollments.student_id = ? AND course_enrollments.complete_status = 1
            ORDER BY course_enrollments.id DESC ",[$student_id]);
        }

        function fetch_limited_completed_courses($student_id,$limit){
            return DB::fetchAll("SELECT *,course_enrollments.id FROM course_enrollments
            JOIN courses on courses.id = course_enrollments.course_id
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE course_enrollments.student_id = ? AND course_enrollments.complete_status = 1 
            ORDER BY course_enrollments.id DESC LIMIT $limit",[$student_id]);
        }




        ###### student's course_enrollments
        function student_certificates_num($student_id){
            return DB::num_row("SELECT id FROM certificates WHERE student_id = ? ",[$student_id]);
        }

        function check_student_certificate($student_id,$course_id){
            return DB::num_row("SELECT id FROM certificates WHERE student_id = ? AND course_id = ? ",[$student_id,$course_id]);
        }

        function save_certificate($student_id,$course_id){
            return DB::execute("INSERT INTO certificates (student_id,course_id) VALUES (?,?) ",[$student_id,$course_id]);
        }

        function fetch_student_certificates($student_id){
            return DB::fetchAll("SELECT *,certificates.id, certificates.created_at FROM certificates
            JOIN courses on courses.id = certificates.course_id
            WHERE student_id = ?
            ORDER BY certificates.id DESC ",[$student_id]);
        }

        function fetch_student_course_certificates($student_id,$course_id){
            return DB::fetch("SELECT *,certificates.id, certificates.created_at FROM certificates
            WHERE student_id = ? AND course_id = ?
            ORDER BY certificates.id DESC ",[$student_id,$course_id]);
        }

        function fetch_limited_student_certificates($student_id){
            return DB::fetchAll("SELECT *,certificates.id, certificates.created_at FROM certificates
            JOIN courses on courses.id = certificates.course_id
            WHERE student_id = ?
            ORDER BY certificates.id DESC ",[$student_id]);
        }

        function save_exam($student_id,$course_id,$score){
            return DB::execute("INSERT INTO student_exams (student_id,course_id,score) VALUES (?,?,?) ",[$student_id,$course_id,$score]);
        }

        function fetch_student_exams($student_id){
            return DB::fetchAll("SELECT *,student_exams.id FROM student_exams
            JOIN courses on courses.id = student_exams.course_id
            WHERE student_id = ?
            ORDER BY student_exams.id DESC ",[$student_id]);
        }



    }
?>