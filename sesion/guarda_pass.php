<?php

    require '../conection.php';
    require'../funcs/funcs.php';
    

    $pass = $conn->real_escape_string($_POST['password']);
    $con_pass = $conn->real_escape_string($_POST['con_password']);
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $token = $conn->real_escape_string($_POST['token']);


    
    if(validaPassword($pass,$con_pass))
        {
            
        
            $pass_hash = hashPassword($pass);
            
        if(cambiaPassword($pass_hash,$user_id,$token))
        {
            echo "PAssword Modificado";
            echo "<br> <a href='index.php'> INICIAR SESION </a>";
            
        }
        else
        {
            echo "error al modificar el password";
        }
    
    }
    else
    {
        echo " Las contraseñas no coinciden";
    }
    

?>