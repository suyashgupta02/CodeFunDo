<?php

$admin=$_POST['adminadd'];

$sql="UPDATE `users` SET `root` = '1' WHERE `users`.`email` = '$admin'";

if ($conn->query($sql) === TRUE) {

    header('Location:index.php');

}
else{

    echo "email doesn't exit";
}