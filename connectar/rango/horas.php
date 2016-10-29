<?php require_once('conectar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Rango de citas </title>
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
    <script type="text/javascript" src="js/jquery.js"></script>
        <script>
          $(function(){
            $('#registrar').on('click', function(e){
              e.preventDefault();

              var nombre = $('#nombre').val();
              var entrada = $('#entrada').val();
              var salida = $('#salida').val();

              $.ajax({
                  type: "POST",
                  url: "insertarPorque.php",
                  data: ('nombre='+nombre+'&entrada='+entrada+'&salida='+salida),
                  beforeSend: function(){
                    $('#mensaje').html('Verificando ...');
                  },
                success: function(respuesta){
                  if(respuesta==1){
                    ('#mensaje').html('se registro');
                  }
                
                else{
                  $('#mensaje').html('no se registro');
                }
              }
              })

            })
          })
        </script>



</head>
<body>

<div class="container">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Rango horario</h3>
  </div>
  <div class="panel-body">
   <form class="form-horizontal" method="post" action="insertar.php">
<fieldset>

<!-- Form Name -->
<legend>Nuevo rango de hora</legend>

<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="fecha">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md">
 
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

<!-- Button -->
<input  id="registrar" type="submit">
<p id="mensaje"> </p>
</fieldset>
</form>


  </div>
</div>
</div>

</body>

</html>