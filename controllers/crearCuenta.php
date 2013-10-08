<?php
class crearCuenta extends controller {
	
	function __construct() {
		parent::__construct();
	
	}
	
	function index($metodo=null) {
		if($metodo==null){
			$this->vista->render("crearCuenta/index",true);
		}else{
			$this->vista->render("crearCuenta/index",false);
			$this->$metodo();
			require "views/footer.php";
		}
	}
	
	function crear() {
		$this->modelo->crear();
	}
	
}