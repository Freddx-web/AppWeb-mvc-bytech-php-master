<?php
include_once('../Controller/control.sign_in.php');

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(64));

$id_token = $_SESSION['token'];

if(isset($_SESSION['user_id'])){

    header('Location: pages/Dashboard_v1.php').exit;

} else {  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Create an account or Login</title> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS Link-->
    <link rel="stylesheet" href="css/style_fonts.css">
    <link rel="stylesheet" href="css/style_footer.css">
    <link rel="stylesheet" href="css/style_fonts_form_control">
    <!--<link rel="stylesheet" href="css/style_fonts_bg-bubbles.css">-->
    <link rel="stylesheet" href="css/style_header_default.css">
    <link rel="stylesheet" href="css/style_loader_Overlay.css">
    <link rel="stylesheet" href="css/style_Fullscreen_Overlay.css">
    <link rel="stylesheet" href="css/style_fonts_alert.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Script Link-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  
    <style type="text/css">
         .form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 0.7rem;
    font-weight: 400    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;

    }
    .btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #68ff8a;
    }
    .btn-info{
    color: #fff;
    background-color: #1dc2dc;
    border-color: #00dbff;
    }
    .btn-google {
    color: #212529;
    background-color: #eaeaea;
    border-color: #dcdcdc;
    }
    .btn-google:hover {
    color: #ffffff;
    background-color: #ff3600c4;
    border-color: #ff0000;
    }
    .rounded-circle {
        width: 60px;
        height: 40px;
    }
    </style>
  </head> 
 <body onload="myFunction()">
<div id="loader" style="top: 340px;"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">
        <!------------------------------------------------------>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="#">About</a>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   Lorem ipsum dolor <b style="cursor: pointer; color: #00BCD4;">simple@gmail.com</b> 
                   sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
            </div>
        </div>
        <br>
        <!------------------------------------------------------>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <table>
                        <tr>
                            <td>
                                <a href="#">
                                    <span style="cursor: pointer;" onclick="openNav()">
                                        <img src='https://img.icons8.com/color/96/000000/umbrella.png'/>
                                </a>
                            <td colspan="3">
                                <a href="index.php">
                                    <h1 class="title" style="font-size: 60px; color: #000000cf">Bytech</h1>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="container">
                <p style="color: #000000cf">
                    Welcome to our information and research platform for free software, applications, open source, artificial intelligence, for the advancement of future developers from all over the world.
                </p>
                <?php
                //if action is joined show sucess

                    if(isset($_GET['default']) && !isset($error)){

                       echo '<p class="bg-success-default">Your registration was successful!</p>'; 

                    }  

                    if (!isset($error) && isset($_GET['action'])) {
                        # code...
                        switch ($_GET['action']) {
                            
                            case 'active':
                            echo "<p class='bg-success-default'>Su cuenta ya está activa, ahora puede iniciar sesión.</p>";
                            break;

                            case 'sendEmail' :
                            echo "<p class='bg-success-default'>Por favor revise su bandeja de entrada para un enlace de restablecimiento.</p>";
                            break;

                            case 'reset' :
                            echo '<p class="bg-danger-default"> Su tiempo Aspiro. Trata de nuevo.!</p>';
                            break;

                            case 'resetAccount':
                            echo "<p class='bg-success-default'>Contraseña cambiada, ahora puede iniciar sesión.</p>";
                            break;
                        }
                    }           
                ?>
            </div>
            <!----------------------------------------------------------------------------->
            <div class="row"> 
                <div class="col-sm-12 col-md-6 col-lg-6">
                <h2><p id="p1">Log in</p></h2>
                    <hr />
                    <div style="min-height: 187px;">
                        <div style="padding: 7px;">
                            <p>Link to the Application terms of service.<br>
                            <a href="#" title="Contact Here"><span style="cursor: pointer; color: #00BCD4;" onclick="openNav()">
                            <strong>Terms and Conditions</strong></span></a></p>
                        </div>

                        <button href="#" class="btn btn-light" id="btn" style="font-size: 12px;">Login With Google 
                        <img src="https://img.icons8.com/fluent/30/000000/google-logo.png"/></button>

                    </div>
                    <a href="login.php" class="btn btn-success btn-block" style="font-size: 12px;">Login.</a>
                     <hr>
                </div>
                <!----------------------------------------------------------------------------->  
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h2><p id="p1" >Create an account</p></h2><hr />
                    <form role="form" method="post" action="" name="script_from" autocomplete="off">
                        <div class="form-group">       
                            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1" maxlength="20">
                        </div> 
                        <!-------------------->
                        <div class="form-group">       
                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="2" maxlength="60">
                        </div>
                        <!-------------------->
                        <div class="form-group">       
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
                        </div>
                        <!-------------------->
                        <div class="form-group">       
                            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirmar Password" tabindex="4">
                        <input type="hidden" name="token_complete">
                        </div>
                        <!-------------------->
                        <button type="submit" value="Registrarme" id="submit" name="submit" Class="btn btn-info btn-block" style="font-size: 12px;">Sign in </button>
                    </form>
                    <hr>
                </div>
            </div>
            <!----------------------------------------------------------------------------------------------------->
            <?php
                //check for any errors
                if(isset($error)){ 
                    foreach($error as $error){
                        echo '<p class="bg-danger-default">'.$error.'</p>';
                    }
                }
                if(isset($default)){ 
                    foreach($default as $default){
                        echo '<p class="bg-danger-default">'.$default.'</p>';
                    }
                }
            ?>
            <p id="style-Copyright" style="max-width: 1200px;"> 
                Credentials you enter must start from the first capital letter and the rest in lowercase.
            </p>
            <br>
            <a href="#"><img src="dist/icons/icons8-twitter-32.png"/></a>
            <a href="#"><img src="dist/icons/icons8-github-32.png"/></a>
            <p id="p3" style="color: #000000a6;"><strong>Bytech ©.</strong> Company.<br>All rights reserved.
        </div>
        <br> 
    </div>
</div>
<!------------------------------>
<?php include_once('footer.php') ?>
  </body>
</html>