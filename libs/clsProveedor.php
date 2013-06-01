<?php
	include_once("clsEjecutar.php");//../src/SCPAbd/
	class clsProveedor
	{
		public function __construct() {
                
        }
        
        public function ConsPaises(){
                $obj = new clsEjecutar();
                $sql="select pais_codigo, pais_codigo_alf,pais_nombre,pais_codigo_area_p,pais_codigo_area";
                $sql= $sql." from lmp_pais WHERE pais_codigo_area <> 'NA' ";
                $registros = $obj->consultaVariosRegistros($sql);
                return $registros;;
        }
        
        public function ConsTipoCliente(){
                $obj = new clsEjecutar();
                $sql = "select deta_cat_descripcion, deta_cat_valor from lmp_det_catalogo where deta_cat_idtabla='10'";
                $registros = $obj->consultaVariosRegistros($sql);
                return $registros;
        }
        
        public function ConsTipoID(){
                $objABD=new clsEjecutar();
                $sql="select deta_cat_descripcion, deta_cat_valor  from lmp_det_catalogo where deta_cat_idtabla='11'";		
                $registros=$objABD->consultaVariosRegistros($sql);
                return $registros;
        }

        public function RegistrarProveedor($razon_social, $tipo_persona, $tipo_identificacion, $identificacion, $pais, $ciudad,  $direccion_domicilio, $direccion_trabajo,$email_personal,  $telefono, $celular,$email_trabajo,  $telefono_trabajo, $email_personal){
        $obj = new clsEjecutar();
        $sql = "INSERT INTO lmp_Proveedor(prov_nombre, prov_tipo_Proveedor, prov_tipo_identificacion, prov_identificacion, prov_pais, prov_ciudad, prov_dir_empresa, prov_dir_domicilio, prov_tel_empresa, prov_tel_domicilio, prov_celular, prov_mail_empresa, prov_mail_personal,prov_estado)
                values('".$razon_social."','".$tipo_persona."','".$tipo_identificacion."','".$identificacion."','".$pais."','".$ciudad."','".$direccion_trabajo."','".$direccion_domicilio."','".$telefono_trabajo."','".$telefono."','".$celular."','".$email_trabajo."','".$email_personal."','A')";
        $resultado = $obj->insertarRegistro($sql);
        return $resultado;
        
        }
        
        public function ModificarProveedor($prov_codigo,$razon_social, $tipo_persona, $tipo_identificacion, $identificacion, $pais, $ciudad,  $direccion_domicilio, $direccion_trabajo,$email_personal,  $telefono, $celular,$email_trabajo,  $telefono_trabajo, $email_personal){
                $obj = new clsEjecutar();
                $sql = "UPDATE lmp_Proveedor SET prov_nombre ='".$razon_social."', prov_tipo_Proveedor = '".$tipo_persona."', prov_tipo_identificacion = '".$tipo_identificacion."', prov_identificacion='".$identificacion."' 
                        ,prov_pais = '".$pais."', prov_ciudad = '".$ciudad."', prov_dir_empresa='".$direccion_trabajo."', prov_dir_domicilio='".$direccion_domicilio."', prov_tel_empresa='".$telefono_trabajo."',
                                prov_tel_domicilio='".$telefono."', prov_celular = '".$celular."', prov_mail_empresa = '".$email_trabajo."', prov_mail_personal='".$email_personal."'
                                        WHERE prov_codigo='".$prov_codigo."'";
                
                $resultado=$obj->insertarRegistro($sql);
                return $resultado;
        }
		
		public function ConsProveedor($limInicio,$maximo)
		{
			$objABD=new clsEjecutar();

   $sql="select prov_codigo,prov_nombre , (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = prov_tipo_identificacion and deta_cat_idtabla = 13),
            prov_identificacion,
            prov_pais,
            prov_ciudad,
            prov_nivel_proveedor,
            prov_cargo,
            prov_dir_empresa,
            prov_dir_domicilio,
            prov_tel_empresa,
            prov_fax_empresa,
            prov_celular,
            prov_mail_empresa,
            prov_mail_personal,
            prov_pagina_web,
            prov_zip_code,
            prov_contacto1,
            prov_cargo_contacto1,
            prov_tel_contacto1,
            prov_celular_contacto1,
            prov_mail_contacto1,
            prov_contacto2,
            prov_cargo_contacto2,
            prov_tel_contacto2,
            prov_celular_contacto2,
            prov_mail_contacto2";
			$sql= $sql." from lmp_proveedor ";
			$sql = $sql." LIMIT ".$limInicio.",".$maximo."";
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		
		 public function ConsClienteID($id)
        {
	$objABD=new clsEjecutar();
                  $sql="select 
                          prov_codigo,
                          prov_nombre ,
                          prov_tipo_Proveedor,
                          prov_tipo_identificacion,
                        prov_identificacion,
                        prov_pais,
                        prov_ciudad,
                        prov_dir_empresa,
                        prov_dir_domicilio,
                        prov_tel_empresa,
                        prov_tel_domicilio,
                        prov_celular,
                        prov_mail_empresa,
                        prov_mail_personal,            
                        prov_estado";
                        $sql= $sql." from lmp_Proveedor";
                        $sql = $sql." WHERE prov_codigo='".$id."'";
				  $registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
        

		
				//***********PARA MODIFICAR UN PROVEEDOR*****//
		public function __ModificaEstado($id){
			$foo = false;
			$objeto = new clsEjecutar();
			
			$estado ="E";
			$sql = "UPDATE lmp_proveedor SET prov_estado='".$estado."'
						          WHERE prov_codigo='".$id."'";
									  // echo($sql);
			$resultado=$objeto->insertarRegistro($sql);
            
            echo '<script > document.location="../mantenimiento/ConsultaProveedor.php" </script>';
			return $resultado;
            
            
		}
	
	}
?>