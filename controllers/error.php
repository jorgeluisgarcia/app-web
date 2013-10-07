<?php
class error extends controller{
	function __construct() {
		parent::__construct();
		
	}
	
	function index() {
		$this->vista->render("error/index");
	
	}
}