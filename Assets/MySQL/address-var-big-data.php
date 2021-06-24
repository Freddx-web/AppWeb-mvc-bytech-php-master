<?php
//ob_start();
//session_start();


//set timezone
date_default_timezone_set('America/Caracas');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','data_base1');
define('PORT', '3306');
define('CHARSET', 'utf8mb4');

//Table
define('TABLE_1', '');
define('TABLE_2', '');
define('TABLE_3', '');

// Parametros
define('param_1', '');
define('param_2', '');
define('param_3  ', '');

//application address
define('TITLE', 'Bytech');
//Re direcion: sign_in.php
define('DIR' ,         'http://localhost/WWW/Bytech_v.1.4/views/sign_in.php?');
define('NEW_USER_URL', 'http://localhost/WWW/Bytech_v.1.4/views/login_insert_pass.php?');
define('RE_DIR',       'http://localhost/WWW/Bytech_v.1.4/views/login.php?');
define('LOGIN_PAGE',   'http://localhost/WWW/Bytech_v.1.4/views/login.php?');
define('HOME_PAGE',    'http://localhost/WWW/Bytech_v.1.4/views/login_sign_in.php');
define('REEMAIL',      'http://localhost/WWW/Bytech_v.1.4/views/login_rescues_user_update_security.php?');

//Email de la compañia
define('SITEEMAIL','bytochcompany@gmail.com');



//Show Message

$Message_1 = /*Message_1*/ 
            "<!DOCTYPE html><html><head><meta charset='utf-8'></head><body style='color:#3e3e3e;'>
			<h1><img src='https://img.icons8.com/color/36/000000/umbrella.png'/>
			Welcome \n<strong style='cursor: pointer; color: #00BCD4;'>Bytech</strong></h1>
			<h2>Hola\n<strong style='cursor: pointer; color: #00BCD4;'>";
            define('Message_1',   $Message_1);

$Message_2 = /*Message_2*/
            "</strong>\ngracias por preferirnos,
			te damos la Bienvenida a nuestra plataforma</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			<br>dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
			\n<strong style='cursor: pointer; color: #00BCD4;'>bytochcompany@gmail.com
			</strong>\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
            define('Message_2',   $Message_2);

$Message_3 =/*Message_3*/
            "<!DOCTYPE html><html><head><meta charset='utf-8'></head><body style='color:#3e3e3e;'>
            <h1><img src='https://img.icons8.com/color/36/000000/umbrella.png'/>Welcome\n
            <strong style='cursor: pointer; color: #00BCD4;'>Bytech</strong></h1>
            <h2><strong style='cursor: pointer; color: red;'>ALERTA:</strong>\nHola este 
            es una prueba de reactivacion de su cuenta de correo</h2><p>Este momento esta siendo 
            verificado su cuenta, es para confirmar, la legitimidad del usuario al registraser 
            en\n<strong style='cursor: pointer; color: #00BCD4;'>Bytech.
            </strong>\n<br>Este mensaje es en caso de recuperacion de contraseña. Si no es usted inore 
            este <strong style='cursor: pointer; color: red;'>mensaje o borrelo</strong><br>En este 
            caso si es asi\n<strong style='cursor: pointer; color: #00BCD4;'>Confirme su cuenta</strong>\n
            si es usted que envio dicho confirmacion en<strong style='cursor: pointer; color: #00BCD4;'>
            Bytcho.</strong>\n<h2>Confirma si es usted:</h2><br><a href=";          
            define('Message_3',   $Message_3);

$Message_4 = /*Message_4*/
            "<!DOCTYPE html><html><head><meta charset='utf-8'></head><body style='color:#3e3e3e;'>
            <h1><img src='https://img.icons8.com/color/36/000000/umbrella.png'/>
            Welcome\n<strong style='cursor: pointer; color: #00BCD4;'>Bytech</strong></h1>";
            define('Message_4', $Message_4);

$Message_5 ="<p>
            Este momento esta siendo verificado su cuenta, es para confirmar, la legitimidad 
            del usuario al registraser en\n<strong style='cursor: pointer; color: #00BCD4;'>Bytech.
            </strong>\n<br>Este mensaje es en caso de recuperacion de contraseña. Si no es usted inore 
            este <strong style='cursor: pointer; color: red;'>mensaje o borrelo</strong><br>En este 
            aso si es asi\n<strong style='cursor: pointer; color: #00BCD4;'>Confirme su cuenta</strong>\n
            si es usted que envio dicho confirmacion en<strong style='cursor: pointer; color: #00BCD4;'>
            Bytcho.</strong><br>";
            define('Message_5', $Message_5);

$Alert_email = '<br><div class="card"><div class="loginBox">
            <img src="https://img.icons8.com/color/88/000000/password-check.png"/></a><p>
            Your account has been activated at Bytech. Confirm in your email the verification 
            that has been sent to you and accept the password recovery confirmation.<br>If you dont follow the terms,
            your account will have a privacy request and will be protected by a security system against third parties,
            account theft and hacking. All data will remain intact when you lose your credentials. All privacy rights 
            are determined<br<if you comply with the <span style="cursor: pointer;" onclick="openNav()"><strong><a href="#">
            terms and conditions </a></strong></span>established by and government laws.<br><br><div class="form-group"> 
            <strong><a href="index.php" style="cursor: pointer; color: #2196f3;">Login.</a></strong> </div><hr>
            <p class="bg-success-default-login">Email <b>';
            define('Alert_email_1', $Alert_email);

$Alert_email_2 = '</b><br>confirmation sent.<br></p></div></div><!-- /.loginBox --> </div><!-- /.card --><br>
            <p class="style-Copyright" style="padding: 19px;">Copyright is reserved to all users of various platforms 
            and is legally protected by technology and intellectual property laws around the world.</p>';
            define('Alert_email_2', $Alert_email_2);

?>