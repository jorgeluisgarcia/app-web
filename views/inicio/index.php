<?php 
session::init();
if(session::get("ingresado")==true){
	$tipo=session::get("tipo");
	if($tipo=="admin"){
?>
<center>
<h1>Bienvenido al Sistema</h1>
Has ingresado como Administrador
<br><br>
 <div class="enviar2">
 <a class="env" href="<?php echo URL; ?>administrador">Cuenta</a>
 </div>
</center>
<?php }elseif ($tipo=="usuario"){
?>
<center>
<h1>Bienvenido al Sistema</h1>
Has ingresado como usuario
<br><br>
 <div class="enviar2">
 <a class="env" href="<?php echo URL; ?>usuario">Cuenta</a>
 </div>
</center>
<?php 
}
}else{
?>
<center>
<h1>Bienvenido al Sistema</h1>
Aun no ingresas da click aqui
<br><br>
<div class="enviar2">
 <a class="env" href="<?php echo URL; ?>ingresar">Ingresar</a>
 </div>
</center>
<?php } ?>