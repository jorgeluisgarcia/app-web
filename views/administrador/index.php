<center>
<h1>Bienvenido: <?php echo session::get("nombre");?></h1>
</center>
<ul id='nav'>
<li><a href="<?php echo URL?>administrador/usuarios">Usuarios</a></li>
<li><a href="<?php echo URL?>administrador/registros">Registros</a></li>
</ul>