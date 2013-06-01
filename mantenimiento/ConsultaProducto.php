<?php 
	include_once('../libs/clsProducto.php');	
	$objProducto=new clsProducto();	
	//define(TAMANIO_PAGINA,20); //defino una constante para indicar cuantos Comentarios voy a mostrar	  
    $TAMANIO_PAGINA = 20;
	if(empty($pagina))   //SI ES LA PRIMERA VEZ Q SE CARGA LA PAGINA
	  {
		$inicio = 0;
		$pagina = 1;	
	  }
	else
	 {
		$inicio = ($pagina - 1) * $TAMANIO_PAGINA;
     }

	$ProductoXPagineo=$objProducto->ConsProducto($inicio,$TAMANIO_PAGINA);
	$totProductoXpagineo=count($ProductoXPagineo);
//	$TodosLosProducto=$objProducto->ConsProductoTodos();
//	$totTodosLosProducto=count($TodosLosProducto);	
//	$total_paginas = ceil($totTodosLosProducto/$TAMANIO_PAGINA);
	 
?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>.::LIMEXPO ::.</title>
       
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/picnet.table.filter.min.js"></script>	


<script type="text/javascript">
        $(document).ready(function() {

		   <?php 
		   $maximoReg="";//maximo hasta donde debe avanzar el For pintando filas
			if($totProductoXpagineo==$TAMANIO_PAGINA)
			$maximoReg=$TAMANIO_PAGINA;
		    if($totProductoXpagineo<$TAMANIO_PAGINA)
		    $maximoReg=$totProductoXpagineo;
		   //$maximoReg=$totTodosLosProducto;
		 
           			 
				 ?> 
            

            // Initialise Plugin
            var options1 = {
                additionalFilterTriggers: [$('#onlyyes'), $('#onlyno'), $('#quickfind')],
                clearFiltersControls: [$('#cleanfilters')],
                matchingRow: function(state, tr, textTokens) {
                    if (!state || !state.id) { return true; }					
					var val =  tr.children('td:eq(2)').text();
					switch (state.id) {
						case 'onlyyes': return state.value !== 'true' || val === 'yes';
						case 'onlyno': return state.value !== 'true' || val === 'no';
						default: return true;
					}
                }
            };

            $('#demotable1').tableFilter(options1);
			

        });
		
function VerificaEliminar(id,tr)
{
//	document.getElementById("ACCIONES").innerHTML="";
	var query="pId="+id;
	//document.getElementById(tr).style.visibility = "visible";
	//document.getElementById(tr).innerText="";
	
	document.getElementById("ACCIONES").innerHTML="<center><img src='../images/ajax-loader-reg.gif' /><br/><b><label style= 'font-family: verdana ; font-size: 9;color: #993300'> (Verificando datos, por favor espere...) </label></b></center><br/>";

	
	//Solicitud("AdmNoticiaVerificaElimina.php","ACCIONES",query);
	 var answer = confirm("Desea eliminar este registro?")
    if (answer){
        alert(query);
		Solicitud("Inter_Elimina_Cliente.php","ACCIONES",query);
		
    }
    else
	{
        // do nothing
    }

}

</script>

<style>
* {	font-family:arial;	font-size:8pt;}
table, td, th {	border: solid 1px silver; color:#666; padding:3px 5px 3px 5px}
th { background-color:#333; color:#fff; font-size:0.85em }
a {	color:gray; }
.filtering { background-color:light-gray}
#jqtf_filters {
	list-style:none;
	
	}
#jqtf_filters li {
	display:inline-block; 
	position:relative; 
	float:left;
	margin-bottom:20px
}

</style>
</head>
<body> 
<p>
      <input type="checkbox" id="onlyyes" style="visibility:hidden"/>
      <input type="checkbox" id="onlyno" style="visibility:hidden"/>
   
	Buscar: 
	<input type="text" id="quickfind"/>
	</p>
	<p><br/>
      <a id="cleanfilters" href="#"><input  name="btn_limpiar" id="btn_limpiar" type="image" src="../images/limpiar.png" alt="LIMPIAR" title="LIMPIAR"/>
      </a>	
      
      <a  rel="shadowbox;width=758;height=378" title="" href="webpages/lmp_cliente.php" class="nolinks">
      <input  name="btn_agregar" id="btn_agregar" type="image" src="../images/agregar.png" alt="AGREGAR NUEVO REGISTRO" title="AGREGAR NUEVO REGISTRO"/>
      </a></p>
<table width="300" id='demotable1'>
<thead>
        <tr>        
          <th><input  align="middle"type="checkbox" name="cbx_eli_todos" id="cbx_eli_todos" title="Elimar Todos los Registros" /></th>          
          <th><img src="../images/modificar_registro.png" alt="2" width="10" height="10" title="Modificar" /></th>
          <th width="72" filter-type='ddl'>Tipo Mercancia</th>
          <th width="160">Descripci&oacute;n</th>
          <th width="72" filter-type='ddl'>Tipo Tejido</th>
          <th width="72" filter-type='ddl'>Arancel</th>
          <th width="72" filter-type='ddl'>Subpartida Arancelaria</th>
          <th width="160">Proveedor</th>         
          <th width="80">Alias</th>
          <th width="80">Mascara</th>
          <th width="80">Cantidad</th>
          <th width="80">Marca</th>
          <th width="80">Modelo</th>
          <th width="72" filter-type='ddl'>A&nacute;o</th>
          <th width="160">Observaci&oacute;n</th>  
          <th width="80">Composici&oacute;n</th>
          <th width="80">Color</th>
          <th width="72" filter-type='ddl'>Pa&iacute;s</th>
          
          <th width="80">Peso Bruto</th>
          <th width="80">Peso Neto</th>

        </tr>
      </thead>
      <tbody> 
      
        <?php
			for($i=0;$i<$maximoReg;$i++)
			{
            ?>
		   
              <tr  >
                <td id="jqtf_filters"><label> 
                 <input type="checkbox" align="middle" name="chx_eliminar" id="chx_eliminar" title="Elimar Registro" onClick="JavaScript:VerificaEliminar('<?=$ProductoXPagineo[$i][0]?>')" />  
               </label></td>               
               <td><a rel="shadowbox;width=758;height=378" title="" href="webpages/lmp_cliente.php?pId=<?=$ProductoXPagineo[$i][0]?>" class="nolinks"><img src="../images/modificar_registro.png" alt="2" width="10" height="10" title="Modificar" /></a></td>
                <td  align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][1]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][2]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][3]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][4]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][5]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][6]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][7]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][8]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][9]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][10]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][11]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][12]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][13]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][14]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][15]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][16]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][17]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProductoXPagineo[$i][18]?></td>    
                </tr>
              
            	 <?php }  ?> 
             
  </tbody>

</table>

</body>
</html>