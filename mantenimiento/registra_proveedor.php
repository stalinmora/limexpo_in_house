<?php
require_once ('../libs/clsProveedor.php');



$objimp = new clsProveedor();
$Paises = $objimp -> ConsPaises();

$TipoCliente = $objimp -> ConsTipoCliente();

$TipoID = $objimp -> ConsTipoID();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<link rel="stylesheet" href="../estilos/mantenimiento.css"/>
		<link rel="shortcut icon" href="../images/favicon.ico"/>

		<!Definicion de librerias js>
		<script type="text/javascript" src="../scripts/lib/jquery.js"></script>
		<script type="text/javascript" src="../scripts/lib/jquery-ui.js"></script>
        <script type="text/javascript"	language="Javascript1.1" src="../scripts/validar.js"></script>
		<!Definicion de Hojas de Cascada>
		<link type="text/css" rel="stylesheet" href="../estilos/jquery-ui.css"/>
		<script type="text/javascript">
			$(document).ready(function() {
				// Mostrar las pestañas
				$("#session_ingreso_Proveedor").tabs();
				
			});
		</script>
		<script type="text/javascript"	language="Javascript1.1">
        
     
			function interceptSubmit(rucConsultado) {			 
                	
                	var frm = document.getElementById("form_ingresa_Proveedor");
                	for (i=0;i<frm.elements.length;i++)
                	{
            	       if (frm.elements[i].name.substring(0, 2) == "O_" )
                       {
                            if ( frm.elements[i].value.length ==0 )
                            {
                               alert("Existen Campos Obligatorios vacios "  ); 
                               
                               return false;
                            } 
                       }
                       
                		
                	}
                    
                    var cmb_pais = document.getElementById('cmbPaises');
                    
                    if(cmb_pais.selectedIndex==0)
                    {
                        alert("Pa"+'\u00ed'+"s no ha sido seleccionado "  ); 
                               
                               return false;
                    }
                	
     

				var RUC = trimAll(rucConsultado);

				if (RUC == "") {
					alert("Debe ingresar una Identificacion valida");
					return false;
				}

				// valida el pais q sea ecuador
				
				var text = cmb_pais.options[cmb_pais.selectedIndex].text;

				if (text != "ECUADOR+593")
					return true;

				// valida el tipo de identificacion
				var cmb_idIdent = document.getElementById('cmbID');
				var tipoDocumento = cmb_idIdent.options[cmb_idIdent.selectedIndex].text.substring(0, 2);

				if (tipoDocumento != "RU" && tipoDocumento != "CE")
					return true;

				var tipoDocumento = tipoDocumento.substring(0, 1);

				var digits = _isInteger(RUC)

				if (digits == 0) {
					alert("Identificacion debe ser un numero");
					return false;
				}

				var valueofId = validaIdentificacion(tipoDocumento, rucConsultado);

				if (valueofId == 1) {
					return true;
				} else {
					return false;
				}
			}
                        
           function CambiaPais(){
                  var myselect = document.getElementById("cmbPaises");
                  var codigo_area =myselect.options[myselect.selectedIndex].text.split("+").reverse().shift();
                  document.getElementById("telefono_Proveedor").value = codigo_area;
                  document.getElementById("celular_Proveedor").value = codigo_area;
                }
          
            
		</script>
		<title>.::LIMEXPO ::.</title>
	</head>
	<body>
		<div id="ingresa_Proveedor" class="mantenimiento">
			<form id="form_ingresa_Proveedor" onsubmit="return interceptSubmit(form_ingresa_Proveedor.identificacion.value);" action="inserta_Proveedor.php" method="post">
				<div id ="detalle_Proveedor">
					
					<table  width="100%">
                      
                       <tr >
                            
                        	<td bgcolor="#3B7DA0" colspan="4" ><img bgcolor="#3B7DA0"  src="../images/cliente.png" width="35" height="35" />  <span style="font-size: 16; font-weight: bold; color: #999;">&nbsp;                     <span id="TituloMantenimiento" >Registro Proveedor</span></span></td>
                      </tr>
                      <tr >
							<td widith="20%"><span class="etiqueta">Codigo:</span></td>
							<td width="30%">
							 <input type="number" style="text-align:center" class="texto" name="codigo_Proveedor" id="codigo_Proveedor" value="" readonly >
							</input></td>
							<td width="12%" ></td>
							<td align="right"><span class="obliga" align="right" >Los campos con (*) son de ingreso obligatorios</span>
							<div id="botones_mantenimiento" align="right" >
							  <button type="submit"  title="Guardar" tabindex="17"  > <img src="../images/1361523271_Save.png" width="28" height="28" alt="Guardar"  /></button>								
					          <button  type="button" title="Limpiar" tabindex="18" onclick="this.form.reset()"  > <img src="../images/1361523217_stock_new-labels.png"  width="31" height="28"/> </button>  
                              <button  type="button" title="Cancelar" tabindex="19" onclick="self.location.href = 'ConsultaProveedor.php'" onkeypress= "self.location.href = 'ConsultaProveedor.php'"  > <img src="../images/cancelar.png"  width="25" height="28"/> </button>  
							</div></td>
						</tr>
						<tr >
							<td><span class="etiqueta">Razon Social:</span></td>
							<td colspan="3">
							<span class="obliga">*</span>
							<input autofocus type="text" width="250" style="width:73.6%"  name="O_razon_social_Proveedor" class="texto" id="razon_social_Proveedor "  onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 250)" tabindex="1" value ="">
							</input></td>
                            
							
						</tr>
						<tr>
                            <td><span class="etiqueta">Pais:</span></td>
							<td> 
							    <span class="obliga">*</span>

							<select  name="cmbPaises" class="texto" onchange="CambiaPais()" style="width: 50%" id="cmbPaises" tabindex="2" >
                                <option  value="" selected disabled="disabled">Seleccionar</option>
								<?php
                                $totDiv = count($Paises);
								for($j=0;$j<$totDiv;$j++){
								$codigo = $Paises[$j][0];
								$texto1=$Paises[$j][2];
								$texto2=$Paises[$j][3];
								$texto3=$texto1.$texto2;
								?>
								<option  value="<?php echo($codigo); ?>"><?php echo($texto3); ?></option>
								<?php
								} //fin del for
								?>
                            </select >   
							</td>
							
							<td><span class="etiqueta">Ciudad:</span></td>
							<td>
							<span class="obliga">*</span>
							<input type="text" name="O_ciudad_Proveedor" class="texto" id="ciudad_Proveedor" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 100)" tabindex="3" value="" >
							</input></td>
						</tr>
						<tr>
							<td><span class="etiqueta">Tipo de Identificacion:</span></td>
							<td> 
							    <span class="obliga">*</span>
							    <?php
							$totID = count($TipoID);
							?>
							<select  style="width:70" name="cmbID" class="texto" id="cmbID" tabindex="4">
								<?php
								for($j=0;$j<$totID;$j++)
								{
								$codigoID = $TipoID[$j][1];
								?>
								<option  value="<?php echo($TipoID[$j][1]); ?>"><?php echo($TipoID[$j][0]); ?></option>
								<?php
								} //fin del for
								?>
							</select></td>
							<td><span class="etiqueta">Identificacion:</span></td>
							<td>
							<span class="obliga">*</span>
							<input type="text" name="identificacion" class="texto" id="identificacion" onFocus="entroEnFoco(this)" onBlur="ValidaIdentificacion2(this, 17)" tabindex="5" value="" />
							</td>
						</tr>
                        
                        <tr >
							<td><span class="etiqueta">C&oacute;digo Zip:</span></td>
							<td >
							<span class="obliga">*</span>
							<input type="text"   name="Zip_Code" class="texto" id="Zip_Code "  onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 250)" tabindex="6" value ="">
							</input></td>
                            
							
						</tr>
					</table >
				</div>
				<div id ="session_ingreso_Proveedor">
					<ul>
						<li  tabindex="7" >
							<a href="#datos_domicilio"  tabindex="7" >Datos de Domicilo</a>
						</li>
						<li>
							<a href="#datos_trabajo" tabindex="12" >Datos del Trabajo</a>
						</li>
					</ul>
					<div id ="datos_domicilio"  tabindex="7">
						<table width="100%">
							<tr>
								<td><span class="etiqueta">Email Personal:</span></td>
								<td>
								<span class="obliga">*</span>
								<input type="text" name="O_email_Proveedor" class="texto" id="email_Proveedor" value="" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 250); revisarCorreo(this)" tabindex="8" >
								</input></td>
								
								<td width="50%"><label class="etiqueta">Direccion:</label><span class="obliga">*</span></td>
							</tr>
							<tr>
								<td><span class="etiqueta">Telefono:</span></td>
								<td>
								<span class="obliga">*</span>
								<input type="text" name="O_telefono_Proveedor" class="texto" id="telefono_Proveedor" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 25)" tabindex="9" value="">
								</input></td>
								<td width="50%" valign="top" rowspan="2">								
								    <textarea style="width:100%"    name="O_direccion_domicilio_Proveedor" id="direccion_domicilio_Proveedor" class="textarea" class="texto" rows="2" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 255)" tabindex="11" > </textarea>
								    </td>
							</tr>
							<tr>
								<td><span class="etiqueta">Celular:</span></td>
								<td>
								<span class="obliga">*</span>
								<input type="text" name="O_celular_Proveedor" class="texto" id="celular_Proveedor" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 25)" tabindex="10" value="">
								</input></td>
							</tr>
						</table>
					</div>
					<div id ="datos_trabajo">
						<table width="100%">

							<tr>
								<td><span class="etiqueta">Email</span></td>
								<td>
								
								<input type="text" name="email_trabajo_Proveedor" class="texto" id="email_Proveedor" onFocus="entroEnFoco(this)" onBlur="revisarLongitud2(this, 250); revisarCorreo(this)" tabindex="14" value="">
								</input></td>
								<td width="50%"><span class="etiqueta" align="top">Direccion:</span></td>
							</tr>
							<tr>
								<td><span class="etiqueta">Telefono:</span></td>
								<td>
								
								<input type="text" name="telefono_trabajo_Proveedor" class="texto" id="telefono_trabajo_Proveedor" onFocus="entroEnFoco(this)" onBlur="revisarLongitud2(this, 25)" tabindex="15" value="" >
								</input></td>
								<td>
								<input  type="text"class="cajatexto" name="direccion_trabajo_Proveedor" id="direccion_trabajo_Proveedor" onFocus="entroEnFoco(this)" onBlur="revisarLongitud2(this, 255)"  tabindex="16" value="">
								</input></td>
							</tr>

						</table>
						
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
