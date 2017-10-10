<?php
    
	require '../conection.php';
	require '../funcs/funcs.php';
    $errors = array();




if(!empty($_POST))
{
    $email = $conn->real_escape_string($_POST['email']);
    
    if (!isEmail($email))
    {
        $errors[]= "Debe de digitar correctamente el correo";
        
    }
        if(emailExiste($email))
        {
            $user_id =getValor('Id_Usuario','Correo',$email);
            $user_nombre=getValor('Nombre','Correo',$email);
            $token = generaTokenPass($user_id);
            
            $url='http://'.$_SERVER["SERVER_NAME"].'/salud/sesion/cambia_password.php?user_id='.$user_id.'&token='.$token;
            $asunto = 'RECUPERAR CONTRASEÑA';
            $cuerpo = "Hola $user_nombre: <br /> <br/> Se ha solicitado un reinicio de contraseña <br/><br/> para Restaurar la contraseña, da click en el siguiente LINK : <a href='$url'>$url</a>";
            
            if(enviarEmail($email,$user_nombre,$asunto,$cuerpo))
            {
                echo " Hemos enviado un correo a $email con las indicaciones para recuperar contraseña";
                echo "<a href='index.php' > INICIAR SESION </a>";
                exit;
            }
        }
    else
    {
        $errors[]= "El usuario no se encuentra registrado";
    }
}
        
    


?>

<html>
	<head>
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="../css/bootstrap.min.css" >
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css" >
		<script src="../js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
        
        <header>
        <div class="container-fluid">
			
			<nav class='navbar navbar-default navbar-fixed-top' role="navigation">
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' aria-expanded="false" >
							<span class='sr-only'>Men&uacute;</span>
							
						</button>
                        <a href="../welcome.php" class="navbar-brand"> Salud</a>
					</div>
					
					
				</div>
			</nav>	
			
			
        </div>
            </header>
		<br>
        <br>
        <br>
        <br>
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-warning" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Contraseña</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>                                        
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="../vista_insertar.php">Registrate aquí</a>
									</div>
								</div>
							</div>    
						</form>
                        <?php echo resultBlock($errors); ?>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>							