<?php 
	include_once('../libs/clsImportador.php');	
	$objImportador=new clsImportador();	
  
    $TAMANIO_PAGINA = 100;
	if(empty($pagina))   //SI ES LA PRIMERA VEZ Q SE CARGA LA PAGINA
	  {
		$inicio = 0;
		$pagina = 1;	
	  }
	else
	 {
		$inicio = ($pagina - 1) * $TAMANIO_PAGINA;
     }

	$ImportadorXPagineo=$objImportador->ConsImportador($inicio,$TAMANIO_PAGINA);
	$totImportadorXpagineo=count($ImportadorXPagineo);
	 
?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>.::LIMEXPO ::.</title>
       
<script type="text/javascript" src="../scripts/lib/jquery_filte.js"></script>
<script type="text/javascript" src="../scripts/picnet.table.filter.min.js"></script>	


<script type="text/javascript">
        $(document).ready(function() {

		   <?php 
		   $maximoReg="";//maximo hasta donde debe avanzar el For pintando filas
			if($totImportadorXpagineo==$TAMANIO_PAGINA)
			$maximoReg=$TAMANIO_PAGINA;
		    if($totImportadorXpagineo<$TAMANIO_PAGINA)
		    $maximoReg=$totImportadorXpagineo;
		 
				 ?> 
            

            // Initialise Plugin
            var options1 = {
                clearFiltersControls: [$('#cleanfilters')],
                matchingRow: function(state, tr, textTokens) {
                    if (!state || !state.id) { return true; }					
					var val =  tr.children('td:eq(2)').text();
					switch (state.id) {						
						default: return true;
					}
                }
            };

            $('#demotable1').tableFilter(options1);
			

        });
		

function Elimina(id,des)
{
	if(confirm("Va eliminar el siguienete importador "+des+" ¿Desea continuar?"))
	{
		document.location="../libs/IntElimImportador.php?id="+id;
	}
	
}



</script>

<style>
* {	font-family:arial;	font-size:8pt;}
table, td, th {	border: solid 1px silver; color:#666; }
th { background-color:#C1D5E0 ; color:light-gray; font-size:1.05em  }
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

	<p><br/>
      <a id="cleanfilters" href="#"><input  name="btn_limpiar" id="btn_limpiar" type="image" src="../images/limpiar.png" alt="LIMPIAR" title="LIMPIAR"/>
      </a>
      
      <a   href="registra_importador.php" ><img src="../images/agregar.png"    alt="AGREGAR NUEVO REGISTRO" title="AGREGAR NUEVO REGISTRO" /></a>	
    </p>
<table width="300" id='demotable1'>
<thead>
        <tr>        
          <th><input  align="middle"type="checkbox" name="cbx_eli_todos" id="cbx_eli_todos" title="Elimar Todos los Registros" /></th>          
          <th><img src="../images/modificar_registro.png" alt="2" width="10" height="10" title="Modificar" /></th>
          <th width="360" >Nombre Importador</th>
          <th width="72" filter-type='ddl'>Tipo Importador</th>
          <th width="72" filter-type='ddl'>Tipo Identificaci&oacute;n</th>
          <th width="80">Identificaci&oacute;n</th>
          <th width="72" filter-type='ddl'>Pais</th>
          <th width="72" filter-type='ddl'>Ciudad</th>
          <th width="380">Dir Empresa</th>
          <th width="80">Dir Domicilio</th>
          <th width="80">Telf. Empres</th>
          <th width="80">Telf. Domicilio </th>
          <th width="80">Celular</th>
          <th width="80">Mail Empresa</th>
          <th width="80">Mail Personal</th>
          <th width="80" filter-type='ddl'>estado</th>

        </tr>
      </thead>
      <tbody> <form    action="javascript:;"  method="post" name="form1">
      
        <?php
			for($i=0;$i<$maximoReg;$i++)
			{
            ?>
		   
              <tr  >
                <td><a  href="#"  onClick="Elimina('<?php echo $ImportadorXPagineo[$i][0] ?>','<?php echo $ImportadorXPagineo[$i][1] ?>');"><img src="../images/ed_delete.gif" title="Click para eliminar este servicio" width="12" height="12" border="0"/></a>           </td>               
               <td><a rel="shadowbox;width=758;height=378" title="" href="modifica_importador.php?id=<?php echo $ImportadorXPagineo[$i][0]?>" class="nolinks"><img src="../images/modificar_registro.png" alt="2" width="10" height="10" title="Modificar" /></a></td>
                <td id="jqtf_filters" align="left" valign="middle"  width="160" class="TextBox"><?php echo $ImportadorXPagineo[$i][1]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][2]?></td>
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][3]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][4]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][5]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][6]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][7]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][8]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][9]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][10]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][11]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][12]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][13]?></td> 
                <td id="jqtf_filters" align="left" valign="middle" class="TextBox"><?php echo $ImportadorXPagineo[$i][14]?></td> 
               
                </tr>
              
            	 <?php }  ?> 
             
  </form>
  </tbody>

</table>

</body>
</html>