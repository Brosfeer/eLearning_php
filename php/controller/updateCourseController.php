<?php
// session_start();
include 'dbCon.php';

$course_id=$_SESSION['course_id'];

function updateCourseData()
{
    // Get the new values for the course details from the form
    global $con, $course_id;
    echo $course_id;
    $new_co_title = $_POST['new_co_title'];
    $new_desc = $_POST['new_desc'];
    $new_duration = $_POST['new_duration'];

    // Prepare the SQL statement to update the course details
    $sql = mysqli_prepare($con, "UPDATE courses SET title=?, Description=?, duration=? WHERE course_id = ?");

    // Bind the new values to the prepared statement
    mysqli_stmt_bind_param($sql, "sssi", $new_co_title, $new_desc, $new_duration, $course_id);

    // Execute the prepared statement
    mysqli_stmt_execute($sql);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($sql) >= 0) {
        // Display a success message
        echo "<script>alert('Data updated successfully of the course');</script>";
        // echo "<script>window.location.href='teacherPage.php';</script>";
    } else {
        // Display an error message
        echo "<script>alert('Failed to update data of the course');</script>";
    }
}

function updateLessonData()
{
    global $con, $course_id;
    $new_les_title = $_POST['new_les_title'];
    $new_les_content = $_POST['new_les_content'];
    $new_les_vid_url = $_POST['new_les_vid_url'];
    $new_ext_res = $_FILES['new_ext_res']['name'];


    // Handle file uploads
    $new_ext_res_tmp = $_FILES['new_ext_res']['tmp_name'];

    // Move uploaded files to a directory
    move_uploaded_file($new_ext_res_tmp, 'uploads/' . $new_ext_res);


    // Prepare the SQL statement to update the course details
    $sql = mysqli_prepare($con, "UPDATE lessons SET title=?, content=?, video_url=?,external_res=? WHERE course_id = ?");

    // Bind the new values to the prepared statement
    mysqli_stmt_bind_param($sql, "ssssi", $new_les_title, $new_les_content, $new_les_vid_url, $new_ext_res_tmp, $course_id);

    // Execute the prepared statement
    mysqli_stmt_execute($sql);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($sql) >= 0) {
        // Display a success message
        echo "<script>alert('Data updated successfully of the lesson');</script>";
    } else {
        // Display an error message
        echo "<script>alert('Failed to update data of the lesson');</script>";
    }
}

// Check if the form has been submitted
if (isset($_POST['save_co_change'])) {
    updateCourseData();
} else if (isset($_POST['save_les_change'])) {
    updateLessonData();
}
