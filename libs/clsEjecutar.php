<?php
	class clsEjecutar
	{
		public $usuario;
		public $clave;
		public $host;
		public $basedeDatos;
		public $conexion;
		public $enlace;
		
		//**************************** FUNCIONES VALIDAS **********************************************		
		public function __construct()
		{
			
			$this->usuario = "limexpo";
			$this->clave = "limexpo";
			$this->host = "localhost" ;
			$this->basedeDatos = "limexpo";
			$this->enlace = mysql_connect($this->host,$this->usuario,$this->clave);
			$this->conexion = mysql_select_db($this->basedeDatos, $this->enlace);		
		}

		
		public function insertarRegistro($sql)
		{
			mysql_query($sql,$this->enlace) or die ("Error : " .  mysql_error());
			mysql_close();
			//echo mysql_errno().": ".mysql_error()."<BR>";
			$filasAfectadas=mysql_affected_rows($this->enlace);
			return $filasAfectadas;
		}
		
		public function insertarVariosRegistros($sql)
		{
			mysql_query($sql,$this->enlace) or die ("Error : " .  mysql_error());
			//echo mysql_errno().": ".mysql_error()."<BR>";
			$filasAfectadas=mysql_affected_rows($this->enlace);
			return $filasAfectadas;
		}
		public function cierraConexion()
		{
			mysql_close();
		}
		

		public function consultaVariosRegistros($sql)
		{
			$registro = NULL;
			
			$resultadoSql = mysql_query($sql,$this->enlace) or die ("Error : " .  mysql_error());
			
			//$limite = mysql_num_fields($resultadoSql);
			$limite = mysql_numfields($resultadoSql);
			//echo mysql_errno().": ".mysql_error()."<BR>";
			$indice=0;
			while($valores = mysql_fetch_row($resultadoSql))
			{
				for($columna = 0;$columna < $limite; $columna++)
				{
					$registro[$indice][$columna] = $valores[$columna];
				}
				$indice++;
			}
			
			mysql_free_result($resultadoSql);
			mysql_close();
			return($registro);
		}//fin de la funcion
		

		public function consultaUnValor($sql)
		{
			$resultadoSql = mysql_query($sql,$this->enlace) or die ("Error : " .  mysql_error());
			
			//PARA LOS ERRORES ----------------
			//echo mysql_errno().": ".mysql_error()."<BR>";
			 //--------------------------------------------------
			
			if($registro = mysql_fetch_row($resultadoSql))
				$retorno = $registro[0];
			else
				$retorno="0";
			return($retorno);
			mysql_free_result($resultadoSql);
			mysql_close();						
		}//fin de la funcion
		

		public function existencia($sql)
		{
			//echo("Query en existencia = ".$sql);
			$retorno = false;
			$resultadoSql = mysql_query($sql,$this->enlace) or die ("Error : " .  mysql_error());
			if($registro = mysql_fetch_row($resultadoSql))
			{
				///echo("dentro del if en abd");
				$retorno = true;
			}
			
			return($retorno);
				
			mysql_free_result($resultadoSql);
			mysql_close();						
		}	
		
	public function consultarDatos($sql)
		{
			$registro = NULL;
			$limite = 0;
			$valores = NULL;
			$indice = 0;
			//echo("Query en existencia = ".$sql);
			$resultadoSql = mysql_query($sql,$this->enlace);
			
			$limite = mysql_num_fields($resultadoSql);
			
			while($valores = mysql_fetch_row($resultadoSql))
			{
				for($columna=0; $columna <= $limite; $columna++)
				{
				$registro[$indice][$columna] = $valores[$columna];
				}
				$indice++;
			}
			
			mysql_free_result($resultadoSql);
			//mysql_close();
			
			return($registro);
		}	
		
		

		public function eliminarRegistro($sql)
		{
			mysql_query($sql,$this->enlace) or die ("Error : " .  mysql_error());
			mysql_close();
			//echo mysql_errno().": ".mysql_error()."<BR>";
			$filasAfectadas=mysql_affected_rows($this->enlace);
			//echo("Filas afectadas= ".$filasAfectadas);
			return $filasAfectadas;
		}
		//**************************************************************************
	
		
	}
?>
