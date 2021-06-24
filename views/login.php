<?php
//Conexion
include_once('../Controller/control.login.php');

if(isset($_SESSION['user_id'])){

    header('Location: pages/Dashboard_v1.php').exit;
}
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(64));
    
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12"> 
          <div class="card" style="font-size: 15px;">
            <div class="loginBox">  
                <a href=""><img style="right: 200px;" src="dist/icons/icons8-umbrella-64.png"/></a>
                <h2 class="title-login">Bytech</h2>
                <p id="p3" style="color: #000000a6; font-size: 11px;">Copyright©.<br> All rights reserved.</p>
                <hr>
                <form role="form" method="post" name="script_from" action="" autocomplete="off">
                
                <!-------------------->
                <div class="form-group">       
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="2" maxlength="60">
                </div>
                <!-------------------->
                <div class="form-group">       
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
                </div>
                <!------------------------------------------------------------------------------------->    
                <div class="form-group">
                <input type="submit" name="submit" value="Login" tabindex="5" class="btn btn-success btn-block" style="font-size: 12px;"></input>        
                </div>

                <div class="form-group">
                <a href='login_sign_in.php' class="btn btn-info btn-block" id="btn" title="Create an account" style="font-size: 12px;">Create an account.</a>
                </div>
                </form>
                <div class="form-group">
                    <button type="button" class="btn btn-light" id="btn" style="font-size: 12px;">Login With Google 
                        <img src="https://img.icons8.com/fluent/30/000000/google-logo.png"/></button>
                </div>
                <hr>
                <p>
                    <a href='#' style="text-align: center; overflow: hidden; font-size: 13px;"> You forgot your account. ? </a>
                </p>
                <br>
            </div>            
          </div><!-- /.loginBox --> 
        </div><!-- /.card -->
      </div><!-- /.col -->
    <div style="padding: 10px;">
    <!------------------------------>
    <?php
      //check for any errors
      if(isset($error)){ 
        foreach($error as $error){
            echo '<div class="form-control-default" style="padding: 3px;"><p class="bg-danger-login">'.$error.'</p></div>';
        }
      }
      if(isset($default)){ 
        foreach($default as $default){
            echo '<p class="bg-success-default-login">'.$default.'</p>';
        }
      }
      if(isset($_GET['action']) && isset($_GET['user']) && ! isset($error)){
        //check the action
        switch ($_GET['action']) {
            case 'active':
            echo "<p class='bg-success-default-login'>Hola\n<strong>".$_GET['user']."</strong>\n<br>Su cuenta ya está activada, ahora puede iniciar sesión.</p>";
            break;
            
            case 'reset':
            echo "<p class='bg-danger-login'>Por favor revise su bandeja de entrada para un enlace de restablecimiento.</p>";
            break;
            
            case 'resetAccount':
            echo "<p class='bg-danger-login'>Contraseña cambiada, ahora puede iniciar sesión.</p>";
            break;
        }
      }
    ?>
    </div>    
    <div>
        <p id="style-Copyright" style="max-width: 350px;"> 
            Credentials you enter must start from the first capital letter and the rest in lowercase.
        </p>
        <br>
        <a href="#"><img src="dist/icons/icons8-twitter-32.png"/></a>
        <a href="#"><img src="dist/icons/icons8-github-32.png"/></a>
        <p id="p3" style="color: #000000a6;"><strong>Bytech ©.</strong> Company.<br>All rights reserved.
        <p id="p3" style="color: #000000a6; font-size: 13px;max-width: 400px;">v.1.4</p>
    </div><!-- /.style-Copyright -->
    </div><!-- /.container -->
  <br>
</div>
<!------------------------------>
<?php include_once('footer.php') ?>
  </body>
</html>