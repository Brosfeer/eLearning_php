<?php
include 'dbCon.php';
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];
    $user_id = $_SESSION['user_id'];
 
    if (isset($con)) {
        $myLessonsSQL = mysqli_prepare($con, "SELECT `courses`.`title` AS `course_title`,`courses`.`Description`,`Lessons`.`title`  AS `lesson_title`,`Lessons`.`content`,`lessons`.`video_url` FROM `users` JOIN `course_progress` ON `users`.`user_id` = `course_progress`.`User_id`
        JOIN `Lessons` USING (`course_id`)
        JOIN `courses` USING (`course_id`)
        WHERE `users`.`user_id` = ? AND `Lessons`.`course_id` = ?");
        mysqli_stmt_bind_param($myLessonsSQL, "ss", $user_id, $course_id);
        mysqli_stmt_execute($myLessonsSQL);

        $result = mysqli_stmt_get_result($myLessonsSQL);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
            $data2[] = $row['lesson_title'];
        }

        
        $titleLessonsOne = $data2[0];
        $titleLessonsSecond = $data2[1];
        $titleLessonsThreed = $data2[2];
        $titleLessonsFourth = $data2[3];
        
        
        $lessonTitle="";
        $titleCourse="";
        $videoUrl="";
        $text = $_POST["text"];
                if($text == $data2[0]){
            foreach ($data as $index => $row) {
                $titleCourse = $row['course_title'];
                $DecsCourse = $row['Description'];
                if ($index == 0) {
                    $videoUrl =$row['video_url'];
                    $lessonTitle = $data2[0];
                    $lessonContent =$row['content'];
                    $row['video_url'];
                 
                }
               
            }
        }else if($text == $data2[1]){
            foreach ($data as $index => $row) {
                $titleCourse = $row['course_title'];
                $DecsCourse = $row['Description'];
                if ($index == 1) {
                    $videoUrl =$row['video_url'];
                    $lessonTitle = $data2[1];
                    $lessonContent =$row['content'];
            
                }
               
            }
        }else if($text == $data2[2]){
            foreach ($data as $index => $row) {
                $titleCourse = $row['course_title'];
                $DecsCourse = $row['Description'];
                if ($index == 2) {
                    $lessonContent =$row['content'];
                    $lessonTitle = $data2[2];
                    $videoUrl =$row['video_url'];
                 
                }
               
            }
        }else if($text == $data2[3]){
            foreach ($data as $index => $row) {
                $titleCourse = $row['course_title'];
                $DecsCourse = $row['Description'];
                if ($index == 3) {
                    $lessonTitle = $data2[3];
                    $lessonContent =$row['content'];
                    $videoUrl =$row['video_url'];
                   
                }
               
            }
        }


    // قم بمعالجة القيمة المرسلة من JavaScript هنا
    




        // $text = $_POST["text"];
        // if($data[1]['lesson_title']== $text){

        // }

        // // قم بمعالجة القيمة المرسلة من JavaScript هنا
        // echo "The received text is: " . $text;
        // $videoUrl = $row['video_url'];
        $videoId = "";

        // استخراج معرف الفيديو من رابط YouTube
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/[^\/]+\/|(?:v|e(?:mbed)?)\/|[^\/]+\?v=)|youtu\.be\/)([^\"\&\?\/ ]{11})/';

        if (preg_match($pattern, $videoUrl, $matches)) {
            if (isset($matches[1])) {
                $videoId = $matches[1];
            }
        }

        if (!empty($videoId)) {
            // إنشاء رابط تضمين YouTube
            $embedUrl = "https://www.youtube.com/embed/" . $videoId;
            // هنا يمكنك إضافة الشيفرة لعرض الفيديو المضمن
        } else {
           
        }
        $contentLesson = $row['content'];

    }
}






?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="css/style2.css" rel="stylesheet" type="text/css" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container-log {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 140px;
        }

        h2 {
            margin-top: 0;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;

        }

        input[name="age"] {

            width: 20%;
            margin-right: 40px;

        }

        input[name="Number-Phone"] {

            width: 100%;

        }

        label {
            cursor: pointer;
            font-size: 20px;
        }


        .submit-log {
            width: 100%;
            padding: 10px;
            background-color: #12dfed;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-log:hover {
            background: #4cc4cd;
        }
    </style>


</head>

<body>



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="courses.html" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="Login.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
    <br><br>
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Lessons</h6>
        <h1 class="mb-5"> Lessons of the course</h1>
    </div>
    <!-- Single News -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main">
                                <!-- News Head -->
                                <div class="news-head">
                                    <iframe width="100%" height="450" src="<?php echo $embedUrl; ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <!-- News Title -->
                                <h1 class="news-title"><?php $lessonTitle;
                                 echo " ". $lessonTitle  ?></h1> <!-- Meta -->
                                <div class="meta">
                                    <div class="meta-left">
                                        <span class="author"><a href="#"><img src="img/author1.jpg" alt="#"><?php echo $titleCourse ?></a></span>
                                        <span class="date"><i class="fa fa-clock-o"></i>03 Feb 2019</span>
                                    </div>
                                    <div class="meta-right">
                                        <span class="comments"><a href="#"><i class="fa fa-comments"></i>05 Comments</a></span>
                                        <span class="views"><i class="fa fa-eye"></i>33K Views</span>
                                    </div>
                                </div>
                                <!-- News Text -->
                                <div class="news-text">

                                    <blockquote class="overlay" style="background-color:#06BBCC">
                                        <p><?php echo $lessonContent ?></p>
                                    </blockquote>
                                </div>
                                <div class="blog-bottom">
                                    <!-- Social Share -->
                                    <a class="btn btn-outline-light btn-social" style="background-color: black;" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-social" style="background-color: black;" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-social" style="background-color: black;" href=""><i class="fab fa-youtube"></i></a>
                                    <a class="btn btn-outline-light btn-social" style="background-color: black;" href=""><i class="fab fa-linkedin-in"></i></a>

                                    <!-- Next Prev -->
                                    <ul class="prev-next">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                    </ul>
                                    <!--/ End Next Prev -->
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->

                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h2 style="color:#06BBCC"><?php echo $titleCourse ?></hz>
                            <ul class="categor-list">
                                <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsOne ?>');"><?php echo $titleLessonsOne ?></a></li>
                                <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsSecond ?>');"><?php echo $titleLessonsSecond ?></a></li>
                                <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsThreed ?>');"><?php echo $titleLessonsThreed ?></a></li>
                                <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsFourth ?>');"><?php echo $titleLessonsFourth ?></a></li>
                            </ul>
                        </div>

                        <!--/ End Single Widget -->
                        <!-- Single Widget -->

                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Carousel End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>60 Street,Sana`a,Yemen</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+967776345384</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>m7716yahya@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">News letter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <a href="Login.html"> <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

        </div>
        <!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>







        <script>
            function sendToPhp(text) {
                // إنشاء نموذج وإرساله إلى ملف PHP
                var form = document.createElement("form");
                form.setAttribute("method", "POST");
                form.setAttribute("action", "lessons.php");

                var input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "text");
                input.setAttribute("value", text);
                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
            }
        </script>

        <!--  <script>
                function validateForm(event) {
                  event.preventDefault();
                  
                  var password = document.getElementById("password").value;
                  var confirmPassword = document.getElementById("confirm-password").value;
            
                  if (password !== confirmPassword) {
                    document.getElementById("error-message").textContent = "Passwords do not match.";
                  } else {
                    document.getElementById("error-message").textContent = "";
                    // Perform further actions, such as submitting the form to the server
                    document.getElementById("signup-form").submit();
                  }
                }
              </script>
            -->
        <script src="lib/jQuery/jquery-3.5.1.min.js" type="text/javascript"></script>
        <script src="lib/jQuery/cdn.jsdelivr.net_npm_bootstrap@5.0.0_dist_js_bootstrap.bundle.min.js" type="text/javascript"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>-->
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="Ajax-work/mainAjax.js" type="text/javascript"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>