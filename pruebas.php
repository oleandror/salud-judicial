<?php


class festivos 
{

	private $hoy;
	private $festivos;
	private $ano;
	private $pascua_mes;
	private $pascua_dia;
	
	
	public function festivos($ano='')
	{
		$this->hoy=date('d/m/Y');
		
		if($ano=='')
			$ano=date('Y');
			
		$this->ano=$ano;
		
		$this->pascua_mes=date("m", easter_date($this->ano));
		$this->pascua_dia=date("d", easter_date($this->ano));
				
		$this->festivos[$ano][1][1]   = true;		// Primero de Enero
		$this->festivos[$ano][5][1]   = true;		// Dia del Trabajo 1 de Mayo
		$this->festivos[$ano][7][20]  = true;		// Independencia 20 de Julio
		$this->festivos[$ano][8][7]   = true;		// Batalla de Boyacá 7 de Agosto
		$this->festivos[$ano][12][8]  = true;		// Maria Inmaculada 8 diciembre (religiosa)
		$this->festivos[$ano][12][25] = true;		// Navidad 25 de diciembre
		
		$this->calcula_emiliani(1, 6);				// Reyes Magos Enero 6
		$this->calcula_emiliani(3, 19);				// San Jose Marzo 19
		$this->calcula_emiliani(6, 29);				// San Pedro y San Pablo Junio 29
		$this->calcula_emiliani(8, 15);				// Asunción Agosto 15
		$this->calcula_emiliani(10, 12);			// Descubrimiento de América Oct 12
		$this->calcula_emiliani(11, 1);				// Todos los santos Nov 1
		$this->calcula_emiliani(11, 11);			// Independencia de Cartagena Nov 11
		
		//otras fechas calculadas a partir de la pascua.
		
		$this->otrasFechasCalculadas(-3);			//jueves santo
		$this->otrasFechasCalculadas(-2);			//viernes santo
		
		$this->otrasFechasCalculadas(36,true);		//Ascención el Señor pascua
		$this->otrasFechasCalculadas(60,true);		//Corpus Cristi
		$this->otrasFechasCalculadas(68,true);		//Sagrado Corazón
		
		// otras fechas importantes que no son festivos

		// $this->otrasFechasCalculadas(-46);		// Miércoles de Ceniza
		// $this->otrasFechasCalculadas(-46);		// Miércoles de Ceniza
		// $this->otrasFechasCalculadas(-48);		// Lunes de Carnaval Barranquilla
		// $this->otrasFechasCalculadas(-47);		// Martes de Carnaval Barranquilla
	}
	protected function calcula_emiliani($mes_festivo,$dia_festivo) 
	{
		// funcion que mueve una fecha diferente a lunes al siguiente lunes en el
		// calendario y se aplica a fechas que estan bajo la ley emiliani
		//global  $y,$dia_festivo,$mes_festivo,$festivo;
		// Extrae el dia de la semana
		// 0 Domingo … 6 Sábado
		$dd = date("w",mktime(0,0,0,$mes_festivo,$dia_festivo,$this->ano));
		switch ($dd) {
		case 0:                                    // Domingo
		$dia_festivo = $dia_festivo + 1;
		break;
		case 2:                                    // Martes.
		$dia_festivo = $dia_festivo + 6;
		break;
		case 3:                                    // Miércoles
		$dia_festivo = $dia_festivo + 5;
		break;
		case 4:                                     // Jueves
		$dia_festivo = $dia_festivo + 4;
		break;
		case 5:                                     // Viernes
		$dia_festivo = $dia_festivo + 3;
		break;
		case 6:                                     // Sábado
		$dia_festivo = $dia_festivo + 2;
		break;
		}
		$mes = date("n", mktime(0,0,0,$mes_festivo,$dia_festivo,$this->ano))+0;
		$dia = date("d", mktime(0,0,0,$mes_festivo,$dia_festivo,$this->ano))+0;
		$this->festivos[$this->ano][$mes][$dia] = true;
	}	
	protected function otrasFechasCalculadas($cantidadDias=0,$siguienteLunes=false)
	{
		$mes_festivo = date("n", mktime(0,0,0,$this->pascua_mes,$this->pascua_dia+$cantidadDias,$this->ano));
		$dia_festivo = date("d", mktime(0,0,0,$this->pascua_mes,$this->pascua_dia+$cantidadDias,$this->ano));
		
		if ($siguienteLunes)
		{
			$this->calcula_emiliani($mes_festivo, $dia_festivo);
		}	
		else
		{	
			$this->festivos[$this->ano][$mes_festivo+0][$dia_festivo+0] = true;
		}
	}	
	public function esFestivo($dia,$mes)
	{
		//echo (int)$mes;
		if($dia=='' or $mes=='')
		{
			return false;
		}
		
		if (isset($this->festivos[$this->ano][(int)$mes][(int)$dia]))
		{
			return true;
		}
		else 
		{
			return FALSE;
		}
	
	}	
}

function sumasdiasemana($fecha,$dias)
{   
    
    //echo $fecha;
    $datestart= strtotime($fecha);
    $datesuma = 15 * 86400;
    $diasemana = date('N',$datestart);
   // echo date('N',$datestart)."<br>";
    $totaldias = $diasemana+$dias;
    //echo $totaldias."<br>";
    $findesemana = intval( $totaldias/5) *2 ;
    //echo $findesemana."<br>";
    $diasabado = $totaldias % 5 ;
if ($diasabado==6) $findesemana++;
if ($diasabado==0) $findesemana=$findesemana-2;

$total = (($dias+$findesemana) * 86400)+$datestart ;
return $twstart=date('Y-m-d', $total);
} 



function sumasdias($fecha,$dias)
{   
    $festi=cantidadFestivos($fecha,$dias);
    $fecha=sumasdiasemana($fecha,$dias);
    //echo $fecha;
    $datestart= strtotime($fecha);
    $datesuma = 15 * 86400;
    $diasemana = date('N',$datestart);
   // echo date('N',$datestart)."<br>";
    $totaldias = $diasemana+$festi;
    //echo $totaldias."<br>";
    $findesemana = intval( $totaldias/5) *2 ;
    //echo $findesemana."<br>";
    $diasabado = $totaldias % 5 ;
if ($diasabado==6) $findesemana++;
if ($diasabado==0) $findesemana=$findesemana-2;

$total = (($festi+$findesemana) * 86400)+$datestart ;
return $twstart=date('Y-m-d', $total);
} 
function cantidadFestivos($fecha,$dias)
{
    
    $cont=0;
    $day=(strtotime($fecha)-strtotime(sumasdiasemana($fecha,$dias)))/86400;
    $day=abs($day);
    $day=floor($day);
    //echo $day;
    
    for($i = 0;$i < $day; $i++)
    {
        //echo "<br>";
        //echo $fecha;
    $datestart= strtotime($fecha);
    $ano= date('Y',$datestart);
    $dia=date('j',$datestart);
    $mes=date('n',$datestart);
    $festi=new festivos();
    $festi->festivos($ano);
    $isFestivo=$festi->esFestivo($dia,$mes);
    //echo $isFestivo;
    if($isFestivo)
    {
        $cont=$cont+1;
    }
   
        $fecha=sumarDia($fecha);
    } 
    
    return $cont;
} 
    /*echo "<br>". "hoy:";
    
    $fecha=sumarDia($fecha);
    echo "<br><br>".sumarDia($fecha);
    $datestart= strtotime($fecha);
    $datestart=$datestart+1;
    $diasFesti=0;
    echo "<br> <br> <br> ". $fecha."<br> ";
    echo date('Y',$datestart)."<br>";
    $ano= date('Y',$datestart);
    $dia=date('j',$datestart);
    $mes=date('n',$datestart);
    echo $ano." ".$dia." ".$mes." ";
    $diaFesti =new festivos();
    $diaFesti->festivos($ano);
    $diaFesti->esFestivo($mes,$dia); 
    
} */

function sumarDia($fecha){
    $k=1;
    $d='+'.$k.'day';
    $nuevaFecha= strtotime ($d,strtotime($fecha));
    $nuevaFecha=date('Y-m-j',$nuevaFecha);
    
    return $nuevaFecha;
}


echo "<br> Cantidad de festivos: ".cantidadFestivos('2017/10/10',30)."<br>";
echo "<br>suma de dias: ".sumasdias('2017/10/10',30)." <br>";
?>
<!--
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Combo con campos condicionales</title>
	<style type="text/css">
		* { padding:0px; margin:0px; }
		body { font-family: arial, sans-serif; }
		
		
		select#tipo { padding:5px 10px; }
		
		.opciones { display:none; }
		.btn { border:none; padding:10px 20px; color:#000; background-color:#f44336; margin-top:20px; cursor:pointer; }
		.btn:hover { background-color:#b71c1c; }
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="comboSelector">
		<select name="tipo" id="tipo" onchange="elegir_opcion(this);">
			<option value="">Elija un tipo</option>
			<option value="op1">Tipo 1</option>
			<option value="op2">Tipo 2</option>
			<option value="op3">Tipo 3</option>
		</select>
		</div>
		<div class="opcionesWrapper">
			
		</div>
	</div>
	
	
	<div class="opciones">
		<div id="op1">
			<form>
			Nombre: <input type="text" size="30" name="op1" required="required"><br>
			Direccion: <input type="text" size="30" name="op1"><br>
			DNI: <input type="text" size="30" name="op1"><br>
			<input type="submit" name="submit" value="ENVIAR" class="btn">
			</form>
		</div>
		<div id="op2">
			<form>
			Razón Social: <input type="text" size="30" name="op1" required="required"><br>
			Direccion: <input type="text" size="30" name="op1" required="required"><br>
			RUC: <input type="text" size="30" name="op1"><br>
			<input type="submit" name="submit" value="ENVIAR" class="btn">
			</form>
		</div>
		<div id="op3">
			<form>
			Subtipo: 
			<select name="subtipo" id=""> 
				<option value="">subtipo1</option>
				<option value="">subtipo 2</option>
				<option value="">subtipo 3</option> 
			</select> <br>
			Direccion: <input type="text" size="30" name="op1" required="required"><br>			
			<input type="submit" name="submit" value="ENVIAR" class="btn">
			</form>
		</div>
	</div>
	
	<script type="text/javascript">
		function elegir_opcion(combo) {
			$tipo = jQuery(combo).val();
			$campos = jQuery("#"+$tipo).html();
			jQuery(".opcionesWrapper").html($campos);
		}
	</script>

</body></html> -->