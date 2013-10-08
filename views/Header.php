<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>APP TIJUANA</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/1.css" type="text/css"/>

</head>
<?php session::init();?>
<body>
<div id="header">
  <h1>APP TIJUANA</h1>
  <h3>una vista de Tijuana</h3>
  <ul id="nav">
  <?php if(session::get("ingresado")==false){?>
    <li><a href="<?php echo URL;?>inicio">Inicio</a></li>
    <li><a href="<?php echo URL;?>ayuda">Acerca de</a></li>
    <li><a href="<?php echo URL;?>crearCuenta">Crear Cuenta</a></li>
    <li><a href="<?php echo URL;?>ingresar">Login</a></li>
    <li><a href="<?php echo URL;?>contactanos">Contactanos</a></li>
    <?php }else{ if(session::get("tipo")=="usuario"){?>
    <li><a href="<?php echo URL;?>inicio">Inicio</a></li>
    <li><a href="<?php echo URL;?>ayuda">Acerca de</a></li>
    <li><a href="<?php echo URL;?>usuario"><?php echo session::get("nombre");?></a></li>
    <li><a href="<?php echo URL;?>usuario/salir">salir</a></li>
    <li><a href="<?php echo URL;?>contactanos">Contactanos</a></li>
    <?php }else{?>    
    <li><a href="<?php echo URL;?>inicio">Inicio</a></li>
    <li><a href="<?php echo URL;?>ayuda">Acerca de</a></li>
    <li><a href="<?php echo URL;?>administrador"><?php echo session::get("nombre");?></a></li>
    <li><a href="<?php echo URL;?>administrador/salir">salir</a></li>
    <li><a href="<?php echo URL;?>contactanos">Contactanos</a></li>
    <?php }}?>
    
  </ul>
</div>
<div id="container">
  <div id="content">
