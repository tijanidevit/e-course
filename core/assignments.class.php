<?php
    include_once 'db.class.php';

    class assignments extends DB{

        function add_assignment($course_id,$lecturer_id,$title,$question,$instructions,$deadline,$max_grade){
            return DB::execute("INSERT INTO assignments(course_id,lecturer_id,title,question,instructions,deadline,max_grade) VALUES(?,?,?,?,?,?,?)", [$course_id,$lecturer_id,$title,$question,$instructions,$deadline,$max_grade]);
        }
        function fetch_assignments(){
            return DB::fetchAll("SELECT *,assignments.id,assignments.created_at FROM assignments
            LEFT OUTER JOIN lecturers on lecturers.id = assignments.lecturer_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            ORDER BY assignments.id DESC ", []);
        }

        function fetch_limited_assignments($limit){
            return DB::fetchAll("SELECT *,assignments.id,assignments.created_at FROM assignments
            LEFT OUTER JOIN lecturers on lecturers.id = assignments.lecturer_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            
            ORDER BY assignments.id DESC LIMIT $limit", []);
        }

        function fetch_assignment($id){
            return DB::fetch("SELECT *,assignments.id,assignments.created_at FROM assignments
            LEFT OUTER JOIN lecturers on lecturers.id = assignments.lecturer_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            WHERE assignments.id = ? ",[$id] );
        }
        function delete_assignment($id){
            return DB::execute("DELETE FROM assignments WHERE id = ? ",[$id] );
        }

        function update_assignment_status($status,$id){
            return DB::execute("UPDATE assignments SET status = ? WHERE id = ? ", [$status,$id]);
        }
       
        function assignments_num(){
            return DB::num_row("SELECT id FROM assignments ", []);
        }

        function fetch_lecturer_assignments($status,$lecturer_id){
            return DB::fetchAll("SELECT *,assignments.id,assignments.created_at FROM assignments
            LEFT OUTER JOIN lecturers on lecturers.id = assignments.lecturer_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            where status = ? and (amount = ? or profit = ?) ORDER BY assignments.id DESC ",[$status,$lecturer_id,$lecturer_id]);
        }

        function fetch_lecturer_last_assignment($lecturer_id){
            return DB::fetch("SELECT id FROM assignments WHERE lecturer_id = ? DESC LIMIT 1 ",[$lecturer_id]);
        }

        function lecturer_assignments_num($status,$lecturer_id){
            return DB::num_row("SELECT id FROM assignments WHERE lecturer_id = ? ",[$lecturer_id]);
        }



        #Assignment Submissions        

        function fetch_graded_assignment_submissions($assignment_id){
            return DB::fetchAll("SELECT *,assignment_submissions.id,assignment_submissions.created_at FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN assignments on assignments.id = assignment_submissions.assignment_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            WHERE feedback <> '' AND assignment_id = ?
            ORDER BY assignment_submissions.id DESC ", [$assignment_id]);
        }     

        function fetch_ungraded_assignment_submissions($assignment_id){
            return DB::fetchAll("SELECT *,assignment_submissions.id,assignment_submissions.created_at FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN assignments on assignments.id = assignment_submissions.assignment_id
            LEFT OUTER JOIN courses on courses.id = assignments.course_id
            WHERE feedback = '' AND assignment_id = ?
            ORDER BY assignment_submissions.id DESC ", [$assignment_id]);
        }

    }
?>