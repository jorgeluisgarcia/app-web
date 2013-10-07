<?php

class ingresar_model extends modelo{
	
	function __construct() {
		parent::__construct();
	}
	
	function ingresar() {
		

		$declaracion=$this->db->prepare("SELECT id_usuarios,nombre,tipo FROM usuarios 
				WHERE nombre =:nombre AND clave =md5(:clave)");
		$declaracion->execute(array(
			':nombre' => $_POST["nombre"],
			':clave' => $_POST["clave"]
		));
		
		$data=$declaracion->fetchAll();
		$conteo=$declaracion->rowCount();
		print_r($data);
		
		$tipo=$data[0][2];
		$nombre=$data[0][1];
		$id=$data[0][0];
		
		
		session::init();
		if($conteo>0){
			//si hay registro
			session::set("ingresado",true);
			session::set("tipo",$tipo);
			session::set("nombre",$nombre);
			session::set("id",$id);
			if($tipo=="usuario"){
				header("location: ".URL."usuario");
			}else{
				header("location: ".URL."administrador");
			}
		}else{
			//si no lo hay
			session::set("ingresado",false);
			header("location: ".URL."usuario");
		}
	}
}
?>