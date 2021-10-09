<?php 
session_start();    
if (!isset($_SESSION['ecour_student'])) {
  header('location: ./');
  exit();
}

$student = $_SESSION['ecour_student'];
$student_id = $student['id'];

include_once 'core/students.class.php';

$student_obj = new Students();

$enrolled_courses = $student_obj->fetch_limited_enrolled_courses($student_id,8);
$completed_courses = $student_obj->fetch_limited_completed_courses($student_id,8);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecour - Education Courses</title>
    <?php include "includes/style-resources.php"; ?>
</head>

<body>

    <div class="preloader js-preloader">
        <img src="assets/img/preloader.gif" alt="Image">
    </div>


    <div class="page-wrapper">
        <?php include "includes/auth_header.php"; ?>


        <section class="project-wrap pt-100 pb-80">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title style1 text-center mb-40">
                            <h2>Ongoing Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <?php if (empty($enrolled_courses)): ?>
                        <div class="alert alert-info"> You have not enrolled for any courses yet! Browse free courses <a href="courses">here</a> </div>
                    <?php endif ?>
                    <?php foreach ($enrolled_courses as $course): ?>                        
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="course-card style1">
                                <div class="course-img">
                                    <a href="./course-details?course=<?php echo $course['course_id'] ?>"><img src="uploads/courses/<?php echo $course['image'] ?>" alt="Image"></a>
                                </div>
                                <div class="course-info">
                                    <h3><a href="./course-details?course=<?php echo $course['course_id'] ?>"><?php echo $course['course_title'] ?></a></h3>
                                    <div class="course-rating">
                                        <ul>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                        </ul>
                                        <span>5 star</span>
                                    </div>
                                    <p><?php echo substr($course['course_title'], 0, 90) ?> </p>
                                </div>
                            </div>
                        </div>                    
                    <?php endforeach ?>
                </div>
            </div>
        </section>


        <section class="project-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title style1 text-center mb-40">
                            <h2>Completed Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                     <?php if (empty($completed_courses)): ?>
                        <div class="alert alert-info"> Rush up your ongoing courses and they will appear here! Browse free courses <a href="courses">here</a> </div>
                    <?php endif ?>
                    <?php foreach ($completed_courses as $course): ?>                        
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="course-card style1">
                                <div class="course-img">
                                    <a href="./course-details?course=<?php echo $course['course_id'] ?>"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                                </div>
                                <div class="course-info">
                                    <h3><a href="./course-details?course=<?php echo $course['course_id'] ?>"><?php echo $course['course_title'] ?></a></h3>
                                    <div class="course-rating">
                                        <ul>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                            <li> <i class="ri-star-fill"></i></li>
                                        </ul>
                                        <span>5 star</span>
                                    </div>
                                    <p><?php echo substr($course['course_title'], 0, 90) ?> </p>
                                </div>
                            </div>
                        </div>                    
                    <?php endforeach ?>
                </div>
            </div>
        </section>

        <?php include "includes/footer.php"; ?>
    </div>


    <a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>


    <?php include "includes/script-resources.php"; ?>
</body>

</html>