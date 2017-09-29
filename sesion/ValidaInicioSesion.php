
<?php
 require '/../conection.php';
require '/../funcs/funcs.php';
session_start();
    
$errors =array();
if(!empty($_POST))
{
    
    $correo = $conn->real_escape_string($_POST['correo']);
    $contrasena = $conn->real_escape_string($_POST['contrasena']);
    
    echo $correo;
    echo gettype($contrasena);
    
    if(isNullLogin($correo,$contrasena))
    {
    $errors [] ="Debe llenar todos los campos primero";
        }
    
    $errors[]=login($correo,$contrasena);
    
    
}
 

?>

<html>
    <?php echo resultBlock($errors); ?>
</html>
