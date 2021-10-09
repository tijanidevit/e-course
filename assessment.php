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
                                <li><a href="./courses">Course </a></li>
                                <li>Course Assessment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="course-details-wrap ptb-100">
            <div class="container">

                <div class="tab-content course-tab-content">
                    <form action="certificate" method="post">
                        <div class="form-group">
                            <label for="">1. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum cupiditate</label>
                            <select name="" id="" class="form-control">
                                <option value="">Select</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">2. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum cupiditate</label>
                            <select name="" id="" class="form-control">
                                <option value="">Select</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">3. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum cupiditate</label>
                            <select name="" id="" class="form-control">
                                <option value="">Select</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                                <option value="1">Option One</option>
                            </select>
                        </div>
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