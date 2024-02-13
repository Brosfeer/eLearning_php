<?php
include 'dbCon.php';
session_start();


$user_id = $_SESSION["user_id"];


if ($user_id) {

    echo "the user id are: $user_id";
    $getInfo = mysqli_prepare($con, "SELECT User_Name, E_mail, title, Description, course_id, courses_image, Duration FROM coursesProfileDetails WHERE user_id=?");
    mysqli_stmt_bind_param($getInfo, "s", $user_id);
    mysqli_stmt_execute($getInfo);
    $result = mysqli_stmt_get_result($getInfo);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // تحويل المصفوفة إلى سلسلة JSON
    $jsonString = json_encode($data);

    // حفظ السلسلة JSON في ملف
    file_put_contents('data.json', $jsonString);

    // عرض البيانات حسب الفهرس

    foreach ($data as $index => $row) {
        echo "<tr>";
        echo "<td>" . $row['User_Name'] . "</td>";
        echo "<td>" . $row['E_mail'] . "</td>";

        echo "</tr>";

        // العرض في <div> حسب الفهرس المحدد
        if ($index == 2) { // الفهرس المحدد
            // echo "<div>title: " . $row['title'] . "</div>";
            echo "<div>Description: " . $row['Description'] . "</div>";
            echo "<div>course_id: " . $row['course_id'] . "</div>";
            echo "<div>courses_image: " . $row['courses_image'] . "</div>";
            echo "<div>Duration: " . $row['Duration'] . "</div>";
        }
    }
    echo "</table>";
    if (isset($_POST['submit'])) {

        echo "<br>*********************************<br>*******************<br>";
        $addTitle = $_POST['title'];
        $addDesc = $_POST['desc'];
        $addDuration = $_POST['Duration'];

        echo "hi :$addTitle" . "<br> desc: is " . $addDesc . "<br> duration is :" . $addDuration . "br";

        echo "$user_id";
        $addcate = 1;
        $addinst = 1;
        $addNewCourse = mysqli_prepare($con, "INSERT INTO courses (title, Description, Duration, category_id, instructor_id) VALUES (?, ?, ?, ?, ?)");
        $addNewCourse->bind_param("ssssi", $addTitle, $addDesc, $addDuration, $addcate, $addinst);
        $addNewCourse->execute();
        //          INSERT INTO courses (title, Description, Duration, category_id, instructor_id)
        // VALUES ('عنوان الدورة', 'وصف الدورة', 'مدة الدورة', 1, 1);
    }
}
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

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .hoverable {
            position: relative;
            display: inline-block;
            overflow: hidden;
            padding: 10px;
            margin-bottom: 20px;
        }

        .hoverable::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background-color: rgba(6, 187, 204, 0.2);
            transform: translate(-50%, -50%);
            border-radius: 50%;
            opacity: 0;
            pointer-events: none;

        }

        .hoverable:hover::after {
            width: 200%;
            color: burlywood;
            height: 200%;
            opacity: 1;
            transition: width 0.5s, height 0.5s, opacity 0.5s;
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





    <!-- Header Start -->
    <br>
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">My Profile</h6>
        <h1 class="mb-5">Welcome to Your Profile</h1>
    </div>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">

        <div class="container py-7 ">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center ">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 200px; height: 200px;">
                    <h1 class="display-2 text-black animated slideInDown" style="font-size: 30px;color: white;">
                        YOUR_NAME:<?php echo "  " . $row['User_Name']; ?>
                        </h2>
                    </h1><BR>
                    <h1 class="display-2 text-black animated slideInDown" style="font-size: 20px;color: white;">
                        YOUR_EMAIL: <?php echo "  " . $row['E_mail']; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div><br><br>
    <div id="User_Name"></div>
    <br><br>
    <hr style="color: 20 ;border-radius: 20px;border: 10px;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courese</h6>
            <h1 class="mb-5">Your Courese</h1>
            </div<br>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp hoverable" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            <img class="img-fluid" src=" <?php
                                                            foreach ($data as $index => $row) {
                                                                if ($index == 0) {
                                                                    echo $row['courses_image'];
                                                                }
                                                            }
                                                            ?>" alt="di">
                        </a>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h2 class="mb-4">
                            <?php
                            foreach ($data as $index => $row) {
                                if ($index == 0) {
                                    echo $row['title'];
                                }
                            }
                            ?>
                        </h2><br>
                        <h3 class="small" id="coursseDiscription0"> <?php
                                                                    foreach ($data as $index => $row) {
                                                                        if ($index == 0) {
                                                                            echo $row['Description'];
                                                                        }
                                                                    }
                                                                    ?></h3>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                        <small class="flex-fill text-center border-end py-2">
                            <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                            foreach ($data as $index => $row) {
                                                                                                if ($index == 0) {
                                                                                                    echo $row['Duration'];
                                                                                                }
                                                                                            }
                                                                                            ?></i></small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                            Students</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            <img class="img-fluid" src=" <?php
                                                            foreach ($data as $index => $row) {
                                                                if ($index == 1) {
                                                                    echo $row['courses_image'];
                                                                }
                                                            }
                                                            ?>" alt="di">
                        </a>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h2 class="mb-4">
                            <?php
                            foreach ($data as $index => $row) {
                                if ($index == 1) {
                                    echo $row['title'];
                                }
                            }
                            ?>
                        </h2><br>
                        <h3 class="small" id="coursseDiscription0"> <?php
                                                                    foreach ($data as $index => $row) {
                                                                        if ($index == 1) {
                                                                            echo $row['Description'];
                                                                        }
                                                                    }
                                                                    ?></h3>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                        <small class="flex-fill text-center border-end py-2">
                            <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                            foreach ($data as $index => $row) {
                                                                                                if ($index == 1) {
                                                                                                    echo $row['Duration'];
                                                                                                }
                                                                                            }
                                                                                            ?></i></small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                            Students</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp hoverable" data-wow-delay="0.5s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            <img class="img-fluid" src=" <?php
                                                            foreach ($data as $index => $row) {
                                                                if ($index == 2) {
                                                                    echo $row['courses_image'];
                                                                }
                                                            }
                                                            ?>" alt="di">
                        </a>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h2 class="mb-4">
                            <?php
                            foreach ($data as $index => $row) {
                                if ($index == 2) {
                                    echo $row['title'];
                                }
                            }
                            ?>
                        </h2><br>
                        <h3 class="small" id="coursseDiscription0"> <?php
                                                                    foreach ($data as $index => $row) {
                                                                        if ($index == 2) {
                                                                            echo $row['Description'];
                                                                        }
                                                                    }
                                                                    ?></h3>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                        <small class="flex-fill text-center border-end py-2">
                            <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                            foreach ($data as $index => $row) {
                                                                                                if ($index == 2) {
                                                                                                    echo $row['Duration'];
                                                                                                }
                                                                                            }
                                                                                            ?></i></small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                            Students</small>
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp br" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            <img class="img-fluid" src=" <?php
                                                            foreach ($data as $index => $row) {
                                                                if ($index == 3) {
                                                                    echo $row['courses_image'];
                                                                }
                                                            }
                                                            ?>" alt="di">
                        </a>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h2 class="mb-4">
                            <?php
                            foreach ($data as $index => $row) {
                                if ($index == 3) {
                                    echo $row['title'];
                                }
                            }
                            ?>
                        </h2><br>
                        <h3 class="small" id="coursseDiscription0"> <?php
                                                                    foreach ($data as $index => $row) {
                                                                        if ($index == 3) {
                                                                            echo $row['Description'];
                                                                        }
                                                                    }
                                                                    ?></h3>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                        <small class="flex-fill text-center border-end py-2">
                            <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                            foreach ($data as $index => $row) {
                                                                                                if ($index == 3) {
                                                                                                    echo $row['Duration'];
                                                                                                }
                                                                                            }
                                                                                            ?></i></small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                            Students</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            <img class="img-fluid" src=" <?php
                                                            foreach ($data as $index => $row) {
                                                                if ($index == 4) {
                                                                    echo $row['courses_image'];
                                                                }
                                                            }
                                                            ?>" alt="di">
                        </a>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h2 class="mb-4">
                            <?php
                            foreach ($data as $index => $row) {
                                if ($index == 4) {
                                    echo $row['title'];
                                }
                            }
                            ?>
                        </h2><br>
                        <h3 class="small" id="coursseDiscription0"> <?php
                                                                    foreach ($data as $index => $row) {
                                                                        if ($index == 4) {
                                                                            echo $row['Description'];
                                                                        }
                                                                    }
                                                                    ?></h3>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                        <small class="flex-fill text-center border-end py-2">
                            <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                            foreach ($data as $index => $row) {
                                                                                                if ($index == 4) {
                                                                                                    echo $row['Duration'];
                                                                                                }
                                                                                            }
                                                                                            ?></i></small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                            Students</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            <img class="img-fluid" src=" <?php
                                                            foreach ($data as $index => $row) {
                                                                if ($index == 5) {
                                                                    echo $row['courses_image'];
                                                                }
                                                            }
                                                            ?>" alt="di">
                        </a>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h2 class="mb-4">
                            <?php
                            foreach ($data as $index => $row) {
                                if ($index == 5) {
                                    echo $row['title'];
                                }
                            }
                            ?>
                        </h2><br>
                        <h3 class="small" id="coursseDiscription0"> <?php
                                                                    foreach ($data as $index => $row) {
                                                                        if ($index == 5) {
                                                                            echo $row['Description'];
                                                                        }
                                                                    }
                                                                    ?></h3>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                        <small class="flex-fill text-center border-end py-2">
                            <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                            foreach ($data as $index => $row) {
                                                                                                if ($index == 5) {
                                                                                                    echo $row['Duration'];
                                                                                                }
                                                                                            }
                                                                                            ?></i></small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                            Students</small>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 6) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 6) {
                                        echo $row['title'];
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 6) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 6) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 7) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 7) {
                                        echo $row['title'];
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 7) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 7) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 8) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 8) {
                                        echo $row['title'];
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 8) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 8) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp br" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 9) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 9) {
                                        echo $row['title'];
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 9) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 9) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" id="ten" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 10) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 10) {
                                        echo $row['title'];
                                    } else {
                                        echo '<style>#ten { display: none; }</style>';
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 10) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 10) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" id="ten" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 11) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 11) {
                                        echo $row['title'];
                                    } else {
                                        echo '<style>#ten { display: none; }</style>';
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 11) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 11) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" id="ten" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 12) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 12) {
                                        echo $row['title'];
                                    } else {
                                        echo '<style>#ten { display: none; }</style>';
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 12) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 12) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" id="Eleven" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid" src=" <?php
                                                                foreach ($data as $index => $row) {
                                                                    if ($index == 13) {
                                                                        echo $row['courses_image'];
                                                                    }
                                                                }
                                                                ?>" alt="di">
                            </a>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h2 class="mb-4">
                                <?php
                                foreach ($data as $index => $row) {
                                    if ($index == 13) {
                                        echo $row['title'];
                                    } else {
                                        echo '<style>#Eleven { display: none; }</style>';
                                    }
                                }
                                ?>
                            </h2><br>
                            <h3 class="small" id="coursseDiscription0"> <?php
                                                                        foreach ($data as $index => $row) {
                                                                            if ($index == 14) {
                                                                                echo $row['Description'];
                                                                            }
                                                                        }
                                                                        ?></h3>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i id="teacher_name0" class="fa fa-user-tie text-primary me-2"></i></small>
                            <small class="flex-fill text-center border-end py-2">
                                <i id="coursseDuration0" class="fa fa-clock text-primary me-2"> <?php
                                                                                                foreach ($data as $index => $row) {
                                                                                                    if ($index == 11) {
                                                                                                        echo $row['Duration'];
                                                                                                    }
                                                                                                }
                                                                                                ?></i></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Header End -->


    <!-- Service Start -->

    <!-- Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">

        </div>
    </div>
    <!-- About End -->

    <hr style=" border-radius: 20px;border: 10px;">
    <!-- starat add courses  -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">New Coursses</h6>
                <h1 class="mb-5">Add your new courses</h1>
            </div>
        </div>
        <form action="courses.php" method="post">
            <div class="col-lg-4 col-md-6 wow fadeInUp  " data-wow-delay="0.3s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden ">
                        <table class="m-3 ">
                            <tr style="color:aqua;font-size: 20;">
                                <td aria-rowspan="2">Add new Course</td>
                            </tr><br>
                            <tr>
                                <td><label for="">Enter Titel:</label></td>
                                <td><input type="text" name="title"><BR></td< /tr>
                            <tr>
                                <td><label for="">Enter Description:</label></td>
                                <td><textarea type="text" name="desc"></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="">Enter Duration:</label></td>
                                <td><input type="text" name="Duration"><BR></td< /tr><br>
                            <tr>
                                <td><label for="">categories:</label></td>
                                <td><input type="text" name="cate"><BR></td< /tr><br>

                            <tr>
                                <td></td>
                                <td></td>
                                <td collapse="2"><button name="submit" class="btn btn-primary border-radius dropdown-item-right">Add</button></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

        </form>
    </div>


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


</body>

</html>