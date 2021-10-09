<?php 
include_once '../core/session.class.php';
include_once '../core/students.class.php';
include_once '../core/core.function.php';

$session = new Session();
$student_obj = new students();

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	if (! $student_obj->check_email_existence($email)) {
		if ($student_obj->register($fullname,$gender,$picture,$email,$password)($email,$password)) {
			$student = $student_obj->fetch_student($email);
			$session->create_session('ecour_student',$student);
			echo 1;
		}
		else{
			echo displayWarning('Invalid Password');
		}
	}
	else{
		echo displayWarning('Email address already used');
	}
}

else{
	echo "No input made";
}
?>