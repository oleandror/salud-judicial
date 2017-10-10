<?php

include 'welcomeValida.php';
?>
 
<html>
	<head>
		<title>Welcome</title>
        <script src="https://code.jquery.com/jquery.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
        
		
		<style>
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
        
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
        <br>
        <div id ="bienvenida" class="container ">
                <?php// require ("modificarUsuario.php"); ?>
              

                  <div class="row" >
                    <div class="col-md-15">

                      <div id="tabla">
                      </div>
                    </div>

                  

                </div>
      	<br />
			</div>
        
	</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('tabla1.php');
  });
</script>