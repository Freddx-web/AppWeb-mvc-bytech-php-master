<?php
session_start();
$Assets = include_once('../Assets/MySQL/connect.control.mysql.php');

if( $Objet_users->is_logged_in() ){ header('Location: ../../views/pages/Dashboard_v1.php'); }

if(isset($_POST['submit'])){

// Limpiar variable
	$email           = $_POST['email'];
    $submit          = $_POST['submit'];
    $username        = $_POST['username'];
	$password        = $_POST['password'];
	$passwordConfirm = $_POST['passwordConfirm'];

    //Clase de validacion
	if (empty($username)){ $error[] = "Please fill in your username.";}
	elseif (!$Objet_users->isValidUsername($username)){ $error[] = "your name\n<strong>".$username."</strong>\n must have a minimum of 5 to 16 maximum digits";}  
	elseif (empty($email)) { $error[] = "Please fill in your email.";}
	elseif (strlen($email) < 16) { $error[] = "Minimo 8 digits";}
	elseif (strlen($email) > 35) { $error[] = "Maximum 35 digits in email";}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){$error[] = "Invalid email.";}
	elseif (empty($password)) { $error[] = "Please fill in your password.";} 
	elseif (strlen($password) < 5){ $error[] = "your\n<strong>password</strong>\nis too short, must exceed 5 digits";}
	elseif (strlen($password) > 30){ $error[] = "Password invalid";}  
	elseif (empty($passwordConfirm)) { $error[] = "Please fill in your password of confirmation.";}
	elseif (strlen($passwordConfirm) < 5){ $error[] = "your\n<strong>confirmation password</strong>\nis too short, must exceed 5 digits";} 
	elseif (strlen($passwordConfirm) > 30){ $error[] = "Password invalid";}  
	elseif ($password != $passwordConfirm){ $error[] = "\n<strong>passwords</strong>\ndon't match, try again.";}
    
	// Query Username 
	try {
		$stmt = $db->prepare('SELECT username FROM users WHERE username = :username');
		$stmt->execute(array(':username' => $username,));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(isset($row['username']) && $row['username'] == $_POST['username']){ $error[] = "This name \n<strong>".$_POST['username']."</strong>\nis already in use, try another one again."; }

    } catch (Exception $e) {
		//show error
		echo "<div class='bg-danger'><p>Falla en conexion, intente mas tarde.".$e->getMessage().'</p></div>'.exit;
	}
	// Query Email 
	try {
		$stmt = $db->prepare('SELECT email FROM users WHERE email = :email');
		$stmt->execute(array(':email' => $email,));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(isset($row['email']) && $row['email'] == $_POST['email']){ $error[] = "This email \n<strong>".$_POST['email']."</strong>\nis already in use, try another one again."; }

    } catch (Exception $e) {
		//show error
		echo "<div class='bg-danger'><p>Falla en conexion, intente mas tarde.".$e->getMessage().'</p></div>'.exit;
	}
 

	if (!isset($error)) {

		// hash to password PASSWORD_BCRYPT
		$hashedpassword = $Objet_users->password_hash($password, PASSWORD_BCRYPT); 
       
        //Insert new data (SQL) users at data base

        try {

            $data = [
                'username' => $username,
                'email'    => $email,
                'password' => $hashedpassword,
            ];
            $sql = "INSERT INTO users (username, email, password, date) 
                    VALUES (:username, :email, :password, now())";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
        	
        } catch (Exception $e) {
        	 echo '<p>'.$e->getMessage().'</p>';
        }
     

        //Insert param's in ULR:
        header('Location: ../views/login_insert_img.php?email='.$email.'&'.'username='.$username.'&'.'password='.$password);
        
	} 
 
}

?>