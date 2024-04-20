<?php
session_start();
include 'dbCon.php';
// if (isset($_SESSION["course_id"])) {

// $course_id = $_SESSION["user_id"];

// echo "the course_id = $course_id";
$co_title;
$co_desc;
$co_duration;
$les_title;
$les_content;
$les_vid_url;
$les_ext_res;



function getCoursesDetails()
{
    global $con, $course_id, $co_title, $co_desc, $co_duration;
    //    retrive the data of the course 
    // $course_id = 52; // demo course ID
    $stmt = mysqli_prepare($con, "SELECT title, Description, duration FROM courses WHERE course_id=?");
    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "i", $course_id);
    if (!mysqli_stmt_execute($stmt)) {
        die("Error executing statement: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_bind_result($stmt, $title, $description, $duration);
    if (mysqli_stmt_fetch($stmt)) {
        // Now you can use the $title, $description, $duration, and $course_image variables elsewhere in your code
        $co_title = $title;
        $co_desc = $description;
        $co_duration = $duration;
    } else {
        echo "No course found.";
    }

    mysqli_stmt_close($stmt);
}
// getCoursesDetails();
// echo "the course title is $co_title";
function getLessonsDetails()
{
    global $con, $course_id, $les_title, $les_content, $les_vid_url, $les_ext_res;
    //    retrive the data of the course 
    $course_id = 52; // Example course ID
    $stmt = mysqli_prepare($con, "SELECT title, content, video_url, external_res FROM lessons  WHERE course_id=?");
    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "i", $course_id);
    if (!mysqli_stmt_execute($stmt)) {
        die("Error executing statement: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_bind_result($stmt, $title, $content, $video_url, $external_res);
    if (mysqli_stmt_fetch($stmt)) {
        // Now you can use the $title, $description, $duration, and $course_image variables elsewhere in your code
        // echo "the lesson title is $title";
        $les_title = $title;
        $les_content = $content;
        $les_vid_url = $video_url;
        $les_ext_res = $external_res;
    } else {
        echo "No course found.";
    }

    mysqli_stmt_close($stmt);
}
// getLessonsDetails();

// }