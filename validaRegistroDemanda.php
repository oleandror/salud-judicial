<?php
	
	require 'C:\Program Files\VertrigoServ\www\salud\conection.php';
	require 'funcs/funcs.php';
    //session_start();
	
	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		//echo $id_usuario;
        header("Location: sesion/index.php");
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
    $aboDesignado =$conn->real_escape_string($_POST['aboDesignado']);
    $deResponsable =$conn->real_escape_string($_POST['DeResponsable']);
    $heGenerador =$conn->real_escape_string($_POST['heGenerador']);
    $esActual =$conn->real_escape_string($_POST['esActual']);
    $esFecha =$conn->real_escape_string($_POST['fechaEstado']);
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
    
    if(isNullDemanda($nombre_demandado,$id_demandado,$nombre_demandante,$id_demandante,$medio_control,$Fecha_notificacion ,$radicacion,$despacho ,    $cuantia,$aboDesignado,$deResponsable, $heGenerador,$esActual, $proExito, $pretenciones , $falloPrimera,$falloSegunda,$forDefensa,$forProbatoria, $reProcesales,$nivelJuris,$fechaFallo))
    {
        echo " tiene que llenar los campos  Obligatorios.";
    }
    
    if(isValor($cuantia))
    {
        
        echo "La Cuantia debe ser un valor en pesos valido E.J: 1000000 (un millon)";
    }
    
    echo $nombre_demandado." ".$id_demandado ." " . $nombre_demandante." ".$id_demandante ." ".$medio_control ;
}
?>