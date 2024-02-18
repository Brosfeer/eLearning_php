<?php
session_start();
require "../header.html";
include 'dbCon.php';

if (isset($_SESSION["user_id"])) {

    $user_id = $_SESSION["user_id"];

    echo "the user_id = $user_id";

    $course_id = ""; // Initialize the global variable




    function getCoursesTitles()
    {
        global $con; // Declare the global variable

        $getInfo = mysqli_prepare($con, "SELECT title FROM courses");
        mysqli_stmt_execute($getInfo);
        $result = mysqli_stmt_get_result($getInfo);

        $titles = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $titles[] = $row['title'];
        }

        return $titles;
    }
    // displaying the courses titles
    $selectedTitle = "";
    function displayTitles()
    {
        global $selectedTitle;
        $titles = getCoursesTitles();
        foreach ($titles as $title) {
            echo "<li> <a href='?selectedTitle=" . urlencode($title) . "'>$title</a></li>";
        }
        // Check if a course title has been clicked
        if (isset($_GET['selectedTitle'])) {
            // Store the clicked course title in the global variable
            $selectedTitle = urldecode($_GET['selectedTitle']);
        }
        // echo $selectedTitle;
        function getCourseDetails()
        {
            global $con, $selectedTitle; // Declare the global variable

            $getInfo = mysqli_prepare($con, "SELECT * FROM courses WHERE title = ?");
            mysqli_stmt_bind_param($getInfo, "s", $selectedTitle);
            mysqli_stmt_execute($getInfo);
            $result = mysqli_stmt_get_result($getInfo);

            $courseDetails = mysqli_fetch_assoc($result);

            return $courseDetails;
        }
    }
    // echo "the ss" . $selectedTitle;

    echo $selectedTitle;
}
