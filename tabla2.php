<?php
        require 'conection.php';
	   require 'funcs/funcs.php';
	$where = "";
	
/*	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE Nombre LIKE '%$valor%'";
		}
	} */
	//$sql = "SELECT * FROM usuario $where";
	$resultado =muestraDatosUser();
	
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
				<h2 style="text-align:center">Usuarios Registrados </h2>
			</div>
			

			<br>
			
			<div class="row table-responsive">
				<table class="display" id="mitabla" >
					<thead>
						<tr>
							<th>Id Usuario</th>
                            <th> Nombres</th>
                            <th>Apellidos</th>
							<th>Telefono</th>
							 <th>Correo</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
							
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['Id_Usuario']; ?></td>
								
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['Apellido']; ?></td>
								<td><?php echo $row['Telefono']; ?></td>
								<td><?php echo $row['Correo']; ?></td>
                                <td><?php echo $row['Tipo']; ?></td>
								
								<td><a href="modificarUser.php?Id_Usuario=<?php echo $row['Id_Usuario']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a  data-href="eliminarUser.php?Id_Usuario=<?php echo $row['Id_Usuario']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                                 <td><a  data-href="modificarUser.php?Id_Usuario=<?php echo $row['Id_Usuario']; ?>" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
                                
                                <!--
                                <td><a type="button" href="tabla1.php?Id_Demand=<?php echo $row['Id_Demanda']; ?>" id="myBtn" data-target="myModal" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a></td>
                                -->
                                    
                                
                                
							</tr>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Usuario <?php echo $row['Nombre']; ?>  </h4>
					</div>
					
					<div class="modal-body">
                        
                        <div class="row">
                            <div class="col-sm-12 text-center"  style="border:1px solid;align:center;">
                                Usuario <?php echo $row[ 'Id_Usuario'];?>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-6 " style="border:1px solid;">
                                Nombres: 
                                 </div>
                            <div class="col-sm-6  text-center" style="border:1px solid;">
                                <?php echo $row['Nombre'];?></div> </div>
                        
                        <div class="row">
                            <div class="col-sm-6 " style="border:1px solid;">
               <p>Apellidos: </p> 
                                </div>
                            <div class="col-sm-6 text-center" style="border:1px solid;">
               <p> <?php echo $row['Apellido'];?></p> 
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6" style="border:1px solid;">
               <p>Correo: </p> 
                                </div>
                            <div class="col-sm-6 text-center" style="border:1px solid;">
               <p> <?php echo $row['Correo'];?></p> 
                                </div>
                        </div>
                            
                            <div class="row">
                            <div class="col-sm-3" style="border:1px solid;">
               <p>Telefono: </p> </div>
                                <div class="col-sm-3 text-center" style="border:1px solid;">
               <p> <?php echo $row['Telefono'];?></p> </div>
                                <div class="col-sm-3" style="border:1px solid;">
               <p>Rol : </p> </div>
                                 <div class="col-sm-3 text-center" style="border:1px solid;">
               <p> <?php echo $row['Tipo'];?></p> </div>
                                                           
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