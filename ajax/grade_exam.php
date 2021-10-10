<?php 
include_once '../core/session.class.php';
include_once '../core/students.class.php';
include_once '../core/exams.class.php';
include_once '../core/core.function.php';

$session = new Session();
$student_obj = new students();
$exam_obj = new exams();

if (isset($_POST['q0'])) {
	$q0 = $_POST['q0'];

	$total_questions = $_POST['total_questions'];

	$score = 0;

	for ($i=0; $i <= $total_questions ; $i++) { 
		if ($_POST['q'.$i] == 1) {
			$score += 1;
		}
	}

	echo $score .'<br />';

	$needed_score = floor((70/100) * $total_questions+1);

	echo $needed_score;

	if ($score >= $needed_score) {
		
	}


	// $password = md5($_POST['password']);

	// if ($student_obj->check_q0_existence($q0)) {
	// 	if ($student_obj->login($q0,$password)) {
	// 		$student = $student_obj->fetch_student($q0);
	// 		$session->create_session('ecour_student',$student);
	// 		echo 1;
	// 	}
	// 	else{
	// 		echo displayWarning('Invalid Password');
	// 	}
	// }
	// else{
	// 	echo displayWarning('q0 address not recognised');
	// }
}

else{
	echo "No input made";
}
?>