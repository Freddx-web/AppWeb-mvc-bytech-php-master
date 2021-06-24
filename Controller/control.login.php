<?php
session_start();
$Assets = include_once('../Assets/MySQL/connect.control.mysql.php');

//Submit
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate - validar
    if (empty($email)) { $error[] = "Please fill in your email.";}
    elseif (strlen($email) < 6) { $error[] = "Minimo 6 digits";}
    elseif (strlen($email) > 40) { $error[] = "Maximum 40 digits";}
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){$error[] = "Invalid email.";} 
    elseif (empty($password)) { $error[] = "Please fill in your password.";}
    elseif (strlen($password) < 3)  { $error[] = "This password is too short";}
    else {

        $query = $db->prepare("SELECT id, email, username, password, id_token FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
 
        $result = $query->fetch(PDO::FETCH_ASSOC);
 
        if (!isset($result['password'])) {
            
            $error[] = 'The first letter of your credentials must be capitalized.<br><strong>Please try again</strong>';

        } else {

            //Validator
            if ($result && password_verify($password, $result['password'])) {
                
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id']  = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email']    = $result['email'];
                $_SESSION['id_token'] = $result['id_token'];

                
                header('Location: ../views/pages/Dashboard_v1.php');

            } else {
                $error[] = 'Username password combination is wrong!';
            }
        }
    }
}
?> 