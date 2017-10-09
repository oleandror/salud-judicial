<?php
	require 'conection.php';
	
	$id = $_GET['Id_Demanda'];
	
	$sql = "SELECT * FROM proceso WHERE Id_Demanda = '$id'";
	$resultado = $conn->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
				<h3 style="text-align:center">MODIFICAR PROCESO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group inline">
					<label for="nombre" class="col-sm-2 control-label">Nombre Del Demandado</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="nombreDemandado" placeholder="Nombre" value="<?php echo $row['Nombre_Del_Demandado']; ?>" required>
					</div>
				
					<label for="nombre" class="col-sm-2 control-label">Identificacion Del Demandado</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="idDemandado" placeholder="Nombre" value="<?php echo $row['Identificacion_demandado']; ?>" required>
					</div>
				</div>
                <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre Del Demandante</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="nombreDemandante" placeholder="Nombre" value="<?php echo $row['Nombre_Demandante']; ?>" required>
					</div>
				
					<label for="nombre" class="col-sm-2 control-label">Identificacion Del Demandante</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="idDemandante" placeholder="Nombre" value="<?php echo $row['Id_Demandante']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['Id_Demanda']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Medio de Control</label>
					<div class="col-sm-3">
                        <select name="meControl" selected="1" value="">
                        <option value="1" <?php if($row['Medio_control']=="1") echo "selected" ?>> Reparacion Directa</option>
                            <option value="3" <?php if($row['Medio_control']=="3") echo "selected" ?>> Accion Contractual </option>
                            <option value="4" <?php if($row['Medio_control']=="4") echo "selected" ?>> Nulidad y Restablecimiento</option>
                            <option value="2" <?php if($row['Medio_control']=="2") echo "selected" ?>> Responsabilidad Medica</option>
					<!--	<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['Correo']; ?>"  required> -->
                            </select>
					</div>
			
					<label for="telefono" class="col-sm-2 control-label">Fecha Notificacion</label>
					<div class="col-sm-3">
						<input type="tel" class="form-control" id="telefono" name="fechaNoti" placeholder="Fecha Notificacion" value="<?php echo $row['Fecha_Notificacion']; ?>" >
					</div>
				</div>
                
                 <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Radicacion</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="radicacion" placeholder="Nombre" value="<?php echo $row['Radicacion']; ?>" required>
					</div>
				
					<label for="nombre" class="col-sm-2 control-label">Despacho</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="despacho" placeholder="Nombre" value="<?php echo $row['Despacho']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Abogado Designado</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="aboDesignado" placeholder="Nombre" value="<?php echo $row['Abogado_Designado']; ?>" required>
					</div>
				
					<label for="nombre" class="col-sm-2 control-label">Cuantia</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="nombre" name="cuantia" placeholder="Nombre" value="<?php echo $row['Cuantia']; ?>" required>
					</div>
				</div>
			  <div class="form-group ">
               
                    <label for="n10" class="col-sm-2 control-label"> Hecho Generador </label>
                   <div class="col-sm-7">
                    <textarea rows="5" class="form-control" cols="15" type="text"  id="n10"  name="heGenerador" size="30" value="" required> <?php echo $row['Hecho_Generador']; ?>
                       </textarea>
                
                </div>  
            </div>
               
            
                    <div class="form-group ">
                        <label for="n11" class="col-sm-2 control-label"> Dependencia Responsable</label>
                <div class="col-xs-3">
             <select class= "form-control" id="n11" name="DeResponsable">
                
                <option value="12" <?php if($row['Dependencia_Responsable']=="12") echo "selected" ?>>  Secretaria de Salud </option>
                <option value="2" <?php if($row['Dependencia_Responsable']=="2") echo "selected" ?>>  Secretaria de Deportes,Recreacion y Cultura </option>
                <option value="3" <?php if($row['Dependencia_Responsable']=="3") echo "selected" ?>>  Secretaria de Desarrollo Agropecuario </option>
                 <option value="4" <?php if($row['Dependencia_Responsable']=="4") echo "selected" ?>>  Desarrollo Economico y Competitividad </option>
                 <option value="5" <?php if($row['Dependencia_Responsable']=="5") echo "selected" ?>>   Desarrollo Social </option>
                 <option value="6" <?php if($row['Dependencia_Responsable']=="6") echo "selected" ?>>  Secretaria de Educacion </option>
                <option value="7" <?php if($row['Dependencia_Responsable']=="7") echo "selected" ?>>   Gobierno </option>
                 <option value="1" <?php if($row['Dependencia_Responsable']=="1") echo "selected" ?>>  Administrativa </option>
                 <option value="9" <?php if($row['Dependencia_Responsable']=="9") echo "selected" ?>>  Infraestructura </option>
                 <option value="8" <?php if($row['Dependencia_Responsable']=="8") echo "selected" ?>>  Hacienda </option>
                 <option value="10" <?php if($row['Dependencia_Responsable']=="10") echo "selected" ?>>  Juridica </option>
                 <option value="11" <?php if($row['Dependencia_Responsable']=="11") echo "selected" ?>>  Planeacion </option>
                
            </select>
                </div>
                
                       <label class="col-sm-2 control-label"for="n13">  Probabilidad de Exito      </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n13" name="proExito">
                
                <option value="1" <?php if($row['ProbabilidadExito']=="1") echo "selected" ?>>  Alta </option>
                <option value="2" <?php if($row['ProbabilidadExito']=="2") echo "selected" ?>>  Media Alta </option>
                <option value="3" <?php if($row['ProbabilidadExito']=="3") echo "selected" ?>>  Media </option>
                <option value="4" <?php if($row['ProbabilidadExito']=="4") echo "selected" ?>>  Baja </option>
                
            </select>   
                
                 </div>
                    
                        
                        </div>
                
                    
             <div class="form-group ">
            
             <label for="n12" class="col-sm-2 control-label"> Estado Actual Del Proceso</label>
                <div class="col-xs-3">
             <select class="form-control" id="n12" name="esActual">
                
                <option value="1" <?php if($row['Estado_Proceso']=="1") echo "selected" ?>>  Visita </option>
                <option value="2" <?php if($row['Estado_Proceso']=="2") echo "selected" ?>>  Formulación de Cargos </option>
                <option value="3" <?php if($row['Estado_Proceso']=="3") echo "selected" ?>>  Elaboración Notificación de Cargos </option>
                 <option value="4" <?php if($row['Estado_Proceso']=="4") echo "selected" ?>> Fecha de notificacion de Auto Cargo   </option>
                 <option value="5" <?php if($row['Estado_Proceso']=="5") echo "selected" ?>>   Esperando Descargos del sujeto </option>
                 
                 <option value="6" <?php if($row['Estado_Proceso']=="6") echo "selected" ?>>  Periodo Probatorio Si </option>
                <option value="7" <?php if($row['Estado_Proceso']=="7") echo "selected" ?>>  Periodo Probatorio NO Estado </option>
                 <option value="8" <?php if($row['Estado_Proceso']=="8") echo "selected" ?>>  Alegato de conclusion </option>
                 <option value="9" <?php if($row['Estado_Proceso']=="9") echo "selected" ?>>   Resolucion Sancionatoria</option>
                
            </select>
                </div>
                 
                    <label for="n6" class="col-sm-2 control-label">  Fecha  </label>
                    <div class="col-xs-3">
                    <div id="n6" class="input-append ">
                        <input data-format="yyyy-MM-dd" type="date" class="form-control" name="fechaEstado" placeholder=" Fecha Cambio Estado" value="<?php ?>">
                    </div>
                    
                   
                </div>
                </div>
                <div class="form-group ">
                 
                <label for="n133" class="col-sm-2 control-label">  Tipo de Pretenciones     </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n133" name="pretenciones">
                
                <option value="1" <?php if($row['Tipo_Pretenciones']=="2") echo "selected" ?>>  Determinadas </option>
                <option value="3" <?php if($row['Tipo_Pretenciones']=="3") echo "selected" ?>>  Indeterminadas </option>
                    <option value="2" <?php if($row['Tipo_Pretenciones']=="2") echo "selected" ?>>  Prestaciones Periodicas </option>
                
                
            </select>   
                
                 </div>
			
			
                    
                    
           
                <label for="n13" class="col-sm-2 control-label">  Fallo En Primera Instancia      </label>      
                 <div class="col-xs-3">
                <select class= "form-control" id="n13" name="falloPrimera">
                
                <option value="1" <?php if($row['Fallo_Primer_Instancia']=="1") echo "selected" ?>>  Favorable </option>
                <option value="2" <?php if($row['Fallo_Primer_Instancia']=="2") echo "selected" ?>>  Desfavorable </option>
               
                
            </select>   
                
                 </div>
                   
                    </div>
                 <div class="form-group ">
                <label for="n13" class="col-sm-2 control-label">  Fallo En Segunda Instancia     </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n13" name="falloSegunda">
                
                <option value="1" <?php if($row['Fallo_Segunda_Instancia']=="1") echo "selected" ?>>  Favorable </option>
                <option value="2" <?php if($row['Fallo_Segunda_Instancia']=="2") echo "selected" ?>>  Desfavorable </option>
                
                
            </select>   
                
                 </div>
            
                <label for="n13" class="col-sm-2 control-label">  Fortaleza Defensa      </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n13" name="forDefensa">
                
                <option value="1"<?php if($row['FortalezaDefensa']=="1") echo "selected" ?>>  Alta </option>
                <option value="2" <?php if($row['FortalezaDefensa']=="2") echo "selected" ?>>  Medio Alta </option>
                <option value="3" <?php if($row['FortalezaDefensa']=="3") echo "selected" ?>>  Media </option>
                <option value="4" <?php if($row['FortalezaDefensa']=="4") echo "selected" ?>>  Baja </option>
                
            </select>   
                
                 </div>
                </div>
                <div class="form-group " >
                 
                <label for="n13" class="col-sm-2 control-label">  Fortaleza Probatoria      </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n13" name="forProbatoria">
                
                <option value="1" <?php if($row['fortalezaProbatoria']=="1") echo "selected" ?>>  Alta </option>
                <option value="2" <?php if($row['fortalezaProbatoria']=="2") echo "selected" ?>>  Medio Alta </option>
                <option value="3" <?php if($row['fortalezaProbatoria']=="3") echo "selected" ?>>  Media </option>
                <option value="4" <?php if($row['fortalezaProbatoria']=="4") echo "selected" ?>>  Baja </option>
                
                
            </select>   
                
                 </div>
			
			
            
                <label for="n13" class="col-sm-2 control-label">  Riesgos Procesales      </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n13" name="reProcesales">
                
                <option value="1" <?php if($row['RiesgosProcesales']=="1") echo "selected" ?>>  Alta </option>
                <option value="2" <?php if($row['RiesgosProcesales']=="2") echo "selected" ?>>  Medio Alta </option>
                <option value="3" <?php if($row['RiesgosProcesales']=="3") echo "selected" ?>>  Media </option>
                <option value="4" <?php if($row['RiesgosProcesales']=="4") echo "selected" ?>>  Baja </option>
                
            </select>   
                
                 </div>
                </div>
                    <div class="form-group " >
                 
                <label for="n13" class="col-sm-2 control-label">  Nivel Jurisprudencial      </label>      
                <div class="col-xs-3">
                <select class= "form-control" id="n13" name="nivelJuris">
                
                <option value="1" <?php if($row['NivelJurisprudencia']=="1") echo "selected" ?>>  Alta </option>
                <option value="2" <?php if($row['NivelJurisprudencia']=="2") echo "selected" ?>>  Medio Alta </option>
                <option value="3" <?php if($row['NivelJurisprudencia']=="3") echo "selected" ?>>  Media </option>
                <option value="4" <?php if($row['NivelJurisprudencia']=="4") echo "selected" ?>>  Baja </option>
                
                
            </select>   
                
                 </div>
			
			
                
                    <label for="n6" class="col-sm-2 control-label">  Fecha Probable de Fallo </label>
                    <div class="col-xs-3">
                    <div id="n6" class="input-append ">
                        <input data-format="yyyy-MM-dd" type="date" class="form-control" name="fechaFallo" value="<?php echo $row['Fecha_Probable_Fallo']?>">
                    </div>
                    
                   
                </div>
                    </div>
            <div class="form-group row">
                
                    <label for="n77" class="col-sm-2 control-label"> Observacion/Comentario </label>
                <div class="col-sm-8">
                    <input type="text" placeholder=" Observacion/Comentario" id="n77" class="form-control" name="observacion" size="30" value="<?php echo $row['Observaciones']?>">
                
                </div>
                
            </div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="mostrarProcesos.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>