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
    $userType = $_POST['userType'];
    $spec = $_POST['spec'];
    $desc = $_POST['desc'];
    echo "Selected Role: " . $userType;
    echo "<br>Selected Role: " . $spec;

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
    $containsRestrictedCharsAddress = preg_match($restrictedCharsRegex, $address);
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

    $stmt = mysqli_prepare($con, "SELECT E_mail FROM users WHERE E_mail = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result)) {
        $error_meassage = "User Alredy Exist";
    } else {
        if ($userType == 'Student') {
            echo "hi ";
            //***********************************************************************************
            //****************************insert data into table users **************************
            $sql_users = "INSERT INTO users(User_Name, Password, E_mail,userType) VALUES (?, ?, ?,?)";
            $userStatement = $con->prepare($sql_users);
            $userStatement->bind_param("ssss", $user_name, $password, $email,$userType);
            $userStatement->execute();
            //***********************************************************************************
            //**************************END insert data into table users ************************
            //***********************************************************************************
            //****************************Generate user_id session ******* **********************
            global $user_id;
            $user_id = 12;
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
                // header('location:../userProfile.php');
                $nextPage = "Login.php";
                echo "<script>window.location.href='$nextPage';</script>";
                exit;
            } else {
                echo "حدث خطأ أثناء إدخال البيانات.";
            }
            // Commit the transaction
            $con->commit();
        } elseif ($userType == 'Teacher') {
            echo "you are teature";
            echo "admin";
            $teacher ="teacher";
    
            //***********************************************************************************
            //****************************insert data into table users **************************
            $sql_users = "INSERT INTO users(User_Name, Password, E_mail, userType) VALUES (?, ?, ?, ?)";
            $userStatement = $con->prepare($sql_users);
            $userStatement->bind_param("ssss", $user_name, $password, $email,$userType);
            $userStatement->execute();
            //***********************************************************************************
            //**************************END insert data into table users ************************
            //***********************************************************************************
            //****************************Generate user_id session ******* **********************
            global $user_id;
            $user_id = 12;
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
            //*****************start  insert data into table instraction ************************
            $sql_instructors = "INSERT INTO instructors(user_id,teacher_name,specialization, Description) VALUES (?, ?, ?, ?)";
            $teacherStatement = $con->prepare($sql_instructors);
            $teacherStatement->bind_param("isss", $user_id, $user_name, $spec, $desc);
            $teacherStatement->execute();


            if ($teacherStatement->affected_rows > 0) {

                echo "تم إدخال البيانات بنجاح.";
                // header('location:teacherProfile.php');
                $nextPage = "Login.php";
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
    }
}
