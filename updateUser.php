<?php
	
	require 'conection.php';
	
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
   $apellido = $_POST['Apellido'];
	$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
	$rol=$_POST['rol'];
//$dueno = $conn->real_escape_string($_POST['due�o']);

	$sql = "UPDATE usuario SET Nombre='$nombre',
    Apellido	='$apellido',
Telefono	='$telefono',
Correo ='$correo',
Id_Role='$rol'
WHERE Id_Usuario = '$id'";
    
	$resultado = $conn->query($sql);
    echo $resultado;
	


?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="mostrarUsuario.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
