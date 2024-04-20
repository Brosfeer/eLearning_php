<?php
include 'dbCon.php';
require "../header.html";

//////////////////////////////////////////////////////////////////////////
/////////////////////////Denying Access//////////////////////////////////
if (isset($_POST['username2'])) {
    $username2 = $_POST['username2'];
    echo "$username2";
    $sql = "SELECT * FROM users WHERE E_mail = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username2);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // المستخدم موجود في قاعدة البيانات
        // قم بإعادة توجيه المستخدم إلى صفحة الرفض
        $sqlforDeny = "UPDATE `users` SET `Prev`= 'Deny' where E_mail = ?";
        $stmtDeny = $con->prepare($sqlforDeny);
        $stmtDeny->bind_param("s", $username2);
        $stmtDeny->execute();
        echo "<script>window.location.href = 'deny.php';</script>";
    } else {
        // المستخدم غير موجود في قاعدة البيانات
        echo "<script>window.location.href = 'Admin.php';</script>";
    }
}
//////////////////////////////////////////////////////////////////////////
/////////////////////////Granting Access//////////////////////////////////
if (isset($_POST['username1'])) {
    $username1 = $_POST['username1'];
    echo "$username1";
    $sql = "SELECT * FROM users WHERE E_mail = ?";
    $stmtGrant = $con->prepare($sql);
    $stmtGrant->bind_param("s", $username1);
    $stmtGrant->execute();
    $result = $stmtGrant->get_result();
    if ($result->num_rows > 0) {
        // المستخدم موجود في قاعدة البيانات
        // قم بإعادة توجيه المستخدم إلى صفحة الرفض
        $sqlforGrant = "UPDATE `users` SET `Prev`= 'Grant' where E_mail = ?";
        $stmtGrant = $con->prepare($sqlforGrant);
        $stmtGrant->bind_param("s", $username1);
        $stmtGrant->execute();
        echo "<script>window.location.href = 'Grant.php';</script>";
    } else {
        // المستخدم غير موجود في قاعدة البيانات
        echo "<script>window.location.href = 'Admin.php';</script>";
    }
}
//////////////////////////////////////////////////////////////////////////
/////////////////////////User Cont by Role///////////////////////////////
//////////////Teacher////////////////////////
if (isset($con)) {
    $teacher = "Teacher";
    $sqlForTeacher = "SELECT * FROM `users` WHERE userType= ?";
    $stmtTeacher = $con->prepare($sqlForTeacher);
    $stmtTeacher->bind_param("s", $teacher);
    $stmtTeacher->execute();
    $result = $stmtTeacher->get_result();
    $data = array();

    // الحصول على عدد العناصر الراجعة من قاعدة البيانات
    $numOfTeacher = $result->num_rows;

    echo  $numOfTeacher;
}

//////////////Student////////////////////////
if (isset($con)) {
    $student = "Student";
    $sqlForStudent = "SELECT * FROM `users` WHERE userType= ?";
    $stmtStudent = $con->prepare($sqlForStudent);
    $stmtStudent->bind_param("s", $student);
    $stmtStudent->execute();
    $result = $stmtStudent->get_result();
    $data = array();

    // الحصول على عدد العناصر الراجعة من قاعدة البيانات
    $numOfStudent = $result->num_rows;

    echo  $numOfStudent;
}
//////////////////////////////////////////////////////////////////////////
/////////////////////////Student-Teacher Relationships////////////////////
if (isset($con)) {
    $stmtGetUsersDate = mysqli_prepare($con, "SELECT `user_id`,`User_Name`,`E_mail`,`Prev` FROM users");
    mysqli_stmt_execute($stmtGetUsersDate);
    $result = mysqli_stmt_get_result($stmtGetUsersDate);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    foreach ($data as $index => $row) {
      

        switch ($index) {
            case 0:
                $id1 = "<td>" . $row['user_id'] . "</td>";
                $name1 = "<td>" . $row['User_Name'] . "</td>";
                $Email1 = "<td>" . $row['E_mail'] . "</td>";
                $Prev1 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 1:
                $id2 = "<td>" . $row['user_id'] . "</td>";
                $name2 = "<td>" . $row['User_Name'] . "</td>";
                $Email2 = "<td>" . $row['E_mail'] . "</td>";
                $Prev2 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 2:
                $id3 = "<td>" . $row['user_id'] . "</td>";
                $name3 = "<td>" . $row['User_Name'] . "</td>";
                $Email3 = "<td>" . $row['E_mail'] . "</td>";
                $Prev3 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 3:
                $id4 = "<td>" . $row['user_id'] . "</td>";
                $name4 = "<td>" . $row['User_Name'] . "</td>";
                $Email4 = "<td>" . $row['E_mail'] . "</td>";
                $Prev4 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 4:
                $id5 = "<td>" . $row['user_id'] . "</td>";
                $name5 = "<td>" . $row['User_Name'] . "</td>";
                $Email5 = "<td>" . $row['E_mail'] . "</td>";
                $Prev5 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 5:
                $id6 = "<td>" . $row['user_id'] . "</td>";
                $name6 = "<td>" . $row['User_Name'] . "</td>";
                $Email6 = "<td>" . $row['E_mail'] . "</td>";
                $Prev6 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 6:
                $id7 = "<td>" . $row['user_id'] . "</td>";
                $name7 = "<td>" . $row['User_Name'] . "</td>";
                $Email7 = "<td>" . $row['E_mail'] . "</td>";
                $Prev7 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 7:
                $id8 = "<td>" . $row['user_id'] . "</td>";
                $name8 = "<td>" . $row['User_Name'] . "</td>";
                $Email8 = "<td>" . $row['E_mail'] . "</td>";
                $Prev8 = "<td>" . $row['Prev'] . "</td>";
                break;
            case 8:
                $id9 = "<td>" . $row['user_id'] . "</td>";
                $name9 = "<td>" . $row['User_Name'] . "</td>";
                $Email9 = "<td>" . $row['E_mail'] . "</td>";
                $Prev9 = "<td>" . $row['Prev'] . "</td>";
                break;
        }
    }
}

//////////////////////////////////////////////////////////////////////////
///////////////////////delet user/////////////////////////////////////////
if (isset($_POST['deleteuser'])) {
    $userId =$_POST['deleteuser'];
    $deleteSQL =$con->prepare("DELETE FROM `users` WHERE `user_id` =?");
    $deleteSQL->bind_param("s" ,$userId);
    $deleteSQL->execute();
    
}
?>
<!-- File: admin.html -->

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .deny {
            color: red;
        }

        .grant {
            color: green;
        }
    </style>
</head>

<body>
    <!-- ******************************************************************************* -->

    <div class="container my-5">
        <h1>Mangening the a Count Logining</h1><br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Granting Access</h1>
                    </div>
                    <div class="card-body">
                        <form action="admin.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">E_mail:</label>
                                <input type="text" class="form-control" id="username" name="username1" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Grant</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Denying Access</h1>
                    </div>
                    <div class="card-body">
                        <form action="admin.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">E_mail:</label>
                                <input type="text" class="form-control" id="username" name="username2" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Deny</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ******************************************************************************* -->
    <hr style="border: 4px solid ;">
    <!-- ******************************************************************************* -->
    <div class="container my-5">
        <h1>User Count by Role</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Teachers</h2>
                    </div>
                    <div class="card-body">
                        <p id="teacher-count" style="text-align: center;"><?php echo  $numOfTeacher; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Students</h2>
                    </div>
                    <div class="card-body">
                        <p id="student-count" style="text-align: center;"><?php echo  $numOfStudent; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ******************************************************************************* -->
    <hr style="border: 4px solid ;">
    <!-- ******************************************************************************* -->
    <div class="container my-5">
        <h1>Student-Teacher Relationships</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Teachers</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bob Johnson</td>
                    <td>John Doe, Jane Smith</td>
                </tr>
                <tr>
                    <td>Alice Williams</td>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <td>Tom Davis</td>
                    <td>Jane Smith</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- ******************************************************************************* -->
    <hr style="border: 4px solid ;">
    <!-- ******************************************************************************* -->

    <div class="container my-5">
        <h1>User Access Rights</h1>
        <div class="card-body">
            <form action="admin.php" method="post">
                <div class="mb-3">
                    <label for="deletuser" class="form-label">Enter User Id To Remove The User:</label>
                    <input type="text" class="form-control" id="username" name="deleteuser" required>
                </div>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
        <table class="table table-hover text-align table-striped" style="text-align: start;">
            <thead>
                <tr>
                    <th>User_id</th>
                    <th>Username</th>
                    <th>E_Mail</th>
                    <th>Access</th>
                </tr>
            </thead>
        </table>
        <table class="table table-striped table-hover" style="text-align: star;">

            <tbody style="text-align: center;">
                <tr>
                    <td><?php echo $id1 ?></td>
                    <td><?php echo $name1 ?></td>
                    <td><?php echo $Email1 ?></td>
                    <td id="prevCell"> <?php echo $Prev1 ?></td>
                </tr>
                <tr>
                    <td><?php echo $id2 ?></td>
                    <td><?php echo $name2 ?></td>
                    <td><?php echo $Email2 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev2 ?></td>

                </tr>
                <tr>
                    <td><?php echo $id3 ?></td>
                    <td><?php echo $name3 ?></td>
                    <td><?php echo $Email3 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev3 ?></td>

                </tr>
                <tr>
                    <td><?php echo $id4 ?></td>
                    <td><?php echo $name4 ?></td>
                    <td><?php echo $Email4 ?></td>
                    <td class="text-success fw-bold" id="prevCell"> <?php echo $Prev4 ?></td>
                </tr>
                <tr>
                    <td><?php echo $id5 ?></td>
                    <td><?php echo $name5 ?></td>
                    <td><?php echo $Email5 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev5 ?></td>
                </tr>
                <tr>
                    <td><?php echo $id6 ?></td>
                    <td><?php echo $name6 ?></td>
                    <td><?php echo $Email6 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev6 ?></td>
                </tr>
                <tr>
                    <td><?php echo $id7 ?></td>
                    <td><?php echo $name7 ?></td>
                    <td><?php echo $Email7 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev7 ?></td>
                </tr>
                <tr>
                    <td><?php echo $id8 ?></td>
                    <td><?php echo $name8 ?></td>
                    <td><?php echo $Email8 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev8 ?></td>
                </tr>
                <tr>
                    <td><?php echo $id9 ?></td>
                    <td><?php echo $name9 ?></td>
                    <td><?php echo $Email9 ?></td>
                    <td class="text-success fw-bold" id="prevCell"><?php echo $Prev9 ?></td>
                </tr>

            </tbody>
        </table>
    </div>
    <!-- ******************************************************************************* -->
    <hr style="border: 4px solid ;">
    <!-- ******************************************************************************* -->
    <hr style="border: 4px solid ;">
    <script>
        // Get all the cells with the "prevCell" ID
        var prevCells = document.querySelectorAll('#prevCell');

        // Loop through the cells and change the color based on the value
        prevCells.forEach(function(cell) {
            var value = cell.textContent.trim().toLowerCase();
            if (value === 'deny') {
                cell.classList.add('deny');
            } else if (value === 'grant') {
                cell.classList.add('grant');
            }
        });
    </script>
</body>

</html>
<?php include '../footer.html' ?>