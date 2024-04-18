<?php 
include 'dbCon.php';
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // تجنب ثغرة SQL injection عن طريق استخدام prepared statements
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE E_mail = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row['Password'] == $password) {
            // تخزين user_id في الـ session
             $user_id =$_SESSION['user_id'] = $row['user_id'];
             if ($row['userType'] =='Teacher'){
                $_SESSION['Teacher_name'] =$row['User_Name'];
                $_SESSION['userType'] =$row['userType'];
                // header('location:teacherProfile.php');
                $nextPage = "teacherPage.php";
                echo "<script>window.location.href='$nextPage';</script>";
                exit;
              }elseif($row['userType'] =='Student'){
                $_SESSION['user_name'] =$row['User_Name'];
                $_SESSION['userType'] =$row['userType'];
                // header('location:userProfile.php');
                $nextPage = "courses.php";
            echo "<script>window.location.href='$nextPage';</script>";
            exit;
              }

            
        } else {
            echo "اسم المستخدم أو كلمة المرور غير صحيحة.";
        }
    } else {
        echo "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }

    mysqli_stmt_close($stmt);
}
?>