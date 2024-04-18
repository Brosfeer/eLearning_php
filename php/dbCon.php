<?php 
// echo "hi ms osama welcome to your db_php";
// $host ="localhost";
// $db="e_learning";
// $user="root";
// $pass="";
// $charset="utf8mb4";
// $dsn="mysql:host=$host;dbname=$db;charset=$charset";

// $option =[
//     PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES=>false,

// ];
// try{
//     $pdo =new PDO($dsn,$user,$pass,$option);
// }catch(\PDOException $e){
//     echo "the exption is ".$e->getMessage();
// }
$con =mysqli_connect('localhost','root','','e_learning');

if(!$con){
    echo "Error :" .mysqli_connect_error();
}

// $user_name =$_POST['user_name'];
// $password =$_POST['password'];
// if(isset($_POST['submit'])){
//     echo $user_name . '  ' . $password;
// }

?>