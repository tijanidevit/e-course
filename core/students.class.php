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

        ###### student's Assignment_submissions
        function student_assignments_num($student_id){
            return DB::num_row("SELECT id FROM assignment_submissions WHERE student_id = ? ",[$student_id]);
        }

        function fetch_student_assignment_submissions($student_id){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            JOIN assignments on assignments.id = assignment_submissions.assignment_id
            JOIN courses on courses.id = assignments.course_id
            WHERE assignment_submissions.student_id = ?
            ORDER BY assignment_submissions.id DESC ",[$student_id]);
        }

        function fetch_limited_student_assignment_submissions($student_id,$limit){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            JOIN assignments on assignments.id = assignment_submissions.assignment_id
            JOIN courses on courses.id = assignments.course_id
            WHERE assignment_submissions.student_id = ?
            ORDER BY assignment_submissions.id DESC LIMIT $limit",[$student_id]);
        }


        function fetch_limited_graded_assignment_submissions($student_id,$limit){
            return DB::fetchAll("SELECT *,assignment_submissions.id,assignment_submissions.created_at FROM assignment_submissions
            LEFT OUTER JOIN assignments on assignments.id = assignment_submissions.assignment_id
            LEFT OUTER JOIN lecturers on lecturers.id = assignments.lecturer_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            WHERE feedback <> '' AND student_id = ? 
            ORDER BY assignment_submissions.id DESC LIMIT $limit", [$student_id]);
        }

        function fetch_limited_ungraded_assignment_submissions($student_id,$limit){
            return DB::fetchAll("SELECT *,assignment_submissions.id,assignment_submissions.created_at FROM assignment_submissions
            LEFT OUTER JOIN assignments on assignments.id = assignment_submissions.assignment_id
            LEFT OUTER JOIN lecturers on lecturers.id = assignments.lecturer_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            WHERE feedback = '' AND student_id = ?  
            ORDER BY assignment_submissions.id DESC LIMIT $limit", [$student_id]);
        }
    }
?>