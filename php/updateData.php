<?php
require "controller/updateCourseController.php"

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="httzps://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>



    <!-- Navbar End -->


    <!-- Single News -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->

                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Choose Course to be updated</h3>
                            <ul class="categor-list">
                                <ul>
                                    <?php
                                    getCoursesDetails();
                                    // echo "the ss" . $selectedTitle;
                                    // echo $selectedTitle;

                                    // You can use the $selectedTitle variable here as needed
                                    // }
                                    ?>
                                </ul>
                                <!-- <li><a href="#"><?php
                                                        // getCoursesTitles();
                                                        ?></a></li> -->
                                <!-- <li><a href="#"><?php
                                                        // getCoursesTitles();
                                                        ?></a></li>
                                <li><a href="#"><?php
                                                // getCoursesTitles();
                                                ?></a></li>
                                <li><a href="#"><?php
                                                // getCoursesTitles();
                                                ?></a></li> -->
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
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main">
                                <!-- News Head -->
                                <div class="news-head" style="width: 800px;">
                                    <form action="" method="post">
                                        <input type="text" value="<?php
                                                                    // if (!empty($selectedTitle)) {
                                                                    //     $courseDetails = getCourseDetails();

                                                                    //     // Display the course details
                                                                    //     if ($courseDetails) {
                                                                    //         echo  $courseDetails['title'];
                                                                    //         // ... display other details as needed
                                                                    //     } else {
                                                                    //         echo "Course not found.";
                                                                    //     }
                                                                    // }
                                                                    ?>" name="title">
                                        <input type='submit' value='Save'>

                                    </form>

                                </div>
                                <!-- News Title -->
                                <h1 class="news-title"><a href="news-single.html">
                                        <!-- More than 80 clinical trials launch to test of the coronavirus . -->
                                        <?php
                                        // getCourseDetails($course_id);

                                        ?>
                                    </a></h1>
                                <!-- Meta -->
                                <div class="meta">
                                    <div class="meta-left">
                                        <span class="author"><a href="#"><img src="img/author1.jpg" alt="#">Naimur Rahman</a></span>
                                        <span class="date"><i class="fa fa-clock-o"></i>03 Feb 2019</span>
                                    </div>
                                    <div class="meta-right">
                                        <span class="comments"><a href="#"><i class="fa fa-comments"></i>05 Comments</a></span>
                                        <span class="views"><i class="fa fa-eye"></i>33K Views</span>
                                    </div>
                                </div>
                                <!-- News Text -->
                                <div class="news-text">

                                    <blockquote class="overlay" style="background-color:#6dccbd">
                                        <p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non commodo et, sodales</p>
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
                <!-- from the was the right sectios -->

                <!-- end of the right sectios -->
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
                    <!-- <p class="mb-2"><i class="fa fa-envelope me-3"></i>m7716yahya@gmail.com</p> -->
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
<?php
// require "../footer.html";
?>