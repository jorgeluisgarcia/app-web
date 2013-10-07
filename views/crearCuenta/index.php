<center>
<h1>Crear cuenta</h1>
</center>

<form action="<?php echo URL; ?>crearCuenta/crear" method="post">
<h1>Formulario de prueba</h1>
<p>
<label for="campo1">Nombre</label>
<input type="text" id="campo1" name="nombre" required/>
</p>
<p>
<label for="campo2">Correo</label>
<input type="text" id="campo2" name="correo" required/>
</p>
<p>
<label for="campo3">Clave</label>
<input type="password" id="campo3" name="clave" required/>
</p>
<p>
<input type="submit" value="Registrar"/> 
</p>
</form>
