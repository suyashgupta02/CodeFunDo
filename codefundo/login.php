<?php
require 'connection.php';

$email = $_POST['email'];
$pass=$_POST['pass'];
$sql="SELECT * FROM `users` WHERE `email` = '$email' and `password`='$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userid = $row["email"];
        }
    session_start();
    $_SESSION['login']="$userid";
    header('Location:index.php');
}
else{
    session_start();
    $_SESSION['randominfo']="Login info not correct";
    header('Location:register.php');
}