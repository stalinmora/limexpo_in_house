<?php
	
	include_once('clsProveedor.php');
	$id=$_GET['id'];
	$servicio=new clsProveedor();
	$actul = $servicio->__ModificaEstado($id);
    
    if($actul==NULL)
                echo("No se pudo Eliminar el Importador");
        else{
                echo("Eliminaci&oacute;n Exitosa");	
                echo '<script > document.location="../mantenimiento/ConsultaProveedor.php" </script>';	
        }
    
    
?>