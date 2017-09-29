<?php
	 session_start();
	require 'conection.php';
	require 'funcs/funcs.php';
	
	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		//echo $id_usuario;
        header("Location: sesion/index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql1 = "SELECT Id_Usuario, Nombre,Apellido,Telefono,Contraseña FROM usuario WHERE Id_Usuario = '$idUsuario'";
	$result1 = $conn->query($sql1);
	
    $row1 = $result1->fetch_assoc();
    $conAux =  utf8_decode($row1['Contraseña']);
    
    $errors =array();
    
    if(!empty($_POST))
    {

    $nombre = $conn->real_escape_string($_POST['nombre']);// $conn->real_escape_string limpia la cadena para evitar el sql inyeccion 
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $contrasena = $conn->real_escape_string($_POST['contra']);
    
        if(isNull1($nombre,$apellidos,$contrasena))
        {
            
            $errors[] ="<p class='error'>* Debe llenar todos los campos </p>";
                    }
        if(count($errors) == 0)
        {
            
           
               //echo $registro;
            if($validaPassw = password_verify($contrasena, $conAux))
            {
                $registro =actualizaUsuario($nombre,$apellidos,$telefono,$idUsuario);
                if($registro)
                {
                    echo "Usuario Actualizado";
                    header("Location: welcome.php");
                    //$url = 'http://'.$_SERVER["SERVER_NAME"].'/salud/activar.php?id='.$registro.'&val='.$token;
                    //$asunto = 'Activar Cuenta - Sistema de usuario';
                    //$cuerpo = " Estimad@ $nombre: <br /> <br/> Para continuar con el proceso de registro, es indispensable dar click en el siguiente enlace para activar tu cuenta <a href ='$url'> ACtivar Cuenta </a>"; 
                    
                    
                    }
                else {
                    
                    $errors[] = "<p class='error'>* Algo Sucedio y no se pudo actualizar Intentalo mas tarde </p>";
                }
            }
            else
            {
                $errors[] = "<p class='error'>* Contraseña Incorrecta </p>";
            }
        }
            else 
            {
                echo "No se logro Actualizar";
            }
               
           } 
                
           


       
        ?>


<html lang="es"> 

<head> 
        
    <meta charset="utf-8">
    <title>
    Formulario 
    </title>
    <!--<link rel="stylesheet" href="estilos.css"> -->
    <script src="validar.js"> </script> 
      <script src="https://code.jquery.com/jquery.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
    </head>
    <body clasS="container">
       
    <header>
        <div class="container">
			
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
						
						<?php if($_SESSION['id_role']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='#'>Administrar Usuarios</a></li>
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
        <br>
        <div class=" mainbox col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-2 ">
            <div class="panel-group">
      
        <div class="panel-info panel">
            <div class="panel-heading"> Modificar Usuario</div>
            <div class="panel-body">
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="text-center" > 
                
                    <h2> INFORMACION DEL USUARIO </h2>
                  
                    <div class="form-group row">
                    <div class="col-xs-6  "> 
                        <label for="n1" class="text-center">  Nombre Del Usuario: </label>
                        
                <input type="text" id="n1" name="nombre" placeholder="Nombre" class=" form-control" value='<?php echo utf8_decode($row1['Nombre']); ?>' required> 
                </div>
                
                        <div class="col-xs-6 "> 
                        <label for="n2" class="text-center">  Apellidos: </label>
                        
                <input type="text" id="n2" name="apellidos" placeholder="Apellidos" class=" form-control" value='<?php echo utf8_decode($row1['Apellido']); ?>' required> 
                </div>
                         </div>
                        <div class="form-group row ">
                    
                    <div class="col-xs-6  "> 
                        <label for="n1" class="text-center">  Telefono: </label>
                        
                <input type="text" id="n1" name="telefono" placeholder="Telefono" class=" form-control" value='<?php echo utf8_decode($row1['Telefono']); ?>' required> 
                </div>
                            
                       

                    <div class="col-xs-6  "> 
                        <label for="" class="text-center">  Contraseña: </label> 
                        
                <input type="text"  name="contra" placeholder="Contraseña" class=" form-control"   required> 
                </div>
                       
                        </div>
                    
                 <input type="submit" value="Guardar" class="btn-lg text-center btn-info btn-primary btn-clock btn  ">
                 </form>
                 <?php 
         echo resultBlock($errors);
        ?>
            <p class="form__link">Cambiar Contraseña?:   <a href='recupera.php'> Ingresa Aqui</a></p>
            </div>
        </div>
            
            </div>
            </div>
 
           
        
        
    </body>
</html>
            