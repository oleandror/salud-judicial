<?php 

$correo1 ="oleandror@utp.edu.co";
$contrase�a1 ="919";
include 'conection.php';
echo 'hola mundo ';
echo $correo1;



$consulta= "SELECT * FROM usuario WHERE Correo='$correo1' and Contrase�a='$contrase�a1' ";	




$consulta_contrase�a="SELECT contrase�a FROM usuario WHERE Correo='$correo1' ";
        
$resultado =mysqli_query($conn,$consulta);
$resultado2 =mysqli_query($conn,$consulta_contrase�a);

//echo $resultado;
//echo mysqli_result($resultado,0);
$fila = mysqli_fetch_row($resultado);
echo $fila[0];
echo $fila[1];
echo $fila[2];
echo $fila[3];
echo $fila[4];
echo $fila[5];
$filas=mysqli_num_rows($resultado);
	if($filas>0)
		{
			// header("location:bienvenido.html");
			echo "el usuario existe";
			//header("Location:hola.html");
		}
	else
		{
			echo "el usuario no existe";
		}

mysqli_free_result($resultado);
$conn->close();



	
	?>