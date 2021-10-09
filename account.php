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

$enrolled_courses = $student_obj->fetch_enrolled_courses($student_id);
$completed_courses = $student_obj->fetch_completed_courses($student_id);

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
                            <h2>Enrolled Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
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

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="./course-details?course=2"><img src="assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <h3><a href="./course-details?course=2">Foundation Of Positive :
                                        Psychology</a></h3>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
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