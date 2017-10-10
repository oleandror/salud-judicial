<?php
	
	require 'conection.php';

	$id = $_GET['Id_Usuario'];
	
	$sql = "DELETE FROM usuario WHERE Id_Usuario = '$id'";
	$resultado = $conn->query($sql);
	header('location: mostrarUsuario.php');
?>

