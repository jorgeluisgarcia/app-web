<?php
class crearCuenta extends controller {
	
	function __construct() {
		parent::__construct();
	
	}
	
	function index() {
		$this->vista->render("crearCuenta/index");
	}
	
	function crear() {
		$this->modelo->crear();
	}
	
}