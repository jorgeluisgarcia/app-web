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
	
	function index($metodo=null) {
	if($metodo==null){
			$this->vista->render("administrador/index",true);
		}else{
			$this->vista->render("administrador/index",false);
			$this->$metodo();
			require "views/footer.php"; 
		}
		
	}
	
	function salir() {
		session::destroy();
		header("location:".URL."ingresar");
		exit();
	}
}
?>