<?php

class controller {
	function __construct() {
		$this->vista=new view();
	}
	
	function cargarModelo($nombre) {
		$archivo='models/'.$nombre.'_model.php';
		if(file_exists($archivo)){
			$nombreModelo=$nombre.'_model';
			require 'models/'.$nombre.'_model.php';
			$this->modelo=new $nombreModelo();
		}
	}
}
?>