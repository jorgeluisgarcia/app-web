<?php
class inicio extends controller{

	function __construct(){
		parent::__construct();
		
	}
	
	function index() {
		$this->vista->render("inicio/index");
		
	}
}
?>