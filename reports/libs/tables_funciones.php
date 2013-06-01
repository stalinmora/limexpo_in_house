<?php
	
	require_once ('../libs/clsImportador.php');
	require_once ('../Classes/PHPExcel.php');
	
	class TablasReporte{
		
		public function ImportadoresGeneral(){
				
			$obj = new clsImportador();
			
			$registro = $obj->consultaImportadorReporte();
			
			echo '<table id="tabla_reporte_excel"  border="1"  class="mantenimiento_tabla_reporte">
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
					    <td colspan="2" rowspan="3"><div align="center"><img src="http://192.168.24.186/LimexpoInHouse_1/LimexpoInHouse_1/images/limexpo_logo.png" width="65" height="53" /></div></td>
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
					    <td width="100" bgcolor="#C1D5E0">E-mail</td>
					    <td bgcolor="#C1D5E0">Direccion Trab.</td>
					    <td bgcolor="#C1D5E0">Telefono Trab.</td>
					    <td bgcolor="#C1D5E0">Estado</td>
				      </tr>';
					  	
					  		$cont = count($registro);
							for ($i=0; $i < $cont; $i++) {
					
								echo '<tr>
									    <td> '.($i+1).'</td>
									    <td> '.$registro[$i][0].'</td>
									    <td> '.$registro[$i][1].'</td>
									    <td> '.$registro[$i][2].'</td>
									    <td> '.$registro[$i][3].'</td>
									    <td> '.$registro[$i][4].' </td>
									    <td> '.$registro[$i][5].' </td>
									    <td> '.$registro[$i][6].' </td>
									    <td> '.$registro[$i][8].' </td>
									    <td> '.$registro[$i][10].'</td>
									    <td> '.$registro[$i][11].' </td>
									    <td> '.$registro[$i][12].' </td>
									    <td> '.$registro[$i][7].'</td>
									    <td> '.$registro[$i][9].'</td>
									    <td> '.$registro[$i][14].'</td>
								      </tr>';
							}
					  
						  
			      echo '</table>';
		}
		public function General($value=''){
			
		}
	}
	/**
	 * 
	 */
	class Reportes{
		
		public function __construct() {
			
		}
		
		
		public function ImportadoresGeneral(){
		$templates = '../templates/ImportadoresGeneral.xlsx';
		
		$excel = PHPExcel_IOFactory::load($templates);
		
		$excel->setActiveSheetIndex(0);
		
		//$excel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Calibri');
		
		//$excel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);
		/*
		 PARAMETROS
		 */
		$excel->getActiveSheet()->setCellValue('D4','SAMBORONDON CORP');
		
		$obj = new clsImportador();
		
		$registro = $obj->consultaImportadorReporte();
		
		/*
		 DATOS DE LA CONSULTA
		 */
		
		$cont = count($registro);
		
		for ($i=0; $i < $cont; $i++) {
			$j = $i+9;	 
			$excel->getActiveSheet()->setCellValue('A'.$j,($i+1));
			$excel->getActiveSheet()->getStyle('A'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$excel->getActiveSheet()->setCellValue('B'.$j,$registro[$i][0]);
			$excel->getActiveSheet()->getStyle('B'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);	
			$excel->getActiveSheet()->setCellValue('C'.$j,$registro[$i][1]);	
			$excel->getActiveSheet()->setCellValue('D'.$j,$registro[$i][2]);	
			$excel->getActiveSheet()->setCellValue('E'.$j,$registro[$i][3]);	
			$excel->getActiveSheet()->setCellValueExplicit('F'.$j,$registro[$i][4],PHPExcel_Cell_DataType::TYPE_STRING);
			//$excel->getActiveSheet()->getStyle('F'.$j)->getnu	
			$excel->getActiveSheet()->setCellValue('G'.$j,$registro[$i][5]);
			$excel->getActiveSheet()->setCellValue('H'.$j,$registro[$i][6]);	
			$excel->getActiveSheet()->setCellValue('I'.$j,$registro[$i][8]);	
			$excel->getActiveSheet()->setCellValue('J'.$j,$registro[$i][10]);	
			$excel->getActiveSheet()->setCellValue('K'.$j,$registro[$i][11]);	
			$excel->getActiveSheet()->setCellValue('L'.$j,$registro[$i][12]);	
			$excel->getActiveSheet()->setCellValue('M'.$j,$registro[$i][7]);
			$excel->getActiveSheet()->setCellValue('N'.$j,$registro[$i][9]);	
			$excel->getActiveSheet()->setCellValue('O'.$j,$registro[$i][14]);						
		}

		
		unlink('../templates/salidaprueba.xlsx');
		
		$salidaExcel = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
		
		
		$salidaExcel->save('../templates/salidaprueba.xlsx');
		
		$excel->disconnectWorksheets(); 
		unset($excel);	
		}
	}
?>
