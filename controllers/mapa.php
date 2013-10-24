<?php
class mapa extends controller{
	function __construct() {
		parent::__construct();
		
	}
	
	function index($metodo=null,$parametro=null) {
		if($metodo==null){
			$this->vista->render2("mapa/index");
		}else{
			$this->vista->render2("mapa/index");
			if($parametro!=null){
				$this->$metodo($parametro);
			}else{
				$this->$metodo();
			}
		}
	
	}
	
	function cargarMapa($var='none') {
		echo "informacion: <br>";
		$this->modelo->cargarMapa($var);
	}
	
	function cargarCoord($var='none'){
		$this->modelo->cargarCoord($var);
	}
}