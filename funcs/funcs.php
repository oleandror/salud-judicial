<?php
	
	function isNull($nombre, $apellidos, $contrasena, $con_contrasena, $email){
		if(strlen(trim($nombre)) < 1 || strlen(trim($apellidos)) < 1 || strlen(trim($contrasena)) < 1 || strlen(trim($con_contrasena)) < 1 || strlen(trim($email)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}

function muestraDatos()
    {
        global $conn;
        
        $prepare="SELECT tipo_demanda.Tipo_demanda, proceso.Nombre_Del_Demandado, medio_control.MedioControl,dependencia.NombreDependencia,proceso.Nombre_Demandante,proceso.Id_Demanda,proceso.Radicacion,estado_proceso.Estado,usuario.Nombre, proceso.Dependencia_Responsable
        FROM proceso 
        INNER JOIN medio_control ON medio_control.Id_MeControl=proceso.Medio_control
        INNER JOIN tipo_demanda ON tipo_demanda.Id_Tipo_demanda=proceso.Id_tipo_proceso
        INNER JOIN dependencia ON  dependencia.Id_dependencia=proceso.Dependencia_Responsable
        INNER JOIN estado_proceso ON  estado_proceso.Id_Estado=proceso.Estado_Proceso
        INNER JOIN usuario ON  usuario.Id_Usuario=proceso.Dueño";
        
        $stmt = $conn->query($prepare);
        return $stmt;   
        
    }
function muestraDatos1($id)
    {
        global $conn;
        
        $prepare="SELECT tipo_demanda.Tipo_demanda, proceso.Nombre_Del_Demandado, medio_control.MedioControl,dependencia.NombreDependencia,proceso.Nombre_Demandante,proceso.Id_Demanda,proceso.Radicacion,estado_proceso.Estado,usuario.Nombre, proceso.Dependencia_Responsable
        FROM proceso 
        INNER JOIN medio_control ON medio_control.Id_MeControl=proceso.Medio_control
        INNER JOIN tipo_demanda ON tipo_demanda.Id_Tipo_demanda=proceso.Id_tipo_proceso
        INNER JOIN dependencia ON  dependencia.Id_dependencia=proceso.Dependencia_Responsable
        INNER JOIN estado_proceso ON  estado_proceso.Id_Estado=proceso.Estado_Proceso
        INNER JOIN usuario ON  usuario.Id_Usuario=proceso.Dueño
        
        WHERE proceso.Id_Demanda='$id';";
        
        $stmt = $conn->query($prepare);
        return $stmt;
        
            
        
        
    }
function isValor($cuantia){
		if($cuantia>0 && is_numeric($cuantia))
		{
			return true;
			} else {
			return false;
		}		
	}

    function isNullDemanda($nombre_demandado,$id_demandado,$nombre_demandante,$id_demandante,$medio_control,$Fecha_notificacion ,$radicacion,$despacho ,    $cuantia,$aboDesignado,$deResponsable, $heGenerador,$esActual, $proExito, $pretenciones , $falloPrimera,$falloSegunda,$forDefensa,$forProbatoria, $reProcesales,$nivelJuris,$fechaFallo){
		if(strlen(trim($nombre_demandado)) < 1 || strlen(trim($id_demandado)) < 1 || strlen(trim($nombre_demandante)) < 1 || strlen(trim($id_demandante)) < 1 || strlen(trim($medio_control)) < 1 || strlen(trim($Fecha_notificacion)) < 1 || strlen(trim($radicacion)) < 1 || strlen(trim($despacho)) < 1 || strlen(trim($cuantia)) < 1 || strlen(trim($aboDesignado)) < 1 || strlen(trim($deResponsable)) < 1 || strlen(trim($heGenerador)) < 1 || strlen(trim($esActual)) < 1 || strlen(trim($proExito)) < 1 || strlen(trim($pretenciones)) < 1 || strlen(trim($falloPrimera)) < 1 || strlen(trim($falloSegunda)) < 1 || strlen(trim($forDefensa)) < 1 || strlen(trim($forProbatoria)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	function isNull1($nombre, $apellidos, $contrasena){
		if(strlen(trim($nombre)) < 1 || strlen(trim($apellidos)) < 1 || strlen(trim($contrasena)) < 1  )
		{
			return true;
			} else {
			return false;
		}		
	}
	function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}
	
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	
	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function usuarioExiste($usuario)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT Id_Usuario FROM usuario WHERE usuario = ? LIMIT 1");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
	
	function emailExiste($email)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT Id_Usuario FROM usuario WHERE Correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}
	
	function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	
	function hashPassword($password) 
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	
	function resultBlock($errors){
		if(count($errors) > 0)
		{
			
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

function actualizaUsuario($nombre,$apellidos,$telefono,$id){
		//require 'conection.php';
       
		global $conn;
    
        echo $nombre." ".$apellidos." ".$telefono." ".$id." ";
		$stmt =$conn->prepare( "UPDATE usuario SET Nombre=?, Apellido=?,Telefono=? WHERE Id_Usuario= ? ");
        $stmt->bind_param('ssii',$nombre,$apellidos,$telefono,$id);
        
        
        
       if($stmt->execute()){
            
			return true;
			} else {
			return false;		
		}
		}	
	
	function registraUsuario($nombre,$apellidos,$telefono,$email,$pass_hash, $activo, $token, $tipo_usuario){
		//require 'conection.php';
		global $conn;
		
		$stmt =$conn->prepare( "INSERT INTO usuario (Nombre, Apellido,Telefono,Correo,Contraseña, Id_Role, Activacion, Token) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssiis',$nombre,$apellidos,$telefono,$email,$pass_hash,$tipo_usuario,$activo,$token);
        
        
        
        if($stmt->execute())
        {
             return $conn->insert_id;
        }
        else
        {
            return 0;
           
        }
        
        /*
        echo "<li> ".$nombre . "</li>";
        echo "<li> " . $apellidos." </li>";
        echo "<li> ".$telefono. "</li>";
        echo "<li> ".$email ."</li>";
        echo "<li> ".$pass_hash. "</li>";
        echo "<li> ".$activo. "</li>";
        echo "<li> ".$token. "</li>";
        echo "<li> ".$tipo_usuario ." </li>";
		$stmt->bind_param('sssssisi',$nombre, $apellidos, $telefono, $email, $pass_hash, $activo,$token,$tipo_usuario);
        //echo gettype($stmt); */
        
        //$aux = $stmt->execute();
        //echo gettype($stmt);
        //echo $aux;
		//if ($stmt->execute()){
          //  echo "entro";
			//return $conn->insert_id;
            
		//	} else {
          //  echo "no entro";
			//return 0;	
		}		
	
	
	function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
		require_once '../PHPMailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
		$mail->Username = 'oleandror@utp.edu.co';
		$mail->Password = 'oscar919';
		
		$mail->setFrom('oleandror@utp.edu.co', 'Sistema de Usuarios');
		$mail->addAddress($email, $nombre);
		
		
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		$mail->IsHTML(true);
		
		if($mail->send())
		return true;
		else
		return false;
	}
	
	function validaIdToken($id, $token){
		global $conn;
		
		$stmt = $conn->prepare("SELECT Activacion FROM usuario WHERE Id_Usuario = ? AND Token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();
			
			if($activacion == 1){
                
				$msg = "<p class='error'>* La Cuenta Ya Fue ACtivada </p>";
				} else {
				if(activarUsuario($id)){
					$msg = "<p class='error'>* Cuenta Activada </p>";
					} else {
					$msg = "<p class='error'>* Error al activar la cuenta </p>";
				}
			}
			} else {
			$msg = "<p class='error'>* No existe registro alguno </p>";
		}
		return $msg;
	}
	
	function activarUsuario($id)
	{
		global $conn;
		
		$stmt = $conn->prepare("UPDATE usuario SET Activacion=1 WHERE Id_Usuario = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	
	function isNullLogin($correo, $password){
		if(strlen(trim($correo)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	
	function login($correo, $password)
	{
		global $conn;
        //$errors=array('');
		
		$stmt = $conn->prepare("SELECT Id_Usuario, Id_Role, Contraseña FROM usuario WHERE  Correo = ? LIMIT 1");
		$stmt->bind_param("s", $correo);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
		//	echo $rows;
			if(isActivo($correo)){
				//echo 'correo activo';
				$stmt->bind_result($Id_Usuario, $Id_Role, $Contraseña);
				$stmt->fetch();
               // echo $Id_Usuario." ".$Id_Role." ".$Contraseña;
				//echo $Contraseña;
                //echo $password;
				$validaPassw = password_verify($password, $Contraseña);
				//echo gettype($validaPassw);
                //echo $validaPassw;
				if($validaPassw){
					
					lastSession($Id_Usuario);
					$_SESSION['id_usuario'] = $Id_Usuario;
                    
					$_SESSION['id_role'] = $Id_Role;
					
					//echo $_SESSION['id_role'];
                    //echo $_SESSION['id_usuario'];
                    
                    
                    header("location: ../welcome.php");
					} else {
					//echo "no entro";
					$errors = "<p class='error'>* Contraseña incorrecta </p>";
				}
				} else {
				$errors = "<p class='error'>* El usuario no esta activo </p>";
			}
			} else {
            $errors= "<p class='error'>* El nombre de usuario o correo electr&oacute;nico no existe </p>";
			
		}
		return $errors;
	}
	
	function lastSession($id)
	{
		global $conn;
		
		$stmt = $conn->prepare("UPDATE usuario SET last_session=NOW(), token_password='', password_request=1 WHERE Id_Usuario = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->close();
	}
	
	function isActivo($usuario)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT Activacion FROM usuario WHERE Correo = ? LIMIT 1");
		$stmt->bind_param('s', $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		
		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}	
	
	function generaTokenPass($user_id)
	{
		global $conn;
		
		$token = generateToken();
		
		$stmt = $conn->prepare("UPDATE usuario SET token_password=?, password_request=1 WHERE Id_Usuario = ?");
		$stmt->bind_param('si', $token, $user_id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
	}
	
	function getValor($campo, $campoWhere, $valor)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT $campo FROM usuario WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
	}
	
	function getPasswordRequest($id)
	{
		global $conn;
		
		$stmt = $conn->prepare("SELECT password_request FROM usuario WHERE Id_Usuario = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();
		
		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;	
		}
	}
	
	function verificaTokenPass($user_id, $token){
		
		global $conn;
		
		$stmt = $conn->prepare("SELECT Activacion FROM usuario WHERE Id_Usuario = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	function cambiaPassword($password, $user_id, $token){
		
		global $conn;
		
		$stmt = $conn->prepare("UPDATE usuario SET Contraseña = ?, token_password='', password_request=0 WHERE Id_Usuario = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);
		
		if($stmt->execute()){
            
			return true;
			} else {
			return false;		
		}
	}		