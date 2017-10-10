<?php
	
	 include '../conection.php';
     require '../funcs/funcs.php';
    
    $errors =array();
    
    if(!empty($_POST))
    {

    $nombre = $conn->real_escape_string($_POST['nombre']);// $conn->real_escape_string limpia la cadena para evitar el sql inyeccion 
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $contrasena = $conn->real_escape_string($_POST['contraseña']);
    $con_contrasena =$conn->real_escape_string($_POST['con_contraseña']);
    
    $activo = 0;
    $tipo_usuario = $conn->real_escape_string($_POST['role']);
    
        if(isNull($nombre,$apellidos,$contrasena,$con_contrasena,$correo))
        {
            
            $errors[] ="<p class='error'>* Debe llenar todos los campos </p>";
            
        }
        if(!isEmail($correo))
        {
            $errors[] = "<p class='error'>* $correo invalido </p>";
        }
        if(!validaPassword($contrasena,$con_contrasena))
        {
            $errors[] ="<p class='error'>* Las contraseñas no coinciden </p>";
        }
        if(emailExiste($correo))
        {
            $errors[]= "<p class='error'>* El correo $correo ya se encuentra registrado </p>";
        }
    
        if(count($errors) == 0)
        {
            
           $pass_hash = hashPassword($contrasena);
            $token = generateToken();
            $registro =registraUsuario($nombre,$apellidos,$telefono,$correo,$pass_hash,$activo,$token,$tipo_usuario);
               echo $registro;
                if($registro>0)
                {
                    echo "entro";
                    $url = 'http://'.$_SERVER["SERVER_NAME"].'/salud/activar.php?id='.$registro.'&val='.$token;
                    $asunto = 'Activar Cuenta - Sistema de usuario';
                    $cuerpo = " Estimad@ $nombre: <br /> <br/> Para continuar con el proceso de registro, es indispensable dar click en el siguiente enlace para activar tu cuenta <a href ='$url'> ACtivar Cuenta </a>"; 
                    
                    if(enviarEmail($correo,$nombre,$asunto,$cuerpo))
                    {
                        echo "Para terminar el proceso de registro siga las instrucciones que hemos enviado a la direccion de correo electronico: $correo";
                        echo "<br><a href='index.php' > Iniciar Sesion </a>";
                        exit;
                    }
                        else 
                        {
                            $errors[] ="<p class='error'>* Error al enviar correo </p>";
                        }
                    }
            else 
            {
                echo "no entro";
            }
               
           } else {
            //$errors[] ='Error al comprobar';   
           } 
                
           }


       
        ?>


<html lang="es"> 

<head> 
        
    <meta charset="utf-8">
    <title>
    Formulario 
    </title>
    
   
    <script src="https://code.jquery.com/jquery.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
     <link rel="stylesheet" href="css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
    
    </head>
    <body class="container">
        
        <header>
        <div class="container-fluid">
			
			<nav class='navbar navbar-default navbar-fixed-top' role="navigation">
				<div class='container-fluid'>
					<div class='navbar-header'>
						
                        <a href="welcome.php" class="navbar-brand"> Salud</a>
					</div>
					
					
				</div>
			</nav>	
			
			
        </div>
            </header>
    <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      <div class="text-center mainbox col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-2" style="margin-left:px">
        <div class="panel -panel-group">
            <div class="panel panel-info">
            <div clasS="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-register" > 
        
            
            <h2 align="center"> CREAR CUENTA</h2>
            
             <div class="form-group row inline">
                 
                 <div class="col-xs-5">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre"  clasS="form-control "value='<?php if(isset($nombre)) echo $nombre; ?>' required> 
                     
                </div>
                <div class="col-xs-5">
            <input type="text"  clasS="form-control " id="apellidos" name="apellidos" value='<?php if(isset($apellidos)) echo $_POST['apellidos'];?>' placeholder="Apellidos"  required >
                </div>
                 </div>
            <div class="form-group row">
            <div class="col-xs-5">
            <input type="text"  clasS="form-control " id="telefono" name="telefono"value='<?php if(isset($telefono))echo $_POST['telefono'];?>' placeholder="Telefono"  required >
                </div>
                
            
            
            <div class="col-xs-5">
            <input type="email"  clasS="form-control " id="correo" name="correo" value='<?php if(isset($correo)) echo $_POST['correo'];?>' placeholder="Correo"  required >
                </div>
                </div>
            

            <div class="form-group row">
            <div class="col-xs-5">
            <input type="password"  clasS="form-control "  id="contraseña" name="contraseña" placeholder="Contraseña"  required >
            </div>
                    
            <div class="col-xs-5">
            <input type="password"  clasS="form-control " id="con_contraseña" name="con_contraseña" placeholder="Confirmar Contraseña"  required >
                </div></div>
                        <div class="form-group row">
              <div class="col-xs-10 text-center">  
            <select  clasS="form-control text-center" name="role">
                <option value=2> Administrador </option>
                <option value=3>  Invitado  </option>
                    
                
            </select>
            </div></div>
                <div class="text-center">
            <div class="col-xs-6">
                <button type="submit"  clasS="form-control btn btn-info" value="Registrar" class="btn-enviar"> REGISTRAR </button>
            </div>
            </div>
            <div class="col-xs-6">
            <p class="form__link">¿ Ya tienes una cuenta? <a href='index.php'> Ingresa Aqui</a></p>
          </div>
            
            <?php 
         echo resultBlock($errors);
        ?>
        </form>
            </div>
                </div>
            </div>
        </div>
    </body>
</html>
            
                               