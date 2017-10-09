<?php
 
include 'conection.php';
require 'funcs/funcs.php';

$id1=$_GET['Id_Demand'];

?>

               <?php
                 $resultado1 = muestraDatos1($id1);
                while($row1 = $resultado1->fetch_array(MYSQL_ASSOC))  { ?> 
                                                           
			 
				<p><?php echo $row1['Id_Demanda'];?></p>
				<p><?php echo $row1['Nombre_Del_Demandado'];?></p>
                 <p><?php echo $row1['Nombre_Demandante'];?></p>
                <p><?php echo $row1['MedioControl'];?></p>
                <p><?php echo $row1['NombreDependencia'];?></p>
                <p><?php echo $row1['Radicacion'];?></p>
                 <p><?php echo $row1['Estado'];?></p>
                 <p><?php echo $row1['Nombre'];?></p>
                <!-- <td> <a href="saludo.php?variable=<?php echo $row['ID_Ben'];?>" class="large material-icons">ver</a>
						
					</td> -->
			
                 <?php } ?>    