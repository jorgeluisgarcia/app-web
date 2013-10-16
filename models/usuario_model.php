<?php
class usuario_model extends modelo{
	
	function __construct() {
		parent::__construct();
	}
	
	function registrar() {
		$declaracion=$this->db->prepare("INSERT INTO `registros`(`id_usuario`, `nombre`, `colonia`, `tipo`, `descripcion`, `corrdenadas`) 
				VALUES (:id,:nombre,:colonia,:tipo,:descripcion,:coordenadas)");
		
		$declaracion->execute(array(
				':id' => session::get('id'),
				':nombre' => $_POST["nombre"],
				':colonia' => $_POST["colonia"],
				':tipo' => $_POST["tipo"],
				':descripcion' => $_POST["descripcion"],
				':coordenadas' => "0000,0000"
		))or die("no se pudo crear");
		
	}
	
	function lugares() {
		$declaracion=$this->db->prepare("SELECT * FROM `registros` where id_usuario=:id");
		$declaracion->execute(array(
				':id' => session::get('id'),
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion->fetchAll(PDO::FETCH_ASSOC);
		
		echo "<br><table>
				<th>Nombre</th><th>Colonia</th><th>Tipo</th><th>Descripcion</th><th>Coordenadas</th>";
		foreach($datos as $valor){
			echo "<tr>";
			echo "<td>".$valor['nombre']."</td>";
			echo "<td>".$valor['colonia']."</td>";
			echo "<td>".$valor['tipo']."</td>";
			echo "<td>".$valor['descripcion']."</td>";
			echo "<td>".$valor['corrdenadas']."</td>";
			echo "<tr>";
		}
		echo "</table>";
	}
	
}
?>