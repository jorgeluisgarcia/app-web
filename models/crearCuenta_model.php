<?php
class crearCuenta_model extends modelo{

	function __construct() {
		parent::__construct();
	}
	
	function crear() {
		$declaracion=$this->db->prepare("INSERT INTO `usuarios`(`nombre`, `correo`, `clave`, `tipo`) 
				VALUES (:nombre,:correo,md5(:clave),:tipo)");
		
		$declaracion->execute(array(
			':nombre' => $_POST["nombre"],
			':correo' => $_POST["correo"],
			':clave' => $_POST["clave"],
			':tipo' => "usuario"
		))or die("<center>no se ha podido crear el Usuario ".$_POST["nombre"]."</center>");
	}

}
?>