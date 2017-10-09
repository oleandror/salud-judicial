<?php
        require 'conection.php';
	   require 'funcs/funcs.php';
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE Nombre LIKE '%$valor%'";
		}
	}
	$sql = "SELECT * FROM usuario $where";
	$resultado =muestraDatos();
	
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		
		<script src="js/bootstrap.min.js"></script>	
        
        <script>
	$(document).ready(function(){
		$('#mitabla').DataTable({
			"order": [[1, "asc"]],
			"language":{
				"lengthMenu": "Mostrar _MENU_ registros por pagina",
				"info": "Mostrando pagina _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(filtrada de _MAX_ registros)",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search": "Buscar:",
				"zeroRecords":    "No se encontraron registros coincidentes",
				"paginate": {
					"next":       "Siguiente",
					"previous":   "Anterior"
				},					
			}
		});	
	});	
</script>
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Procesos Registrados </h2>
			</div>
			

			<br>
			
			<div class="row table-responsive">
				<table class="display" id="mitabla" >
					<thead>
						<tr>
							<th>Id Proceso</th>
                            <th> Tipo de Proceso</th>
                            <th>Radicación</th>
							<th>Nombre del Demandado</th>
							 <th>Nombre Demandante</th>
                            <th> Estado del proceso</th>
                            <th>Encargado </th>
                            <th>Dependencia</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
							
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['Id_Demanda']; ?></td>
								
                                <td><?php echo $row['Tipo_demanda']; ?></td>
                                <td><?php echo $row['Radicacion']; ?></td>
								<td><?php echo $row['Nombre_Del_Demandado']; ?></td>
								<td><?php echo $row['Nombre_Demandante']; ?></td>
								<td><?php echo $row['Estado']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['NombreDependencia']; ?></td>
								<td><a href="modificar.php?Id_Demanda=<?php echo $row['Id_Demanda']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a  data-href="eliminar.php?Id_Demanda=<?php echo $row['Id_Demanda']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                                 <td><a  data-href="modificar.php?Id_Demanda=<?php echo $row['Id_Demanda']; ?>" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash"></span></a></td>
                                
                                <!--
                                <td><a type="button" href="tabla1.php?Id_Demand=<?php echo $row['Id_Demanda']; ?>" id="myBtn" data-target="myModal" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a></td>
                                -->
                                    
                                
                                
							</tr>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Proceso <?php echo $row['Id_Demanda']; ?>  </h4>
					</div>
					
					<div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 " style="border:1px solid;">
               <p>Identificador Demanda: <?php echo $row['Id_Demanda'];?></p> </div>
                            <div class="col-sm-4" style="border:1px solid;">
               <p>Nombre del Demandado: <?php echo $row['Nombre_Del_Demandado'];?></p> 
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-4" style="border:1px solid;">
               <p>Nombre del Demandante: <?php echo $row['Nombre_Demandante'];?></p> </div>
                                 <div class="col-sm-4" style="border:1px solid;">
               <p>Medio de Control: <?php echo $row['MedioControl'];?></p> </div>
                                      <div class="col-sm-4" style="border:1px solid;">
               <p>Nombre Dependencia: <?php echo $row['NombreDependencia'];?></p>
                                          </div>
                                           <div class="col-sm-4" style="border:1px solid;">
               <p>Radicacion: <?php echo $row['Radicacion'];?></p> </div>
                                                <div class="col-sm-4" style="border:1px solid;">
               <p>Estado del Proceso: <?php echo $row['Estado'];?></p> </div>
                                                     <div class="col-sm-4" style="border-radius:1px solid;">
               <p>Dueño del Proceso: <?php echo $row['Nombre'];?></p>                      
		          </div>
					</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
						<a class="btn btn-info btn-ok">Modificar</a>
					</div>
				</div>
			</div>
                        </div> 
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Proceso</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este Proceso?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
   
        
            

		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
        <script>
        $('#myModal').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
    
        </script>
 
		
	</body>
</html>