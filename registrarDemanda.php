<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .opciones{
            display: none;
        }
        .bigicon
        {
            
            font-size:35px;
            color:#36A0FF;
        }
        .header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
    div#columna_izquierda {
       float: left;
       width: 50%;
    }
    div#columna_derecha {
       float: right;
       width: 50%;
    }
    @media (max-width: 700px) {
       div#columna_izquierda,
       div#columna_derecha {
          float: none;
          width: 100%;
       }
    }
}
    </style>
  <title>Demanda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header>
        <div class="container-fluid">
			
			<nav class='navbar navbar-default navbar-fixed-top' role="navigation">
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' aria-expanded="false" data-target='#navbar1' >
							<span class='sr-only'>Men&uacute;</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
                            <span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
                        <a href="welcome.php" class="navbar-brand"> Salud</a>
					</div>
					
					<div id='navbar1' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li class=''><a href='welcome.php'>Inicio</a></li>			
                        
                            <li class=''> <a  href='modificarUsuario.php'> Administrar Cuenta</a> </li>
                        </ul>
						
						<?php if($_SESSION['id_role']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='#'>Administrar Usuarios</a></li>
							</ul>
						<?php } ?>
						
						<ul class='nav navbar-nav navbar-right'>
							<li><a href='logout.php'>Cerrar Sesi&oacute;n</a></li>
						</ul>
                            
                        
					</div>
				</div>
			</nav>	
			
			
        </div>
            </header>
    
   

    
                <br><br><br><br>
         <div class="container">
             
             <div class="row">
                 <div class="col-md-10">
                     <div class="well well-sm">
                         
                             <fieldset>
                        <legend class="text-center header"> Ingresar Procesos</legend>
                   <div class="container "> 
                     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="form-register" method="POST">
           <div class="opcionesWrapper">
               
                <div class="comboSelector form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                    
		<select class=" control-form" name="tipo" id="tipo" onchange="elegir_opcion(this);">
			<option value=0>Elija un Tipo De Proceso</option>
			<option value=1>Proceso Judicial</option>
			<option value=2>Proceso Administrativo</option>
			
		</select>           
               <br>
               <br> 
               </div>
                       </div>
              
               </form>
                       
              
     </div>
                                 
         
    
                  
                   
                       
                   <div class="opciones">     
                       
                       <div id=1 class="form-group row">
			
            
                <br>
                <br>
                <div class=" form-group">
                <div class="form-group row inline">
                    <div class="col-xs-3" >
                    <label for="n1">  Nombre Del Demandado: </label>
			 <input type="text" placeholder="Nombre del Demandado" id="n1" class="form-control"  name="Nombre_demandado" size="30" required>
                        </div>
                    <div class="col-xs-2"> 
                        <label for="n2">  C.C/NIT:       </label>
             <input type="text" placeholder="C.C/NIT" class="form-control" size="30" name="CC_Demandado" id="n2" required></div>
                        
                    </div>
             <div class="form-group row inline">
                    <div class="col-xs-3" >
                    <label for="n3">  Nombre Del Demandante: </label>
			 <input type="text" placeholder="Nombre del Demandante" id="n3" class="form-control"  name="Nombre_demandante" size="30" required>
                        </div>
                    <div class="col-xs-2"> 
                        <label for="n4">  C.C/NIT:       </label>
             <input type="text" placeholder="C.C/NIT" class="form-control" size="30" name="CC_Demandante" id="n4" required></div>
                    </div>
            <div class="form-group row">
            <div class="col-xs-4">
                <label for="n5">  Medio De Control       </label>
            
                
                <select class= "form-control" id="n5" name="MeControl">
                <option value="1"> Reparacion Directa </option>
                <option value="3">  Accion Contractual </option>
                <option value="4">  Nulidad y Restablecimiento del derecho </option>
                <option value="2">  Responsabilidad Medica </option>
                    
                
            </select>
			
			</div>
                </div>
            <div class="form-group row inline">
                <div class="col-xs-4">
                    <label for="n6">  Fecha de Notificacion </label>
                    <div id="n6" class="input-append ">
                        <input data-format="yyyy-MM-dd" type="date" class="form-control" name="fechaNoti">
                        
                    
                    </div>
                    
                   
                </div>
                <div class="col-xs-4">
                    <label for="n7" class="input-append"> Radicacion </label>
                    <input type="text" placeholder=" Radicacion" id="n7" class="form-control" name="radicacion" size="30" required>
                
                </div>
            </div>  
                    
             <div class="form-group row inline">
            <div class="col-xs-4">
                <label for="n8">  Despacho      </label>      
                <!--
                <select class= "form-control" id="n8" name="MeControl">
                
                <option value="Reparacion Directa">  </option>
                <option value="Accion Contractual">  Accion Contractual </option>
                <option value="Nulidad y Restablecimiento del derecho">  Nulidad y Restablecimiento del derecho </option>
                <option value="Responsabilidad Medica">  Responsabilidad Medica </option>
                
            </select>   -->
                <input type="text" placeholder="Despacho"  id=n8 class="form-control" name="despacho" size="30" required>
                 
			
			</div>
                 <div class="col-xs-4">
                    <label for="n7" class="input-append"> Abogado Designado </label>
                    <input type="text" placeholder=" Nombre" id="n7" class="form-control" name="aboDesignado" size="30" required>
                
                </div>
                </div>
            
                    
                    <div class="form-group row">
                <div class="col-xs-4">
                    <label for="n9" class="input-append"> Cuantia </label>
                    <input type="text" placeholder=" $$" id="n9" class="form-control" name="cuantia" size="30" required>
                
                </div>  
            </div> 
                    
             <div class="form-group row">
                <div class="col-xs-5">
                    <label for="n10" class="input-append"> Hecho Generador </label>
                    <textarea rows="5" cols="12" type="text" placeholder=" Describe el hecho generador del proceso" id="n10" class="form-control container" name="heGenerador" size="30" required>
                    </textarea>
                
                </div>  
            </div>
            <div class="form-group row inline">
                    <div class="col-xs-3">
                        <label for="n11" class="input-append"> Dependencia Responsable</label>
             <select class= "form-control" id="n11" name="DeResponsable">
                
                <option value="12">  Secretaria de Salud </option>
                <option value="2">  Secretaria de Deportes,Recreacion y Cultura </option>
                <option value="3">  Secretaria de Desarrollo Agropecuario </option>
                 <option value="4">  Desarrollo Economico y Competitividad </option>
                 <option value="5">   Desarrollo Social </option>
                 <option value="6">  Secretaria de Educacion </option>
                <option value="7">   Gobierno </option>
                 <option value="1">  Administrativa </option>
                 <option value="9">  Infraestructura </option>
                 <option value="8">  Hacienda </option>
                 <option value="10">  Juridica </option>
                 <option value="11">  Planeacion </option>
                
            </select>
                </div>
                    
                    <div class="col-xs-3">
                        <label for="n12" class="input-append"> Estado Actual Del Proceso</label>
             <select class="form-control" id="n12" name="esActual">
                
                <option value="1">  Visita </option>
                <option value="2">  Formulacion de Cargos </option>
                <option value="3">  Elaboracion Notificacion de Cargos </option>
                 <option value="4"> Fecha de notificacion de Auto Cargo   </option>
                 <option value="5">   Esperando Descargos del sujeto </option>
                 
                 <option value="6">  Periodo Probatorio Si </option>
                <option value="7">  Periodo Probatorio NO Estado </option>
                 <option value="8">  Alegato de conclusion </option>
                 <option value="9">   Resolucion Sancionatoria</option>
                
            </select>
                </div>
                <div class="col-xs-3">
                    <label for="n19">  Fecha  </label>
                    <div id="n19" class="input-append ">
                        <input data-format="yyyy-MM-dd" type="date" class="form-control" name="fechaEstado">
                    </div>
                    
                   
                </div>
                    </div>
             <div class="form-group row inline">
            <div class="col-xs-4">
                <label for="n13">  Probabilidad de Exito      </label>      
                
                <select class= "form-control" id="n13" name="proExito">
                
                <option value="1">  Alta </option>
                <option value="2">  Media Alta </option>
                <option value="3">  Media </option>
                <option value="4">  Baja </option>
                
            </select>   
                
                 </div>
                 <div class="col-xs-4">
                <label for="n13">  Tipo de Pretenciones     </label>      
                
                <select class= "form-control" id="n13" name="pretenciones">
                
                <option value="1">  Determinadas </option>
                <option value="3">  Indeterminadas </option>
                    <option value="2">  Prestaciones Periodicas </option>
                
                
            </select>   
                
                 </div>
			
			</div>
                    
                    <div class="form-group row inline">
            <div class="col-xs-4">
                <label for="n13">  Fallo En Primera Instancia      </label>      
                
                <select class= "form-control" id="n13" name="falloPrimera">
                
                <option value="1">  Favorable </option>
                <option value="2">  Desfavorable </option>
               
                
            </select>   
                
                 </div>
                 <div class="col-xs-4">
                <label for="n13">  Fallo En Segunda Instancia     </label>      
                
                <select class= "form-control" id="n13" name="falloSegunda">
                
                <option value="1">  Favorable </option>
                <option value="2">  Desfavorable </option>
                
                
            </select>   
                
                 </div>
			
			</div>
                
                    <div class="form-group row inline">
            <div class="col-xs-4">
                <label for="n13">  Fortaleza Defensa      </label>      
                
                <select class= "form-control" id="n13" name="forDefensa">
                
                <option value="1">  Alta </option>
                <option value="2">  Medio Alta </option>
                <option value="3">  Media </option>
                <option value="4">  Baja </option>
                
            </select>   
                
                 </div>
                 <div class="col-xs-4">
                <label for="n13">  Fortaleza Probatoria      </label>      
                
                <select class= "form-control" id="n13" name="forProbatoria">
                
                <option value="1">  Alta </option>
                <option value="2">  Medio Alta </option>
                <option value="3">  Media </option>
                <option value="4">  Baja </option>
                
                
            </select>   
                
                 </div>
			
			</div>
                    <div class="form-group row inline">
            <div class="col-xs-4">
                <label for="n13">  Riesgos Procesales      </label>      
                
                <select class= "form-control" id="n13" name="reProcesales">
                
                <option value="1">  Alta </option>
                <option value="2">  Medio Alta </option>
                <option value="3">  Media </option>
                <option value="4">  Baja </option>
                
            </select>   
                
                 </div>
                 <div class="col-xs-4">
                <label for="n13">  Nivel Jurisprudencial      </label>      
                
                <select class= "form-control" id="n13" name="nivelJuris">
                
                <option value="1">  Alta </option>
                <option value="2">  Medio Alta </option>
                <option value="3">  Media </option>
                <option value="4">  Baja </option>
                
                
            </select>   
                
                 </div>
			
			</div>
                      <div class="form-group row inline">
                <div class="col-xs-4">
                    <label for="n6">  Fecha Probable de Fallo </label>
                    <div id="n6" class="input-append ">
                        <input data-format="yyyy-MM-dd" type="date" class="form-control" name="fechaFallo">
                    </div>
                    
                   
                </div>
                    </div>
            <div class="form-group row">
                <div class="col-sm-8">
                    <label for="n77" class="input-append"> Observacion/Comentario </label>
                    <input type="text" placeholder=" Observacion/Comentario" id="n77" class="form-control" name="observacion" size="30" >
                
                </div>
                
            </div>
            
                    <input type="submit"  name="enviar" value="ENVIAR" class="btn">
                    <p class="form__link">Agregar Otro Proceso <a href='registrarDemanda.php'> Click Aqui</a></p>
			</div>
                    
		</div>
                          
                       
         <div id=2 class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <br>
                <br>
                <div class="col-md-8">
			Nombre: <input type="text" placeholder="Nombre" class="form-control" size="30" name="" required="required">
            Nombre: <input type="text" placeholder="Nombre" class="form-control" size="30" name="" required="required">
            Nombre: <input type="text" placeholder="Nombre" class="form-control" size="30" name="" required="required">
            Nombre: <input type="text" placeholder="Nombre" class="form-control" size="30" name="" required="required">
            Radicacion: <input type="text" placeholder="Nombre" class="form-control" size="30" name="" required="required">
			<input type="submit"  value="ENVIAR" class="btn">
			
			</div>
                    
		</div> </div>
                                  
                       </fieldset>
                             
                        
                                    
                 </div>
            </div>
             </div>        
  </div>             
    <?php  include 'validaRegistroDemanda.php';?>

<script type="text/javascript">
		function elegir_opcion(combo) {
			$tipo = jQuery(combo).val();
			$campos = jQuery("#"+$tipo).html();
			jQuery(".opcionesWrapper").html($campos);
		}
	</script>
</body>
</html>