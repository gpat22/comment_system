<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "comment_system";

$conn = mysqli_connect($server , $username , $password , $db_name);

//connection check
if(!$conn){
    echo "<script>alert('Connection Failed');</script>";
    header("Location : index.php");
}
/*else{
echo "<script>alert('connection done');</script>";
}*/



?>