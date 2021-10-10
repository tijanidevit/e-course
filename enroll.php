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

$check_enrollment = $course_obj->check_course_enrollment($course_id,$student_id);

set_flash('response', displayWarning('You have enrolled for this course before'));
if (! $check_enrollment) {
	$course_enrollment = $course_obj->enroll_course($course_id,$student_id);
	set_flash('response', displayWarning('Course enrolled successfully!'));
}

header('location: course-details?course='.$course_id);

?>