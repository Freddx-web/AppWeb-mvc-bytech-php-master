<?php

$Assets = include_once('../Assets/MySQL/connect.control.mysql.php');

if (isset($_POST['submit']) && isset($_GET['email'])&& isset($_GET['username'])) {
 
    // Var : datos almacenados

    $decryption = $_GET['email'];
    
    //Validte : Validadacion
    if (empty($file)) {$error[] = "Porfavor debe su elegir su imagen de perfil.!";} 
    elseif (empty($name)) {$error[] = "Porfavor complete su registro.2..!";} 
    
    //File Img
    $file = $_FILES['file']['name'];
    //File name Img
    $name_img = $file;
    //
    if (isset($file) && $file != "") {

        $tipo = $_FILES['file']['type'];    //type file
        $tamano = $_FILES['file']['size'];  //size file
        $temp = $_FILES['file']['tmp_name'];//tmp file

        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            
            $error[] = '<b>Error. The file extension or size is not correct.<br/>
                  - .Gif, .jpg, .png files are allowed. and 200 kb maximum.</b>';
        
        } else {
            
            //Insert: 

            // Get file info 
            $fileName = basename($_FILES["file"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 

            if(in_array($fileType, $allowTypes)){


                try {

                    $image = $_FILES['file']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image)); 
         
                    $email = $decryption;
                    $insert = $db->query("UPDATE users SET image='$imgContent', image_name='$fileName', date = NOW()  WHERE email = '$email' ");
                    
                } catch (Exception $e) {
                    echo "<br><p>Falla en conexion, intente mas tarde.".$e->getMessage().exit;'</p>';
                }
        
            } 

            //rute file
            $rute = "../uploads/files/users/";
            if (move_uploaded_file($temp, $rute .$file)) {

                try {

                    $query = $db->prepare("SELECT id, email, username, password, id_token FROM users WHERE email=:email");
                    $query->bindParam("email", $email, PDO::PARAM_STR);
                    $query->execute();
 
                    $result = $query->fetch(PDO::FETCH_ASSOC);


                } catch (Exception $e) {
                    echo "<br><p>Falla en conexion, intente mas tarde.".$e->getMessage().exit;'</p>';
                }

                $_SESSION['loggedin'] = true;
                $_SESSION['user_id']  = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email']    = $result['email'];
                $_SESSION['id_token'] = $result['id_token'];

                echo "<br>Query db Email:\n".$_SESSION['email'];

                chmod($rute.$file, 0777).header('Location: ../views/login.php?user='.$_GET['username'].'&'.'action=active');
            }
            else {
                $error[] = '<b>An error occurred while loading the file. It could not be saved.</b>';
            }
        }
    }
       
}

//http://localhost/WWW/Bytech_v.1.4/views/login_insert_img.php?encrypt=UnBHejdRNTZQZmpoS1BHampEaENNaEZTbml1U01LR05Bd0wycXBLYXBDOD0=&hash=a70867a7391196649471e84d94d5f825&id_token=ffa769f97cd9b91d57d18dcad204c0a7dfa58459de227b9f519da6b41a32ef56f03d4af2686ed68f99c5b4d6dc0b39c43ebe18e718a0b7b8633abc574766d5d6

?>