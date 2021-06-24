<?php
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="localhost";
$usuario="root";
$contraseña="";
$base="data_base1";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		mysqli_connect_error());
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query("SELECT * FROM users");


///TABLA DONDE SE DESPLIEGAN LOS REGISTROS //////////////////////////////
echo '<table class="table" style="font-size:12px; margin-top:-1%;">

				<tr class="active">
					<th>ID ALUMNO</th>
					<th>NOMBRE</th>
					<th>CARRERA</th>
					<th>GRUPO</th>
				</tr>';

				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$filaAlumnos['id'].'</td>
						 <td>'.$filaAlumnos['username'].'</td>
						 <td>'.$filaAlumnos['email'].'</td>
						 <td>'.$filaAlumnos['date'].'</td>
						 </tr>';
				}
				echo '</table>';
?>
