<?php
if (isset($_SESSION['loggedin'])){header('Location: pages/Dashboard_v1.php').exit;} 
if (isset($_GET['email']) && isset($_GET['username'])) { include_once('../Controller/control.login.img.user.php');} 
else {header('Location: logout.php').exit;}
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
        #coop {
            padding: 9px 9px 9px 9px;
            color: #fff;
            background-color: #000000bd;
            max-width: 1110px;
            margin: auto;
            text-align: center;
            overflow: hidden;
            padding: 10px 10px;
        }
        img {
            vertical-align: middle;
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
        #uploadForm {
            float: left;
            width: 100%;
        }
        img, embeb {
            margin-top: 20px;
        }
    </style>
  </head> 
<body onload="myFunction()">
<div id="loader" style="top: 340px;"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">
        <br>
        <br>
        <div class="container">
            <div class='bg-success-default-alert-message'>
                <?php echo '<h3>Hello '.$_GET['username'].'... thanks for subscribing!! </h3>'?>
            </div>
            <hr>
            <div class="row"> 
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <form method="post" action="" enctype="multipart/form-data" name="" id="uploadForm" role="form" autocomplete="off">

                        <?php if(isset($Message)){ foreach($Message as $Message){ echo "<p>".$Message.'</p>';} }?>
                        <?php if(isset($show)){ foreach($show as $show){ echo "<p>".$show.'</p>';} }?>
                        <div class="form-group"> 
                            <div class='bg-success-default'>
                                <input type="file" name="file" id="file" value="seleciona una imagen" />
                            </div>
                        </div>
                </div>
                <!----------------------------------------------------------------------------------------------------->    
                <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class='bg-success-default'>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco <strong style='cursor: pointer; color: #17a2b8;'>Help Bytech</strong> laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco.</p>
                        </div>
                        <br>
                        <!-------------------->
                        <div class="form-group">       
                            <select name="country" class="form-control input-lg">
                                <option value="0" class="form-control input-lg"> Nacionalidad</option>
                                <option value="1" class="form-control input-lg"> Venezuela</option>
                                <option value="2" class="form-control input-lg"> Peru</option>   
                                <option value="3" class="form-control input-lg"> Colombia </option>
                                <option value="4" class="form-control input-lg"> Mexico </option>
                                <option value="5" class="form-control input-lg"> Esparña </option>
                            </select>
                        </div>
                        <!-------------------->
                        <div class="form-group">  
                            <button type="submit" value="Registrarme" id="submit" name="submit" class="btn btn-success btn-block" style="font-size: 13px">Subir Perfil.</button>
                        </div>
                        <!-------------------->
                    </form>
                    <hr>
                    <?php
                        //check for any errors
                        if(isset($error)){ 
                            foreach($error as $error){
                                echo '<p class="bg-danger-default">'.$error.'</p>';
                            }
                        } else { 
                            echo "
                            <div class='bg-danger-default'>
                            <p>
                            If you don't want to change anything, press.<br>
                            <strong style='cursor: pointer; color: #00BCD4;'>
                            <a href='../logout.php'>Sign in without changes.</a>
                            </strong></p> 
                            </div>";
                        }
                    ?>
                    <br>
                </div>
            </div>
            <div id="coop">
                <p>
                We guarantee your security and your private information, as long as you comply with the basic conditions of the system, for more information see. <a href="" id="terms-and-Conditions"><strong> terms and Conditions</strong></a>
                </p>
            </div>
            <br>
            <p id="p3" style="color: #000000a6;"><strong>Bytech ©.</strong> Company.<br>All rights reserved.
            <p id="p3" style="color: #000000a6; font-size: 13px;max-width: 400px;">v.1.4</p>
        </div>
    </div>
    <br>
    <script type="text/javascript">
    function filePreview(input) {
        if (input.files && input.files[0]) {
        
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#uploadForm').after('<img src="'+e.target.result+'" width="350" height="300"><p>Image has been verified successfully</p>');
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function () {
        filePreview(this);
    });
    </script>
<!------------------------------>
<?php include_once('footer.php') ?>
  </body>
</html>