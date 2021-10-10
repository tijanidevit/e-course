<?php 
session_start();    
if (!isset($_SESSION['ecour_student'])) {
  header('location: ./');
  exit();
}
    
if (!isset($_GET['course'])) {
  header('location: courses');
  exit();
}

include_once 'core/courses.class.php';
include_once 'core/core.function.php';

$student = $_SESSION['ecour_student'];
$course_id = $_GET['course'];
$student_id = $student['id'];

$course_obj = new Courses();
$course = $course_obj->fetch_course($course_id);

$course_enrollment = $course_obj->enroll_course($course_id,$student_id);
?>