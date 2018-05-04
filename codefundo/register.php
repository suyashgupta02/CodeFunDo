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
        }
        .teal {
            background-color: #f4425c !important;
        }

    </style>
</head>

<body>


        <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="pafge-announce-text valign">The HAWK</h1></div>
        <div class="container">
            <div class="row">
                <div class=" white z-depth-2">
                    <ul class="tabs teal">
                        <li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
                        <li class="tab col s3"><a class="white-text" href="#register">register</a></li>
                        <li class="tab col s3"><a class="white-text active" href="#orgregister">Register A org</a></li>
                    </ul>
                    <div id="login" class="col s12">
                        <form method="post" action="login.php" class="col s12">
                            <div class="form-container">
                                <h3 class="teal-text">login to an Org.</h3>
                                <?php
                                session_start();
                                if (isset($_SESSION['randominfo']) && !empty($_SESSION['randominfo'])){
                                    echo '<div style="color:red">';
                                    echo $_SESSION['randominfo'];
                                    echo '</div>';
                                }
                                ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="email" id="email1" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="pass" id="password1" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <br>
                                <center>
                                    <button class="btn waves-effect waves-light teal" type="submit" name="action">login</button>
                                    <br>
                                    <br>
                                    <a href="">Forgotten password?</a>
                                </center>
                            </div>
                        </form>
                    </div>
                    <div id="register" class="col s12">
                        <form class="col s12" action="reg.php" method="post">
                            <div class="form-container">
                                <h3 class="teal-text">Register in an organisation: verification will be required by Org</h3>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="orgname" id="orgname1" type="text" class="validate">
                                        <label for="email">ORG name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="firstname" id="last_name3" type="text" class="validate">
                                        <label for="last_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="lastname" id="last_name4" type="text" class="validate">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="email" id="email2" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                            <input name="pass1" id="password2" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
                                </center>
                            </div>
                        </form>
                    </div>

                    <div id="orgregister" class="col s12">
                        <form id="orgreg" METHOD="POST" action="orgreg.php" class="col s12">
                            <div class="form-container">
                                <h3 class="teal-text">Register a new org</h3>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="orgname" id="orgname2" type="text" class="validate">
                                        <label for="orgname">Organisation name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input  name="firstname" id="last_name1" type="text" class="validate">
                                        <label for="First_name"> org root user First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="lastname" id="last_name2" type="text" class="validate">
                                        <label for="last_name">org root user Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="email" id="email3" type="email" class="validate">
                                        <label for="email">org root user Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="pass" id="password3" type="password" class="validate">
                                        <label for="password">org root user Password</label>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
                                </center>
                            </div>
                        </form>
                    </div>



                </div>













            </div>
        </div>

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



<?php
/**
 * Created by PhpStorm.
 * User: karan
 * Date: 24-03-2018
 * Time: 10:59
 */