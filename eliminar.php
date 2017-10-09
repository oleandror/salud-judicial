<?php
	
	require 'conection.php';

	$id = $_GET['Id_Demanda'];
	
	$sql = "DELETE FROM proceso WHERE Id_Demanda = '$id'";
	$resultado = $conn->query($sql);
	header('location: mostrarProcesos.php');
?>

