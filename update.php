
<?php
	
	require 'conection.php';
	
	$id = $_POST['id'];
	$nombreDemandado = $_POST['nombreDemandado'];
   $idDemandado = $_POST['idDemandado'];
	$nombreDemandante = $_POST['nombreDemandante'];
$idDemandante = $_POST['idDemandante'];
	$fechaNoti = $_POST['fechaNoti'];
$meControl = $_POST['meControl'];
$radicacion = $_POST['radicacion'];
$despacho = $_POST['despacho'];
$cuantia = $_POST['cuantia'];
$AboDesig = $_POST['aboDesignado'];
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
//$dueno = $conn->real_escape_string($_POST['dueño']);

	$sql = "UPDATE proceso SET Nombre_Del_Demandado='$nombreDemandado',
    Hecho_Generador	='$heGenerador',
Dependencia_Responsable	='$deResponsable',
Estado_Proceso ='$esActual',
ProbabilidadExito ='$proExito',
Tipo_Pretenciones ='$pretenciones',
Fallo_Primer_Instancia ='$falloPrimera',
Fallo_Segunda_Instancia ='$falloSegunda',
FortalezaDefensa ='$forDefensa',
fortalezaProbatoria ='$forProbatoria',
RiesgosProcesales ='$reProcesales',
NivelJurisprudencia ='$nivelJuris',
Fecha_Probable_Fallo ='$fechaFallo',
Observaciones ='$observacion',

Identificacion_demandado='$idDemandado', Nombre_Demandante='$nombreDemandante',  
Id_Demandante='$idDemandante', 
Medio_control='$meControl', 
Fecha_Notificacion='$fechaNoti',
Radicacion='$radicacion', 
Despacho='$despacho' ,
Cuantia='$cuantia',
Abogado_Designado='$AboDesig' 
WHERE Id_Demanda = '$id'";
    
	$resultado = $conn->query($sql);
    echo $resultado;
	


?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="mostrarProcesos.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
