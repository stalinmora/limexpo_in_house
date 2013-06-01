<?php
    header("Content-type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: filename=Importadores.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	echo $_POST['buttonExcel'];
?>