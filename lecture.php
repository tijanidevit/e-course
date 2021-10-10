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

$student = $_SESSION['ecour_student'];
$student_id = $student['id'];
$material_id = $_GET['id'];

include_once 'core/courses.class.php';
include_once 'core/core.function.php';

$course_obj = new Courses();

$course = $course_obj->fetch_course($course_id);
$course_sections = $course_obj->fetch_course_sections($course_id);
$course_enrollments_num = $course_obj->course_enrollments_num($course_id);

$check_enrollment = $course_obj->check_course_enrollment($course_id,$student_id);

$notFound = false;
if (empty($course)) {
    $notFound = true;
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecour - Lecture</title>
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
                            <h2>Lecture</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="./">Home </a></li>
                                <li><a href="./courses">Course </a></li>
                                <li>Lecture</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="course-details-wrap ptb-100">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-12">
                        <div class="course-details">
                            <div class="course-details-img">

                                <div class="promo-video-wrap">
                                    <div class="container">
                                        <div class="prom-dot-shape md-none">
                                            <img src="assets/img/promo/dot-shape-3.png" alt="Image">
                                        </div>
                                        <div class="prom-circle-shape md-none">
                                            <img src="assets/img/promo/promo-circle-shape.svg" alt="Image">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10 offset-lg-1">
                                                <div class="promo-video-bg bg-f promo-bg-1">
                                                    <a class="video-play circle style1" href="https://www.youtube.com/watch?v=xHegpKx61eE"> <i class="ri-play-fill"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <ul class="course-details-meta">
                                <li><i class="las la-clock"></i>4 Hours</li>
                                <li><i class="las la-graduation-cap"></i>45 Students</li>
                                <li><i class="lar la-calendar"></i>26th Jun,2021</li>
                            </ul>
                            <ul class="nav nav-tabs course-tablist" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1" type="button" role="tab">Description</button>
                                </li>

                            </ul>
                            <div class="tab-content course-tab-content">
                                <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                    <h5 class="mt-0">Students Do Not Learn Much Just Sitting in Classes Listening to Teachers Memorizing Prepackaged Assignments.</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .</p>
                                    <h5>What You Will Learn?</h5>
                                    <ul class="course-details-list">
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elitdunt.</li>
                                        <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt.</li>
                                        <li>Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                        <li>Duis ac tellus et risus vulputate vehicula Donec lobortis risus a elit.</li>
                                        <li>Nulla gravida orci a odio nullam varius turpis et commodo pharetra.</li>
                                    </ul>
                                    <h5 class="course-details-title">Requirements</h5>
                                    <ul class="course-details-list">
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elitdunt.</li>
                                        <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt.</li>
                                        <li>Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                        <li>Duis ac tellus et risus vulputate vehicula Donec lobortis risus a elit.</li>
                                        <li>Nulla gravida orci a odio nullam varius turpis et commodo pharetra.</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab_2" role="tabpanel">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Internation Business
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body  lecture-accordion">
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 01</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>20 min</span>
                                                        </div>
                                                    </div>
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 02</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>30 min</span>
                                                        </div>
                                                    </div>
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 03</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>35 min</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Financial Accounting
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body  lecture-accordion">
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 01</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>20 min</span>
                                                        </div>
                                                    </div>
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 02</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>30 min</span>
                                                        </div>
                                                    </div>
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 03</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>35 min</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Business Communication
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body  lecture-accordion">
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 01</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>20 min</span>
                                                        </div>
                                                    </div>
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 02</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>30 min</span>
                                                        </div>
                                                    </div>
                                                    <div class="lecture-item">
                                                        <div class="lecture-name">
                                                            <p><i class="las la-file-alt"></i>Lecture 03</p>
                                                        </div>
                                                        <div class="lecture-time">
                                                            <span>35 min</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="related-course pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title style1 text-center mb-40">
                            <span>Our Popular Course</span>
                            <h2>Related Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="course-card style2">
                            <div class="course-img">
                                <a href="course-details"><img src="assets/img/course/course-9.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <span class="course-price">Free</span>
                                <h3><a href="course-details">Diploma in Teaching skills:
                                        Educators</a></h3>
                                <div class="course-rating">
                                    <ul>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                    </ul>
                                    <span>5 stars</span>
                                </div>
                                <p>Lorem ipsum dolor sit consectetur adipisicing eiusmo tempor </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="course-card style2">
                            <div class="course-img">
                                <a href="course-details"><img src="assets/img/course/course-9.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <span class="course-price">Free</span>
                                <h3><a href="course-details">Diploma in Teaching skills:
                                        Educators</a></h3>
                                <div class="course-rating">
                                    <ul>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                    </ul>
                                    <span>5 stars</span>
                                </div>
                                <p>Lorem ipsum dolor sit consectetur adipisicing eiusmo tempor </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="course-card style2">
                            <div class="course-img">
                                <a href="course-details"><img src="assets/img/course/course-9.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <span class="course-price">Free</span>
                                <h3><a href="course-details">Diploma in Teaching skills:
                                        Educators</a></h3>
                                <div class="course-rating">
                                    <ul>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                        <li> <i class="ri-star-fill"></i></li>
                                    </ul>
                                    <span>5 stars</span>
                                </div>
                                <p>Lorem ipsum dolor sit consectetur adipisicing eiusmo tempor </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <?php include "includes/footer.php"; ?>
    </div>


    <a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>


    <?php include "includes/script-resources.php"; ?>
</body>

</html>