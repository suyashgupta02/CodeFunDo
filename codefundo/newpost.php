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
    <script type='text/javascript'
            src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap'
            async defer></script>


</head>

<body>

<ul id="slide-out" class="side-nav fixed z-depth-4">
    <li>
        <div class="userView">
            <div class="background">
                <img src="assets/img/photo1.png">
            </div>
            <a href="#!user"><img class="circle" src="API/0.jpg"></a>
            <a href="#!name"><span class="white-text name">Welcome back, &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; your points( 199)</span></a>
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
        <li><a class="active" href="newpost.php"><i class="material-icons pink-item">Newpost</i>New POST</a></li>
        <li><a class="subheader">channels</a></li>
    <?php } ?>
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
        <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">//

    </div>

        <!-- Stat Boxes -->
        <hr>
        <h1>Post a news</h1>
        <div class="row">
            <form id="postdata" class="col s12">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="disabled" type="text" >
                            <label for="disabled">Enter the news</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        Channel in which you want to post
                        <div class="input-field inline">
                            <input id="email"  >
                            <label for="email" data-error="wrong" data-success="right">Channel</label>
                        </div>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>
        </div>

        <div  id="mymap" style="position:relative;width:600px;height:10px;"></div>




    </section>
</main>
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            © 2017 Farooq Designs. All rights reserved.
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

    });
    $('select').material_select();
    $('.collapsible').collapsible();
</script>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>
</html>

<script>
    var  locationx=0;
    var locationy=0;
    //function GetMap() {
    //     var map = new Microsoft.Maps.Map('#mymap', {
    //         credentials: 'AvmasEms6lfBGjdYEChN6CKkBfH63rWbQ28D204Ccc_HR8lZCOqSjoME5E7bSgM8'
    //     });
    //
    //
    //     navigator.geolocation.getCurrentPosition(function (position) {
    //         var loc = new Microsoft.Maps.Location(
    //             position.coords.latitude,
    //             position.coords.longitude);
    //         console.log (position.coords.latitude);
    //         console.log(position.coords.longitude);
    //         locationx =  position.coords.latitude;
    //         locationy =  position.coords.longitude;
    //
    //         var pin = new Microsoft.Maps.Pushpin(loc);
    //         map.entities.push(pin);
    //
    //         //Center the map on the user's location.
    //         map.setView({ center: loc, zoom: 15 });
    //     });
    // }
   // GetMap();</script>
<script>
    $("#postdata").submit(function(e) {

        var post=$("#disabled").val();
        var channel=$("#email").val();

        $.ajax({
            type: "POST",
            url: 'post.php',
            data: {'postdata':post,'channel':channel,'locationx':'22.316926','locationy':'87.3118498'}, // serializes the form's elements.
            success: function(data)
            {
alert(data);
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>