<?php
include '../dbCon.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// try {
//     // Your database operations here
//     if($con){
//         echo "connect ";
//     }
// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// }


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

    // Lesson details
    $le_title = $_POST['le_title'];
    $content = $_POST['content'];
    $vid_url = $_POST['vid_url'];
    $ext_res = $_FILES['ext_res']['name']; // Assuming you'll store the external resource filename in the database

    // Handle file uploads
    $image_tmp = $_FILES['image']['tmp_name'];
    $ext_res_tmp = $_FILES['ext_res']['tmp_name'];
    echo $image_tmp;

    // // Move uploaded files to a directory
    // move_uploaded_file($image_tmp, 'uploads/' . $image);
    // move_uploaded_file($ext_res_tmp, 'uploads/' . $ext_res);

    // Database connection
    // $db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

    // Insert course details into the database
    try {
        $stmt = $con->prepare("INSERT INTO courses (title, Description, duration, courses_image) VALUES (:co_title, :description, :duration, :image)");
        $stmt->bind_param(':co_title', $co_title);
        $stmt->bind_param(':description', $description);
        $stmt->bind_param(':duration', $duration);
        $stmt->bind_param(':image', $image);
        $stmt->execute();

        // Insert lesson details into the database
        $stmt = $con->prepare("INSERT INTO lessons (title, content, video_url, external_res) VALUES (:le_title, :content, :vid_url, :ext_res)");
        $stmt->bind_param(':le_title', $le_title);
        $stmt->bind_param(':content', $content);
        $stmt->bind_param(':vid_url', $vid_url);
        $stmt->bind_param(':ext_res', $ext_res);
        $stmt->execute();

        if ($stmt) {
            echo "Form submitted successfully.";
        } else {
            echo "Error submitting form.";
        }
    } catch (Error $e) {
        echo "Error: " . $e->getMessage();
    }
}else {
    echo "not submited";
}

// echo "ksajlksajjsa";
