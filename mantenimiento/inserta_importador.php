<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../libs/clsImportador.php");

// Recuperar los parametros

$impo_codigo = $_POST['codigo_importador'];
$tipo_persona = $_POST['cmbTipoCliente'];
$razon_social = $_POST['O_razon_social_importador'];
$pais = $_POST['cmbPaises'];
$ciudad = $_POST['O_ciudad_importador'];
$tipo_identificacion=$_POST['cmbID'];
$identificacion = $_POST['identificacion'];
$email_personal=$_POST['O_email_importador'];
$direccion_domicilio= $_POST['O_direccion_domicilio_importador'];
$telefono= $_POST['O_telefono_importador'];
$celular=$_POST['O_celular_importador'];
$email_trabajo = $_POST['email_trabajo_importador'];
$direccion_trabajo = $_POST['direccion_trabajo_importador'];
$telefono_trabajo = $_POST['telefono_trabajo_importador'];


$obj_importador = new clsImportador();

if($impo_codigo != 0){
        $actul_importador = $obj_importador->ModificarImportador($impo_codigo, $razon_social, $tipo_persona, $tipo_identificacion, $identificacion, $pais, $ciudad, $direccion_domicilio, $direccion_trabajo, $email_personal, $telefono, $celular, $email_trabajo, $telefono_trabajo, $email_personal);
        if($actul_importador==NULL)
                echo("No se pudo Actualizar Importador");
        else{
                echo("Actualizacion Exitosa");	
                
        }
        
}
else{
        $regis_importador = $obj_importador->RegistrarImportador($razon_social, $tipo_persona, $tipo_identificacion, $identificacion, $pais, $ciudad, $direccion_domicilio, $direccion_trabajo, $email_personal, $telefono, $celular, $email_trabajo, $telefono_trabajo, $email_personal);

        if($regis_importador==NULL)
                 echo("No se pudo registrar Importador");
        else{
                echo("Registro exitoso");	
                
        }
}
echo "<meta http-equiv='refresh' content='0; url=ConsultaImportador.php'>";	


?>
