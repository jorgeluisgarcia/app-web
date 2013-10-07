<?php
class usuario extends controller{

	function __construct(){
		parent::__construct();
		session::init();
		$ingresado=session::get("ingresado");
		$tipo=session::get("tipo");
		if($ingresado==true && $tipo=="usuario"){
			//si entra 
		}else{
			//no entra
			session::destroy();
			header("location:".URL."ingresar");
			exit();
		}
	}
	
	function index() {
		$this->vista->render("usuario/index");
		
	}
	
	function salir() {
		session::destroy();
		header("location:".URL."ingresar");
		exit();
	}
}
?>