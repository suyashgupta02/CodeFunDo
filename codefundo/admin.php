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
    <style>
        body
        {
            background: #f5f5f5;
        }

        h5
        {
            font-weight: 400;
        }

        .container
        {
            margin-top: 80px;
            width: 400px;
            height: 700px;
        }

        .tabs .indicator
        {
            background-color: #e0f2f1;
            height: 60px;
            opacity: 0.3;
        }

        .form-container
        {
            padding: 40px;
            padding-top: 10px;
        }

        .confirmation-tabs-btn
        {
            position: absolute;
        }</style>
</head>

<body>

<ul id="slide-out" class="side-nav fixed z-depth-4">
    <li>
        <div class="userView">
            <div class="background">
                <img src="assets/img/photo1.png">
            </div>
            <a href="#!user"><img class="circle" src="API/0.jpg"></a>
            <a href="#!name"><span class="white-text name">Welcome back,  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; your points( 199)</span></a>
            <a href="#"><span class="white-text email"><?php
                    echo $name;
                    ?></span></a>
        </div>
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
        <li><a class="subheader">channels</a></li>
        <li><a class="active" href="newpost.php"><i class="material-icons pink-item">Newpost</i>New POST</a></li>
    <?php } ?>
    <li><div class="divider"></div></li>
    <li><a href="rss.php"><i class="material-icons pink-item">thumbs_up_down</i>Near by you</a></li>'

    <?php
    $sql1="SELECT * FROM `channels` WHERE `org`='$org'";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $channel = $row['channel'];
            echo ' <li><a href=index.php?channel='.$channel.'><i class="material-icons pink-item">thumbs_up_down</i>'.$channel.'</a></li>';
        }
    }
    ?>

</ul>
<main>

    <section class="content">
        <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">// Admin pannel </h1></div>

        <div class="container white z-depth-2">
            <ul class="tabs teal">
                <li class="tab col s3"><a class="white-text active" href="#login">Add Admin</a></li>
                <li class="tab col s3"><a class="white-text" href="#register">MAke new Channels</a></li>
            </ul>
            <div id="login" class="col s12">
                <form class="col s12" action="addadmin.php" method="post">
                    <div class="form-container">
                        <h3 class="teal-text">Add Admin</h3>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="adminadd" id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <br>
                        <center>
                            <button class="btn waves-effect waves-light teal" type="submit" name="action">ADD</button>
                        </center>
                    </div>
                </form>
            </div>
            <div id="register" class="col s12">
                <form class="col s12" method="post" action="addchannel.php">
                    <div class="form-container">
                        <h3 class="teal-text">Make new Channels</h3>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="channel" id="last_name" type="text" class="validate">
                                <label for="last_name">Channel name</label>
                            </div>

                        </div>
                        <center>
                            <button class="btn waves-effect waves-light teal" type="submit" name="action">ADD</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
<footer class="page-footer">
    <div style="height: 50px" class="footer-copyright">
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
        $('.tooltipped').tooltip({delay: 50});
    });
    $('select').material_select();
    $('.collapsible').collapsible();
</script>
<div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped" data-position="top" data-delay="50" data-tooltip="Quick Links">
<a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
</a>
<ul>
    <li><a class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip="Handbook" href="#"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Staff Applications" href="#"><i class="material-icons">format_quote</i></a></li>
    <li><a class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Name Guidelines" href="#"><i class="material-icons">publish</i></a></li>"
    <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Issue Tracker" href="#"><i class="material-icons">attach_file</i></a></li>
    <li><a class="btn-floating orange tooltipped" data-position="top" data-delay="50" data-tooltip="Support" href="#"><i class="material-icons">person</i></a></li>
</ul>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>
</html>