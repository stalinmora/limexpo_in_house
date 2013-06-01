<?php 
	include_once('../libs/clsEmpresa.php');	
	$objEmpresa=new clsEmpresa();	
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

	$EmpresaXPagineo=$objEmpresa->ConsEmpresa($inicio,$TAMANIO_PAGINA);
	$totEmpresaXpagineo=count($EmpresaXPagineo);
//	$TodosLosEmpresa=$objEmpresa->ConsEmpresaTodos();
//	$totTodosLosEmpresa=count($TodosLosEmpresa);	
//	$total_paginas = ceil($totTodosLosEmpresa/$TAMANIO_PAGINA);
	 
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
			if($totEmpresaXpagineo==$TAMANIO_PAGINA)
			$maximoReg=$TAMANIO_PAGINA;
		    if($totEmpresaXpagineo<$TAMANIO_PAGINA)
		    $maximoReg=$totEmpresaXpagineo;
		   //$maximoReg=$totTodosLosEmpresa;
		 
           			 
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
		


function Elimina(des)
{
	if(confirm("Va a eliminar este registro=  "+des+" ¿Desea continuar?"))
	{
		document.location="../libs/IntElimEmpresa.php?id="+des;
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
<p><b></b><br/>
      <input type="checkbox" id="onlyyes" style="visibility:hidden"/>
      <input type="checkbox" id="onlyno" style="visibility:hidden"/>
	  <br/>
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
          <th width="160">Nombre</th>

          <th width="80">Direcci&oacute;n</th>
          <th width="80">Telfelefono</th>
          <th width="80"> Tipo Identificaci&oacute;n</th>
          <th width="80">Identificaci&oacute;n</th>


        </tr>
      </thead>
      <tbody> <form    action="javascript:;"  method="post" name="form1">
      
        <?php
			for($i=0;$i<$maximoReg;$i++)
			{
            ?>
		   
              <tr  >
                <td><a  href="#"  onClick="Elimina('<?=$EmpresaXPagineo[$i][0]?>');"><img src="../images/ed_delete.gif" title="Click para eliminar este servicio" width="12" height="12" border="0"/></a>           </td>               
               <td><a rel="shadowbox;width=758;height=378" title="" href="webpages/lmp_cliente.php?pId=<?=$EmpresaXPagineo[$i][0]?>" class="nolinks"><img src="../images/modificar_registro.png" alt="2" width="10" height="10" title="Modificar" /></a></td>
                <td  align="left" valign="middle" class="TextBox"><?=$EmpresaXPagineo[$i][1]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$EmpresaXPagineo[$i][2]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$EmpresaXPagineo[$i][3]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$EmpresaXPagineo[$i][4]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$EmpresaXPagineo[$i][5]?></td> 
           
                </tr>
              
            	 <?php }  ?> 
             
  </form>
  </tbody>

</table>
<p>&nbsp;</p>

</body>
</html>