<?php
class inicio extends controller{

	function __construct(){
		parent::__construct();
		
	}
	
	function index($metodo=null) {
		if($metodo==null){
			$this->vista->render("inicio/index",true);
		}else{
			$this->vista->render("inicio/index",false);
			$this->$metodo();
			require "views/footer.php"; 
		}
	}
}
?>