<?php
        require_once ('../libs/clsImportador.php');
        
        
        $id_importador = $_GET['id'];
        
        $objimp = new clsImportador();
        $Paises = $objimp->ConsPaises();
        
        
        $TipoCliente = $objimp->ConsTipoCliente();
        
    
        $TipoID= $objimp->ConsTipoID();
        
        
        $Importador = $objimp->ConsClienteID($id_importador);
        
        
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
                <script type="text/javascript"	language="Javascript1.1" src="../scripts/Validar.js"></script>
                
                <!Definicion de Hojas de Cascada>
                <link type="text/css" rel="stylesheet" href="../estilos/jquery-ui.css"/>
                <script type="text/javascript">
                        $(document).ready(function()
                        {
                                // Mostrar las pestañas
                                $("#session_ingreso_importador").tabs();
                         });
                </script>
               <script>
                      function interceptSubmit(rucConsultado)
                    	{
                    	   
                           var frm = document.getElementById("form_ingresa_importador");
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
                    	   
                           var RUC = trimAll(rucConsultado) ;
                    
                      	    if (RUC == "")
                      	    	{
                      	    		alert("Debe ingresar una Identificacion valida");
                      	    		return false ;
                      	    	}
                                
                           // valida el pais q sea ecuador     
                    	   var cmb_pais = document.getElementById('cmbPaises');
                            var text = cmb_pais.options[cmb_pais.selectedIndex].text;
                            
                      	     if ( text != "ECUADOR+593" ) 
                                 return true ;
                    	   
                           // valida el tipo de identificacion
                           var cmb_idIdent = document.getElementById('cmbID');
                            var tipoDocumento = cmb_idIdent.options[cmb_idIdent.selectedIndex].text.substring(0,2);
                            
                            if ( tipoDocumento != "RU" && tipoDocumento != "CE" ) 
                                return true ;
                             
                      	    var tipoDocumento=tipoDocumento.substring(0,1);
                      	    
                    		var digits = _isInteger(RUC) 
                    		
                    		if (digits == 0)
                    			{
                    				alert("Identificacion debe ser un numero");
                    				return false ;
                    			}
                    
                    	
                    		
                    		var valueofId = validaIdentificacion(tipoDocumento,rucConsultado) ;
                    
                    		if (valueofId == 1)
                    			{
                    				return true ;
                    			}
                    		else
                    			{	
                    				return false ;					
                    			}
                    	}
                        
               	function Limpiar_Modifica() {			 
                	
                	var frm = document.getElementById("form_ingresa_importador");
                	for (i=0;i<frm.elements.length;i++)
                	{
            	       if (frm.elements[i].type == "text" || frm.elements[i].type == "textarea" )
                       {
                        
                            frm.elements[i].value = "";
                            
                       }                       
                		
                	}
                  }  
                        
               function CambiaPais(){
                  var myselect = document.getElementById("cmbPaises");
                   var codigo_area =myselect.options[myselect.selectedIndex].text.split("+").reverse().shift();
                  document.getElementById("telefono_importador").value = codigo_area;
                  document.getElementById("celular_importador").value = codigo_area;
                  
                  }
                </script>
                <title>.::LIMEXPO ::.</title>
        </head>
        <body>
                <div id="ingresa_importador" class="mantenimiento">  
                        <form id="form_ingresa_importador" onsubmit="return interceptSubmit(form_ingresa_importador.identificacion.value);" action="inserta_importador.php" method="post">
                                <div id ="detalle_importador">
                                  
                                        <table  width="100%">
                                                <tr>
                                                	<td bgcolor="#3B7DA0" colspan="4">
                                                			<div id="TituloMantenimiento">
                                                				
		                                                			<span><?php echo($Importador[0][1]);?></span>		                                                			
                                  						       	
                                                			</div>
                                                			
                                                	</td>
                                                </tr>
                                                <tr>
                                                        <td width="20%">
                                                                <span class="etiqueta">Codigo:</span>
                                                       </td>
                                                        <td width="30%">
                                                                <input type="number" style="text-align:center"  class="texto" name="codigo_importador" id="codigo_importador" value="<?php echo($Importador[0][0]);?>" readonly ></input>
                                                        </td>
                                                        <td width="15%">
                                                                
                                                        </td>
                                                        <td align="right"><span class="obliga" align="right" >Los campos con (*) son de ingreso obligatorios</span>
                                							<div id="botones_mantenimiento" align="right" >
                                							  <button type="submit"  title="Guardar" tabindex="17"  > <img src="../images/1361523271_Save.png" width="28" height="28" alt="Guardar"  /></button>								
                                					          <button  type="button" title="Limpiar" tabindex="18" onclick="Limpiar_Modifica()"  > <img src="../images/1361523217_stock_new-labels.png"  width="31" height="28"/> </button>  
                                                              <button  type="button" title="Cancelar" tabindex="19" onclick="self.location.href = 'ConsultaImportador.php'" onkeypress= "self.location.href = 'ConsultaImportador.php'"  > <img src="../images/cancelar.png"  width="25" height="28"/> </button>  
                                							</div></td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                                <span class="etiqueta" >Tipo de Persona:</span>
                                                        </td>
                                                        <td>
                                                                 <span class="obliga">*</span>
                                                                 <?php 
                                                                 $totTC=count($TipoCliente);
                                                                ?>
                                                                 <select  width="70" name="cmbTipoCliente" class="texto" id="cmbTipoCliente" tabindex="1" >
                                                                  <?php
                                                                                        for($j=0;$j<$totTC;$j++)
                                                                                        {
                                                                                                $codTipoCliente=$TipoCliente[$j][1];
                                                                                                ?>
                                                                                                        <option <?php if ($codTipoCliente == $Importador[0][2] ) echo "selected"  ?> value="<?php echo($TipoCliente[$j][1]);?>" ><?php echo($TipoCliente[$j][0]);?></option>
                                                                                                <?php
                                                                                                        } //fin del for
                                                                                                ?>
                                                                         </select>
                                                        </td>
                                                        <td>
                                                                <span class="etiqueta">Pais:</span>
                                                        </td>
                                                        <td>
                                                                <span class="obliga">*</span>
                                                                <?php 
                                                                                $totDiv=count($Paises);
                                                                        ?>
                                                                        <select  name="cmbPaises" onchange="CambiaPais()" class="texto" style="width: 50%" id="cmbPaises" tabindex="2" >
                                                                        <?php
                                                                        for($j=0;$j<$totDiv;$j++){
                                                                                $codigo = $Paises[$j][0];							
                                                                                $texto1=$Paises[$j][2];
                                                                                $texto2=$Paises[$j][3];
                                                                                $texto3=$texto1.$texto2;
                                                                        ?>
                                                                        <option  <?php if ($codigo == $Importador[0][5] ) echo "selected"  ?>  value="<?php echo($codigo);?>"><?php echo($texto3);?></option>
                                                                        <?php
                                                                        } //fin del for
                                                                        ?>
                                                                        </select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                                <span class="etiqueta">Razon Social:</span>
                                                        </td>
                                                        <td>
                                                                <span class="obliga">*</span>
                                                                <input type="text" name="O_razon_social_importador" id="razon_social_importador " class="texto" value ="<?php echo($Importador[0][1]);?>"  onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 250)" tabindex="3"></input>
                                                        </td>
                                                        <td>
                                                                <span class="etiqueta">Ciudad:</span>
                                                        </td>
                                                        <td>
                                                                <span class="obliga">*</span>
                                                                <input type="text" name="O_ciudad_importador" id="ciudad_importador" class="texto" value="<?php echo($Importador[0][6]);?>" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 100)" tabindex="4"></input>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                                <span class="etiqueta">Tipo de Identificacion:</span>
                                                        </td>
                                                        <td>
                                                                <span class="obliga">*</span>
                                                                <?php 
				$totID=count($TipoID);
                                                                ?>
                                                                <select  style="width:70" name="cmbID" class="texto" id="cmbID" tabindex="5">
                                                                  <?php
                                                                                for($j=0;$j<$totID;$j++)
                                                                                {
                                                                                      $codigoID = $TipoID[$j][1];
                                                                                 ?>
                                                                                 <option <?php if ($codigoID == $Importador[0][3] ) echo "selected"  ?> value="<?php echo($TipoID[$j][1]);?>"><?php echo($TipoID[$j][0]);?></option>
                                                                                <?php
                                                                                                } //fin del for
                                                                                ?>
                                                                </select>
                                                                
                                                        </td>
                                                        <td>
                                                                <span class="etiqueta">Identificacion:</span>
                                                        </td>
                                                        <td>
                                                                <span class="obliga">*</span>
                                                                <input type="text" name="identificacion" id="identificacion" class="texto" value="<?php echo($Importador[0][4]);?>" onFocus="entroEnFoco(this)" onBlur="ValidaIdentificacion2(this, 17)" tabindex="6"></input>
                                                        </td>
                                                </tr>
                                        </table >        
                                </div>
                                <div id ="session_ingreso_importador">
                                        <ul>
                                                <li tabindex="7" ><a href="#datos_domicilio" tabindex="7" >Datos de Domicilo</a></li>
                                                <li tabindex="12"><a href="#datos_trabajo" tabindex="12">Datos del Trabajo</a></li>
                                        </ul>
                                        <div id ="datos_domicilio" tabindex="7">
                                                <table width="100%">
                                                        <tr>
                                                                <td>
                                                                        <span class="etiqueta">Email Personal:</span>
                                                                </td>
                                                                <td>
                                                                        <span class="obliga">*</span>
                                                                        <input type="text" name="O_email_importador" id="email_importador" class="texto" value="<?php echo($Importador[0][13]);?>"  onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 250); revisarCorreo(this)" tabindex="8"></input>
                                                                </td>
                                                                <td width="50%">
                                                                        <label class="etiqueta">Direccion:</label><span class="obliga">*</span>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <span class="etiqueta">Telefono:</span>
                                                                </td>
                                                                <td>
                                                                        <span class="obliga">*</span>
                                                                        <input type="text" name="O_telefono_importador" class="texto" id="telefono_importador"value="<?php echo($Importador[0][10]);?>" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 25)" tabindex="9" ></input>
                                                                </td>
                                                                <td width="50%" valign="top" rowspan="2">
                                                                        
                                                                        <textarea class="texto" style="width:100%" name="O_direccion_domicilio_importador" id="direccion_domicilio_importador" class="textarea"  onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 255)" tabindex="11" ><?php echo($Importador[0][8]);?></textarea>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <span class="etiqueta">Celular:</span>
                                                                </td>
                                                                <td>
                                                                        <span class="obliga">*</span>
                                                                        <input type="text" name="O_celular_importador" id="celular_importador" class="texto" value="<?php echo($Importador[0][11]);?>" onFocus="entroEnFoco(this)" onBlur="revisarObligatorio(this); revisarLongitud2(this, 25)" tabindex="10"></input>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <div id ="datos_trabajo">
                                                <table width="100%">
                                                        
                                                        <tr>
                                                                <td>
                                                                                        <span class="etiqueta">Email</span>
                                                                </td>
                                                                <td>
                                                                          <span class="obliga">*</span>
                                                                          <input type="text" name="email_trabajo_importador" class="texto" id="email_importador" value="<?php echo($Importador[0][12]);?>"  onFocus="entroEnFoco(this)" onBlur="revisarLongitud2(this, 250); revisarCorreo(this)" tabindex="14"></input>
                                                                </td>
                                                                <td width="50%">
                                                                        <span align="top" class="etiqueta">Direccion: </span><span class="obliga">*</span>
                                                                        
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <span class="etiqueta">Telefono:</span>
                                                                        
                                                                </td>
                                                                <td>
                                                                        <span class="obliga">*</span>
                                                                        <input type="text" name="telefono_trabajo_importador" class="texto" id="telefono_trabajo_importador"value="<?php echo($Importador[0][9]);?>"  onFocus="entroEnFoco(this)" onBlur="revisarLongitud2(this, 25)" tabindex="15" ></input>
                                                                </td>
                                                                <td>
                                                                        
                                                                        <input  type="text" class="texto" name="direccion_trabajo_importador" id="direccion_trabajo_importador"value="<?php echo($Importador[0][7]);?>"  onFocus="entroEnFoco(this)" onBlur="revisarLongitud2(this, 255)"  tabindex="16"></input>
                                                                </td>
                                                        </tr>
                                                        
                                                </table>
                                                
                                        </div>
                                </div>
                        </form>
                </div>
        </body>
</html>
