<?php $fullname = "Adewale Abati";
$course_name = "Internet"; ?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ecour - certificate</title>
    <?php include "includes/style-resources.php"; ?>
    <style>
        body {
            overflow: scroll;
            max-height: 100vh;
            max-width: 100vw;
        }

        #download-section {
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, .8);
            width: 100%;
            height: 50px;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            z-index: 999;
        }

        #download-section button {
            background-color: #AE0A09;
            border: none;
            padding: 10px;
            color: #fff;
            cursor: pointer;
            margin-right: 40px;
        }

        #certificate {
            background-image: url("./assets/img/certificate.svg");
            background-size: cover;
            background-repeat: no-repeat;
            /* width: 1584px; */
            width: 1100px;
            height: 773px;
            margin: auto;
            /* height: 1137px; */
        }

        #cert-container {
            position: relative;
        }

        .inner-content {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .inner-content div {
            position: absolute;
        }

        .open-sans {
            font-family: 'Open Sans', sans-serif;
        }

        .zen-dots {
            font-family: 'Zen Dots', 'cursive';
        }

        .satisfy {
            font-family: 'Satisfy', cursive;
        }

        #recepient-name {
            top: 40%;
            left: 36%;
            font-size: 40px;
            text-transform: uppercase;
        }

        #course-name {
            top: 47%;
            left: 36%;
            font-size: 35px;
        }

        #course-description {
            top: 57%;
            left: 36%;
            width: 50%;
        }

        #issued-date {
            bottom: 15%;
            left: 41%;
            font-size: 25px;
        }
    </style>
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
                            <h2>Congratulations!!!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="course-details-wrap ptb-100">
            <div class="container">

                <div class="tab-content course-tab-content" id="cert-container">
                    <div id="download-section">
                        <button id="download-pdf">Download</button>
                    </div>
                    <div id="certificate">
                        <div class="inner-content">
                            <div id="recepient-name" class="zen-dots"><?php echo $fullname; ?></div>
                            <div id="course-name" class="satisfy">on <?php echo $course_name; ?></div>
                            <div id="course-description">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur minima voluptatibus, cumque culpa tempora nesciunt laborum corrupti perferendis nobis aspernatur? Ex officiis sint inventore, placeat earum a consequuntur ullam incidunt.
                            </div>
                            <div id="issued-date" class="open-sans">27/04/2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include "includes/footer.php"; ?>
    </div>


    <a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>


    <?php include "includes/script-resources.php"; ?>

    <script src="./assets/js/html2pdf.bundle.min.js"></script>
    <script>
        $(function() {
            $('#download-pdf').click(() => {
                const element = document.getElementById("certificate");
                html2pdf().from(element).set({
                    margin: 0,
                    filename: <?php echo "'" . $fullname . "-" . $course_name . "'"; ?>,
                    html2canvas: {
                        scale: 1
                    },
                    jsPDF: {
                        orientation: 'landscape',
                        unit: 'in',
                        format: 'A4',
                        compressPDF: true
                    }
                }).save();
            })
        })
    </script>
</body>

</html>