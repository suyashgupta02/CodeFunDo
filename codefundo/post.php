<?php
require 'connection.php';
$post = $_POST['postdata'];
$channel= $_POST['channel'];
//echo $_POST['locationx'];
//echo $_POST['locationy'];
session_start();
 $email = $_SESSION['login'];
echo $channel;

$sql="INSERT INTO `posts` (`post`, `user_id`, `channel`, `confirmation`, `coordinate_x`, `coordinate_y`, `id`) VALUES ('$post', '$email', '$channel', '1', '22.316926', '87.3118498', NULL)";
if($conn->query($sql))
    echo "bcd";

$sql1="INSERT INTO `numpost` (`index`, `numbpost`) VALUES (NULL, '21');";
$conn->query($sql1);
