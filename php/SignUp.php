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

<body>

    <!-- ***********************************************************************************-->
    <!-- ******************************START SIGNUP PAGE ***********************************-->
    <div class="container-log">
        <h2>Sign Up</h2>
        <!-- button to sign up as  -->
        <br>
        <form id="signup-form" action="SignUp.php" method="POST">
            <label for="roleSelect">User Type:</label>
            <select class="form-control text-center" name="userType" id="roleSelect" onclick="toggleAdditionalField()">
                <option value="Tea" class=""> Selece user Type -----:</span></option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
            </select><br><br>
            <label for="user_name" class="fa fa-user me-7">&nbsp;&nbsp;&nbsp; Username:</label>
            <input type="text" id="user_name" name="user_name" required>
            <?php
            global $containsRestrictedCharsName;
            if ($containsRestrictedCharsName) {
                echo "Invalid name. Remove double quotes, asterisks, spaces, or digits.";
            }
            ?><br><br>
            <label for="email" class="fa fa-envelope me-7">&nbsp;&nbsp;&nbsp; Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <?php
            global $isValidEmail;
            if (isset($isValidEmail)) {
                if (!$isValidEmail) {
                    echo "Invalid email address.";
                }
            }
            ?>
            
            <div id="additionalFieldforAge">
                <label for="age" class="fa fa-birthday-cake me-7">&nbsp;&nbsp;&nbsp; Age:</label><br>
                <input type="number" id="age" name="age"/>
            </div>
            
            <div id="additionalFieldforAddress">
                <label for="address" class="fa fa-map-marker-alt me-7">&nbsp;&nbsp;&nbsp; address:</label>
                <input type="text" id="address" name="address" /><br>
            </div>
            <?php
            global $containsRestrictedCharsAddress;
            if (isset($containsRestrictedCharsAddress)) {
                if ($containsRestrictedCharsAddress) {
                    echo "Invalid address. It should not contain double quotes, asterisks, spaces, or digits.";
                }
            }
            ?>
            <div id="additionalFieldforSpecialization">
                <label for="admin-specialization" class="fa fa-chalkboard-teacher  me-7">&nbsp;&nbsp;&nbsp; Teacher Specialization:</label>
                <input type="text" id="admin-specialization" name="spec" ><br>
            </div>
            <div id="additionalFieldforDescription">
                <label for="admin-specialization" class="fa fa-chalkboard-teacher  me-7">&nbsp;&nbsp;&nbsp; Teacher Description:</label>
              <br>  <textarea id="admin-Description" name="desc"></textarea>
            </div>
            <div id="additionalFieldforPhone">
                <label for="NumberPhone" class="fa fa-phone-alt me-4">&nbsp;&nbsp;&nbsp; Phone:</label>
                <input type="text" id="phone_no" name="phone_no" >
            </div>
           
            <label for="password" class="fa fa-lock me-7">&nbsp;&nbsp;&nbsp; Password:</label>
            <input type="password" id="password" name="password" required>
            <?php
            global $isValidPassword;
            if (isset($isValidPasswordP)) {
                if (!$isValidPassword) {
                    echo "Invalid password. It should contain at least one uppercase letter, one lowercase letter, one digit, one special character, and no spaces.";
                }
            }    ?><br>
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
    <script>
        function toggleAdditionalField() {
            var roleSelect = document.getElementById("roleSelect");
            var additionalFieldforSpecialization = document.getElementById("additionalFieldforSpecialization");
            var additionalFieldforDescription = document.getElementById("additionalFieldforDescription");
            var additionalFieldforPhone = document.getElementById("additionalFieldforPhone");
            var additionalFieldforAddress = document.getElementById("additionalFieldforAddress");
            var additionalFieldforAge = document.getElementById("additionalFieldforAge");
            if (roleSelect.value === "Teacher") {
                additionalFieldforSpecialization.style.display = "block";
                additionalFieldforDescription.style.display = "block";
            } else {
                additionalFieldforSpecialization.style.display = "none";
                additionalFieldforDescription.style.display = "none";
            }
            if (roleSelect.value === "Student") {
                additionalFieldforPhone.style.display = "block";
                additionalFieldforAddress.style.display = "block";
                additionalFieldforAge.style.display = "block";
            } else {
                additionalFieldforPhone.style.display = "none";
                additionalFieldforAddress.style.display = "none";
                additionalFieldforAge.style.display = "none";
            }
        }
    </script>

</body>

</html>


<!-- ***********************************************************************************-->
<!-- *********************** START INCLUDE FOOTER FILE**********************************-->
<?php
require "../footer.html";
?>
<!-- ***********************************************************************************-->
<!-- *********************** END INCLUDE FOOTER FILE**********************************-->