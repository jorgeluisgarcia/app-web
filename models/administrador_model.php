<?php
class administrador_model extends modelo{
	
	function __construct() {
		parent::__construct();
	}
	
	function usuarios() {
		$declaracion=$this->db->prepare("SELECT * FROM usuarios ORDER BY tipo");
		$declaracion->execute()or die("no se pudo estraer informacion");
		
		$datos=$declaracion->fetchAll(PDO::FETCH_ASSOC);
		
		//print_r($datos);
		
		echo "<br><table>
				<th>Id</th><th>Nombre</th><th>Correo</th><th>Eliminar</th>";
		foreach($datos as $valor){
			echo "<tr>";
			echo "<td>".$valor['id_usuarios']."</td>";
			echo "<td>".$valor['nombre']."</td>";
			echo "<td>".$valor['correo']."</td>";
			if($valor['tipo']=="admin"){
				echo "<td>Administrador</td>";
			}else{
				echo "<td><a href='".URL."administrador/eliminarU/".$valor['id_usuarios']."'>Eliminar</a></td>";
			}
			echo "<tr>";
		}
		echo "</table>";
	}
	
	function registros() {
		$declaracion=$this->db->prepare("SELECT * FROM registros");
		$declaracion->execute()or die("no se pudo estraer informacion");
		
		$datos=$declaracion->fetchAll(PDO::FETCH_ASSOC);
		
		//print_r($datos);
		
		echo "<br><table>
				<th>Id</th><th>Usuario</th><th>Lugar</th><th>Colonia</th><th>Tipo</th><th>Descripcion</th><th>Elminar</th>";
		foreach($datos as $valor){
			echo "<tr>";
			echo "<td>".$valor['id_registro']."</td>";
			echo "<td>".$this->obtUser($valor['id_usuario'])."</td>";
			echo "<td><a href='".URL."administrador/ver/".$valor["id_registro"]."'>".$valor['nombre']."</a></td>";
			echo "<td>".$valor['colonia']."</td>";
			echo "<td>".$valor['tipo']."</td>";
			echo "<td>".$valor['descripcion']."</td>";
			echo "<td><a href='".URL."administrador/eliminarR/".$valor['id_registro']."'>Eliminar</a></td>";
			echo "<tr>";
		}
		echo "</table>";
	}
	
	function obtUser($var) {
		$declaracion=$this->db->prepare("SELECT * FROM usuarios where id_usuarios = :id");
		$declaracion->execute(array(
			':id'=>$var
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion->fetchAll(PDO::FETCH_ASSOC);
		
		return $datos[0]['nombre'];
	}
	
	function ver($var) {
		$declaracion=$this->db->prepare("SELECT * FROM registros where id_registro=:id");
		$declaracion->execute(array(
			':id'=>$var
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion->fetchAll(PDO::FETCH_ASSOC);
		
		//print_r($datos);
		$coords=explode(",",$datos[0]["corrdenadas"]);
		$colonia=$datos[0]["colonia"];
		$ccolonia=str_replace(" ","%20",$colonia);
		
		echo "col: ".$colonia."<br>";
		echo "Lat: ".$coords[0]."<br>";
		echo "Lng: ".$coords[1]."<br>";
		
		echo "<img src='http://maps.googleapis.com/maps/api/staticmap?center=".$coords[0].",".$coords[1]."&zoom=15&size=600x300&
				&markers=color:blue%7Clabel:C%7C".$coords[0].",".$coords[1]."&sensor=false'>";
	}
	
	function eliminarU($var) {
		
		$declaracion1=$this->db->prepare("SELECT * FROM `usuarios` where id_usuarios=:id");
		$declaracion1->execute(array(
				':id' => $var
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion1->fetchAll(PDO::FETCH_ASSOC);
		
		echo "<br>Esta seguro de eliminar el Usuario: ".$datos[0]["nombre"]." ?";
		echo "<form method='post' action='".URL."administrador/eliminarU/".$var."'>";
		echo "<input type='radio' name='group' value='si' checked> Si<br>
				<input type='radio' name='group' value='no'> No<br>";
		echo "<input type='submit' value='aceptar'></form>";
		
		if(isset($_POST['group'])){
			$opcion=$_POST['group'];
			
			if($opcion=="si"){
				$declaracion=$this->db->prepare("DELETE FROM `usuarios` WHERE `id_usuarios` = :id");
				$declaracion->execute(array(
						':id' =>$var
				))or die("no se pudo borrar informacion");
				header("location:".URL."administrador/usuarios");
			}else{
				header("location:".URL."administrador/usuarios");
			}
		}
	}
	
	function eliminarR($var) {
		$declaracion1=$this->db->prepare("SELECT * FROM `registros` where id_registro=:id");
		$declaracion1->execute(array(
				':id' => $var
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion1->fetchAll(PDO::FETCH_ASSOC);
		
		echo "<br>Esta seguro de eliminar el registro: ".$datos[0]["nombre"]." ?";
		echo "<form method='post' action='".URL."administrador/eliminarR/".$var."'>";
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
				header("location:".URL."administrador/registros");
			}else{
				header("location:".URL."administrador/registros");
			}
		}
	}
}
?>