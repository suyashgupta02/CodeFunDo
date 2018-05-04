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
            <a href="#!name"><span class="white-text name">Welcome back,</span></a>
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
        <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">//RSS FEED OF MEDIA



                  <div class="container col s12 m7">
    <h2 class="header"> </h2>
    <div class="card horizontal">
      <div class="card-image">

      </div>

      </div>




                  </div>
  </div>
        <div class="container col s12 m7">
            <h2 class="header"> </h2>
            <div class="card horizontal">
                <div class="card-image">

                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h3>WB: Media associations condemn attack during Municipal elections</h3> <hr>
                        <h5>The attack on <b>Media</b> <b>persons</b> during <b>Saturday's</b> Bidhanangar Municipal <b>elections</b> in <b>West Bengal</b> was condemned by several <b>journalist associations</b> in the district today.</h5>
                        <div class="switch">
                            <label>

                                <input  type="checkbox">
                                <span class="lever"></span>
                                News is FAKE
                            </label>
                        </div>
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
        <div class="container col s12 m7">
            <h2 class="header"> </h2>
            <div class="card horizontal">
                <div class="card-image">

                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h3>Chasing hawala trail, I-T seizes Rs 50 cr from Kolkata, Siliguri</h3> <hr>
                        <h5>A highly-placed <b>Kolkata police officer</b> said various teams, consisting of members of STF and its anti-bank <b>fraud section</b>, helped the <b>tax department</b> sleuths <b>conduct</b> the <b>raids</b> at five places in <b>Kolkata.</b></h5>
                        <div class="switch">
                            <label>

                                <input  type="checkbox">
                                <span class="lever"></span>
                                News is FAKE
                            </label>
                        </div>
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
        <div class="container col s12 m7">
            <h2 class="header"> </h2>
            <div class="card horizontal">
                <div class="card-image">

                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h3>GJM MLA Trilok Dewan quits party — two in three days</h3> <hr>
                        <h5>The <b>GJM</b> had earlier announced that its three <b>MLAs</b> would resign from the <b>Assembly</b> to <b>protest</b> against the alleged <b>non-cooperation</b> of the <b>state government</b> with the <b>Gorkhaland Territorial Administration.</b></h5>
                        <div class="switch">
                            <label>

                                <input  type="checkbox">
                                <span class="lever"></span>
                                News is FAKE
                            </label>
                        </div>
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