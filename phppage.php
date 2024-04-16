<?php
session_start();
include 'dbCon.php';

$user_id = 107;
echo $user_id;
if (isset($_POST['submit'])) {
    $co_title = $_POST['co_title'];
    $co_desc = $_POST['co_desc'];
    $co_dur = $_POST['co_dur'];
    // $start_date = date('Y-m-d H:i:s', time());
    // $end_date = date('Y-m-d H:i:s', strtotime('+1 year'));

    echo $start_date;
    echo "<br>";
    echo $end_date;

    if (isset($con)) {
        $selctCourseId = mysqli_prepare($con, "SELECT course_id FROM courses WHERE title=?");
        mysqli_stmt_bind_param($selctCourseId, "s", $co_title);
        mysqli_stmt_execute($selctCourseId);
        mysqli_stmt_bind_result($selctCourseId, $course_id);

        if (mysqli_stmt_fetch($selctCourseId)) {
            echo "<br>COURES_ID: " . $course_id;
            $selctCourseId->close();
            if (isset($con)) {

                echo "hi";
                $sql = "INSERT INTO course_progress (User_id, course_id) VALUES (?,?)";
                $subscribCourse = $con->prepare($sql);
                echo "hi";

                $subscribCourse->bind_param("ss", $user_id, $course_id);
                $subscribCourse->execute();
                $subscribCourse->close();
                $con->close();
            } else {
                echo "there is no connection";
            }
        } else {
            echo "لم يتم العثور على الكورس";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received Data</title>
    <style>
        .table {
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <h1>Received Data</h1>
    <table class="table">
        <tr>
            <th class="table">Content 1</th>
            <th class="table">Content 2</th>
            <th class="table">Content 3</th>
        </tr>
        <tr>
            <td class="table"><?php echo $_POST['co_title']; ?></td>
            <td class="table"><?php echo $_POST['co_desc']; ?></td>
            <td class="table"><?php echo $_POST['co_dur']; ?></td>

        </tr>
    </table>

</body>

</html>