<?php
	require_once ('../libs/clsImportador.php');
	
	$obj = new clsImportador();
	
	$registro = $obj->consultaImportadorReporte();
	$estados = $obj->estadosImportador();
	$Paises = $obj->ConsPaises();
	$TipoCliente = $obj -> ConsTipoCliente();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<link rel="stylesheet" href="../estilos/reportes.css"/>
		<link rel="shortcut icon" href="../images/favicon.ico"/>

		<!Definicion de librerias js>
		<script type="text/javascript" src="../scripts/lib/jquery.js"></script>
		<script type="text/javascript" src="../scripts/lib/jquery-ui.js"></script>
		<!Definicion de Hojas de Cascada>
		<link type="text/css" rel="stylesheet" href="../estilos/jquery-ui.css"/>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.botonExcel').click(function(event) {
					$('#buttonExcel').val( $('<div>').append( $('#tabla_reporte_excel_general').eq(0).clone()).html());
					$('#ExportacionExcel').submit();
				});
				$("#fecha_desde").datepicker({
					showOn: "button",
					buttonImage:"../images/calendar.gif",
					buttonImageOnly: true
				});
				$("#fecha_hasta").datepicker({
					showOn: "button",
					buttonImage:"../images/calendar.gif",
					buttonImageOnly: true
				});
			});
		</script>
		<style type="text/css">
			.botonExcel{cursor:pointer;}
		</style>
	</head>
	<body>
		<div id="cabecera_reportes">
			
			<table width="100%" class="mantenimiento" border="1">
			  <tr>
			    <td colspan="7">&nbsp;</td>
		      </tr>
			  <tr>
			    <td colspan="2">Fecha Desde:</td>
			    <td width="143"><input type="text" size="15" id="fecha_desde"></td>
			    <td width="129">Fecha Hasta:</td>
			    <td width="143"><input type="text" size="15" id="fecha_hasta"></td>
			    <td width="56">Estado:</td>
			    <td width="105">
			    	<?php
			    		$countEstadosImportador = count($estados);
			    	?>
			    	<select name="cmbTipoEstado" id="cmbTipoEstado" class="cmb">
			    		<?php
			    			for ($i=0; $i < $countEstadosImportador; $i++) { 
			    		?>
			    			<option value="<?php echo($estados[$i][0]); ?>" ><?php echo($estados[$i][1]); ?></option>
			    		<?php
							}
			    		?>
			    	</select>
			    </td>
			  </tr>
			  <tr>
			    <td colspan="7">Filtros para quiebres y reportes especificos</td>
			    </tr>
			  <tr>
			    <td width="19">&nbsp;</td>
			    <td width="121">Pais Origen</td>
			    <td>
			    	<?php
			    		$countPaises = count($Paises);
			    	?>
			    	<select name="cmbPaises" id="cmbPaises" class="cmb" style="width: 80%" >
			    		<?php
			    			for ($i=0; $i < $countPaises; $i++) { 		
						?>
							<option value="<?php echo($Paises[$i][0]); ?>" ><?php echo($Paises[$i][2]); ?></option>
						<?php
							}
			    		?>
			    	</select>
			    </td>
			    <td>Ciudad:</td>
			    <td>&nbsp;</td>
			    <td colspan="2">&nbsp;</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>Importador</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td colspan="2">&nbsp;</td>
			    </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>Tipo Persona:</td>
			    <td>
			    	<?php
							$totTC = count($TipoCliente);
							?>
							<select   autofocus width="70" name="cmbTipoCliente" class="texto" id="cmbTipoCliente" tabindex="1" >
								<?php
									for($j=0;$j<$totTC;$j++)
									{
										?>
										<option value="<?php echo($TipoCliente[$j][1]); ?>" ><?php echo($TipoCliente[$j][0]); ?></option>
								<?php
									} //fin del for
								?>
							</select>
			    </td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			</table>
			<p>&nbsp;</p>
			<div id="tabla_reporte" style="display:block" >

			  <table id="tabla_reporte_excel_general"  width="921" height="161" border="1"  class="mantenimiento_tabla_reporte">
				  <tr>
				    <td colspan="15"><div align="center">Reporte General de Importadores</div></td>
			      </tr>
				  <tr>
				    <td width="33">&nbsp;</td>
				    <td width="84">&nbsp;</td>
				    <td width="139">&nbsp;</td>
				    <td width="105">&nbsp;</td>
				    <td width="57">&nbsp;</td>
				    <td width="133">&nbsp;</td>
				    <td width="80">&nbsp;</td>
				    <td width="77">&nbsp;</td>
				    <td width="132">&nbsp;</td>
				    <td width="126">&nbsp;</td>
				    <td width="105">&nbsp;</td>
				    <td width="70">&nbsp;</td>
				    <td width="196">&nbsp;</td>
				    <td width="111">&nbsp;</td>
				    <td width="58">&nbsp;</td>
			      </tr>
				  <tr>
				    <td colspan="2">Nombre Empresa:</td>
				    <td colspan="4">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td colspan="2" rowspan="3"><div align="center"><img src="../images/limexpo_logo.png" width="65" height="53" /></div></td>
			      </tr>
				  <tr>
				    <td colspan="2">Nombre Sucursal:</td>
				    <td colspan="4">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td height="17" colspan="2">Rango Fecha</td>
				    <td colspan="4">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td bgcolor="#C1D5E0">#</td>
				    <td bgcolor="#C1D5E0">Codigo</td>
				    <td bgcolor="#C1D5E0">Razon Social</td>
				    <td bgcolor="#C1D5E0">Tipo Persona</td>
				    <td bgcolor="#C1D5E0">Tipo ID</td>
				    <td bgcolor="#C1D5E0">Identificacion</td>
				    <td bgcolor="#C1D5E0">Pais</td>
				    <td bgcolor="#C1D5E0">Ciudad</td>
				    <td bgcolor="#C1D5E0">Direccion Dom.</td>
				    <td bgcolor="#C1D5E0">Telefono Dom.</td>
				    <td bgcolor="#C1D5E0">Telf. Celular</td>
				    <td bgcolor="#C1D5E0">E-mail</td>
				    <td bgcolor="#C1D5E0">Direccion Trab.</td>
				    <td bgcolor="#C1D5E0">Telefono Trab.</td>
				    <td bgcolor="#C1D5E0">Estado</td>
			      </tr>
				  	<?php
				  		$cont = count($registro);
						for ($i=0; $i < $cont; $i++) {
					?>
					 <tr>
					    <td> <?php echo $i+1 ?> </td>
					    <td> <?php echo $registro[$i][0] ?> </td>
					    <td> <?php echo $registro[$i][1] ?> </td>
					    <td> <?php echo $registro[$i][2] ?> </td>
					    <td> <?php echo $registro[$i][3] ?> </td>
					    <td> <?php echo $registro[$i][4] ?> </td>
					    <td> <?php echo $registro[$i][5] ?> </td>
					    <td> <?php echo $registro[$i][6] ?> </td>
					    <td> <?php echo $registro[$i][8] ?> </td>
					    <td> <?php echo $registro[$i][10] ?> </td>
					    <td> <?php echo $registro[$i][11] ?> </td>
					    <td> <?php echo $registro[$i][12] ?> </td>
					    <td> <?php echo $registro[$i][7] ?> </td>
					    <td> <?php echo $registro[$i][9] ?> </td>
					    <td> <?php echo $registro[$i][14] ?> </td>
				      </tr>
					<?php
						}
				  	?>
					  
		      </table>
			</div>
			
		  <p>&nbsp;</p>
            <table id="tabla_reporte_excel_importador_x_pais"  width="921" height="161" border="1"  class="mantenimiento_tabla_reporte">
				  <tr>
				    <td colspan="14"><div align="center">Reporte Importadores por Pais</div></td>
			      </tr>
				  <tr>
				    <td width="33">&nbsp;</td>
				    <td width="84">&nbsp;</td>
				    <td width="139">&nbsp;</td>
				    <td width="105">&nbsp;</td>
				    <td width="57">&nbsp;</td>
				    <td width="162">&nbsp;</td>
				    <td width="134">&nbsp;</td>
				    <td width="132">&nbsp;</td>
				    <td width="126">&nbsp;</td>
				    <td width="105">&nbsp;</td>
				    <td width="70">&nbsp;</td>
				    <td width="196">&nbsp;</td>
				    <td width="111">&nbsp;</td>
				    <td width="58">&nbsp;</td>
			      </tr>
				  <tr>
				    <td colspan="2">Nombre Empresa:</td>
				    <td colspan="4">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td colspan="2" rowspan="3"><div align="center"><img src="../images/limexpo_logo.png" width="65" height="53" /></div></td>
			      </tr>
				  <tr>
				    <td colspan="2">Nombre Sucursal:</td>
				    <td colspan="4">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td height="17" colspan="2">Rango Fecha</td>
				    <td colspan="4">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
		      </tr>
				  <tr>
				    <td>Pais</td>
				    <td colspan="2">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
		      </tr>
				  <tr>
				    <td colspan="2">Descripcion:</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr>
				    <td bgcolor="#C1D5E0">#</td>
				    <td bgcolor="#C1D5E0">Codigo</td>
				    <td bgcolor="#C1D5E0">Razon Social</td>
				    <td bgcolor="#C1D5E0">Tipo Persona</td>
				    <td bgcolor="#C1D5E0">Tipo ID</td>
				    <td bgcolor="#C1D5E0">Identificacion</td>
				    <td bgcolor="#C1D5E0">Ciudad</td>
				    <td bgcolor="#C1D5E0">Direccion Dom.</td>
				    <td bgcolor="#C1D5E0">Telefono Dom.</td>
				    <td bgcolor="#C1D5E0">Telf. Celular</td>
				    <td bgcolor="#C1D5E0">E-mail</td>
				    <td bgcolor="#C1D5E0">Direccion Trab.</td>
				    <td bgcolor="#C1D5E0">Telefono Trab.</td>
				    <td bgcolor="#C1D5E0">Estado</td>
			      </tr>
				  	<?php
				  		$cont = count($registro);
						for ($i=0; $i < $cont; $i++) {
					?>
					 <tr>
					    <td> <?php echo $i+1 ?> </td>
					    <td> <?php echo $registro[$i][0] ?> </td>
					    <td> <?php echo $registro[$i][1] ?> </td>
					    <td> <?php echo $registro[$i][2] ?> </td>
					    <td> <?php echo $registro[$i][3] ?> </td>
					    <td> <?php echo $registro[$i][4] ?>   </td>
					    <td> <?php echo $registro[$i][6] ?> </td>
					    <td> <?php echo $registro[$i][8] ?> </td>
					    <td> <?php echo $registro[$i][10] ?> </td>
					    <td> <?php echo $registro[$i][11] ?> </td>
					    <td> <?php echo $registro[$i][12] ?> </td>
					    <td> <?php echo $registro[$i][7] ?> </td>
					    <td> <?php echo $registro[$i][9] ?> </td>
					    <td> <?php echo $registro[$i][14] ?> </td>
				      </tr>
					<?php
						}
				  	?>
					  
		      </table>
              <p>&nbsp;</p>
            
			<div id="archivos_reportes">
				<table class="archivos_reporte" border="1">
			  		<tr>
			    		<form action="libs/ficheroExcel.php" method="post" target="_blank" id="ExportacionExcel" >
			    			<td width="157">Descargar en Formato</td>
			    			<td width="8" align="center" valign="middle">
			    					<img src="../images/export_to_excel.gif" width="28" height="17" class="botonExcel" />
			    					<input type="hidden" id="buttonExcel" name="buttonExcel" />	
			    			</td>
			    			<td width="17">&nbsp;</td>	
			    		</form>
			    		
		      		</tr>
			  		<tr>
			    		<td>Descargar en Formato</td>
			    		<td>&nbsp;</td>
			    		<td>&nbsp;</td>
		      		</tr>
		  		</table>
			</div>
            <p>&nbsp;</p>
			<div id="mensaje_reportes">
				<span><center>No existen Registros que mostrar</center></span>
			</div>
	</div>
	</body>
</html>		