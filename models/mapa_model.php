<?php
class mapa_model extends modelo{
	
	function __construct() {
		parent::__construct();
	}
	
	function cargarMapa($var) {
		$declaracion=$this->db->prepare("SELECT nombre,colonia,corrdenadas FROM `registros` where id_registro=:id");
		$declaracion->execute(array(
				':id' => $var
		))or die("no se pudo estraer informacion");
		
		$datos=$declaracion->fetchAll(PDO::FETCH_ASSOC);
		
		//print_r($datos);
		echo $datos[0]['nombre']."<br>";
		echo $datos[0]['colonia']."<br>";
		echo $datos[0]['corrdenadas']."<br>";
		
		echo "<center>";
	
		$colonia=$datos[0]['colonia']." Tijuana";
		
		$ccolonia=str_replace(" ","%20",$colonia);
		$ws= "http://maps.googleapis.com/maps/api/geocode/json?address=".$ccolonia."&sensor=true";
		//echo "<br>codigo de geocode es: ".$ws;
		$json = file_get_contents($ws);
		$info=json_decode($json,true);
	
		//echo "<pre>";
		//print_r($json);
		//print_r($info['results'][0]['geometry']['location']);
		//echo "</pre>";
	
		$lat=$info['results'][0]['geometry']['location']['lat'];
		$lng=$info['results'][0]['geometry']['location']['lng'];
	
		echo "<form method='post' action='".URL."mapa/cargarCoord/".$var."'>";
		echo "<br>coordenadas actuales lat 
				<input type'text' id='lat1' name='lat1' value=".$lat." disabled> 
				lng <input type'text' id='lng1' name='lng1' value=".$lng." disabled>";
		echo "<br>coordenadas Nuevas lat
				 <input type'text' id='lat' name='lat'> 
				lng <input type'text' id='lng' name='lng'>";
		echo "<br><input type='submit' value='cambiar'>";
		echo "<br><font color='red'><b>para obtener las nuevas coordenadas,<br> mueva el marcador atravez del mapa <br>y dar clik cuando este en posicion.</b></font>";
		
		
		echo "</center>";
		echo "</form>
    	<div id=\"map_canvas\" style=\"width:50%; height:50%\"></div>";
		
		echo "<a href='".URL."usuario/lugares'>regresar</a>";
	}
	
	function cargarCoord($var){
		$lat=$_POST["lat"];
		$lng=$_POST["lng"];
		
		$Nvalor=$lat.",".$lng;
		echo $Nvalor;
		$declaracion=$this->db->prepare("UPDATE `registros` SET `corrdenadas`=:Nvalor WHERE `id_registro`=:id");
		$declaracion->execute(array(
				':Nvalor'=>$Nvalor,
				':id' => $var
		))or die("no se pudo estraer informacion");
		
		echo "Se cargaron las coordenadas correctamente";
		echo "<a href='".URL."usuario/lugares'>regresar</a>";
		
	}
}
?>