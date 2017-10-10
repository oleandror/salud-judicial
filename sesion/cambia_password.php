<?php

    require '../conection.php';
    require '../funcs/funcs.php';
    session_start();
    if(empty($_GET['user_id']))
    {
        header('location: ../sesion/index.php');
    }
    if(empty($_GET['token']))
    {
        header('location: ../index.php');
    }
    
    $user_id=$conn->real_escape_string($_GET['user_id']);
    $token =$conn-> real_escape_string($_GET['token']);
    
        
    if(!verificaTokenPass($user_id,$token))
    {
        echo ' no se pudo verficar la informacion';
        exit;
        
    }


    
    

?>

<html>
	<head>
		<title>Cambiar Password</title>
		
		<link rel="stylesheet" href="../css/bootstrap.min.css" >
		<link rel="stylesheet" href="./css/bootstrap-theme.min.css" >
		<script src="../js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Cambiar Contrase�a</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
							
							<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
							
							<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Nuevo Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Modificar</button>
								</div>
							</div>   
						</form>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>