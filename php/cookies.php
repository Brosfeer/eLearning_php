<?php
if(isset($_POST["color"])){
    $color = $_POST['color'];
    echo $color;
    setcookie("user", $color, time() + (86400 * 30), "/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            <?php
            if(isset($_COOKIE["user"])){
                echo "background-color: " . $_COOKIE["user"] . ";";
            } else{
                echo "there is no cookies to show";
            }
            ?>
        }
    </style>
</head>
<body>
    <form action="cookies.php" method="POST">
        <label for="color">Choose Your Theme</label>
        <input type="color" name="color"/>
        <input type="submit" value="save" />
    </form>
</body>
</html>