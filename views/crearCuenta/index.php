
<div class="formulario">
<form action="<?php echo URL; ?>crearCuenta/crear" method="post">
<h1>Crear Cuenta</h1>
<p>
<label for="campo1">Nombre</label><br>
<input type="text" id="campo1" name="nombre" required/>
</p>
<p>
<label for="campo2">Correo</label><br>
<input type="text" id="campo2" name="correo" required/>
</p>
<p>
<label for="campo3">Clave</label><br>
<input type="password" id="campo3" name="clave" required/>
</p>
<p>
<input type="submit" value="Registrar" class="enviar"/> 
</p>
</form>
</div>
