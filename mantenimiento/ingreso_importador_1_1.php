<?php
        require_once ('../libs/clsImportador.php');
        
        //$id_producto = $_GET['pld'];
        $id_importador = '10';
        
        $objPaises = new clsImportador();
        $Paises = $objPaises->ConsPaises();
        
        $objTipoCliente = new clsImportador();
        $TipoCliente = $objTipoCliente->ConsTipoCliente();
        
        $objTipoID = new clsImportador();
        $TipoID= $objTipoID->ConsTipoID();
        //if($id_importador)
                $objimp = new clsImportador();
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
                
                <!Definicion de Hojas de Cascada>
                <link type="text/css" rel="stylesheet" href="../estilos/jquery-ui.css"/>
                <<script type="text/javascript">
                        $(document).ready(function()
                        {
                                // Mostrar las pestañas
                                $("#session_ingreso_importador").tabs();
                         });
                </script>
                <script>
                       // function pasarNumero(cod){
                                
                       //         var datoseleccionado = cod; //document.getElementById("cmbPaises").value;
                       //         var parentesis = "(";
                       //         var parentesis2 = ")";
                        //        //alert(datoseleccionado);
                         //       document.getElementById("txt_telefono").value=parentesis+datoseleccionado+parentesis2;
                          //      document.getElementById("txt_celular").value=parentesis+datoseleccionado+parentesis2;
                            //    document.getElementById("txt_trabajo").value=parentesis+datoseleccionado+parentesis2;
	
                        //}
                </script>
                <title>.::LIMEXPO ::.</title>
        </head>
        <body>
                <div id="ingresa_importador" class="mantenimiento">  
                        <form id="form_ingresa_importador" action="inserta_importador.php" method="post">
                                <div id ="detalle_importador">
                                        <h1>
                                                <?php echo($Importador[0][8]);?>
                                        </h1>
                                        <table  width="100%" border="1px" >
                                                <tr>
                                                        <td width="20%">
                                                                <span>Codigo:</span>
                                                       </td>
                                                        <td width="30%">
                                                                <input type="number" style="text-align:center"  name="codigo_importador" id="codigo_importador" value="<?php echo($Importador[0][0]);?>" readonly ></input>
                                                        </td>
                                                        <td width="15%">
                                                                
                                                        </td>
                                                        <td>
                                                                <div id="botones_mantenimiento" align="right" >
                                                                
                                                                        <input name="btn_guardar_importador" id="btn_guardar_importador" type="submit" alt="Guardar" title="Guardar" width="32" height="32"  value="Guardar"/>
                                                                        <input name="btn_limpiar_importador" id="btn_limpiar_importador" type="reset" alt="Limpiar" title="Limpiar" width="32" height="32"  value="Limpiar"/>
                                                                
                                                                </div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                                <span>Tipo de Persona:</span>
                                                        </td>
                                                        <td>
                                                                 <?php 
                                                                 $totTC=count($TipoCliente);
                                                                ?>
                                                                 <select  width="70" name="cmbTipoCliente" class="texto" id="cmbTipoCliente" tabindex="1" >
                                                                  <?php
                                                                                        for($j=0;$j<$totTC;$j++)
                                                                                        {
                                                                                                ?>
                                                                                                        <option value="<?php echo($TipoCliente[$j][1]);?>" ><?php echo($TipoCliente[$j][0]);?></option>
                                                                                                <?php
                                                                                                        } //fin del for
                                                                                                ?>
                                                                         </select>
                                                        </td>
                                                        <td>
                                                                <span>Pais:</span>
                                                        </td>
                                                        <td>
                                                                <?php 
                                                                                $totDiv=count($Paises);
                                                                        ?>
                                                                        <select  name="cmbPaises" class="texto" style="width: 50%" id="cmbPaises" tabindex="4" >
                                                                        <?php
                                                                        for($j=0;$j<$totDiv;$j++){
                                                                                $codigo = $Paises[$j][0];							
                                                                                $texto1=$Paises[$j][2];
                                                                                $texto2=$Paises[$j][3];
                                                                                $texto3=$texto1.$texto2;
                                                                        ?>
                                                                        <option onclick="JavaScript:PasarNumero('<?=$Paises[$j][4]?>')" <?php if ($codigo == $Importador[0][5] ) echo "selected"  ?>  value="<?php echo($codigo);?>"><?php echo($texto3);?></option>
                                                                        <?php
                                                                        } //fin del for
                                                                        ?>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                                <span>Razon Social:</span>
                                                        </td>
                                                        <td>
                                                                <input type="text" name="razon_social_importador" id="razon_social_importador " value ="<?php echo($Importador[0][1]);?>"></input>
                                                        </td>
                                                        <td>
                                                                <span>Ciudad:</span>
                                                        </td>
                                                        <td>
                                                                <input type="text" name="ciudad_importador" id="ciudad_importador"value="<?php echo($Importador[0][6]);?>" ></input>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                                <span>Tipo de Identificacion:</span>
                                                        </td>
                                                        <td>
                                                                <?php 
				$totID=count($TipoID);
                                                                ?>
                                                                <select  style="width:70" name="cmbID" class="texto" id="cmbID" tabindex="3">
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
                                                                <span>Identificacion:</span>
                                                        </td>
                                                        <td>
                                                                <input type="text" name="identificacion" id="identificacion" value="<?php echo($Importador[0][4]);?>"></input>
                                                        </td>
                                                </tr>
                                        </table >        
                                </div>
                                <div id ="session_ingreso_importador">
                                        <ul>
                                                <li><a href="#datos_domicilio">Datos de Domicilo</a></li>
                                                <li><a href="#datos_trabajo">Datos del Trabajo</a></li>
                                        </ul>
                                        <div id ="datos_domicilio">
                                                <table width="100%"border="1px">
                                                        <tr>
                                                                <td>
                                                                        <span>Email Personal:</span>
                                                                </td>
                                                                <td>
                                                                        <input type="text" name="email_importador" id="email_importador" value="<?php echo($Importador[0][13]);?>" ></input>
                                                                </td>
                                                                <td width="50%">
                                                                        <label>Direccion:</label>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <span>Telefono:</span>
                                                                </td>
                                                                <td>
                                                                        <input type="text" name="telefono_importador" id="telefono_importador"value="<?php echo($Importador[0][10]);?>"></input>
                                                                </td>
                                                                <td width="50%" valign="top" rowspan="2">
                                                                        <textarea  style="width:100%" name="direccion_domicilio_importador" id="direccion_domicilio_importador" class="textarea"><?php echo($Importador[0][8]);?></textarea>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <span>Celular:</span>
                                                                </td>
                                                                <td>
                                                                        <input type="text" name="celular_importador" id="celular_importador" value="<?php echo($Importador[0][11]);?>"></input>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <div id ="datos_trabajo">
                                                <table width="100%" border ="1px">
                                                        
                                                        <tr>
                                                                <td>
                                                                                        <span>Email</span>
                                                                </td>
                                                                <td>
                                                                          <input type="text" name="email_trabajo_importador" id="email_importador" value="<?php echo($Importador[0][12]);?>"></input>
                                                                </td>
                                                                <td width="50%">
                                                                        <span align="top">Direccion</span>
                                                                        
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <span>Telefono:</span>
                                                                        
                                                                </td>
                                                                <td>
                                                                        <input type="text" name="telefono_trabajo_importador" id="telefono_trabajo_importador"value="<?php echo($Importador[0][9]);?>" ></input>
                                                                </td>
                                                                <td>
                                                                        <input  type="text"class="cajatexto" name="direccion_trabajo_importador" id="direccion_trabajo_importador"value="<?php echo($Importador[0][7]);?>"></input>
                                                                </td>
                                                        </tr>
                                                        
                                                </table>
                                                <t
                                        </div>
                                </div>
                        </form>
                </div>
        </body>
</html>
