<?php
require 'connection.php';
session_start();
if(!$_SESSION['login']){
    header('Location:register.php');
}
$email=$_SESSION['login'];
$sql="SELECT * FROM `users` WHERE `email`='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $name = $row["firstname"];
    $root=$row['root'];
    $org=$row['org_id'];

    }
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="assets/img/photo1.png">
          </div>
          <a href="#!user"><img class="circle" src="API/0.jpg"></a>
          <a href="#!name"><span class="white-text name">Welcome back, &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; your points( 199) </span></a>
          <a href="#"><span class="white-text email"><?php
                  echo $name;
                  ?>

              </span></a>

        </div>
          <a href="logout.php" class="waves-effect waves-light btn" style="float: right">Logout</a>
      </li>

      <li>
        <form class="sidebar-form">
          <div class="input-group">
            <input id="accounts" type="text" name="username" class="form-control" placeholder="Universal Search" autocomplete="off" />
          </div>
        </form>
      </li>

        <?php if($root){ ?>
      <li><a class="active" href="admin.php"><i class="material-icons pink-item">Dashboard</i>Admin Panel</a></li>


      <?php } ?>
        <li><a class="active" href="newpost.php"><i class="material-icons pink-item">Newpost</i>New POST</a></li>

        <li><a class="subheader">channels</a></li>
        <li><div class="divider"></div></li>
        <li><a href="rss.php"><i class="material-icons pink-item">thumbs_up_down</i>Near by you</a></li>'
        <?php
        $sql1="SELECT * FROM `channels` WHERE `org`='$org'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $channel = $row['channel'];
                echo ' <li><a href="index.php?channel='.$channel.'"><i class="material-icons pink-item">thumbs_up_down</i>'.$channel.'</a></li>';
            }
            }
        ?>

    </ul>
    <main>
    <section class="content">
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img height="64px" src="API/80170187-falcon-eagle-hawk-black-white-tattoo-details-bird-wing.jpg" alt=""> </a>
                <a href="" style="margin-left: 500px">THE HAWK!</a>
                <ul class="right hide-on-med-and-down">
                    <li>





                        <a class = "btn dropdown-button" href = "#" data-activates = "dropdown">Notification[
                             <?php

                            $sql12="SELECT * FROM `numpost`";
                            $result1 = $conn->query($sql12);
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                                    $channel = $row['index']-3;

                                }
                                echo '<script>

var num='.$channel.';
</script>';
                                echo $channel;
                            }

                            if (isset($_GET['channel'])){
                                $channelname= $_GET['channel'];
                                //    echo $_GET['channel'];


                            }
                            else{
                                echo "ALL";
                                $channelname="";
                            }
                            ?>

                            ]
                            <i class = "mdi-navigation-arrow-drop-down right"></i></a>
                        <ul id = "dropdown" class = "dropdown-content">
                            <?php

                            for ($i=0;$i<$channel;$i++){
                                echo '<li><a href = "#!">karan <span class = "new badge">posted</span></a></li>';
                            }
                            ?>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>



        <script type='text/javascript'
                src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap'
                async defer></script>
        <script type='text/javascript'>
            function GetMap() {
                var map = new Microsoft.Maps.Map('#myMap', {
                    credentials: 'AvmasEms6lfBGjdYEChN6CKkBfH63rWbQ28D204Ccc_HR8lZCOqSjoME5E7bSgM8',
                    center: new Microsoft.Maps.Location(22.3176452,87.3165219)
                });


                var latlons = [{lat:22.316926, lon:87.3118498},{lat:22.316926, lon:87.3118498},{lat:22.316926, lon:87.3118498},{lat:22.316926, lon:87.3118498}];
                var name=['karan','pratap','ajinkya','karan','karan'];
                for(var i=0,len = latlons.length;i<len;i++){
                    var pin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(latlons[i].lat, latlons[i].lon),{
                        title: 'Singularity',
                        subTitle: name[i],
                        text: 'H'
                    });
                    map.entities.push(pin);
                }
            }
        </script>

      <!-- Stat Boxes -->

        <div id="myMap" style="position:relative;left:100px;top:20px;width:1000px;height:450px;"></div>
<br><br>













        <?php
if ($channelname=="")
    $query="SELECT * from `posts`";
else
    $query= "SELECT * from `posts` WHERE `channel`='$channelname'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $channel = $row['channel'];

        echo '  <div class="container col s12 m7">
    <h2 class="header"> </h2>
    <div class="card horizontal">
      <div class="card-image">
        
      </div>
      <div class="card-stacked">
        <div class="card-content">
        <h3>'.'karan'.'</h3> <br>
          <h5>'.$row['post'].'</h5>
       
       <div class="switch">
    <label>
      
      <input  type="checkbox">
      <span class="lever"></span>
      News is FAKE
    </label>
  </div>
       <br>
        <div class="form-group">
                <textarea name="comment" id="textarea" class="form-control" required="required" placeholder="Your comments here..."></textarea>
              </div>
              <div class="row">
                <div class="col"><button class="btn btn-success" style="width: 100%;" id="submitt">Comment</button></div>
                <div class="col approval" id="like"></div>
              </div>
        </div>
        <div class="card-action">
         
        </div>
      </div>
    </div>
  </div>
   
  
  
  ';
    }
}



?>
























        </section>
        </main>
        <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
              . All rights reserved.
            </div>
          </div>
        </footer>

        <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
        in the materialize js file & I don't want that.
        -->
        <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

        <script>
        // Hide sideNav
        $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens
          });
          $(document).ready(function(){
          $('.tooltipped').tooltip({delay: 50});
          });
          $('select').material_select();
          $('.collapsible').collapsible();
          </script>
          <div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped" data-position="top" data-delay="50" data-tooltip="Quick Links">

          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      </body>
    </html>