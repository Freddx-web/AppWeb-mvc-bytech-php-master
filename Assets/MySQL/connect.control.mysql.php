<?php

require_once'address-var-big-data.php';

// Connect LOGIN - INDEX HOME
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS,$options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $e) {
	//show error
    echo "<div class='bg-danger-default'><p>Falla en conexion, intente mas tarde.".$e->getMessage().'</p></div>';
    exit;
}

//include the user class, pass in the database connection

$include = require_once('../Model/users/model.control.users.php');
$include = require_once('../Model/users/model.query.users.php');
$include = require_once('../Model/users/model.users.php');

//$Objet_clean = new Class_clean_string();

$Objet_users = new Model_Class_Users($db);
$Objet_passw = new Model_Class_Password();
$Objet_contr = new Model_Class_getUser();
$Objet_query = new Model_Class_Query();



?>