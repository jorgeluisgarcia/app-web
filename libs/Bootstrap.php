<?php


class Bootstrap{
	

	function __construct() {
		

		$url= isset($_GET['url'])?$_GET['url']: null;

		$url=rtrim($url,'/');
		$url=explode('/',$url);

		if(empty($url[0])){
			require 'controllers/inicio.php';
			$controlador=new inicio();
			$controlador->index();
			return false;
		}

		$archivo='controllers/'.$url[0].'.php';
		if(file_exists($archivo)){
			require $archivo;
		}else{
			$this->llamarError();
			return false;
		}

		$controlador=new $url[0]();
		$controlador->cargarModelo($url[0]);

		if(isset($url[1])){
			if(method_exists($controlador,$url[1])){
				if(isset($url[2])){
					$controlador->$url[1]($url[2]);
				}else{
					$controlador->$url[1]();
				}
			}else{
				$this->llamarError();
				return false;
			}
		}
		
		$controlador->index();
		
	}
	
	function llamarError() {
		require 'controllers/error.php';
		$controlador=new error();
		$controlador->index();
	}
}
?>