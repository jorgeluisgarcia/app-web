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
				<th>Nombre</th><th>Colonia</th><th>Tipo</th><th>Descripcion</th><th>Coordenadas</th><th>Eliminar</th>";
		foreach($datos as $valor){
			echo "<tr>";
			echo "<td>".$valor['nombre']."</td>";
			echo "<td>".$valor['colonia']."</td>";
			echo "<td>".$valor['tipo']."</td>";
			echo "<td>".$valor['descripcion']."</td>";
			if($valor['corrdenadas']=="0000,0000"){
				echo "<td><a href='".URL."mapa/cargarMapa/".$valor['id_registro']."'>Editar</a></td>";
			}else{ 
				$coords=explode(",",$valor['corrdenadas']);
				//echo "<td>".$valor['corrdenadas']."</td>";
				echo "<td>".$coords[0]."<br>".$coords[1]."<br>";
				echo "<a href='".URL."mapa/cargarMapa/".$valor['id_registro']."'>Editar</a></td>";
			}
			echo "<td><a href='".URL."usuario/eliminar/".$valor['id_registro']."'>Eliminar</a></td>";
			echo "<tr>";
		}
		echo "</table>";
	}
	
	function eliminar($var) {
		$declaracion1=$this->db->prepare("SELECT * FROM `registros` where id_registro=:id");
		$declaracion1->execute(array(
				':id' => $var
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion1->fetchAll(PDO::FETCH_ASSOC);
		
		echo "<br>Esta seguro de eliminar el registro: ".$datos[0]["nombre"]." ?";
		echo "<form method='post' action='".URL."usuario/eliminar/".$var."'>";
		echo "<input type='radio' name='group' value='si' checked> Si<br>
				<input type='radio' name='group' value='no'> No<br>";
		echo "<input type='submit' value='aceptar'></form>";
		
		if(isset($_POST['group'])){
			$opcion=$_POST['group'];
			
			if($opcion=="si"){
				$declaracion=$this->db->prepare("DELETE FROM `registros` WHERE `id_registro` = :id");
				$declaracion->execute(array(
						':id' =>$var
				))or die("no se pudo borrar informacion");
				header("location:".URL."usuario/lugares");
			}else{
				header("location:".URL."usuario/lugares");
			}
		}
		
		
	}
	
	
}
?>