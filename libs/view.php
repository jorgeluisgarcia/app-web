<?php

class view {

	function __construct() {
		
	}
	
	function render($nombre,$footer=false) {
		require "views/header.php";
		require 'views/'.$nombre.'.php';
		if($footer=="true"){
			require "views/footer.php";
		}
	}
}

?>