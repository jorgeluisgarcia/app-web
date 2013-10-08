<?php
class error extends controller{
	function __construct() {
		parent::__construct();
		
	}
	
	function index($metodo=null) {
		if($metodo==null){
			$this->vista->render("error/index",true);
		}else{
			$this->vista->render("error/index",false);
			$this->$metodo();
			require "views/footer.php";
		}
	
	}
}