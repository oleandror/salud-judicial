<?php
	require 'conection.php';
    session_start();
	
	$id = $_GET['Id_Usuario'];
	
	$sql = "SELECT * FROM usuario WHERE Id_Usuario = '$id'";
	$resultado = $conn->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
        
        	<header>
        <div class="container-fluid">
			
			<nav class='navbar navbar-default navbar-fixed-top' role="navigation">
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' aria-expanded="false" data-target='#navbar1' >
							<span class='sr-only'>Men&uacute;</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
                            <span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
                        <a href="welcome.php" class="navbar-brand"> Salud</a>
					</div>
					
					<div id='navbar1' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li class=''><a href='welcome.php'>Inicio</a></li>			
                        
                            <li class=''> <a  href='modificarUsuario.php'> Administrar Cuenta</a> </li>
                        </ul>
						<!--
						<?php if($_SESSION['id_role']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='registrarDemanda.php'>Ingresar Proceso</a></li>
							</ul>
						<?php } ?> -->
                        
                       <?php if($_SESSION['id_role']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='mostrarProcesos.php'>Administrar Procesos</a></li>
							</ul>
						<?php } ?>
                        <?php if($_SESSION['id_role']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='mostrarUsuario.php'>Administrar Usuarios</a></li>
							</ul>
						<?php } ?>
                        
                        
            
             
               
						<ul class='nav navbar-nav navbar-right'>
							<li><a href='logout.php'>Cerrar Sesi&oacute;n</a></li>
						</ul>
                            
                        
					</div>
				</div>
			</nav>	
			
			
        </div>
            </header>
        	<br>
        <br><br>
        <br><br>
 
        <br>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR USUARIO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="updateUser.php" autocomplete="off">
				<div class="form-group inline">
					<label for="nombre" class="col-sm-2 control-label">Nombres Del Usuario</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" value="<?php echo $row['Nombre']; ?>" required>
					</div>
				
					<label for="nombre" class="col-sm-2 control-label">Apellidos Del Usuario</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="Apellido" placeholder="Apellidos" value="<?php echo $row['Apellido']; ?>" required>
					</div>
				</div>
                <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="telefono" placeholder="Nombre" value="<?php echo $row['Telefono']; ?>" required>
					</div>
				
					<label for="nombre" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="correo" placeholder="Nombre" value="<?php echo $row['Correo']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['Id_Usuario']; ?>" />
				<label for="n12" class="col-sm-2 control-label"> Rol</label>
                <div class="col-xs-3">
             <select class="form-control" id="n12" name="rol">
                
                <option value="1" <?php if($row['Id_Role']=="1") echo "selected" ?>>  Root </option>
                <option value="2" <?php if($row['Id_Role']=="2") echo "selected" ?>>  Administrador </option>
                <option value="3" <?php if($row['Id_Role']=="3") echo "selected" ?>>  Invitado </option>
                
            </select>
                </div>
				<br>
                <br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="mostrarUser.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>