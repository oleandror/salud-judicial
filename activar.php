<?php

    require 'conection.php';
    require 'funcs/funcs.php';
    if (isset($_GET["id"]) AND isset ($_GET['val']))
    {
    $idUsuario =$_GET['id'];
    $token = $_GET['val'];
    $mensa = validaIdToken($idUsuario,$token);
    }
else
{
    echo "incorrecto";
}
   ?>   

 <html>
<head>
		<title>Registro</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
    
    <body>
    <div class="container">
    <div class="jumbotron">
        <h1> <?php 
            echo $mensa; 
            ?> 
        </h1>
        <br/>
        <p> <a class= "btn btn-primary btn-lg" href ="index.php" role="button"> Iniciar Sesion </a></p>
        </div>
        </div>
        </body>
    </html>
   
