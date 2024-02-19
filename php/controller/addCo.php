<?php
include '../dbCon.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


$user_id = $_SESSION["user_id"];
echo $user_id;
if (isset($_POST['submit'])) {
    // category details
    $category = $_POST['cate'];

    // Course details
    $co_title = $_POST['co_title'];
    $description = $_POST['desc'];
    $duration = $_POST['duration'];
    $image = $_FILES['image']['name']; // Assuming you'll store the image filename in the database
    // echo $image;



    // Lesson details
    $le_title = $_POST['le_title'];
    $content = $_POST['content'];
    $vid_url = $_POST['vid_url'];
    $ext_res = $_FILES['ext_res']['name']; // Assuming you'll store the external resource filename in the database

    // Handle file uploads
    $image_tmp = $_FILES['image']['tmp_name'];
    $ext_res_tmp = $_FILES['ext_res']['tmp_name'];
    echo '<br>' . $image_tmp;
    // echo "<img src='$image_tmp'/>";

    // Move uploaded files to a directory
    move_uploaded_file($image_tmp, 'uploads/' . $image);
    move_uploaded_file($ext_res_tmp, 'uploads/' . $ext_res);
    // move_uploaded_file()
$cat=2;

    // Insert course details into the database
    try {
        // this using mysqli 
        echo "<br>before inserting";
        $stmt = $con->prepare("INSERT INTO courses (title, Description, duration, courses_image,category_id) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param('ssssi', $co_title, $description, $duration, $image_tmp,$cat);
        $stmt->execute();

        // Get the ID of the last inserted record
        $course_id = $con->insert_id;

        echo "<br>Inserted course ID: " . $course_id."<br>";

        echo "<br>insertede<br>";


        // Insert lesson details into the database
        // this using mysqli 
        $stmt = $con->prepare("INSERT INTO lessons (course_id,title, content, video_url, external_res) VALUES (?,?, ?, ?, ?)");
        $stmt->bind_param('issss',$course_id, $le_title, $content, $vid_url, $ext_res);
        $stmt->execute();
        echo "<br>inserted to the lesson<br>";

        if ($stmt) {
            echo "<br>";
            echo "Form submitted successfully.";
            echo "<br>";
        } else {
            echo "<br>";
            echo "Error submitting form.";
            echo "<br>";
        }
    } catch (Error $e) {
        echo "<br>";
        echo "Error: " . $e->getMessage();
        echo "<br>";
    }
} else {
    echo "not submited";
}

// echo "ksajlksajjsa";
