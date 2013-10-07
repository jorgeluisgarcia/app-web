<?php
class crearCuenta extends controller {
	
	function __construct() {
		parent::__construct();
	
	}
	
	function index() {
		$this->vista->render("crearCuenta/index");
	}
	
	
}