<?php 

session_start();
$username =$_SESSION['user_name'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Student page profile</title>
    <Style>
         .btn {
    display: inline-block;
    padding: 10px 30px;
    font-size: 20px;
    background: #333;
    color: #fff;
    margin: 0 5px;
}
.btn:hover {
    background: crimson;
}

    </Style>
</head>
<body>
    <div><span><h1>this is Student  profile page</h1></span></div>
    <div><span><h1>welcome mr: <?php echo $username;?></h1></span></div>
    <a href="Login.php" class="btn">Login</a>
			<a href="SignUp.php" class="btn">SignUp</a>
			<a href="Logout.php" class="btn">Logout</a>
</body>
</html>