<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
                <link rel="stylesheet" href="../estilos/limexpo.css"/>
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
                                $("#seccion_ingreso_productos").tabs();
                         });
                </script>
                <title>.::LIMEXPO ::.</title>
        </head>
        <body>
                <div id="ingreso_productos">
                        <form id ="form_detalle_ingreso_productos">
                        <header id ="cabecera_ingreso_productos"><!CABECERA>
                                <div id="botones_ingreso_productos" align="right">
                                        <input name="btn_guardar_ingreso_productos" id="btn_guardar_ingreso_productos" type="BUTTON" alt="Guardar" title="Guardar" width="32" height="32"  value="Guardar"/>
                                        <input name="btn_limpiar_ingreso_productos" id="btn_limpiar_ingreso_productos" type="BUTTON" alt="Limpiar" title="Limpiar" width="32" height="32"  value="Limpiar"/>
                                        <div id="campos_cabecera_ingreso_productos">
                                                <table id ="tabla_cabecera_ingreso_productos">
                                                        <tr>
                                                                <td>
                                                                        Codigo
                                                                </td>
                                                                <td>
                                                                        <input type="text"></input>
                                                                </td>
                                                                <td>
                                                                        Descripcion
                                                                </td>
                                                                <td>
                                                                        <input type="text"></input>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        Alias
                                                                </td>
                                                                <td>
                                                                        <input type="text"></input>
                                                                </td>
                                                                <td>
                                                                        Proveedor
                                                                </td>
                                                                <td>
                                                                        <input type="text"></input>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        Mascara
                                                                </td>
                                                                <td>
                                                                        <input type="text"></input>
                                                                </td>
                                                                <td>
                                                                        Pais Origen
                                                                </td>
                                                                <td>
                                                                        <input type="text"></input>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </div>
                                </div>
                                
                        </header>
                        <section id="seccion_ingreso_productos"><!SECCION>
                                        <ul>
                                                <li><a href="#detalles_productos">Datos Generales</a></li>
                                                <li><a href="#valores_productos">Valores</a></li>
                                                <li><a href="#vehiculos_productos">Vehiculos</a></li>
                                        </ul>
                                        <div id ="detalles_productos">
                                                        <table id="tabla_detalle_ingreso_productos" >
                                                                <tr>
                                                                        <td>
                                                                                Tipo Mercancia
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Tipo de Tejido
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Sub-partida Arancelaria
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Nombre
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Marca
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Modelo
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Composicion
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Color
                                                                        </td>
                                                                        <td>
                                                                                 <input type="text"></input>
                                                                        </td>
                                                                        
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Año de Fabricacion
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Otras Caracteristicas
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        
                                                                </tr>
                                                        </table>
                                        
                                        </div>
                                        <div id="valores_productos">
                                                        <table id="tabla_valores_ingreso_productos" >
                                                                <tr>
                                                                        <td>
                                                                                Cant. Stock
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Precio Anterior
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Precio fob
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Unidad de Medida
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Peso Bruto
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Peso Neto
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                        </table>
                                </div>
                                <div id="vehiculos_productos">
                                                        <table id="tabla_vehiculos_ingreso_productos" >
                                                                <tr>
                                                                        <td>
                                                                                Descripcion Comercial
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                No. Chasis
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                No.Motor
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Tipo carroceria
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Color
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Tipo Combustible
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Cilindraje
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Capacidad Maxima
                                                                        </td>
                                                                        <td>
                                                                                 <input type="text"></input>
                                                                        </td>
                                                                        
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Tipo Transmision
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        <td>
                                                                                Tipo Traccion
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>
                                                                        
                                                                </tr>
                                                                <tr>
                                                                        <td>
                                                                                Tonelaje
                                                                        </td>
                                                                        <td>
                                                                                <input type="text"></input>
                                                                        </td>  
                                                                </tr>
                                                        </table>
                                                </form>  
                                </div>
                        </section>
                </div>
        </body>
</html>
