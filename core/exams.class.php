<?php
    include_once 'db.class.php';

    class exams extends DB{

        function add_exam($course_id,$title,$description){
            return DB::execute("INSERT INTO exams(course_id,title,description) VALUES(?,?,?)", [$course_id,$title,$description]);
        }
        function fetch_exams(){
            return DB::fetchAll("SELECT * FROM exams",[]);
        }
        function fetch_limited_exams($limit){
            return DB::fetchAll("SELECT * FROM exam LIMIT $limit ",[]);
        }
        function fetch_exam($id){
            return DB::fetch("SELECT * FROM exams WHERE exams.id = ? ",[$id] );
        }

        function delete_exam($id){
            return DB::execute("DELETE FROM exams WHERE id = ? ",[$id] );
        }

        function update_exam($exam,$id){
            return DB::execute("UPDATE exams SET exam = ?  WHERE id = ? ", [$exam,$id]);
        }

        function exams_num(){
            return DB::num_row("SELECT id FROM exams ", []);
        }


        function check_exam_existence($exam){
            if (DB::num_row("SELECT id FROM exams WHERE title
            ss = ?", [$exam]) > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function check_edit_exam_existence($exam,$id){
            if (DB::num_row("SELECT id FROM exams WHERE exam = ? AND id <> ? ", [$exam,$id]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        function fetch_exam_questions($exam_id){
            return DB::fetchAll("SELECT * FROM exam_questions WHERE exam_id = ? ",[$exam_id]);
        }

        function exam_questions_num($exam_id){
            return DB::num_row("SELECT id FROM exam_questions WHERE exam_id = ?",[$exam_id]);
        }


        function fetch_question_options($question_id){
            return DB::fetchAll("SELECT * FROM question_options WHERE question_id = ? ",[$question_id]);
        }

    
    }
?>