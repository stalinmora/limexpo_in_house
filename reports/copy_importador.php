<?php
	require_once ('../libs/clsImportador.php');
	require_once ('libs/tables_funciones.php');
	
	$obj = new clsImportador();
	
	$registro = $obj->consultaImportadorReporte();
	$estados = $obj->estadosImportador();
	$Paises = $obj->ConsPaises();
	$TipoCliente = $obj -> ConsTipoCliente();
	
	$Reporte = new Reportes();
	
	


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
					$('#buttonExcel').val( $('<div>').append( $('#tabla_reporte_excel').eq(0).clone()).html());
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
	</body>
</html>		