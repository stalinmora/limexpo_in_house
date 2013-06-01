<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="estilos/limexpo.css"/>
		<link rel="shortcut icon" href="images/favicon.ico"/>

		<!Definicion de librerias js>
		<script type="text/javascript" src="scripts/lib/jquery.js"></script>
		
        <script type="text/javascript" src="scripts/lib/jquery-ui.js"></script>
        
		<!Definicion de Hojas de Cascada>

		<link type="text/css" rel="stylesheet" href="estilos/jquery-ui.css"/>
		<script type="text/javascript">
			$(document).ready(function() {

				var tabTemplate = "<li><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close'>Remove Tab</span></li>", 

                tabindex=0;
                
				// Mostrar las pestañas
				
                $("#menu").accordion();
				$("#tabs").tabs( );
				$("#PartidaArancelaria").click(function(event) {
					alert("Has Pulsado PartidaArancelraia");
				});
				$("#Importadores").click(function(event) {
						addTab("Importador");


				});
				$("#Productos").click(function(event) {
						addTab("Producto");

				});

				$("#Empresas").click(function(event) {

						addTab("Empresa");

				});

				$("#Proveedores").click(function(event) {
						addTab("Proveedor");

				});

				$("#tabs span.ui-icon-close").live("click", function() {
					var panelId = $(this).closest("li").remove().attr("aria-controls");
					$("#" + panelId).remove();

                    tabindex--;
                    $("#tabs").tabs("refresh");

				});

				function addTab(value) {
				    
                    var panelId = $("#Tb_" + value).index();
                    if (panelId != -1)
                    {
                        $( "#tabs" ).tabs( "option", "active", panelId-1 );
                    }
                    else  
                    {
                    
    					var label = value, 
                        id = "Tb_" + value, 
                        li = $(tabTemplate.replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, label)), 
                        tabs = $("#tabs").tabs();
    
    					tabs.find(".ui-tabs-nav").append(li);
    					tabs.append("<div id='" + id + "'><iframe name='iframe" + value + "' width='100%' height='436' frameborder=0  src='mantenimiento/Consulta" + value + ".php' > </iframe></div>");
                        tabs.tabs("refresh");
                        tabindex ++;
                        $( "#tabs" ).tabs( "option", "active", tabindex );
                    }
                   tabs.tabs("refresh");


				}
                
      


			});
		</script>
        <title>.:: LIMEXPO ::.</title>
	</head>	

	<body>
		<div id="pantalla_principal">
			<!Cabecera Principal>
			<header id="Cabecera">
				<table width="1095" height="90" border="0" align ="center" cellpadding="0" cellspacing="0" >
					<tr>
						<th width="115" colspan="2" valign="top"  background="images/bagarriba.png" class="TituloCabecera" scope="col" >
						<p>
							<img src="images/logo-limexpo-blanco.png" width="110" height="85%" />
						</p></th>
						<th height="7%" background="images/bagarriba.png" class="TituloCabecera" scope="col">
						<p>
							Sistema de Liquidaci&oacute;n para Importaciones y Exportaciones
							<br />
						</p> Version (1.0) </th>
					</tr>
				</table>
			</header>

			<!Menu Izquierdo>
			<div id ="menu">
				<!INGRESO>
				<h3><a href="#">Ingreso</a></h3>
				<div id =" sub_menu_ingreso">
					<a href="#">Cambio de Clave</a>
					<br/>
					<a href="#">Configurar Impresora</a>
					<br/>
					<a href="#">Salir</a>
					<br/>
				</div>
				<!CARGAS>
				<h3><a href="#">Cargas</a></h3>
				<div id="sub_menu_cargas">
					<a href="#">Dav / Inventario</a>
					<br />
					<a href="#">Cargas Varias</a>
					<br />
					<a href="#">Administraci&oacute;n Cargas</a>
					<br />
				</div>
				<!MANTENIMIENTO>
				<h3><a href="#">Mantenimiento</a></h3>
				<div id="sub_menu_mantenimeinto">
					<a id ="PartidaArancelaria" href="#">Partidas_Arancelarias</a>
					<br />
					<a id ="Importadores" href="#">Importadores</a>
					<br />
					<a id="Proveedores" href="#">Proveedores</a>
					<br />
					<a id="Empresas" href="#">Empresas</a>
					<br />
					<a id="Productos" href="#">Productos</a>
					<br />
					<a href="#">Catalogos</a>
					<br />
					<a href="#">Categorias</a>
					<br />
					<a href="#">Rubros</a>
					<br />
					<a href="#">Nota de Pedido</a>
					<br />
				</div>
				<!PROCESOS>
				<h3><a href="#">Procesos</a></h3>
				<div id="sub_menu_procesos">
					<a href="#">Costeo Liquidaci&oacute;n</a>
					<br/>
				</div>
				<!ECUAPAS>
				<h3><a href="#">Ecuapass</a></h3>
				<div id ="sub_menu_ecuapass">
					<a href ="#">Generaci&oacute;n Items</a>
					<br/>
					<a href ="#">Generaci&oacute;n Documentos</a>
					<br/>
				</div>

				<!FACTURACION>
				<h3><a href="#">Facturaci&oacute;n</a></h3>
				<div id ="sub_menu_facturacion">
					<a href ="#">Facturaci&oacute;n</a>
					<br/>
				</div>

				<!CONSULTA REPORTES>
				<h3><a href="#">Consulta Reportes</a></h3>
				<div id ="sub_menu_consulta_reportes">
					<a href ="#">Partida Arancelaria</a>
					<br/>
					<a href ="#">Empresa</a>
					<br/>
					<a href ="#">Proveedores</a>
					<br/>
					<a href ="#">Cliente</a>
					<br/>
					<a href ="#">Cargas</a>
					<br/>
				</div>

			</div>

			<div id ="PanelPrincipal">
				<!PanelPrincipal>
				<div id="tabs">
					<ul>
						<li><a href="#Inicio">Inicio</a></li>

					</ul>
					<div id="Inicio">
						<iframe width="100%" height="436"  frameborder=0  src='inicio.php' scrolling="no" >

						</iframe>
					</div>

				</div>

			</div>



		</div>
	</body>
</html>