<?php
 
 include 'funcs/funcs.php';
include 'conection.php';

 session_start();

if(!isset($_SESSION["id_usuario"])){ //En caso de no existir la sesión redireccionamos
		header("Location: sesion/index.php");
	}
$id=$_SESSION["id_usuario"];
?>
<html>
    
<head>
  <title>usuarios</title>
  <meta charset="utf-8">
    
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="css/materialize.css">

</head>
<body>
<div class="container">
    <h6>Procesos </h6>
	<div class="row">
        
	
		<table class="bordered striped hoverable highlight responsive-table">
		<caption>
			
		</caption>
			<thead>
                <td>ID</td>
				<td> Demandado</td>
				<td> Demandante</td>
				<td>Medio Control</td>
				<td>Dependencia</td>
				<td>Radicacion</td>
                <td>Estado del Proceso</td>
				<td> Dueño del Proceso</td>
				
				
			</thead>
            <tbody>
            <?php 
                 $resultado = muestraDatos();
                while($row = $resultado->fetch_array(MYSQL_ASSOC)) { ?> 
                                                           
			 <tr>
				<td><?php echo $row['Id_Demanda'];?></td>
				<td><?php echo $row['Nombre_Del_Demandado'];?></td>
                 <td><?php echo $row['Nombre_Demandante'];?></td>
                <td><?php echo $row['MedioControl'];?></td>
                <td><?php echo $row['NombreDependencia'];?></td>
                <td><?php echo $row['Radicacion'];?></td>
                 <td><?php echo $row['Estado'];?></td>
                 <td><?php echo $row['Nombre'];?></td>
                <!-- <td> <a href="saludo.php?variable=<?php echo $row['ID_Ben'];?>" class="large material-icons">ver</a>
						
					</td> -->
			</tr>
                 <?php } ?>               
         
                </tbody>
		</table>
	</div>
</div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"> </script>
        <script src="js/materialize.js"> </script>
    </body>
    </html>