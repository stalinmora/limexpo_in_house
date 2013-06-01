<?php 
	include_once('../libs/clsProveedor.php');	
	$objProveedor=new clsProveedor();	
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

	$ProveedorXPagineo=$objProveedor->ConsProveedor($inicio,$TAMANIO_PAGINA);
	$totProveedorXpagineo=count($ProveedorXPagineo);
//	$TodosLosProveedor=$objProveedor->ConsProveedorTodos();
//	$totTodosLosProveedor=count($TodosLosProveedor);	
//	$total_paginas = ceil($totTodosLosProveedor/$TAMANIO_PAGINA);
	 
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
			if($totProveedorXpagineo==$TAMANIO_PAGINA)
			$maximoReg=$TAMANIO_PAGINA;
		    if($totProveedorXpagineo<$TAMANIO_PAGINA)
		    $maximoReg=$totProveedorXpagineo;
		   //$maximoReg=$totTodosLosProveedor;
		 
           			 
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
		
function VerificaEliminar(id)
{
    
     
    
//	document.getElementById("ACCIONES").innerHTML="";
	var query="pId="+id;
	//document.getElementById(tr).style.visibility = "visible";
	//document.getElementById(tr).innerText="";
	
//	document.getElementById("ACCIONES").innerHTML="<center><img src='../images/ajax-loader-reg.gif' /><br/><b><label style= 'font-family: verdana ; font-size: 9;color: #993300'> (Verificando datos, por favor espere...) </label></b></center><br/>";

	
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

function Elimina(des)
{
	if(confirm("Va eliminar de manera permanente el servicio de "+des+" ¿Desea continuar?"))
	{
		document.location="../libs/IntElimProveedor.php?id="+des;
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
          <th width="160">Nombre</th>
          <th width="72" filter-type='ddl'>Tipo Id.</th>
          <th width="80">Identificacion</th>
          <th width="72" filter-type='ddl'>Pais</th>
          <th width="72" filter-type='ddl'>Ciudad</th>
          <th width="72" filter-type='ddl'>Nivel</th>
          <th width="72" filter-type='ddl'>Cargo</th>
          <th width="80">Dir Empresa</th>
          <th width="80">Dir Domicilio</th>
          <th width="80">Telf. Empres</th>
          <th width="80">Fax</th>
          <th width="80">Celular</th>
          <th width="80">Mail Empresa</th>
          <th width="80">Mail Personal</th>
          <th width="80">Pagina Empresa</th>

        </tr>
      </thead>
      <tbody> <form    action="javascript:;"  method="post" name="form1">
      
        <?php
			for($i=0;$i<$maximoReg;$i++)
			{
            ?>
		   
              <tr  >
                <td><a  href="#"  onClick="Elimina('<?=$ProveedorXPagineo[$i][0]?>');"><img src="../images/ed_delete.gif" title="Click para eliminar este servicio" width="12" height="12" border="0"/></a>           </td>               
               <td><a rel="shadowbox;width=758;height=378" title="" href="webpages/lmp_cliente.php?pId=<?=$ProveedorXPagineo[$i][0]?>" class="nolinks"><img src="../images/modificar_registro.png" alt="2" width="10" height="10" title="Modificar" /></a></td>
                <td  align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][1]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][2]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][3]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][4]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][5]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][6]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][7]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][8]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][9]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][10]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][11]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][12]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][13]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][14]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?=$ProveedorXPagineo[$i][15]?></td>  
                </tr>
              
            	 <?php }  ?> 
             
  </form>
  </tbody>

</table>

</body>
</html>