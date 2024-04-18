<?php
// include 'controlle/addCo.php';
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="./img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--  Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .inWid {
            width: 100%;
        }

        .tabWid {
            width: 60%;
        }

        .divPad {
            padding: 20px;
        }

        table {
            border-collapse: separate;
            border-spacing: 7px;
            border: 3px solid gray;
            ;
        }

        .saveButton {
            bottom: 20px;
            /* left: 20px; */
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <img src=""/>



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
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">

        </div>
    </div>
    <!-- About End -->

    <!-- <hr style=" border-radius: 20px;border: 10px;"> -->
    <!-- starat add courses  -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Add your new courses</h6>
                <!-- <h1 class="mb-5"></h1> -->
            </div>
        </div>

        <form action="controller/addCo.php" method="POST" enctype="multipart/form-data">
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp  " data-wow-delay="0.3s"> -->
            <div class="course-item bg-light">
                <!-- <div class="position-relative overflow-hidden "> -->
                <center> Add Course Data</center>

                <div class="divPad">
                    <center>

                        <table cellspacing="10" class="tabWid">
                            <tr>
                                <td><label for="co_title">Enter Course Titel:</label></td>
                                <td><input type="text" name="co_title" class="inWid"></td>
                            <tr>
                                <td><label for="description">Enter Description:</label></td>
                                <td><textarea type="text" name="desc" class="inWid"></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="duration">Enter Duration:</label></td>
                                <td><input type="text" name="duration" class="inWid"></td>
                            <tr>
                            <tr>
                                <td><label for="image">Enter Course Image :</label> </td>
                                <td><input type="file" name="image" class="inWid"></td>
                            <tr>

                                <td><label for="category">categories:</label></td>
                                <td><input type="text" name="cate" class="inWid"></td>

                            <tr>
                                <td></td>
                                <td></td>
                                <!-- <td collapse="2"><button name="submit" class="btn btn-primary border-radius dropdown-item-right">Add</button></td> -->
                            </tr>
                        </table>
                    </center>
                </div>

                <br>
                <center> Add Lesson Data</center>

                <div class="divPad" id="lessDiv">
                    <center>
                        <table class="tabWid">
                            <tr>
                                <td><label for="le_title">Enter Lesson Titel:</label></td>
                                <td><input type="text" name="le_title" class="inWid"></td>
                            <tr>

                                <td><label for="conter">Enter Content:</label></td>
                                <td><textarea type="text" name="content" class="inWid"></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="vid_url">Enter Video URL:</label></td>
                                <td><input type="text" name="vid_url" class="inWid"></td>
                            <tr>
                            <tr>
                                <td><label for="image">Enter External Resours if you have :</label> </td>
                                <td><input type="file" name="ext_res" class="inWid"></td>
                            </tr>
                            <br>
                            <tr>
                                <td></td>
                                <center>
                                    <!-- <td collapse="2"><button name="submit" class="btn btn-primary border-radius dropdown-item-right">Add</button></td> -->
                                </center>
                            </tr>
                        </table>
                    </center>
                </div>
                <center>
                    <div id="container"></div>
                    <!-- Container to hold the dynamically added divs -->
                    <input type="button" id="addButton" value="Add Lesson"></button>
                </center><!-- Button to add the form -->
                <!-- </div> -->
            </div>
            <!-- </div> -->
            <center>
                <input type="submit" id="saveButton" class="saveButton" value="Save" name="submit"></button>
            </center>

        </form>
    </div>

    <!-- Button to save the form -->


    <!--end add corsess Start -->
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
                        <a href="Login.html"> <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign
                                Up</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">eLEARNING</a>.


                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        <div>
            <h1 id="User_Name"></h1>
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script>
            document.getElementById('addButton').addEventListener('click', function() {
                var divToClone = document.querySelector('#lessDiv');
                var clonedDiv = divToClone.cloneNode(true); // Clone the div
                document.getElementById('container').appendChild(clonedDiv); // Append the cloned div to the container
            });
        </script>


</body>

</html>