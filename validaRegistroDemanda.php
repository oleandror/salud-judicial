<?php
	 session_start();
	require 'C:\Program Files\VertrigoServ\www\salud\conection.php';
	require 'funcs/funcs.php';
	
	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		//echo $id_usuario;
        header("Location: index.php");
	}

if(!empty($_POST))
{
    
    
    $nombre_demandado =$conn->real_escape_string($_POST['Nombre_demandado']);
    $id_demandado =$conn->real_escape_string($_POST['CC_Demandado']);
    $nombre_demandante =$conn->real_escape_string($_POST['Nombre_demandante']);
    $id_demandante =$conn->real_escape_string($_POST['CC_Demandante']);
    $medio_control =$conn->real_escape_string($_POST['MeControl']);
    //$tipo =$conn->real_escape_string($_POST['tipod']);
    $Fecha_notificacion =$conn->real_escape_string($_POST['fechaNoti']);
    $radicacion =$conn->real_escape_string($_POST['radicacion']);
    $despacho =$conn->real_escape_string($_POST['despacho']);
    $cuantia =$conn->real_escape_string($_POST['cuantia']);
    $deResponsable =$conn->real_escape_string($_POST['DeResponsable']);
    $heGenerador =$conn->real_escape_string($_POST['heGenerador']);
    $esActual =$conn->real_escape_string($_POST['esActual']);
    $proExito =$conn->real_escape_string($_POST['proExito']);
    $pretenciones =$conn->real_escape_string($_POST['pretenciones']);
    $falloPrimera =$conn->real_escape_string($_POST['falloPrimera']);
    $falloSegunda =$conn->real_escape_string($_POST['falloSegunda']);
    $forDefensa =$conn->real_escape_string($_POST['forDefensa']);
    $forProbatoria =$conn->real_escape_string($_POST['forProbatoria']);
   $reProcesales =$conn->real_escape_string($_POST['reProcesales']);
    $nivelJuris =$conn->real_escape_string($_POST['nivelJuris']);
    $fechaFallo =$conn->real_escape_string($_POST['fechaFallo']);
    $observacion =$conn->real_escape_string($_POST['observacion']);
    
    
    echo $nombre_demandado." ".$id_demandado ." " . $nombre_demandante." ".$id_demandante ." ".$medio_control ;
}
?>