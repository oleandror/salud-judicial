<?php
include 'conection.php';
include 'funcs/funcs.php';
$errors = array();
	
if (isset($_POST['iniciar']))
	{

		if( empty($correo1))
		{
			echo" <p class='error'>* Correo no puede estar vacio </p>";
		}
		else 
		{
		if (!filter_var($correo1,FILTER_VALIDATE_EMAIL))
		{
			echo "<p class='error' > *Correo es invalido";
		}
		}

		if( empty($contraseņa1))
		{
			echo" <p class='error'>* Contraseņa no puede estar vacio </p>";
		}
	
            if(isNullLogin($correo1,$contraseņa1))
            {
            $errors[]= " Debe llenar todos los campos";
            }
    $errors[]= login($correo1,$contraseņa1);
    
/*
$verificar = mysqli_query($conn,"SELECT * FROM usuario WHERE Correo ='$correo1'");

$fila = mysqli_fetch_row($verificar);

        
 if(mysqli_num_rows($verificar)>0)
 {
	if($fila[5] == $contraseņa1)
		{
			// header("location:bienvenido.html");
            
			echo "<p class='error'>* El usuario existe </p>";
            header("Location:hola.html");
            
		}
	else
		{
            
			echo "<p class='error'>* Contraseņa incorrecta";
		}
 }
        else
        {
            echo "<p class='error' > * Correo invalido </p>";
        }

mysqli_free_result($verificar);
*/
$conn->close();
}


	
	?>