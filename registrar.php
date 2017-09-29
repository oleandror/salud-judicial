<?php
	
	 include 'conection.php';
     require 'funcs/funcs.php';
    
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
    $tipo_usuario = 2;
    
        if(isNull($nombre,$apellidos,$contrasena,$con_contrasena,$correo))
        {
            $errors[] ="Debe llenar todos los campos";
            
        }
        if(!isEmail($correo))
        {
            $errors[] = "Direccion de correo invalida";
        }
        if(!validaPassword($contrasena,$con_contrasena))
        {
            $errors[] =" Las contraseñas no coinciden";
        }
        if(emailExiste($correo))
        {
            $errors[]= "El correo electronico $correo ya existe en el sistema";
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
                            $errors[] =" Error al enviar a su correo";
                        }
                    }
            else 
            {
                echo "no entro";
            }
               
           } else {
            $errors[] ='Error al comprobar';   
           } 
                
           }
        
        
    //echo resultBlock($errors);

    //$insertar = "INSERT INTO usuario(Nombre,Apellido,Telefono,Correo,Contraseña) VALUES ('$nombre','$apellidos','$telefono','$correo','$contrasena')";
    

    //$verificar = mysqli_query($conn,"SELECT * FROM usuario WHERE Correo ='$correo'");
    
    //if(mysqli_num_rows($verificar)>0)
    //{
      //  echo ' 
        //alert ("El usuario ya esta registrado");
        //window.history.go(-1);
        //</script>'; 
        //exit;
    //}

    //$consulta = mysqli_query($conn,$insertar);
    
    //if(!$consulta)
    //{
      //  echo 'Error al registrarse';
    //}
    //else
    //{
     //echo ' <script>
     //alert ("Usuario Registrado");
     
       // </script> ' ;
        //header("Location:index.php");
    //}
        
    //}
     //mysqli_close($conn);
    ?>