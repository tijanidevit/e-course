<?php 
session_start();    
if (isset($_SESSION['ecour_student'])) {
  header('location: account');
  exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecour - Register</title>
    <?php include "includes/style-resources.php"; ?>
</head>

<body>

    <div class="preloader js-preloader">
        <img src="assets/img/preloader.gif" alt="Image">
    </div>


    <div class="page-wrapper">

        <?php include "includes/header.php"; ?>

        <section class="breadcrumb-wrap bg-f br-bg-4">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                        <div class="breadcrumb-title">
                            <h2>Register</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="./">Home </a></li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="Login-wrap pt-100 pb-100">
            <div class="container">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                    <div class="login-form">

                        <div class="login-body">
                            <form class="form-wrap" method="POST" id="registerForm" enctype="multipart/form-data">
                                <div id="result"></div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="fullname">Fullname</label>
                                            <input id="fullname" name="fullname" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input id="email" name="email" type="email" placeholder="Email Address*" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="f">
                                            <label for="gender">Gender</label> <br>
                                            <label for="male">
                                                <input type="radio" name="gender" id="male" value="male"> Male
                                            </label>
                                            <label for="female">
                                                <input type="radio" name="gender" id="female" value="female"> Female
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <div class="form-group">
                                            <label for="pwd">Password</label>
                                            <input id="pwd" name="password" type="password" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="image">Profile Picture</label>
                                            <input id="image" name="image" type="file" required accept="images/*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn v1" type="submit">
                                                <span class="spinner" id="spinner" style="display: none;">
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                </span>
                                                <span class="btnText">
                                                    Sign Up
                                                </span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <p class="mb-0">Already Have an Account? <a class="link" href="./login">Login</a></p>
                                    </div>
                                </div>
                            </form>
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

<script>
    
    $('#registerForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/register.php',
            type: 'POST',
            data : new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('#spinner').show();
                $('#result').hide();
                $('#btnText').hide();
            },
            success: function(data){
                if (data == 1) {
                    location.href = 'account';
                }
                else{
                    $('#result').html(data);
                    $('#result').fadeIn();
                    $('#spinner').hide();
                    $('#btnText').show();
                }
            }
        })
    })

</script>