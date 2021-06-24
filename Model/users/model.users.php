<?php
/*NOTA: El fichero Password.php.- Se utilizara para realizar el hasheo que existe dentro de PHP.*/
include('password.php');
class Model_Class_Users extends Model_Class_Password {
    private $_db;
    //Constructor
    function __construct($db){
    	parent::__construct();
    	$this->_db = $db;
    }
    //funcion cerrar session de login iniciada
	public function logout(){
		//limpiamos la variables de la secion
	    session_unset($db);
	    //destruimos la sesion
		session_destroy($db);
        // Close Mysql
        //mysql_close();

	}
    //funcion si existe el inicio de login
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
	//funcion de validacion de longitud de los campos de 'from' 
	public function isValidUsername($username){
		if (strlen($username) < 4) return false;
		if (strlen($username) > 16) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}
	//function de validacion de email de longitud
	public function isValidUserEmail($email){
		if (strlen($email) < 4) return false;
		if (strlen($email) > 20) return false;
		if (/*!*/ctype_alnum($email)) return false;
		return true;
	}
    //funcion Verificacion de ingreso de usuario login y password 
	public function login($email,$password){
		if (!$this->isValidUserEmail($email)) return false;
		if (strlen($password) < 5) return false;// Validacion de 5 digitos
		$row = $this->get_user_hash($email);
		if($this->password_verify($password,$row['password']) == 1){
		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['id'];
		    return true;
		}
	}
    //function Obtener el hash de usuario
	private function get_user_hash($username){
		try {
			$stmt = $this->_db->prepare('SELECT password, email, memberID FROM users WHERE email = :email AND hash="Yes" ');
			$stmt->execute(array('email' => $email));
			return $stmt->fetch();
		} catch(PDOException $e) {
		    echo '<p>'.$e->getMessage().'</p>';
		}
	}
	//function Actializar: 'ID User' |'hash Token'
	public function Update_token_id($memberID, $hash){
        try{
    	    $sql  = "UPDATE users SET hash=? WHERE memberID=?";
            $stmt = $this->_db->prepare($sql);
            $stmt->execute([$hash, $memberID]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
	}
    //function Insert datos de Usuario personales BD
    public function insert_img_mysql($imagen_name, $email){
        try {
            //Insertar la informacion ingresada en el formulario de registro
            $stmt = $this->_db->prepare('UPDATE users SET imagen=:imagen WHERE email =:email');
            $stmt->execute(array(
                /*EMAIL*/    ':email'  => $email,
                /*FILE*/     ':imagen' => $file
            ));
            //return $stmt->fetch();
        } catch(PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
    //function de 'Update security' Exit
    public function Update_security_exit($activasion,$decrypt_email) {
        try{
    	    $sql  = "UPDATE users SET hash=:activasion WHERE email=:decrypt_email";
            $stmt = $this->_db->prepare($sql);
            $stmt->execute(array(
                /*ACTIVE*/ ':hash'  => $activasion, 
                /*EMAIL*/  ':email' => $decrypt_email
            ));
            return $stmt->fetch();
            //header('Location: login.php?login_session=$true');
        } catch (PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
    //function Insert datos de Usuario BD
	public function insert_newdata_users($username, $email,$hashedpassword, $hash, $code_security, $id_token){
        try {
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $hashedpassword,
                'hash' => $hash,
                'code_security' =>$code_security,
                'id_token' => $id_token
            ];
            $sql = "INSERT INTO users (username, email, password, hash, code_security, id_token, date) 
                    VALUES (:username, :email, :password, :hash, :code_security, :id_token,  now())";
            $stmt = $this->_db->prepare($sql);
            $stmt->execute($data);
        } catch(PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
     //function Insert datos de Usuario BD
    public function insert_data_Administrators($username, $email,$hashedpassword, $hash, $code_security, $id_token){
        try {
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $hashedpassword,
                'hash' => $hash,
                'code_security' =>$code_security,
                'id_token' => $id_token
            ];
            $sql = "INSERT INTO administrators (username, email, password, hash, code_security, id_token, date) 
                    VALUES (:username, :email, :password, :hash, :code_security, :id_token,  now())";
            $stmt = $this->_db->prepare($sql);
            $stmt->execute($data);
        } catch(PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
	//function
	public function update_user_recues($email,$hashedpassword,$reactivasion) {
		try {
		    $data = [
                'email'        => $email,         /*EMAIL*/
                'password'     => $hashedpassword,/*PASSWORD*/
                'reactivasion' => $reactivasion,  /*REA*/ 
            ];
            $sql = "UPDATE users SET password=:password, hash=:reactivasion WHERE email=:email";
            $stmt= $this->_db->prepare($sql);
            $stmt->execute($data);
			return $stmt->fetch();
		} catch(PDOException $e) {
		    echo '<p>'.$e->getMessage().'</p>';
		}
	}
	//function Insert codigo de verificacion de usuario
	public function update_id_Api_gmail($username,$email,$id_token){
        try {
            $data = [
                'username' => $username,
                'email'    => $email,  
                'id_token' => $id_token   
            ];
            $sql = "UPDATE users SET username=:username, email=:email, id_token=:id_token WHERE email=:email";
            $stmt= $this->_db->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetch();
		} catch(PDOException $e) {
		    echo '<p>'.$e->getMessage().'</p>';
		}
	}
	//function de buscar en la base de datos el 'name' de usuario
	public function insert_code_hash($activasion,$email) {
        try {
		    //Insertar la informacion ingresada en el formulario de registro
			$stmt = $this->_db->prepare('UPDATE users SET hash=:hash WHERE email=:email');
			$stmt->execute(array(
                /*HASH*/':hash' => $activasion,
                /*EMAIL*/':email'  => $email
			));
			return $stmt->fetch();
		} catch(PDOException $e) {
		    echo '<p>'.$e->getMessage().'</p>';
		}
	}
}
?>