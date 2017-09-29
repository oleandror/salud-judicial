<?php
    session_start();
	require 'conection.php';
	require 'funcs/funcs.php';
	
	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		//echo $id_usuario;
        header("Location: sesion/index.php");
	}
	else
		{
			//header("Location: welcome.php");
		}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT Id_Usuario, Nombre FROM usuario WHERE Id_Usuario = '$idUsuario'";
	$result = $conn->query($sql);
	
	$row = $result->fetch_assoc();
?>