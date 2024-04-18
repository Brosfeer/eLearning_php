<?php
require "../php/header&footer/header.html";
include("controller/gettingCoLeData.php");
require "controller/updateCourseController.php";
?>


<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="../index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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
            <?php
            if (isset($_SESSION["user_id"])) {
                $user_id = $_SESSION["user_id"];

                if (!$user_id) {
                    echo "<a href='Login.php' class='btn btn-primary py-4 px-lg-5 d-none d-lg-block'>Join Now<i class='fa fa-arrow-right ms-3'></i></a>";
                }
            } else {
                echo "<a href='Login.php' class='btn btn-primary py-4 px-lg-5 d-none d-lg-block'>Join Now<i class='fa fa-arrow-right ms-3'></i></a>";
            }
            ?>
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
                <h6 class="section-title bg-white text-center text-primary px-3">Update the Course Details</h6>
                <!-- <h1 class="mb-5"></h1> -->
            </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp  " data-wow-delay="0.3s"> -->
            <div class="course-item bg-light">
                <!-- <div class="position-relative overflow-hidden "> -->
                <center> Edit The Course Data</center>

                <div class="divPad">
                    <center>

                        <table cellspacing="10" class="tabWid">
                            <tr>
                                <td><label for="co_title">Edit Course Titel:</label></td>
                                <td><input type="text" name="new_co_title" class="inWid" value="<?php
                                                                                            getCoursesDetails();
                                                                                            echo $co_title;
                                                                                            ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="description">Edit Description:</label></td>
                                <td><textarea type="text" name="new_desc" class="inWid"><?php
                                                                                    echo $co_desc;
                                                                                    ?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="duration">Edit the Duration:</label></td>
                                <td><input type="text" name="new_duration" class="inWid" value="<?php
                                                                                            echo $co_duration;
                                                                                            ?>"></td>
                            </tr>
                            <td></td>
                            <td></td>
                            <!-- <td collapse="2"><button name="submit" class="btn btn-primary border-radius dropdown-item-right">Add</button></td> -->
                            </tr>
                        </table>
                    </center>
                    <center>
                    <div id="container"></div>
                    <!-- Container to hold the dynamically added divs -->
                    <input type="submit" id="saveButton" class="saveButton" value="Save course Change" name="save_co_change"></button>
                </center><!-- Button save change of the course -->
                </div>

                <br>
                <center> Edit Lesson Data</center>

                <div class="divPad" id="lessDiv">
                    <center>
                        <table class="tabWid">
                            <tr>
                                <td><label for="le_title">Edit Lesson Titel:</label></td>
                                <td><input type="text" name="new_les_title" class="inWid" value="<?php
                                                                                            getLessonsDetails();
                                                                                            echo $les_title;

                                                                                            ?>"></td>
                            <tr>

                                <td><label for="conter">Edit Lesson Content:</label></td>
                                <td><textarea type="text" name="new_les_content" class="inWid"><?php
                                                                                        echo $les_content;
                                                                                        ?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="vid_url">Change The Video URL:</label></td>
                                <td><input type="text" name="new_les_vid_url" class="inWid" value="<?php
                                                                                            echo $les_vid_url;
                                                                                            ?>"></td>
                            <tr>
                            <tr>
                                <td><label for="image">Add or Chnge External Resours if you have :</label> </td>
                                <td><input type="file" name="new_ext_res" class="inWid" value=""><?php
                                                                                            echo $les_ext_res;
                                                                                            ?></td>
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
                    <input type="submit" id="saveButton" class="saveButton" value="Save lesson Change" name="save_les_change"></button>
                </center><!-- Button save change of the lessson -->
                <!-- </div> -->
            </div>
            <!-- </div> -->
            <!-- <center>
                <input type="submit" id="saveButton" class="saveButton" value="Save Change" name="save_change"></button>
            </center> -->

        </form>
    </div>

    <!-- Button to save the form -->


    <!--end add corsess Start -->
    <?php
    require "../footer.html";
