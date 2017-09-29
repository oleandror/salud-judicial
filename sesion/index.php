
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>INICIAR SESIÓN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="../css/materialize.css">
    
</head>
<body class="container ">
 <div class="row">
     <div class="row">
    <form class="form1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h2>  INICIAR SESION</h2>
    <input type="text" placeholder="    
&#64" name="correo" style="margin-left:50px; margin-bottom: 10px;" >
        <br/>
        
    <input type="password" placeholder="    
&#128273" name="contrasena" style="margin-left: 50px; margin-bottom: 5px;">
        <br/>
    <input type="submit" name="iniciar" value="INICIAR" style="padding-top:0px;margin-top: 10px;margin-left:150px;">
    <div class="cont1 container" align="center">
    <input class="" type="button" value="Registrar" name="Registrar" onclick="window.location.href='vista_insertar.php'" style="width:80px;height:34px;left:1400px,right:750px;">
    <input class="input1" type="button" onclick="window.location.href='recupera.php'" value="Recordar Contraseña" name="Registrar" onclick="window.location.href=http:/localhost" style="width:154px; height:34px;left:50px;right:70px;">

    </div>

        






    </form>
         <?php include 'ValidaInicioSesion.php';?>
         </div>
    
    
</div>
</body>
</html>