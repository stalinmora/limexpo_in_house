<?php
/**
 * Funcion de php que recibe los valores de la pagina html mediante ajax
 *
 * Recibimos mediante post la variable value ($_POST["value"]) con el contenido
 * que hay en el input de la pagina.
 * Aqui podemos trabajar con el valor en php para guardarlo en la base de datos,
 * hacer consultas a la base de datos, crar variables de session o cookies, 
 * o simplemente para crear un contenido y devolver a la pagina html de donde
 * fue llamado.
 *
 * Podemos devolver dos valores:
 *  error = determina que hay algun error
 *  texto = contenido a mostrar en la pagina html
 */

$error="";
$texto="";

$var = $_POST["value"];

if(!$var)
{
    $error="El input esta vacio. Por favor introduce un valor";
}else{
    $var = $var;
}

echo json_encode(array("error"=>$error, "texto"=>$var));
?>
