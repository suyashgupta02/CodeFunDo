<?php

require 'connection.php';
 $channel = $_POST['channel'];

 $sql="INSERT INTO `channels` (`id`, `channel`, `org`) VALUES ('', '$channel', '1')";
if ($conn->query($sql) === TRUE) {

    header('Location:index.php');

}
else{

    echo "error in adding channel";
}