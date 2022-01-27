<?php
if(isset($_POST["c1"])&& isset($_POST["c2"])){
	session_start();
	$nombre = $_POST["c1"];
	$password = $_POST['c2'];
	include_once('../model/model_personal.php');
	$personal = new Personal();
	$res = $personal->getloginPersonasl($nombre);
	var_dump($res);
	foreach ($res as $key => $value) {
		// print_r($value['primer_nombre']."\n");
		if(sha1($password) === $value['c_i']){
			echo "Si ha exitido un cambio";
			$_SESSION['idPersonal'] = $value['idpersonal'];
			$_SESSION['login'] = $value['nombres'];
			$_SESSION['apellido'] = $value['apellidos'];
			header('Location:../vista/crud_publicaciones.php');
			die();
		}
	}
	echo "No existe";
	header('Location:../vista/usuario.php?action=El usuario no existe');
	// if(count($res)==0){
	// 	header('Location:index.php?problem="El usuario no existe');
	// }
	
}
?>
