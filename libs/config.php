<?php
//este documento funciona como un repertorio de constantes a usar en todos los 
//documentos creados o que son utilizadas mas de una vez
//si cambiamos un valor no hara falta cambiar en cada lugar que se iso referencia 
//al valor de la constante


//constante de la direccion completa
define("URL","http://".$_SERVER['HTTP_HOST']."/app-web/");


//constantes que definiran los campos para ingresar a la BD
define("DB_TYPE","mysql");
define("DB_HOST","localhost");
define("DB_NAME","app-tijuana");
define("DB_USER","root");
define("DB_PASS","")

?>