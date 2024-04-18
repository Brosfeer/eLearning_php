<?php
session_start();
require "../header.html";
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['userType'] == 'Student') {
        $nextPage = "Courses.php";
        echo "<script>window.location.href='$nextPage';</script>";
    } else if ($_SESSION['userType'] == 'Teacher') {
        $nextPage = "TeacherPage.php";
        echo "<script>window.location.href='$nextPage';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../img/favicon.ico" rel="icon">

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

</head>

<body>
    <!-- Carousel Start -->
    <div class="container-log">
        <h2>تسجيل الدخول</h2>
        <form id="signin-form" action="Login.php" method="POST">
            <input type="text" name="user_name" placeholder="اسم المستخدم">
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <input type="submit" class="submit-log" name="submit" value="تسجيل الدخول">
        </form>
        <p id="error-message"><?php include 'validat.php' ?></p>
        <p>Don't have an account? <a href="SignUp.php">Sign up</a></p>
    </div>
    <!-- Carousel End -->
</body>

</html>

<?php
require "../footer.html";
?>