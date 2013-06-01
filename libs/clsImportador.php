<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("clsEjecutar.php");

class clsImportador{
        public $id;
        
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

                public function RegistrarImportador($razon_social, $tipo_persona, $tipo_identificacion, $identificacion, $pais, $ciudad,  $direccion_domicilio, $direccion_trabajo,$email_personal,  $telefono, $celular,$email_trabajo,  $telefono_trabajo, $email_personal){
                $obj = new clsEjecutar();
                $sql = "INSERT INTO lmp_importador(impo_nombre, impo_tipo_importador, impo_tipo_identificacion, impo_identificacion, impo_pais, impo_ciudad, impo_dir_empresa, impo_dir_domicilio, impo_tel_empresa, impo_tel_domicilio, impo_celular, impo_mail_empresa, impo_mail_personal,impo_estado)
                        values('".$razon_social."','".$tipo_persona."','".$tipo_identificacion."','".$identificacion."','".$pais."','".$ciudad."','".$direccion_trabajo."','".$direccion_domicilio."','".$telefono_trabajo."','".$telefono."','".$celular."','".$email_trabajo."','".$email_personal."','A')";
                $resultado = $obj->insertarRegistro($sql);
                return $resultado;
                
        }
        
        public function ModificarImportador($impo_codigo,$razon_social, $tipo_persona, $tipo_identificacion, $identificacion, $pais, $ciudad,  $direccion_domicilio, $direccion_trabajo,$email_personal,  $telefono, $celular,$email_trabajo,  $telefono_trabajo, $email_personal){
                $obj = new clsEjecutar();
                $sql = "UPDATE lmp_importador SET impo_nombre ='".$razon_social."', impo_tipo_importador = '".$tipo_persona."', impo_tipo_identificacion = '".$tipo_identificacion."', impo_identificacion='".$identificacion."' 
                        ,impo_pais = '".$pais."', impo_ciudad = '".$ciudad."', impo_dir_empresa='".$direccion_trabajo."', impo_dir_domicilio='".$direccion_domicilio."', impo_tel_empresa='".$telefono_trabajo."',
                                impo_tel_domicilio='".$telefono."', impo_celular = '".$celular."', impo_mail_empresa = '".$email_trabajo."', impo_mail_personal='".$email_personal."'
                                        WHERE impo_codigo='".$impo_codigo."'";
                
                $resultado=$obj->insertarRegistro($sql);
                return $resultado;
        }


        public function ConsImportador($limInicio,$maximo)
        {
        $objABD=new clsEjecutar();


        $sql="select impo_codigo,impo_nombre , (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = impo_tipo_importador and deta_cat_idtabla = 10),
        (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = impo_tipo_identificacion and deta_cat_idtabla = 11),
        impo_identificacion,
        pais_nombre,
        impo_ciudad,
        impo_dir_empresa,
        impo_dir_domicilio,
        impo_tel_empresa,
        impo_tel_domicilio,
        impo_celular,
        impo_mail_empresa,
        impo_mail_personal,
        (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = impo_estado and deta_cat_idtabla = 1) ";
        $sql= $sql." from lmp_Importador i inner join lmp_pais p on impo_pais =pais_codigo ";
        $sql = $sql." LIMIT ".$limInicio.",".$maximo."";
        $registros=$objABD->consultaVariosRegistros($sql);
        return $registros;		
        }       
        public function ConsClienteID($id)
        {
	$objABD=new clsEjecutar();
                  $sql="select 
                          impo_codigo,
                          impo_nombre ,
                          impo_tipo_importador,
                          impo_tipo_identificacion,
                        impo_identificacion,
                        impo_pais,
                        impo_ciudad,
                        impo_dir_empresa,
                        impo_dir_domicilio,
                        impo_tel_empresa,
                        impo_tel_domicilio,
                        impo_celular,
                        impo_mail_empresa,
                        impo_mail_personal,            
                        impo_estado";
                        $sql= $sql." from lmp_Importador";
                        $sql = $sql." WHERE impo_codigo='".$id."'";
				  $registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
        
        	public function __ModificaEstado($id){
			$foo = false;
			$objeto = new clsEjecutar();
			
			$estado ="E";
			$sql = "UPDATE lmp_Importador SET impo_estado='".$estado."'
						          WHERE impo_codigo='".$id."'";
									  
			$resultado=$objeto->insertarRegistro($sql);
            
            
			return $resultado;
            
            
		}
		
		public function consultaImportadorReporte()
		{
			$obj = new clsEjecutar();
			 $sql="select impo_codigo,impo_nombre , (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = impo_tipo_importador and deta_cat_idtabla = 10),
        (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = impo_tipo_identificacion and deta_cat_idtabla = 11),
        impo_identificacion,
        pais_nombre,
        impo_ciudad,
        impo_dir_empresa,
        impo_dir_domicilio,
        impo_tel_empresa,
        impo_tel_domicilio,
        impo_celular,
        impo_mail_empresa,
        impo_mail_personal,
        (select deta_cat_descripcion from lmp_det_catalogo where deta_cat_valor = impo_estado and deta_cat_idtabla = 1) ";
        $sql= $sql." from lmp_Importador i inner join lmp_pais p on impo_pais =pais_codigo ";
		
		$registros = $obj->consultaVariosRegistros($sql);
		return $registros;
		}
		
		public function estadosImportador(){
			$obj = new clsEjecutar();
			$sql = "Select 
						'T' as deta_cat_valor,
						'TODOS' as deta_cat_descripcion
					UNION
					select 
						deta_cat_valor, 
						deta_cat_descripcion 
					from lmp_det_catalogo 
					where  deta_cat_idtabla = 1
					and deta_cat_valor IN ('A','I');";
			$registro = $obj->consultaVariosRegistros($sql);
			return $registro;
		}
	}
?>
