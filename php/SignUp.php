<?php
require "controller/siUp.php";
?>
<!DOCTYPE html>
<html lang="en">

<!-- ***********************************************************************************-->
<!-- ********************start include files of SignUp page***********************************-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up </title>
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
<!-- *********************************End include files of SignUp page**************************************************-->
<!-- ***************************show input field for specfied user****************************-->
<script>
    function showFields(role) {
        var teacherFields = document.getElementById('teacherFields');
        var studentFields = document.getElementById('studentFields');
        var adminFields = document.getElementById('adminFields');

        // Hide all fields by default
        teacherFields.style.display = 'none';
        studentFields.style.display = 'none';
        adminFields.style.display = 'none';

        // Show fields based on the selected role
        if (role === 'Teacher') {
            teacherFields.style.display = 'block';
        } else if (role === 'Student') {
            studentFields.style.display = 'block';
        } else if (role === 'Admin') {
            adminFields.style.display = 'block';
        }
    }
</script>


<body>

    <!-- ***********************************************************************************-->
    <!-- ******************************START SIGNUP PAGE ***********************************-->
    <div class="container-log">
        <h2>Sign Up</h2>
        <!-- button to sign up as  -->
        <input type="submit" name="role" value="Teacher" onclick="showFields('Teacher')">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="role" value="Student" onclick="showFields('Student')">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="role" value="Admin" onclick="showFields('Admin')">

        <form id="signup-form" action="SignUp.php" method="POST">
            <label for="user_name" class="fa fa-user me-7">&nbsp;&nbsp;&nbsp; Username:</label>
            <input type="text" id="user_name" name="user_name" required>
            <?php
            global $containsRestrictedCharsName;
            if ($containsRestrictedCharsName) {
                echo "Invalid name. Remove double quotes, asterisks, spaces, or digits.";
            }
            ?><br><br>
            <label for="email" class="fa fa-envelope me-7">&nbsp;&nbsp;&nbsp; Email:</label>
            <input type="email" id="email" name="email" required><br>
            <?php
            global $isValidEmail;
            if (isset($isValidEmail)) {
                if (!$isValidEmail) {
                    echo "Invalid email address.";
                }
            }
            ?>

            <br><br>
            <div id="teacherFields" style="display: none;">
                <!-- Teacher-specific fields -->
                Teacher Name: <input type="text" name="teacherName">
                Teacher Subject: <input type="text" name="teacherSubject">
            </div>
            <div id="studentFields" style="display: none;">
                <!-- Student-specific fields -->
                Student Name: <input type="text" name="studentName">
                Student Grade: <input type="text" name="studentGrade">
            </div>

            <div id="adminFields" style="display: none;">
                <!-- Admin-specific fields -->
                Admin Name: <input type="text" name="adminName">
                Admin Role: <input type="text" name="adminRole">
            </div>
            <br><br>
            <label for="age" class="fa fa-birthday-cake me-7">&nbsp;&nbsp;&nbsp; Age:</label>
            <input type="number" id="age" name="age" required><br><br>
            <label for="address" class="fa fa-map-marker-alt me-7">&nbsp;&nbsp;&nbsp; address:</label>
            <input type="text" id="address" name="address" required /><br>
            <?php
            global $containsRestrictedCharsAddress;
            if (isset($containsRestrictedCharsAddress)) {
                if ($containsRestrictedCharsAddress) {
                    echo "Invalid address. It should not contain double quotes, asterisks, spaces, or digits.";
                }
            }
            ?><br><br>
            <label for="NumberPhone" class="fa fa-phone-alt me-4">&nbsp;&nbsp;&nbsp; Phone:</label>
            <input type="text" id="phone_no" name="phone_no" required>
            <?php
            global $isValidPhoneNumber;
            if (isset($isValidPhoneNumber)) {
                if (!$isValidPhoneNumber) {
                    echo "Invalid phone number. It should contain exactly 10 digits.";
                }
            }
            ?><br><br>
            <label for="password" class="fa fa-lock me-7">&nbsp;&nbsp;&nbsp; Password:</label>
            <input type="password" id="password" name="password" required>
            <?php
            global $isValidPassword;
            if (isset($isValidPasswordP)) {
                if (!$isValidPassword) {
                    echo "Invalid password. It should contain at least one uppercase letter, one lowercase letter, one digit, one special character, and no spaces.";
                }
            }    ?><br><br>
            <label for="confirm-password" class="fa fa-lock me-7">&nbsp;&nbsp;&nbsp; Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>
            <?php
            global $isConfirmPasswordMatched;
            if (isset($isConfirmPasswordMatched)) {
                if (!$isConfirmPasswordMatched) {
                    echo "Passwords do not match.";
                }
            }
            ?>
            <input type="submit" name="submit" class="submit-log" value="Sign Up">
        </form>
        <p id="error-message"></p>
        <?php
        if (isset($error_meassage)) {
            echo $error_meassage;
        }

        ?>
        <p>Already have an account? <a href="Login.php">&nbsp;&nbsp;&nbsp; Login</a></p>
    </div>
    <!-- ***********************************************************************************-->
    <!-- ******************************* END SIGNUP PAGE  **********************************-->

    <!-- Carousel End -->

</body>

</html>


<!-- ***********************************************************************************-->
<!-- *********************** START INCLUDE FOOTER FILE**********************************-->
<?php
require "../footer.html";
?>
<!-- ***********************************************************************************-->
<!-- *********************** END INCLUDE FOOTER FILE**********************************-->