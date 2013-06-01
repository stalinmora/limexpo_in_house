
<?php

	include_once('service/clsDBpostAccess.php');
	
	
	class carrera{
	var $i2=0;
	function CreaMenuM($tipo,$login)
	{
		$this->tabla('MANTENIMIENTO');
		 if($tipo==1)
	  	{ ?><body link="#999999" vlink="#666666" alink="#FF9900">
		<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  valign="middle" align="center" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="center" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A  class="Link" href=#  onClick= <? echo  '"pagina_interna(\'MantenimientoCarrera.php\')"' ?> ><?php echo  '<br><b>CARRERA</b>';  ?></A>  </DIV></FONT></TD>
          </TR></TBODY>
      </TABLE>
	 <? } ?>
	  <TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  valign="middle" align="center" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="center" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A  class="Link" href=#  onClick= <? echo  '"pagina_interna(\'MantenimientoServicio.php\')"'?> ><?php echo  '<br><b>SERVICIO</b>';  ?></A>  </DIV></FONT></TD>
          </TR></TBODY>
      </TABLE>
	  
	  <?	   
	   echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
    </table>';
		
	}
	
	function CreaMenuP($tipo,$login)
	{
		$this->tabla('PROCESO');
		 if($tipo==1)
	  	{ ?>
		<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  valign="middle" align="center" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="center" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A  class="Link" href=#  onClick= <? echo  '"pagina_interna(\'IIngresoContenidoNoAcad.php\')"' ?> ><?php echo  '<br><b>Nueva Informaci&oacute;n </b>';  ?></A>  </DIV></FONT></TD>
          </TR></TBODY>
      </TABLE>
	 <? }
	 elseif($tipo==2)
	 {
	 	?>
		<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  valign="middle" align="center" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="center" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A  class="Link" href=#  onClick= <? echo  'href="javascript:%20toggle2(\'Academica\');"' ?> ><?php echo  '<br><b>Nueva Informaci&oacute;n </b>';  ?></A>  </DIV></FONT></TD>
          </TR></TBODY>
      </TABLE>
	  
	 <? echo '<DIV class=toggle id=\'Academica\' align="justify" >
         <DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# onClick="pagina_interna(\'IIngresoContenido.php\',1)" >Academica </a></TD></TR></TBODY></TABLE></DIV>
       </DIV>';
	 }
	 
	 elseif($tipo==3)
	 {
	 	?>
		<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  valign="middle" align="center" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="center" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A  class="Link" href=#  onClick= <? echo  'href="javascript:%20toggle2(\'Academica\');"' ?> ><?php echo  '<br><b>Nueva Informaci&oacute;n </b>';  ?></A>  </DIV></FONT></TD>
          </TR></TBODY>
      </TABLE>
	  
	 <? echo '<DIV class=toggle id=\'Academica\' align="justify" >
         <DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# onClick="pagina_interna(\'IIngresoContenido.php\',1)" >Academica </a></TD></TR></TBODY></TABLE></DIV>
			 <DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# onClick="pagina_interna(\'IIngresoContenidoServicio.php\',1)" >Servicio </a></TD></TR></TBODY></TABLE></DIV>
			 
       </DIV>';
	 }
	  
	   echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
    </table>';
		
	}
	
	function Elimina_carrera($id_unidad,$id_carrera)
	{
		$base=new clsBaseDR();
		$sql="delete from wm_carrera where id_unidad=".$id_unidad." and id_carrera=".$id_carrera;
		if($base->ejecutar($sql))
		{
		echo '<script >		
		parent.location="../class/IntVerificaUsuario.php?titulo=Confirmación!!!&mensaje=Eliminación de Carrera Correcta&error=2" </script>';
			}
			else
				echo '<script > parent.location="../class/IntVerificaUsuario.php?titulo=Error&mensaje=Error al Eliminar&error=1" </script>';
		//echo $sql;
		
	
	}
	
	function ConsCarreraSimple($id_unidad,$id_carrera)
	{
		$base=new clsBaseDR();
		$sql="select descripcion, id_nivel from wm_carrera where id_unidad=".$id_unidad." and id_carrera=".$id_carrera;
		if($registro=$base->consultaRegistro($sql))
		return $registro;
				
	}	//cons_carrera
	
	
	
	function ConsCarrera($desc_carrera,$id_unidad){
			
			$desc_carrera=urlencode($desc_carrera);
			
			$base=new clsBaseDR();			
			
			$sql="select id_carrera from  wm_carrera where id_unidad=".$id_unidad." and descripcion= '$desc_carrera'";
			
			if($registro=$base->consultaRegistro($sql)){

				return $registro[0];					
					
			}//if			
			else{
					return NULL;
			}//else	
				
			}	//cons_carrera
	
	function ingresa_carrera($id_unidad,$txt_carrera,$nivel_carrera)
	{
		
		
		$txt_carrera=strtoupper (urlencode($txt_carrera));  
		
		$base=new clsBaseDR();
		$sql="select id_carrera from  wm_carrera where descripcion='$txt_carrera'";
		if($registro=$base->consultaRegistro($sql)){
		echo '<script > document.location="../webpages/Error.php?titulo=Error&mensaje=Esta carrera ya existe no se la puede ingresar&error=1" </script>';
		}
		else
		{		
		$base=new clsBaseDR();
		$sql="select max(id_carrera) from wm_carrera where id_unidad=".$id_unidad;
		if($registro=$base->consultaRegistro($sql)){
		$count=$registro[0]+1;
		}
		
		$base=new clsBaseDR();
		$sql="insert into wm_carrera (id_carrera, id_unidad, id_nivel, descripcion, estado) values(".$count.",".$id_unidad.",".$nivel_carrera.",'$txt_carrera','A')";
		if($base->ejecutar($sql))
		echo '<script > parent.location="../class/IntVerificaUsuario.php?titulo=Confirmación!!!&mensaje=Inserción de Carrera Exitosa&error=2" </script>';
		
		}    
	
	}
	
	function actualiza_carrera($id_unidad,$id_carrera,$txt_carrera,$nivel_carrera)
	{
		$txt_carrera=strtoupper (urlencode($txt_carrera));  
		
	/*	$base=new clsBaseDR();
		$sql="select id_carrera from carrera where descripcion='$txt_carrera'";
		if($registro=$base->consultaRegistro($sql)){
		echo '<script > document.location="../webpages/Error.php?titulo=Error&mensaje=Esta carrera ya existe no se la puede ingresar&error=1" </script>';
		return;
		}*/
		$base=new clsBaseDR();
		$sql="update wm_carrera set descripcion='$txt_carrera', id_nivel=".$nivel_carrera." where id_carrera=".$id_carrera." and id_unidad=".$id_unidad;
		if($base->ejecutar($sql))
		{
		echo '<script > parent.location="../class/IntVerificaUsuario.php?titulo=Confirmación&mensaje=Actualización Exitosa&error=2" </script>';
			}
			else
				echo '<script > parent.location="../class/IntVerificaUsuario.php?titulo=Error&mensaje=Error al Actualizar&error=1" </script>';
		//echo $sql;
		
	}
	
	function ConsNivelCarrera(){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select id_nivel,descripcion from  wm_nivel_carrera where estado='A'";
			
			if($registro=$base->consultarRegistros($sql)){
			
				while($registro[$i][0]!=NULL){	?>	
				<?php echo  '<option value='.$registro[$i][0].'>'.urldecode($registro[$i][1]).'</option> ' ?>
				  
	<?php			$i++;
					}//while
									
			}//if			
			else{
					echo"Error Al Consultar carrera";
			}//else	
			
		}//consulta nivel carrera
						
			
			function ConsCarreUnidadSimple($id_unidad){
		
			$base=new clsBaseDR();
			
			$sql="select id_carrera,descripcion from  wm_carrera where id_unidad=".$id_unidad." order by descripcion ";
			
			if($registro=$base->consultarRegistros($sql)){

				return $registro;					
					
			}//if			
			else{
					return NULL;
			}//else	
			
		}//consulta CARRERA
		
		function ConsCarreUnidadUs($id_unidad ){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select id_carrera,descripcion from  wm_carrera where id_unidad=".$id_unidad." order by descripcion ";
			
			if($registro=$base->consultarRegistros($sql)){
				
				while($registro[$i][0]!=NULL){
				echo'
			  <label>
                <input  disabled=true type="checkbox" name="checkbox'.$registro[$i][0].'" value="'.$registro[$i][0].'">
                '.urldecode($registro[$i][1]).'</label><br>';
				
				$i++;
				}//while
				echo '<label>
                <input disabled=true type="checkbox" name="checkbox0" value="checkbox0" onclick=check()  > Todas las carreras </label><br>
				<input disabled=true type="checkbox" name="servicio" value="0" > Servicios </label><br>';	
			}//if			
			else{
					echo"Registre al usuario: Esta Unidad no tiene carreras";
			}//else	
			
		}//consulta carrera
		
				
		function ConsultaCarreraPre_Post($id_unidad,$login)
		{
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select c.id_carrera,c.descripcion,n_c.id_nivel from  wm_unidad u, wm_carrera c, wm_nivel_carrera n_c,wm_permiso p where  u.id_unidad=".$id_unidad."  
and u.id_unidad=c.id_unidad and c.id_nivel=n_c.id_nivel and u.id_unidad=p.id_unidad and p.login='".$login."' order by c.descripcion ";
			
		if($registro=$base->consultarRegistros($sql)){
				while($registro[$i][0]!=NULL){
				
				echo '<a href="#"  onClick="Elimina('. $registro[$i][0].','.$id_unidad.',\''.urldecode($registro[$i][1]).'\',\''.$login.'\');"><img src="../images/ed_delete.gif" alt="Click para eliminar esta carrera" width="18" height="18" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:%20Actualiza(\''.urldecode($registro[$i][1]).'\','. $registro[$i][0].','. $registro[$i][2].')" title="Click para actualizar esta carrera" >'.urldecode($registro[$i][1]).'</a> <br>';	
																			
					$i++;
					
					}//while
					
									
			}//if			
			else{
					echo '<option value="10000"> No tiene Carreras </option>';
					
			}//else	
			
		}/// funcion consulta carrera de pregrado o postgrado
		
		function tabla($tipo)
		{
			echo '<table width="96%" border="0" cellpadding="0" cellspacing="0"  >
            <tr>
        <td width="219" height="36" valign="top"><div align="justify">
          <TABLE class=borde003 cellSpacing=0 cellPadding=0 width="100%" 
                   background="../images/home_42.jpg" 
                  border=0><!--DWLayoutTable-->
            <TBODY>
              <TR>
                <TD width=0 height=12></TD>
                            <TD  valign="middle"  align="left" width=172><SPAN 
                        class="Estilo9 Estilo24 style4"><STRONG>'.$tipo.'</STRONG></SPAN></TD>
                      <TD width=0></TD> </TR> <tr><TD width=0 height=12></TD>
                <td >';
		
		}	
		function ConsCarreUnidad($id_unidad,$login){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select c.id_carrera,c.descripcion from wm_carrera c, wm_nivel_carrera n_c, wm_permiso_carrera p where  c.id_unidad=".$id_unidad." and c.id_nivel=n_c.id_nivel and n_c.descripcion='pregrado' and c.id_carrera=p.id_carrera and p.login='".$login."'";
			
			if($registro=$base->consultarRegistros($sql)){
			
			 	$this->tabla('PRE - GRADO');
			
				while($registro[$i][0]!=NULL){	?>	
				
				<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  width="90%" valign="middle" align="left"><FONT title="Click para desplegar el menú" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A  class="Link" href="javascript:%20toggle2('<?php echo $registro[$i][0]?>_nav');"><?php echo  '<br><b>'.urldecode($registro[$i][1]).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';  ?></A> </DIV></FONT></TD>
			  
			  <td valign="bottom"  align="center"> <FONT face="Verdana, Arial, Helvetica, sans-serif"> <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"> <? echo'<a class="Link" href="#" onClick="pagina_interna(\'../webpages/IVistaPreliminar.php?id='.$registro[$i][0].'&t=4&id_unidad='.$id_unidad.'&desc='.urldecode($registro[$i][1]).'\',0)" >  <img  src="../images/buscar.jpg" alt="vista preliminar" /></a>'; ?></DIV></FONT></td>
			  
          </TR></TBODY>
      </TABLE>
      <DIV class=toggle id='<?php echo $registro[$i][0]?>_nav' align="justify" >
          <?php echo $this->consultaContCarrera($registro[$i][0],$id_unidad,$login) ?>
</DIV>
	<?php			
					echo '<script> nombre['.$this->i2.']= "'.$registro[$i][0].'_nav"; </script>'; 
					$this->i2++;
					$i++;
					}//while
					
					echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
    </table>';
									
			}//if	
		else{
			
				$base=new clsBaseDR();
			$i=0;
		
			
			$sql="select c.id_carrera,c.descripcion from wm_unidad u, wm_carrera c, wm_nivel_carrera n_c,wm_permiso p where  u.id_unidad=".$id_unidad."  
and u.id_unidad=c.id_unidad and c.id_nivel=n_c.id_nivel and n_c.descripcion='pregrado' and u.id_unidad=p.id_unidad and p.login='".$login."' and id_tipo_permiso=1";
			
			if($registro=$base->consultarRegistros($sql)){
			$this->tabla('PRE - GRADO');
				while($registro[$i][0]!=NULL){	?>	
				
				<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				 background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  width="90%" valign="middle"  align="left" ><FONT title="Click para desplegar el menú" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A class="Link" href="javascript:%20toggle2('<?php echo $registro[$i][0]?>_nav');"><?php echo  '<br><b>'.urldecode($registro[$i][1]).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';  ?></A></DIV></FONT></TD>
			  
			  <td valign="bottom"  align="center"> <FONT face="Verdana, Arial, Helvetica, sans-serif"> <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"> <? echo'<a class="Link" href="#" onClick="pagina_interna(\'../webpages/IVistaPreliminar.php?id='.$registro[$i][0].'&t=4&id_unidad='.$id_unidad.'&desc='.urldecode($registro[$i][1]).'\',0)" > <img  src="../images/buscar.jpg" alt="vista preliminar" /></a>'; ?></DIV></FONT> </td>
          </TR></TBODY>
      </TABLE>
      <DIV class=toggle id='<?php echo $registro[$i][0]?>_nav' align="justify" >
          <?php echo $this->consultaContCarrera($registro[$i][0],$id_unidad,$login) ?>
</DIV>
	<?php		
	
	
	echo '<script> nombre['.$this->i2.']= "'.$registro[$i][0].'_nav"; </script>'; 
					$this->i2++;
//				$nombre[$i]=$registro[$i][0]."_nav";
	$i++;
					}//while
				echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
    </table>';					
			}//if
		
			}//else	
			
		}//consulta usuario
		
		
		
		function consultaContCarrera($id_carrera,$id_unidad,$login){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select c.id_contenido,cat.descripcion from wm_cat_informacion cat,wm_contenido c
			where c.id_cat_informacion=cat.id_cat_informacion and
			c.id_carrera=".$id_carrera." and c.id_unidad=".$id_unidad;
			
			if($registro=$base->consultarRegistros($sql)){
				while($registro[$i][0]!=NULL){	?>
				<DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# onClick="pagina_interna('<?php echo '../webpages/IActContenido.php?id_contenido='.$registro[$i][0].'&id_carrera='. $id_carrera.'&id_unidad='.$id_unidad.'&login='.$login ?>',0)"  
			 ><?php echo  urldecode($registro[$i][1]) ?></a></TD></TR></TBODY></TABLE></DIV><?php				
					//href="../webpages/IActContenido.php?id_contenido=<?php echo $registro[$i][0].'&id_carrera='. $id_carrera.'&id_unidad='.$id_unidad.'&login='.$login 											
					$i++;
					
					}//while
					
									
			}//if			
			else{?>
			
					<DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# ><?php echo  "No tiene Contenido" ?></a></TD></TR></TBODY></TABLE></DIV>
			
			 <?
					//echo"<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;->&nbsp; No tiene Contenido";
			}//else	
			
		}//consulta cont por carrera
		
		
	
	
	function ConsCarrePostGrado($id_unidad,$login){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select c.id_carrera,c.descripcion from wm_carrera c, wm_nivel_carrera n_c, wm_permiso_carrera p where  c.id_unidad=".$id_unidad." and c.id_nivel=n_c.id_nivel and n_c.descripcion='postgrado' and c.id_carrera=p.id_carrera and p.login='".$login."'";
			
			if($registro=$base->consultarRegistros($sql)){
				$this->tabla('POST - GRADO');	
				while($registro[$i][0]!=NULL){	?>	
				
				<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD width="90%"  valign="middle" align="left" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link" align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A class="Link" href="javascript:%20toggle2('<?php echo $registro[$i][0]?>_nav');"><?php echo  '<br><b>'.urldecode($registro[$i][1]).' &nbsp;</b>';  ?></A></DIV></FONT></TD>
			  
<td valign="bottom"  align="center"> <FONT face="Verdana, Arial, Helvetica, sans-serif"> <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><? echo'<a href="#" onClick="pagina_interna(\'../webpages/IVistaPreliminar.php?id='.$registro[$i][0].'&t=4&id_unidad='.$id_unidad.'&desc='.urldecode($registro[$i][1]).'\',0)" > <img src="../images/buscar.jpg" alt="vista preliminar" /></a>'; ?> </DIV></FONT></td>
          </TR></TBODY>
      </TABLE>
      <DIV class=toggle id='<?php echo $registro[$i][0]?>_nav' align="justify" >
          <?php echo $this->consultaContCarreraPost($registro[$i][0],$id_unidad,$login) ?>
</DIV>
	<?php			
					echo '<script> nombre['.$this->i2.']= "'.$registro[$i][0].'_nav"; </script>'; 
					$this->i2++;
					$i++;
					}//while
			echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
   		 </table>';							
			}//if			
			else{
			
				$base=new clsBaseDR();
				$i=0;
			
			$sql="select c.id_carrera,c.descripcion from wm_unidad u, wm_carrera c, wm_nivel_carrera n_c,wm_permiso p where  u.id_unidad=".$id_unidad."  
and u.id_unidad=c.id_unidad and c.id_nivel=n_c.id_nivel and n_c.descripcion='postgrado' and u.id_unidad=p.id_unidad and p.login='$login' and id_tipo_permiso=1";
			
				if($registro=$base->consultarRegistros($sql)){
				$this->tabla('POST - GRADO');
				while($registro[$i][0]!=NULL){	?>	
				
				<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				background="../images/home_42.jpg">
        		<TBODY>
          		<TR>
          		  <TD  width="90%" valign="middle" align="left" > <FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link" align="left" onMouseOver=		"rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A class="Link" href="javascript:%20toggle2('		<?php echo $registro[$i][0]?>_nav');"><?php echo  '<br><b>'.urldecode($registro[$i][1]).' &nbsp;</b>';  ?></A> </DIV></	FONT></TD>
			  
<td valign="bottom"  align="center"> <FONT face="Verdana, Arial, Helvetica, sans-serif"> <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><? echo'<a href="#" onClick="pagina_interna(\'../webpages/IVistaPreliminar.php?id='.$registro[$i][0].'&t=4&id_unidad='.$id_unidad.'&desc='.urldecode($registro[$i][1]).'\',0)" > <img src="../images/buscar.jpg" alt="vista preliminar" /></a>'; ?></DIV></FONT></td>
         	 	</TR></TBODY>
      			</TABLE>
      <DIV class=toggle id='<?php echo $registro[$i][0]?>_nav' align="justify" >
          <?php echo $this->consultaContCarreraPost($registro[$i][0],$id_unidad,$login) ?>
</DIV>
	<?php				
						echo '<script> nombre['.$this->i2.']= "'.$registro[$i][0].'_nav"; </script>'; 
					$this->i2++;
						$i++;
						}//while
						
			echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
   		 </table>';
									
					}//if			
			
			}//else	
			
		}//consulta usuario
		
		function consultaContCarreraPost($id_carrera,$id_unidad,$login){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select c.id_contenido,cat.descripcion from wm_cat_informacion cat,wm_contenido c
			where c.id_cat_informacion=cat.id_cat_informacion and
			c.id_carrera=".$id_carrera." and id_unidad=".$id_unidad;
			
			if($registro=$base->consultarRegistros($sql)){
				while($registro[$i][0]!=NULL){	?>
				<DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# onClick="pagina_interna('<?php echo '../webpages/IActContenido.php?id_contenido='.$registro[$i][0].'&id_carrera='. $id_carrera.'&id_unidad='.$id_unidad.'&login='.$login ?>',0)"  
			 ><?php echo  urldecode($registro[$i][1]) ?></a></TD></TR></TBODY></TABLE></DIV><?php				
																
					$i++;
					
					}//while
					
			}//if			
			else{?>
			
					<DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# ><?php echo  "No tiene Contenido" ?></a></TD></TR></TBODY></TABLE></DIV>
			
			 <?
			}//else	
			
		}//consulta cont por carrera de postgrado
			

function ConsCarreServicio($id_unidad,$login){
		
			$base=new clsBaseDR();
			$i=0;
			/*
			$sql="SELECT distinct(c.id_servicio), s.descripcion from unidad u, permiso p,contenido c, servicio s where c.id_unidad=".$id_unidad." and c.id_servicio=s.id_servicio and c.id_servicio!=1 and c.id_unidad=u.id_unidad and u.id_unidad=p.id_unidad and p.login='$login' and p.servicio='1'";*/
			$sql="select s.id_servicio,s.descripcion from wm_servicio s,wm_servicio_unidad su,wm_unidad u, wm_permiso p where u.id_unidad=".$id_unidad." and su.id_unidad=u.id_unidad and u.id_unidad=p.id_unidad and p.login='$login' and p.servicio='1' and s.id_servicio=su.id_servicio and s.id_servicio!= '1' order by descripcion ";
			
			if($registro=$base->consultarRegistros($sql)){
			
				$this->tabla('SERVICIOS');
				while($registro[$i][0]!=NULL){	?>	
				
				<TABLE  cellSpacing=0 cellPadding=0 width="100%"  border=0 
				background="../images/home_42.jpg">
        <TBODY>
          <TR>
            <TD  width="90%" valign="middle" align="left" ><FONT title="Ranking: 207" 
                  face="Verdana, Arial, Helvetica, sans-serif">
              <DIV class=CeldaIzquierdaPortafolio id="Link" align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><A class="Link" href="javascript:%20toggle2('<?php echo $registro[$i][0]?>111_nav');"><?php echo  '<br><b>'.urldecode($registro[$i][1]).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';  ?></A> </DIV></FONT></TD>
<td valign="bottom"  align="center"> <FONT face="Verdana, Arial, Helvetica, sans-serif"> <DIV class=CeldaIzquierdaPortafolio id="Link"  align="left" onMouseOver="rollover_links(-1,4)?this.style.color='#1C63A5':null;" onMouseout="rollover_links(-1,4)?this.style.color='#000000':null;"><? echo'<a href="#" onClick="pagina_interna(\'../webpages/IVistaPreliminar.php?id='.$registro[$i][0].'&t=5&id_unidad='.$id_unidad.'&desc='.urldecode($registro[$i][1]).'\',0)" > <img src="../images/buscar.jpg" alt="vista preliminar" /></a>'; ?></DIV></FONT></td>
          </TR></TBODY>
      </TABLE>
      <DIV class=toggle id='<?php echo $registro[$i][0]?>111_nav' align="justify" >
          <?php echo $this->consultaContServ($registro[$i][0],$id_unidad,$login) ?>
</DIV>
	<?php			
					echo '<script> nombre['.$this->i2.']= "'.$registro[$i][0].'111_nav"; </script>'; 
					$this->i2++;
					$i++;
					}//while
			echo '</td><TD width=0></TD></tr></TBODY></TABLE>
            </div></td>
          </tr>
      
      
      
   		 </table>';							
			}//if			
						
		}//consulta usuario
		
		function consultaContServ($id_servicio,$id_unidad,$login){
		
			$base=new clsBaseDR();
			$i=0;
			
			$sql="select c.id_contenido,cat.descripcion from wm_cat_informacion cat,wm_contenido c
			where c.id_cat_informacion=cat.id_cat_informacion and
			c.id_servicio=".$id_servicio." and id_unidad=".$id_unidad;
			
			if($registro=$base->consultarRegistros($sql)){
				while($registro[$i][0]!=NULL){	?>
				<DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# onClick="pagina_interna('<?php echo '../webpages/IActContenidoServicio.php?id_contenido='.$registro[$i][0].'&id_servicio='. $id_servicio.'&id_unidad='.$id_unidad.'&login='.$login ?>',0)"  
			 ><?php echo  urldecode($registro[$i][1]) ?></a></TD></TR></TBODY></TABLE></DIV><?php				
																
					$i++;
					
					}//while
									
			}//if			
			else{?>
			
					<DIV class="Link" id="Link"  align="justify">
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%"  background="../images/home_42.jpg" >
            <TBODY>
				<TR>
				<TD class="Link"   valign="middle"><IMG height=17 alt="" hspace=0 
             src="../images/Arrow.gif" width=29 align=left border=0><a href=# ><?php echo  "No tiene Contenido" ?></a></TD></TR></TBODY></TABLE></DIV>
			
			 <?
			}//else	
			
		}//consulta cont por carrera de postgrado



		
	}//class
?>