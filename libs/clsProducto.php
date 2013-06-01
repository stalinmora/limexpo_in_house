<?php
	include_once("clsEjecutar.php");//../src/SCPAbd/
	class clsProducto
	{
		public $id;
		public function __construct()
		{
			
		}
		
		public function ConsPaises()
		{
			$objABD=new clsEjecutar();
		    $sql="select pa_codigo, pa_codigo_alf,pa_nombre,pa_codigo_area_p,pa_codigo_area";
			$sql= $sql." from lmp_pais WHERE pa_codigo_area <> 'NA' ";
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		
		public function ConsTipoCliente()
		{
			$objABD=new clsEjecutar();
		    $sql="select det_cat_descripcion, det_cat_valor from lmp_det_catalogo where det_cat_id = 2";		
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		
			public function ConsTipoID()
		{
			$objABD=new clsEjecutar();
		    $sql="select deta_cat_descripcion, deta_cat_valor from lmp_det_catalogo where det_cat_id = 11";		
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		
		public function ConsProducto($limInicio,$maximo)
		{
			$objABD=new clsEjecutar();
		    //$sql="select prov_codigo,prov_nombre,
//			     (select det_cat_descripcion from lmp_det_catalogo where det_cat_valor = a.cli_tipo_cliente),
//				 (select det_cat_descripcion from lmp_det_catalogo where det_cat_valor  = a.cli_tipo_identificacion),		     
//				 cli_identificacion,
//				 (select pa_nombre from lmp_pais where pa_codigo_alf = a.cli_pais),cli_ciudad, cli_dir_empresa";

   $sql="select prod_codigo,
            prod_tipo_mercancia,
            prod_descripcion,
            prod_tipo_tejido,
            prod_codigo_arancel,
            prod_subpartida_arancel,
            prod_codigo_proveedor,
            prod_alias,
            prod_mascara,
            prod_cantidad_stock,
            prod_marca,
            prod_modelo,
            prod_anio_fabric,
            prod_observacion,
            prod_composicion,
            prod_color,
            prod_pais_origen,
            prod_peso_bruto,
            prod_peso_neto,
            prod_descripcion_veh,
            prod_chasis_veh,
            prod_motor_veh,
            prod_carroceria_veh,
            prod_color_veh,
            prod_combustible_veh,
            prod_cilindraje_veh,
            prod_capac_max_veh,
            prod_tipo_trasm_veh,
            prod_traccion_veh,
            prod_tonelaje_veh,
            prod_precio,
            prod_precio_anterior,
            prod_mercancia,
            prod_estado";
			$sql= $sql." from lmp_producto ";
			$sql = $sql." LIMIT ".$limInicio.",".$maximo."";
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		
		public function ConsProductoTodos()
		{
			$objABD=new clsEjecutar();
		    $sql="select prod_codigo,
            prod_tipo_mercancia,
            prod_descripcion,
            prod_tipo_tejido,
            prod_codigo_arancel,
            prod_subpartida_arancel,
            prod_codigo_proveedor,
            prod_alias,
            prod_mascara,
            prod_cantidad_stock,
            prod_marca,
            prod_modelo,
            prod_anio_fabric,
            prod_observacion,
            prod_composicion,
            prod_color,
            prod_pais_origen,
            prod_peso_bruto,
            prod_peso_neto,
            prod_descripcion_veh,
            prod_chasis_veh,
            prod_motor_veh,
            prod_carroceria_veh,
            prod_color_veh,
            prod_combustible_veh,
            prod_cilindraje_veh,
            prod_capac_max_veh,
            prod_tipo_trasm_veh,
            prod_traccion_veh,
            prod_tonelaje_veh,
            prod_precio,
            prod_precio_anterior,
            prod_mercancia,
            prod_estado";
            $sql= $sql." from lmp_Producto  ";			
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		//Consultar Un cliente
		public function ConsClienteID($id)
		{
			$objABD=new clsEjecutar();
		    $sql="SELECT  cli_codigo,cli_nombre,
			      (select det_cat_descripcion from lmp_det_catalogo where det_cat_valor = a.cli_tipo_cliente),
				  (select det_cat_descripcion from lmp_det_catalogo where det_cat_valor  = a.cli_tipo_identificacion),		  				                  cli_identificacion,
				  (select pa_nombre from lmp_pais where pa_codigo_alf = a.cli_pais),cli_ciudad, cli_dir_empresa,cli_dir_domicilio
				  FROM  lmp_cliente a
				  WHERE cli_codigo='".$id."'";
				  $registros=$objABD->consultaVariosRegistros($sql);
			return $registros;		
		}
		
		//**********CONSULTA SI EXISTE CLIENTE****//
		public function __ConsDatosCliente($cedula){
		    $objABD=new clsEjecutar();
			$sql="SELECT 1
				  FROM  lmp_cliente
				  WHERE cli_identificacion='".$cedula."'";
			$registros=$objABD->consultaVariosRegistros($sql);
			return $registros;
		}
		//
		public function __RegistraCliente($razon_social,$TCliente,$ID,$identificacion,$Pais,$ciudad,$direccion_tra,$direccion,$telefono_tra,$telefono,$celular,$email_tra,$email_per,$estado)
		{
			$foo = false;
			$objeto = new clsEjecutar();	
			echo ($razon_social);			
			$sql = "INSERT INTO lmp_cliente(cli_nombre,cli_tipo_cliente,cli_tipo_identificacion,cli_identificacion,cli_pais,cli_ciudad,cli_dir_empresa,cli_dir_domicilio,cli_tel_empresa,cli_tel_domicilio,cli_tel_celular,cli_mail_empresa,cli_mail_personal,cli_estado) 
		values('".$razon_social."','".$TCliente."','".$ID."','".$identificacion."','".$Pais."','".$ciudad."','".$direccion_tra."','".$direccion."','".$telefono_tra."','".$telefono."','".$celular."','".$email_tra."','".$email_per."','".$estado."')";
		
			$resultado=$objeto->insertarRegistro($sql);
			return $resultado;
		   
		}  
		
				//***********PARA MODIFICAR UN Producto*****//
		public function __ModificaEstado($id){
			$foo = false;
			$objeto = new clsEjecutar();
			$pwd=md5($password);
			$estado ="I";
			$sql = "UPDATE lmp_cliente SET cli_estado='".$estado."'
						          WHERE cli_codigo='".$id."'";
									  // echo($sql);
			$resultado=$objeto->insertarRegistro($sql);
			return $resultado;
		}
	
	}
?>