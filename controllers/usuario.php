<?php
class usuario extends controller{

	function __construct(){
		parent::__construct();
		session::init();
		$ingresado=session::get("ingresado");
		$tipo=session::get("tipo");
		if($ingresado==true && $tipo=="usuario"){
			//si entra 
		}else{
			//no entra
			session::destroy();
			header("location:".URL."ingresar");
			exit();
		}
	}
	
	function index($metodo=null) {
		if($metodo==null){
			$this->vista->render("usuario/index",true);
		}else{
			$this->vista->render("usuario/index",false);
			$this->$metodo();
			require "views/footer.php";
		}
	}
	
	function salir() {
		session::destroy();
		header("location:".URL."ingresar");
		exit();
	}
	
	function formulario() {
		echo "
		<div class='formulario'>
		<form action='".URL."usuario/registrar' method='post'>
		<h1>Crear Cuenta</h1>
		
		<label for='campo1'>Nombre</label><br>
		<input type='text' id='campo1' name='nombre'/><br>
		
		
		<label for='campo2'>Colonia</label><br>
		<input type='text' id='campo2' name='colonia' /><br>
		
		<label for='campo3'>Tipo</label><br>
		<select name='tipo' id='campo3'>
  		<option value='Bar'>Bar</option> 
  		<option value='Restaurante'>Restaurante</option>
  		<option value='Evento'>Evento</option>
		<option value='Otro'>Otro</option>
		</select><br>
		
		<label for='campo4'>Descripcion</label><br>
		<textarea id='campo4' name='Descripcion'rows=5 cols=25 ></textarea><br>
				
		<input type='submit' value='Registrar' class='enviar'/>
		
		</form>
		</div>";
	}
	
	function registrar() {
		$this->modelo->registrar();
	}
}
?>