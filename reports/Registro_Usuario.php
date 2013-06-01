<?php
	  session_start();
	include_once('../class/cls_unidad.php');
	include_once('../class/cls_Permiso.php');
	include_once('../class/cls_sesion.php');
	$sesion=new sesion();	
	$sesion->verifica_sesion();	
	$unidad=new unidad();
	$id_unidad=$_GET['id_unidad'];
	$Unidad=$_GET['Unidad'];
	
	
	$login=$_SESSION['login'];
	
	$permiso=new permisos();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<!-- saved from url=(0056)http://www.edcom.espol.edu.ec/webpages/EdcomHistoria.php -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>.:: Escuela de Diseño y Comunicación Visual ::.</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
 href="../styles/style001.css"
type=text/css rel=stylesheet>

<SCRIPT language=javascript type=text/javascript>


function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

</SCRIPT>

<SCRIPT language=javascript type=text/javascript>
<!---Aquí sitúas el código javascript --->
var mie =(navigator.appName.indexOf("Microsoft")>=0)
var itemOrig;
function despMenu(nombre,sn)
{
obj = document.all[nombre];
if (sn>0)
obj.style.visibility = "visible";
else
{

obj.style.visibility = "hidden";

}
}
function destacar(obj, val)
{
if (val==1)
{
itemOrig = obj.style.color;
obj.style.color="#1C63A5";
}
else
obj.style.color= itemOrig;
}

function focoInicio (formulario)
	{
		//formulario.txtUsuario.focus ();
	}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</SCRIPT>

<SCRIPT language=javascript type=text/javascript>
<!--

function toggleAll(itemname,state){
    tmp = document.getElementsByTagName('div');
    for (i=0;i<tmp.length;i++){
        if (tmp[i].className == itemname) tmp[i].style.display = state;
//	if (tmp[i].className == itemname) alert('toggleAll: ' + tmp[i].id);
    }
}
function toggle(idname){
    document.getElementById(idname).style.display = (document.getElementById(idname).style.display == 'none') ? 'block' : 'none';
}
function toggle2(idname){
    document.getElementById(idname).style.display = (document.getElementById(idname).style.display == 'block') ? 'none' : 'block';
}
function toggleCloseOthers(idname){
    origStatus = (document.getElementById(idname).style.display == 'block') ? 'block' : 'none';
    toggleAll('toggle','none');
    if (origStatus=='none') toggle(idname);
}
function toggleCloseOthers2(selObj){
	idname = selObj.options[selObj.selectedIndex].value;
	origStatus = (document.getElementById(idname).style.display == 'block') ? 'block' : 'none';
//	alert('toggleCloseOthers: ' + document.getElementById(idname).id);
    toggleAll('toggle','none');
    if (origStatus=='none') toggle(idname);
}

function toggleSpecific(tagName, targetClass, prefix, idname) {
    divs = document.getElementsByTagName(tagName);
    for ( i=0; i<divs.length; i++) {
	thisDiv = divs[i];
	if (thisDiv.className == targetClass) {
//	    alert(thisDiv.id);
	    divPrefix = thisDiv.id.substr(0, prefix.length + 1);
	    if (divPrefix == prefix+ ':' ) {
		thisId = thisDiv.id.substr(divPrefix.length);
		thisDiv.style.display = (thisId == idname) ? 'block' : 'none';
	    }
	}
    }
}

function toggleSpecificLayers(targetClass, prefix, idname) {
    toggleSpecific('div', targetClass, prefix, idname);
}
function toggleSpecificSpan(targetClass, prefix, idname) {
    toggleSpecific('span', targetClass, prefix, idname);
}

function metodoclickRadio(value)
{
	document.form1.rdb.value=value;
	if(document.form1.rdb.value=="1")
	{
		
		document.form1.unidad.disabled=false;
		while (document.form1.unidad.length> 0) {
    	document.form1.unidad.remove(0);
		} 
		<? 
		$uni=$unidad->ConsUnidadAcademica();
			$i=0;
		while($uni[$i][0]!=NULL){	
			echo 'document.form1.unidad.options['.$i.']= new Option("'.urldecode($uni[$i][1]).'","'.$uni[$i][0].'",false,false);';
			$i++;
			}
		?>	
		document.getElementById("if_carrera").src = "Registro_Usuario_IN.php?id_unidad="+document.form1.unidad.options[0].value;
					
	}
	else
	{
		while (document.form1.unidad.length> 0) {
    	document.form1.unidad.remove(0);
		}
		document.form1.unidad.disabled=false;
		<? 
		$uni=$unidad->ConsOtraUnidad();
			$i=0;
		while($uni[$i][0]!=NULL){	
			echo 'document.form1.unidad.options['.$i.']= new Option("'.urldecode($uni[$i][1]).'","'.$uni[$i][0].'",false,false);';
			$i++;
			}
		?>	
		document.getElementById("if_carrera").src = "Registro_Usuario_IN.php?id_unidad="+document.form1.unidad.options[0].value;
	}
}

function MetodoChange()
{
document.getElementById("if_carrera").src = "Registro_Usuario_IN.php?id_unidad="+document.form1.unidad.value;
}

function sesion_destruct() {
   
	document.location="../class/IntSesion.php";
}
//-->
</SCRIPT>

<STYLE type=text/css>
.toggle {
	DISPLAY: none; MARGIN: 0px
}



</STYLE>

<SCRIPT language=JavaScript 
 src="../javascript/function001.js" 
type=text/javascript></SCRIPT>
<SCRIPT language=JavaScript1.2 
 src="../javascript/stm31.js" 
type=text/javascript></SCRIPT>

<STYLE type=text/css>
BODY {
	MARGIN: 0px
}
.Estilo2 {
	FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #003a63; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
.Estilo4 {
	FONT-WEIGHT: bold; FONT-SIZE: 9px; COLOR: #999999; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
#Layer1 {
	Z-INDEX: 1; LEFT: 398px; WIDTH: 434px; POSITION: absolute; TOP: 42px; HEIGHT: 546px
}
#Layer2 {
	Z-INDEX: 1; VISIBILITY: hidden; WIDTH: 187px; POSITION: absolute; HEIGHT: 154px
}
#PreGrado {
	Z-INDEX: 1; WIDTH: 200px; POSITION: absolute; HEIGHT: 169px
}
#PreGrado {
	Z-INDEX: 1; VISIBILITY: hidden; WIDTH: 195px; POSITION: absolute; HEIGHT: 176px
}
a:link {
	text-decoration: none;
	color: #333333;
}
a:visited {
	text-decoration: none;
	color: #333333;
}
a:hover {
	text-decoration: none;
	color: #1C63A5;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
.style3 {font-size: 14}
</STYLE>

<SCRIPT language=JavaScript1.2 
 src="../images/stm31(1).js"
type=text/javascript></SCRIPT>

<META content="MSHTML 6.00.2900.2963" name=GENERATOR></HEAD>
<BODY 
onload="javascript:focoInicio (frmacceso);MM_preloadImages('../images/homeOn_21.jpg','../images/homeOn_23.jpg','../images/homeOn_24.jpg','../images/homeOn_25.jpg','../images/homeOn_26.jpg','../images/homeOn_27.jpg','../images/homeOn_28.jpg','../images/homeOn_29.jpg','../images/homeOn_22.jpg')">



<TABLE cellSpacing=0 cellPadding=0 width=769 align=center border=0><!--DWLayoutTable-->
  <TBODY>
  <TR>
    <TD vAlign=top colSpan=2 height=97>
      <TABLE class=Estilo2 cellSpacing=0 cellPadding=0 width="100%" border=0><!--DWLayoutTable-->
        <TBODY>
        <TR>
          <TD width=18 height=28></TD>
          <TD width=244>&nbsp;</TD>
          <TD width=26>&nbsp;</TD>
          <TD width=79>&nbsp;</TD>
          <TD vAlign=top width=61 rowSpan=2><IMG height=49 
             src="../images/homeg_03.jpg"
            width=61></TD>
        </TR>
        <TR>
          <TD height=21></TD>
          <TD vAlign=top colSpan=2 rowSpan=2><A 
            href="http://www.edcom.espol.edu.ec/webpages/index.php"><IMG 
            height=43 
             src="../images/home_09.jpg"
            width=270 border=0></A></TD>
          <TD>&nbsp;</TD></TR>
        <TR>
          <TD height=23></TD>
          <TD></TD>
          <TD vAlign=top rowSpan=2><IMG height=27 
             src="../images/homeg_04.jpg"
            width=61></TD>
        </TR>
        <TR>
          <TD height=4></TD>
          <TD></TD>
          <TD></TD>
          <TD></TD></TR>
        <TR>
          <TD height=21></TD>
          <TD>&nbsp;</TD>
          <TD vAlign=top colSpan=3><IMG height=21 
             src="../images/homeg_05.jpg"
            width=166></TD>
        </TR></TBODY></TABLE></TD>
    <TD vAlign=top width=342>
      <TABLE class=Estilo2 cellSpacing=0 cellPadding=0 width="100%" 
      bgColor=#00a4eb border=0><!--DWLayoutTable-->
        <TBODY>
        <TR>
          <TD width=4 height=17></TD>
          <TD width=337></TD></TR>
        <TR>
          <TD></TD>
          <TD vAlign=top height=64>
            <TABLE class=Estilo2 cellSpacing=0 cellPadding=0 width="100%" 
            bgColor=#00a4eb border=0><!--DWLayoutTable-->
              <TBODY>
              <TR>
                <TD vAlign=top width=36 rowSpan=3><IMG height=63 
                   src="../images/homeg_07.jpg"
                  width=36></TD>
                <TD width=310 height=1></TD></TR>
              <TR>
                <TD vAlign=top height=61>
                  <TABLE class=Estilo2 cellSpacing=0 cellPadding=0 width="100%" 
                  bgColor=#ffffff border=0><!--DWLayoutTable-->
                    <TBODY>
                    <TR>
                      <TD width=188 height=5></TD>
                      <TD width=4></TD>
                      <TD width=66></TD>
                      <TD width=43></TD></TR>
                    <TR>
                      <TD height=2></TD>
                      <TD></TD>
                      <TD vAlign=top rowSpan=3><IMG height=52 
                         src="../images/home_06.gif"
                        width=66></TD>
                      <TD class=Estilo2 vAlign=top bgColor=#003a63 rowSpan=3><!--DWLayoutEmptyCell-->&nbsp;</TD></TR><!--DWLayoutTable-->
                    <TR>
                      <TD vAlign=top height=45>
                        <TABLE class=Estilo2 cellSpacing=0 cellPadding=0 
                        width="100%" bgColor=#ffffff border=0><!--DWLayoutTable-->
                          <FORM name=frmacceso action=# method=post>
                          <TBODY>
                          <TR>
                            <TD width=80 height=3></TD>
                            <TD width=88></TD>
                            <TD width=1></TD>
                            <TD width=15></TD>
                            <TD width=4></TD></TR>
                          <TR>
                            <TD vAlign=center align=left height=20>Usuario:</TD>
                            <TD vAlign=top><INPUT class=borde001 id=txtUsuario 
                              size=15 name=txtUsuario></TD>
                            <TD>&nbsp;</TD>
                            <TD>&nbsp;</TD>
                            <TD>&nbsp;</TD></TR>
                          <TR>
                            <TD height=2></TD>
                            <TD></TD>
                            <TD></TD>
                            <TD></TD>
                            <TD></TD></TR>
                          <TR>
                            <TD class=Estilo2 vAlign=center align=left 
                              rowSpan=3>Contraseña:</TD>
                            <TD vAlign=top rowSpan=3><INPUT class=borde001 
                              id=txtClave type=password size=15 
name=txtClave></TD>
                            <TD height=3></TD>
                            <TD></TD>
                            <TD></TD></TR>
                          <TR>
                            <TD height=14></TD>
                            <TD vAlign=top><IMG height=14 
                               src="../images/home_12.gif" 
                              width=15></TD>
                            <TD></TD></TR>
                          <TR>
                            <TD height=3></TD>
                            <TD></TD>
                            <TD></TD></TR></FORM></TBODY></TABLE></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD height=5></TD>
                      <TD></TD></TR>
                    <TR>
                      <TD height=4></TD>
                      <TD></TD>
                      <TD></TD>
                      <TD></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD height=1></TD></TR><!--DWLayoutTable-->
              <TR>
                <TD height=1></TD>
                <TD></TD></TR><!--DWLayoutTable--></TBODY></TABLE></TD></TR>
        <TR>
          <TD height=16></TD>
          <TD></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD vAlign=top colSpan=3 height=14>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0><!--DWLayoutTable-->
        <TBODY>
        <TR>
          <TD vAlign=top width=769 height=14>
            <SCRIPT language=JavaScript 
             src="../menu/menu.js"
            type=text/javascript></SCRIPT>
          </TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD width=351 height=1></TD>
    <TD width=76></TD>
    <TD></TD></TR>
  <TR>
    <TD vAlign=top height=11>
      <TABLE class=norepeaty cellSpacing=0 cellPadding=0 width="100%" 
       background="../images/homeg_31.jpg"
      border=0><!--DWLayoutTable-->
        <TBODY>
        <TR>
          <TD vAlign=top width=24 height=11><IMG height=11 
             src="../images/homeg_30.jpg"
            width=24></TD>
          <TD width=328></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top colSpan=2 rowSpan=2>
      <TABLE class=norepeaty cellSpacing=0 cellPadding=0 width="100%" 
       background="../images/homeg_37.jpg"
      border=0><!--DWLayoutTable-->
        <TBODY>
        <TR>
          <TD width=184 height=3></TD>
          <TD width=233></TD>
          <TD width=1></TD></TR>
        <TR>
          <TD height=8></TD>
          <TD vAlign=top rowSpan=2>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" bgColor=#00a4eb 
            border=0><!--DWLayoutTable-->
              <FORM name=frmBuscar action=# method=get>
              <TBODY>
              <TR>
                <TD width=41></TD>
                <TD class=Estilo2 vAlign=center align=left width=53 
                  rowSpan=3>Buscar:</TD>
                <TD vAlign=top width=102 rowSpan=3><INPUT class=borde001 
                  id=txtBuscador name=txtBuscador></TD>
                <TD width=4 height=2></TD>
                <TD width=15></TD>
                <TD width=14></TD></TR>
              <TR>
                <TD></TD>
                <TD height=16></TD>
                <TD vAlign=top><IMG height=16 
                    src="../images/home_06.jpg"
                  width=15></TD>
                <TD></TD></TR>
              <TR>
                <TD></TD>
                <TD height=2></TD>
                <TD></TD>
                <TD></TD></TR>
              <TR>
                <TD height=4></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD></TR>
              <TR>
                <TD height=1></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD></TR></FORM></TBODY></TABLE></TD>
          <TD></TD></TR>
        <TR>
          <TD vAlign=top align=right rowSpan=2><IMG height=37 
             src="../images/homeg_33.jpg"
            width=184></TD>
          <TD height=17></TD></TR>
        <TR>
          <TD vAlign=top align=right height=20><IMG height=20 
             src="../images/homeg_36.jpg"
            width=233></TD>
          <TD></TD></TR>
        <TR>
          <TD height=18></TD>
          <TD></TD>
          <TD></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD height=55>&nbsp;</TD></TR></TBODY></TABLE>
<TABLE height=306 cellSpacing=0 cellPadding=0 width=798 align=center border=0><!--DWLayoutTable-->
  <TBODY>
  <TR>
    <TD vAlign=top colSpan=2 height=147>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 ><!--DWLayoutTable-->
        <TBODY>
        <TR>
    <TD height=124 colSpan=2 vAlign=top>
      <TABLE cellSpacing=0 cellPadding=0 width="95%" border=0 >
        <!--DWLayoutTable-->
        <TBODY>
          <TR>
            <TD width=4 
          height=36>&nbsp;</TD>
            <TD width=9>&nbsp;</TD>
            <TD width=197 valign="top"><p align="left">
					    <em>Usuario:</em> <b><?php echo $login.'-'.$permiso->Cons_desc_permiso($login);?></b><br>
					     <center>
                      <a href=#  onClick="sesion_destruct()" ><font color="#0000FF"><u>cerrar_sesi&oacute;n </u></font> </a>
                    </center><br>
            </p>              </TD>
            <TD width=10>&nbsp;</TD>
          </TR>
          <TR>
            <TD 
          height=50>&nbsp;</TD>
            <TD colspan="2" vAlign=top 
           background="../images/home_42.jpg" class=CeldaIzquierdaPortafolio>
                <TABLE class=BordeOpcionesWeb cellSpacing=0 cellPadding=0  
            width="100%" border=0>
                  <!--DWLayoutTable-->
                  <TBODY >
                    <TR>
                      <TD width="10" height=14 vAlign=top class=CeldaIzquierdaPortafolio><!--DWLayoutEmptyCell-->&nbsp;</TD>
                    <TD width="218" vAlign=top class=CeldaIzquierdaPortafolio><FONT 
                  title="Ranking: 400" 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#000000><A 
                  class=Link 
                  onmouseover="rollover_links(-1,4)?this.style.color='#1C63A5':null;" 
                  onmouseout="rollover_links(-1,4)?this.style.color='#000000':null;" 
                  href="Registro_Usuario.php" >&nbsp;&nbsp;:&nbsp;Registro de Usuario</a></FONT></TD></TR>
                    <TR>
                      <TD width="10" height=14 vAlign=top class=CeldaIzquierdaPortafolio><!--DWLayoutEmptyCell-->&nbsp;</TD>
                    <TD width="218" vAlign=top class=CeldaIzquierdaPortafolio><FONT 
                  title="Ranking: 400" 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#000000><A 
                  class=Link 
                  onmouseover="rollover_links(-1,4)?this.style.color='#1C63A5':null;" 
                  onmouseout="rollover_links(-1,4)?this.style.color='#000000':null;" 
                  href="Elimina_Usuario.php" >&nbsp;&nbsp;:&nbsp;Eliminaci&oacute;n de Usuario</a></FONT></TD></TR>
                    <TR>
                      <TD class=CeldaIzquierdaPortafolio vAlign=top height=14><!--DWLayoutEmptyCell-->&nbsp;</TD>
                      <TD class=CeldaIzquierdaPortafolio vAlign=top><FONT 
                  title="Ranking: 302" 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#000000><A 
                  class=Link 
                  onmouseover="rollover_links(-1,4)?this.style.color='#1C63A5':null;" 
                  onmouseout="rollover_links(-1,4)?this.style.color='#000000':null;" 
                   href="Registro_Unidad.php" >&nbsp;&nbsp;:&nbsp;Mantenimiento Unidad</A></FONT></TD>
                    </TR>
					<TR>
                      <TD class=CeldaIzquierdaPortafolio vAlign=top height=14><!--DWLayoutEmptyCell-->&nbsp;</TD>
                      <TD class=CeldaIzquierdaPortafolio vAlign=top><FONT 
                  title="Ranking: 302" 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#000000><A 
                  class=Link 
                  onmouseover="rollover_links(-1,4)?this.style.color='#1C63A5':null;" 
                  onmouseout="rollover_links(-1,4)?this.style.color='#000000':null;" 
                   href="Cambio_Clave.php" >&nbsp;&nbsp;:&nbsp;Cambio de Contraseña</A></FONT></TD>
                    </TR>
                    <TR><TD class=CeldaIzquierdaPortafolio vAlign=top height=14><!--DWLayoutEmptyCell-->&nbsp;</TD>
                      <TD class=CeldaIzquierdaPortafolio vAlign=top><FONT 
                  title="Ranking: 302" 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#000000>
                    <A 
                  class=Link 
                  onmouseover="rollover_links(-1,4)?this.style.color='#1C63A5':null;" 
                  onmouseout="rollover_links(-1,4)?this.style.color='#000000':null;" 
                   href="Generapdf.php">&nbsp;&nbsp;:&nbsp;PDF</A></FONT></TD></TR>
                  </TBODY>
                                                                                    </TABLE></TD>
              <TD>&nbsp;</TD>
          </TR>
          </TBODY>
      </TABLE></TD></TBODY></TABLE></TD>
    <TD width=528 rowSpan=3 vAlign=top>
      <div align="center">
        <TABLE width="100%" border=0 cellPadding=0 cellSpacing=0 class="BordeIzq001">
          <!--DWLayoutTable aqui-->
          <TBODY>  
            <tr><td width="3" height="32"></td>
              <td colspan="3" valign="top" class="bordeBottom"><div align="center" class="TitleTextforum">Registro de Usuario</div></td>
              <td width="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="14"></td>
              <td width="1"></td>
              <td width="100%"></td>
              <td width="3"></td>
              <td></td>
            </tr>
            
            <tr>
              <td height="22"></td>
              <td></td>
              <td align="left" valign="middle"><form name="form1" method="post" action="">
                  <span class="textForum">&nbsp;&nbsp;&nbsp;&nbsp;Seleccione una Unidad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="rdb" type="radio" onClick="metodoclickRadio(1)" />
Acad&eacute;mica
<input name="rdb" type="radio" onClick="metodoclickRadio(2)"/>
Otra
<select name="unidad" disabled="true"  onchange="MetodoChange()">
  <option value="aa" id="00"  label="esa mias"> Ecoja una</option>
</select>
                  </span></form>                </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            
            <TR>
              <TD height="400" colspan="5"><iframe name="if_carrera"  
       src="Registro_Usuario_IN.php?id_unidad=<?PHP echo $id_unidad ?>" frameborder=0 
      width="100%" height="100%"></iframe></TD>
              </TR>
            <tr><td height="18">
              <td>              
              <td>              
              <td>              
              <td>              
            </TBODY>
          </TABLE>
      </div></TD>
    <TD width=15>&nbsp;</TD>
    </TR>
  <TR>
    <TD width=219 height="200">&nbsp;</TD>
    <TD width=30>&nbsp;</TD>
    <TD>&nbsp;</TD>
    </TR>
  <TR>
    <TD rowSpan=2 vAlign=bottom><IMG height=228 
       src="../images/portafolio38.jpg"
      width=219></TD>
    <TD height="165">&nbsp;</TD>
    <TD>&nbsp;</TD>
  </TR>
  
  <TR>
    <TD height=133 colSpan=2 vAlign=top><IMG height=133 
       src="../images/portafolio40.jpg"
      width=550></TD>
    <TD width="6">&nbsp;</TD>
    <TD>&nbsp;</TD>
  </TR>
  <tr>
    <td height="1"></td>
    <td></td>
    <td width="528"></td>
    <td></td>
    <td></td>
  </tr>
  </TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=771 align=center border=0><!--DWLayoutTable-->
  <TBODY>
  <TR>
    <TD height=28 colSpan=3 vAlign=top>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" 
       background="../images/homeg_73.jpg"
      border=0>
        <!--DWLayoutTable-->
        <TBODY>
          <TR>
            <TD vAlign=top width=100 height=28><IMG height=28 
             src="../images/homeg_72.jpg"
            width=102></TD>
            <TD width=500>&nbsp;</TD>
            <TD class=Estilo2 vAlign=center align=right width=156>© Base de 
              Datos EDCOM </TD>
            <TD vAlign=top width=15><IMG height=28 
             src="../images/homeg_75.jpg"
            width=27></TD>
          </TR></TBODY>
      </TABLE></TD>
    </TR>
  <TR>
    <TD width="7" height=14></TD>
    <TD width="749" align=middle vAlign=center><SPAN class=Estilo4>EDCOM - ESPOL / Campus 
      " Las Peñas " / Malecón 100 y Loja / Telfs: 2530377 - 372 - 565 / Fax: 
      2530029 / Derechos Registrados ®</SPAN></TD>
    <TD width="15"></TD>
  </TR>
  </TBODY></TABLE>
</BODY></HTML>
