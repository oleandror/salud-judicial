<?php
	
	$mysqli=new mysqli("localhost","root","password","login"); //servidor, usuario de base de datos, contrase�a del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>