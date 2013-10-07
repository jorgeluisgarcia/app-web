<?php

class view {

	function __construct() {
	}
	
	function render($nombre) {
		require 'views/Header.php';
		require 'views/'.$nombre.'.php';
		require 'views/Footer.php';
		
	}
}

?>