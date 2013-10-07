<?php
class administrador extends controller{

	function __construct(){
		parent::__construct();
		session::init();
		$ingresado=session::get("ingresado");
		$tipo=session::get("tipo");
		if($ingresado==true && $tipo=="admin"){
			//si entra 
		}else{
			//no entra
			session::destroy();
			header("location:".URL."ingresar");
			exit();
		}
	}
	
	function index() {
		$this->vista->render("administrador/index");
		
	}
	
	function salir() {
		session::destroy();
		header("location:".URL."ingresar");
		exit();
	}
}
?>