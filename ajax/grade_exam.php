<?php 
include_once '../core/session.class.php';
include_once '../core/students.class.php';
include_once '../core/exams.class.php';
include_once '../core/core.function.php';

$session = new Session();
$student_obj = new students();
$exam_obj = new exams();

$student = $_SESSION['ecour_student'];
$student_id = $student['id'];

if (isset($_POST['q0'])) {
	$q0 = $_POST['q0'];

	$total_questions = $_POST['total_questions'];
	$course_id = $_POST['course_id'];

	$score = 0;

	for ($i=0; $i <= $total_questions ; $i++) { 
		if ($_POST['q'.$i] == 1) {
			$score += 1;
		}
	}

	$needed_score =  ((70/100) * $total_questions+1);

	$student_obj->save_exam($student_id,$course_id,$score);

	if (!$student_obj->check_student_certificate($student_id,$course_id)) {
		if ($score >= $needed_score) {
			$student_obj->save_certificate($student_id,$course_id);

			$message = displaySuccess('You scored '.$score.' and have successfully passed the assessment. Your certificate will be loaded soon');
			$status = true;
			
		}
		else{
			$message = displaySuccess('You scored '.$score.' and will need to score '.ceil($needed_score).' to pass this course');
			$status = true;
		}		
	}
	else{
		$message = displayWarning('You scored '.$score.'. You have already passed this course');
		$status = false;
	}

	echo $message;
}

else{
	echo "No input made";
}
?>