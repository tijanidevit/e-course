<?php 
session_start();    
if (!isset($_SESSION['ecour_student'])) {
  header('location: ./');
  exit();
}
    
if (!isset($_GET['id'])) {
  header('location: courses');
  exit();
}

$student = $_SESSION['ecour_student'];
$student_id = $student['id'];
$course_id = $_GET['id'];

include_once 'core/courses.class.php';
include_once 'core/exams.class.php';
include_once 'core/core.function.php';

$course_obj = new Courses();
$exam_obj = new Exams();

$course = $course_obj->fetch_course($course_id);
$exam = $course_obj->fetch_course_exam($course_id);

$exam_id = $exam['id'];

$exam_questions = $exam_obj->fetch_exam_questions($exam_id);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecour -Assessment</title>
    <?php include "includes/style-resources.php"; ?>
</head>

<body>

    <div class="preloader js-preloader">
        <img src="assets/img/preloader.gif" alt="Image">
    </div>


    <div class="page-wrapper">
        <?php include "includes/auth_header.php"; ?>

        <section class="breadcrumb-wrap bg-f br-bg-2">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                        <div class="breadcrumb-title">
                            <h2>Course Assessment</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="./">Home </a></li>
                                <li><a href="./course-details?course=<?php echo $course_id ?>"><?php echo $course['course_title'] ?> </a></li>
                                <li><?php echo $exam['title'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="course-details-wrap ptb-100">
            <div class="container">

                <div class="tab-content course-tab-content">
                    <form id="examForm" method="post">
                        
                        <?php $sn = 1; foreach ($exam_questions as $question): $question_id = $question['id']; ?>
                            <div class="form-group">
                                <label for=""> <?php echo $sn++ .'. '. $question['question'] ?></label>
                                <select name="q<?php echo $question_id ?>" id="" class="form-control">
                                    <option disabled selected>Select</option>
                                    <?php                                        
                                        $question_options = $exam_obj->fetch_question_options($question_id);
                                        foreach ($question_options as $option): 
                                    ?>
                                        <option value="<?php echo $option['is_answer'] ?>"><?php echo $option['option'] ?></option>
                                    <?php endforeach ?>
                                    
                                </select>
                            </div>
                        <?php endforeach ?>

                        <div class="text-center">
                            <button class="btn v1" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <?php include "includes/footer.php"; ?>
    </div>


    <a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>


    <?php include "includes/script-resources.php"; ?>
</body>

</html>