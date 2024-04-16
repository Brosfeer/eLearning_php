<?php  
include 'dbCon.php';
session_start();

$userType =$_SESSION["userType"];

$user_id = $_SESSION['user_id'];
echo $user_id;
if (isset($_SESSION["user_id"])) {

    $user_id = $_SESSION["user_id"];

    echo "the user_id =$user_id";
    $getInfo = mysqli_prepare($con, "SELECT User_Name, E_mail FROM USERS WHERE user_id=?");
    mysqli_stmt_bind_param($getInfo, "s", $user_id);
    mysqli_stmt_execute($getInfo);
    $result = mysqli_stmt_get_result($getInfo);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    foreach ($data as $index => $row);


}

if (isset($_POST['save_changes'])) {
  $email = $_POST['changeEmail'];
  $name = $_POST['changeName'];
  $password = $_POST['changePassword'];
  $confirmPassword = $_POST['confirmPassword'];

  // التحقق من تطابق كلمة المرور مع تأكيد كلمة المرور
  
  // قم بتنفيذ الإجراء الذي ترغب فيه عند النقر على زر "Save changes"
  echo "تم النقر على زر Save changes!";
  echo "<br>";
  echo "البريد الإلكتروني: " . $email;
  echo "<br>";
  echo "الاسم: " . $name;
  echo "<br>";
  echo "كلمة المرور: " . $password;

  // إضافة السكربت لإخفاء الـ "pop-up"


  $sql = mysqli_prepare($con, "UPDATE users SET E_mail=?, User_Name=?, Password=? WHERE user_id = ?");
  mysqli_stmt_bind_param($sql, "sssi", $email, $name, $password, $user_id);
  mysqli_stmt_execute($sql);

  if (mysqli_stmt_affected_rows($sql) > 0) {
    if ($password !== $confirmPassword) {
        echo "<script>alert('كلمة المرور وتأكيد كلمة المرور غير متطابقين');</script>";
        // قم بتنفيذ الإجراءات الإضافية في حالة عدم تطابق كلمة المرور
      } else {
        // قم بتنفيذ الإجراءات الإضافية في حالة تطابق كلمة المرور
        // يمكنك إضافة رمز لتحديث البيانات في قاعدة البيانات هنا
        echo "<script>alert('تم تحديث البيانات بنجاح');</script>";
      }
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
        <link href="../img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
            rel="stylesheet">

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
                <a href="Login.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i
                        class="fa fa-arrow-right ms-3"></i></a>
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
                <bu>
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center ">
                      
                    <?php include 'popupChangePass.php'?>
                       
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="../img/testimonial-1.jpg"
                             style="width: 200px; height: 200px;">
                        <h1 class="display-2 text-black animated slideInDown" style="font-size: 30px;color: white;">
                        <?php echo $userType?>_NAME:<h2 class="text-white large" ><?php echo "  " .$row['User_Name'];?></h2></h1><BR>
                        <h1 class="display-2 text-black animated slideInDown" style="font-size: 20px;color: white;">
                        <?php echo $userType?>_EMAIL:<h2 id="E_mail0" class="text-white large" ><?php echo "  " .$row['E_mail'];?></h1>
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
                        <img class="img-fluid bg-light p-1" src="../img/course-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="../img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="../img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="../img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="../img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="../img/course-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">News letter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <a href="Login.html"> <button type="button"
                                                  class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign
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
    

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    
    </script>        <script src="js/main.js"></script>
    <script src="lib/jQuery/jquery-3.5.1.min.js" type="text/javascript"></script>

</body>

</html>