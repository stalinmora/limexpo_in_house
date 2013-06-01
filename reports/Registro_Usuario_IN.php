<?php
	
	include_once('../class/cls_carrera.php');
	include_once('../class/cls_Permiso.php');
	include_once('../class/cls_unidad.php');
	$unidad=new unidad();
	//$id_unidad=1;
	$carrera=new carrera();
	$permiso=new permisos();
	$id_unidad=$_GET['id_unidad'];
	if($id_unidad!=NULL)
	$count=$unidad->CuentaCarrera($id_unidad);
	$count2=0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script  type="text/javascript">
var countch=0;

function focoInicio2 ()
	{
		try{
		document.form1.txt_usuario.focus();
		}
		catch(e)
		{
		}
	}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  //eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  try{
  if( selObj.options[selObj.selectedIndex].value==1 ){
  <?php   
  echo 'document.form1.checkbox0.disabled=false;
  		document.form1.checkbox0.checked=true;
		document.form1.servicio.disabled=false;
		document.form1.servicio.checked=true;';
  for($i=1;$i<=$count;$i++)
  echo 'document.form1.checkbox'.$i.'.disabled=true;' ?>}
  else  
  if( selObj.options[selObj.selectedIndex].value==0 ){
  document.form1.servicio.disabled=true;
		document.form1.servicio.checked=false;
   <?php   
  for($i=0;$i<=$count;$i++)
  echo 'document.form1.checkbox'.$i.'.disabled=true;
  		document.form1.checkbox'.$i.'.checked=false;' ?>}
  else{
	document.form1.checkbox0.checked=false;
	document.form1.servicio.disabled=false;
	document.form1.servicio.checked=false;
  <?php   
  for($i=0;$i<=$count;$i++)
  echo 'document.form1.checkbox'.$i.'.disabled=false;' ?>}
 
  
  if (restore) selObj.selectedIndex=1;
  }
  catch(e)
  {
  }
  
  
}

function metodoClick(){ 
   
		
   if(document.form1.txt_usuario.value!= "" && document.form1.lst_tipo.value!=0 )
   { 
   		
	try{	
	<?php   
  for($i=0;$i<=$count;$i++)
  echo 'if(document.form1.checkbox'.$i.'.checked){ countch=countch+1; }'?> 
  document.form1.count_ch.value=countch;
  if(countch==0 && document.form1.servicio.checked==false )
  {
  alert("Escoja las carrera o servicio a asignar");
  document.form1.action="javascript:;";
  }else
  {  document.form1.action="../class/IntRegUsuario.php"; }
  	}
 	catch(e)
 	{
		
		document.form1.action="../class/IntRegUsuario.php";
 	}
	
  }
  else
  { 
  	document.form1.action="javascript:;";
	if(document.form1.txt_usuario.disabled)
	{
	alert("Escoja la unidad a la que desee crear el usuario");
	return;
	}
	if(document.form1.lst_tipo.value==0)
	{
	alert("escoja el tipo de usuario");
	return;
  	}
	alert("ingrese un usuario");
  	document.form1.txt_usuario.focus();
	
  }
  
     if(document.form1.servicio.checked)
   		document.form1.servicio.value=1;
   else
		document.form1.servicio.value=0;
 
}

function check()
{
	if(document.form1.checkbox0.checked)
	{
		<?php for($i=1;$i<=$count;$i++)
  		echo 'document.form1.checkbox'.$i.'.checked=true;' ?>
	}
	else
	{
		<?php for($i=1;$i<=$count;$i++)
  		echo 'document.form1.checkbox'.$i.'.checked=false;' ?>	
	}
	
	if(document.form1.servicio.checked)
   		document.form1.servicio.value=1;
   else
		document.form1.servicio.value=0;
}

</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><LINK 
 href="../styles/style001.css"
type=text/css rel=stylesheet>
<title></title>
<style type="text/css">
<!--
.style3 {font-size: 14px}
.estilo_carrera {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</head>

<body onload="javascript:focoInicio2()";>
<div align="justify">
  <TABLE width="501" border=0 cellPadding=0 cellSpacing=0>
    <!--DWLayoutTable aqui-->
    <TBODY>  <form name="form1" method="post"  action="../class/IntRegUsuario.php">
      
      
      <TR>
        <TD width="10" height="22"></TD>
          <TD width="170" valign="top" class="textForum">Usuario:</TD>
          <TD width="17"></TD>
          <TD width="232" valign="top">
            <label class="textForum">
            <input name="txt_usuario" type="text" id="txt_usuario" maxlength="9" >
            </label>          </TD>
        <TD width="72"></TD>
      </TR>
      
      <TR>
        <TD height="9"></TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
      </TR>
      <TR>
        <TD height="22"></TD>
        <TD valign="top" class="textForum">Tipo de Usuario </TD>
        <TD></TD>
        <TD valign="top">
          <select name="lst_tipo" class="textForum" id="lst_tipo" onChange="MM_jumpMenu('parent',this,0)">
            <option  value="0">Escoja una</option>
			<?php $permiso->ConsTipoPermiso() ?>
          </select>        </TD>
        <TD></TD>
      </TR>
      
      <TR>
        <TD height="18"></TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
      </TR>
      <TR>
        <TD height="24"></TD>
        <TD colspan="4" valign="top" class="estilo_carrera"><?php 
								
		  		if($id_unidad > 0)
				{
				if($unidad->CompruebaTipo($id_unidad))
				{
				echo '<script>document.form1.lst_tipo.value=1; 
					document.form1.lst_tipo.disabled=true;</script>';
		  		
				}
				$carrera->ConsCarreUnidadUs($id_unidad);
				}
				else
				{
				echo 'Selecione la Unidad a la que crear&aacute; el usuario';
				
				echo '<script> document.form1.txt_usuario.disabled=true;
						  document.form1.lst_tipo.disabled=true;</script>';
				}
		?>     </TD>
      </TR>
      <TR>
        <TD height="23"></TD>
        <TD>&nbsp;</TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
      </TR>
      

      <TR>
        <TD height="24"></TD>
        <TD colspan="3" valign="top"><label>
            <input name="btn_reg" type="submit" id="btn_reg" value="Registrar" onclick=metodoClick()>
            <input name="count_ch" type="hidden" id="count_ch"  />
            <input name="count_carr" type="hidden" id="count_carr" value="<?php echo $count ?>" />
            <input name="id_unidad" type="hidden" id="id_unidad" value="<?php echo $id_unidad ?>"  />
        </label></TD>
          <TD></TD>
      </TR>
      <TR>
        <TD height="10"></TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
        <TD></TD>
      </TR>
      
      
      
      

     </form>
  </TABLE>
</div>
</body>
</html>
