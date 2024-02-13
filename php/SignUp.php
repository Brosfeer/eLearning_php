<?php


//***********************************************************************************
//****************************START VREATE SESSION***********************************
session_start();
//***********************************************************************************
//****************************END VREATE SESSION*************************************


//***********************************************************************************
//****************************START INCLUED FILES************************************
require "../header.html";
include 'dbCon.php';
//***********************************************************************************
//**************************** END INCLUED FILES*************************************

if (isset($_POST['submit'])) {

    //***********************************************************************************
    //****************************GET DATA FROM  THE FORM********************************
    // echo "the chick";
    //geting data from the form to php page
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
    $confirm_password    = $_POST['confirm_password'];
    // echo $user_name . "<br>" . $email . " <br>" . $phone_no . " <br>" . $address . " <br>" . $password . " <br>" . $confirm_password;
    //***********************************************************************************
    //***********************************************************************************

    //***********************************************************************************
    //*************************Define  expression for validation*************************
    // Define regular expression for validation

    //***********************************************************************************
    //***********************************************************************************
    $restrictedCharsRegex = '/["\*\s0-9]/'; // Matches double quote, asterisk, space, or digit
    $containsRestrictedCharsName = preg_match($restrictedCharsRegex, $user_name);
    $emailRegex = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
    $phoneNumberRegex = '/^[0-9]{9}$/';
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/';
    //***********************************************************************************
    //*************************Start validationcin variblue*****************************
    $containsRestrictedCharsName = preg_match($restrictedCharsRegex, $user_name);
    $isValidEmail = preg_match($emailRegex, $email);
    $isValidPassword = preg_match($passwordRegex, $password);
    $isConfirmPasswordMatched = ($password === $confirm_password);
    $containsRestrictedCharsAddress = !preg_match($restrictedCharsRegex, $address);
    $isValidPhoneNumber = preg_match($phoneNumberRegex, $phone_no);
    // // Validate name
    // $containsRestrictedCharsOrNumbersName = !preg_match($restrictedCharsAndNumbersRegex, $user_name);
    // // Validate email
    // $isValidEmail = preg_match($emailRegex, $email);
    // // Validate password
    // $isValidPassword = preg_match($passwordRegex, $password);
    // // Validate confirm password
    // $isConfirmPasswordMatched = ($password === $confirm_password);
    // // Validate address
    // $containsRestrictedCharsOrNumbersAddress = !preg_match($restrictedCharsAndNumbersRegex, $address);
    // // Validate phone number
    // $containsPhoneNumberRegex = !preg_match($phoneNumberRegex, $phone_no);
    //***********************************************************************************
    //***************************END validation of the input*****************************


    //***********************************************************************************
    //****************************insert data into table users **************************
    $sql_users = "INSERT INTO users(User_Name, Password, E_mail) VALUES (?, ?, ?)";
    $userStatement = $con->prepare($sql_users);
    $userStatement->bind_param("sss", $user_name, $password, $email);
    $userStatement->execute();
    //***********************************************************************************
    //**************************END insert data into table users ************************


    //***********************************************************************************
    //****************************Generate user_id session ******* **********************
    global $user_id;
    $user_id =12;
    try {
        // Get the generated user_id
        $generatedKeys = $userStatement->insert_id;
        if ($generatedKeys > 0) {
             $user_id = $generatedKeys;
            // echo "The User Id From the GetCon Servlet: " . $user_id;

            // Create a session

            $_SESSION["user_id"] = $user_id;
            // echo $user_id;
            // buildSession(request, email);
        } else {
            throw new mysqli_sql_exception("Failed to retrieve the generated user_id.");
        }
    } catch (mysqli_sql_exception $e) {
        // Rollback the transaction in case of any error
        if ($con != null) {
            $con->Rollback();
        }
        throw $e;
    }
    //***********************************************************************************
    //****************************END Generate user_id session **************************


    //***********************************************************************************
    //****************************Insert data into 'students' table *********************
    $sql_students = "INSERT INTO students(user_id,age, address, phone_no) VALUES (?, ?, ?, ?)";
    $studentStatement = $con->prepare($sql_students);
    $studentStatement->bind_param("isss", $user_id, $age, $address, $phone_no);
    $studentStatement->execute();

    if ($studentStatement->affected_rows > 0) {
        
        echo "تم إدخال البيانات بنجاح.";
        $nextPage = "courses.php";
        echo "<script>window.location.href='$nextPage';</script>";
        exit;
    } else {
        echo "حدث خطأ أثناء إدخال البيانات.";
    }
    // Commit the transaction
    $con->commit();
}
//***********************************************************************************
//****************************END Insert data into 'students' table *****************

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
<!-- ***********************************************************************************-->
<!-- ********************End include files of SignUp page***********************************-->

<body>

    <!-- ***********************************************************************************-->
    <!-- ******************************START SIGNUP PAGE ***********************************-->
    <div class="container-log">
        <h2>Sign Up</h2>
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