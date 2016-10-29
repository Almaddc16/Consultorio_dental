<?php

require_once('conectar.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Rango de citas </title>
 



</head>
<body>

<div class="container">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Rango horario</h3>
  </div>
  <div class="panel-body">
   <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Nuevo rango de hora</legend>

<!-- Text input-->
<div class="form-group" method="post" action="insertar.php">
  <label class="col-md-4 control-label" for="fecha">Fecha</label>  
  <div class="col-md-4">
  <input id="fecha" name="fecha" type="date" placeholder="" class="form-control input-md">
  <span class="help-block">Fecha</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="entrada">Hora de entrada</label>  
  <div class="col-md-4">
  <input id="entrada" name="entrada" type="time" placeholder="" class="form-control input-md">
  <span class="help-block">hora de entrada</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="salida">Hora de salida</label>  
  <div class="col-md-4">
  <input id="salida" name="salida" type="time" placeholder="" class="form-control input-md">
  <span class="help-block">Hora de salida</span>  
  </div>
</div>

<button id="registrar" name="registrar">Guardar Registro</button>
</form>
</body>
</html>