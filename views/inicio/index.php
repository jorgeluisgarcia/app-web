<?php 
if(session::get("ingresado")==true){
	$tipo=session::get("tipo");
	if($tipo=="admin"){
?>
<center>
<h1>Bienvenido al Sistema</h1>
Has ingresado como Administrador
<br><br>
 <a class="submit2" href="<?php echo URL; ?>administrador">Cuenta</a>
</center>
<?php }elseif ($tipo=="user"){
?>
<center>
<h1>Bienvenido al Sistema</h1>
Has ingresado como usuario
<br><br>
 <a class="submit2" href="<?php echo URL; ?>usuario">Cuenta</a>
</center>
<?php 
}
}else{
?>
<center>
<h1>Bienvenido al Sistema</h1>
Aun no ingresas da click aqui
<br><br>
 <a class="submit2" href="<?php echo URL; ?>ingresar">Ingresar</a>
</center>
<?php } ?>