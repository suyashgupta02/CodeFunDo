
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

<!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require 'connection.php';

$orgname=$_POST['orgname'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$pass=$_POST['pass'];

$query="SELECT * FROM `organisations` WHERE `orgname`='$orgname'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo '<script>  window.addEventListener("DOMContentLoaded", function() {
      swal({
   icon: "error",
  title: "!org already exit",
  showConfirmButton: true,
  confirmButtonText: "Cerrar",
  closeOnConfirm: false
}). then(function(result){
  window.location = "register.php";
             })
    }, false); </script>';
}

else{
$sql2="INSERT INTO `organisations` (`org_id`, `orgname`, `time_stamp`) VALUES (NULL, '$orgname', '')";
$conn->query($sql2);


$sql3="SELECT * FROM `organisations` WHERE `orgname`='$orgname'";
$result = $conn->query($sql3);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $userid = $row["org_id"];
    }
}

$sql = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `points`,`password`,`root`,`org_id`) VALUES (NULL, '$firstname', '$lastname', '$email', '0','$pass','1','$userid')";


if ($conn->query($sql) === TRUE) {
    echo '<script>  window.addEventListener("DOMContentLoaded", function() {
      swal({
   icon: "Good job!",
  title: "Org registered",
  showConfirmButton: true,
  confirmButtonText: "success",
  closeOnConfirm: false
}). then(function(result){
  window.location = "register.php";
             })
    }, false); </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}