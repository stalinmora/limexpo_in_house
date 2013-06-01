<?php
	
	include_once('clsImportador.php');
	$id=$_GET['id'];
	$servicio=new clsImportador();
	$actul=$servicio->__ModificaEstado($id);
    
      if($actul==NULL)
                echo("No se pudo Eliminar el Importador");
        else{
                echo("Eliminaci&oacute;n Exitosa");	
                
        }
        
        echo '<script > document.location="../mantenimiento/ConsultaImportador.php" </script>';	
?>