<?php

include_once('model.users.php');

class Model_Class_getUser {

	private $Name;
	private $User_name;
    private $Last_name;
    private $Email;
    private $Location;


    //name
    public function asignar_name($name){
        $this->Name = $Name;
    }
    public function Obtener_name($name){  
        return $this->Name;
    }


    //user_name
    public function asignar_username($user_name){
        $this->User_name = $User_name;
    }
    public function Obtener_username($user_name){
        return $this->user_name;
    }


    //lastname
    public function asignar_lastname($last_name){
        $this->Last_name = $Last_name;
    }
    public function Obtener_lastname($last_name){
    	return $this->Last_name;
    }


    //Email
    public function asignar_Email($Email){
        $this->Email = $Email;
    }
    public function Obtener_Email($Email){ 
    	return $this->Email;
    }


    //Location
    public function asignar_Location($Location){
        $this->Location = $Location;
    }
    public function Obtener_Location($Location){ 
    	return $this->Location;
    }
}

?>