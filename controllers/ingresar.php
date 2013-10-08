<?php
class ingresar extends controller {
	function __construct() {
		parent::__construct();
		
	}
	
	function index($metodo=false) {
		if($metodo==null){
			$this->vista->render("ingresar/index",true);
		}else{
			$this->vista->render("ingresar/index",false);
			$this->$metodo();
			require "views/footer.php";
		}
		
	}
	
	function ingresar() {
		$this->modelo->ingresar();
	}
	
}
?>