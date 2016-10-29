<?php
    include("clase_consulta_pkpaciente.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Consulta</title>

  <script type="text/javascript">
function validar(formulario)
{

  if(document.getElementById("pk_paciente").value!='0') 
  {
    return (true);
  }
  else
  {
    alert('Debes Seleccionar un Paciente ');
    return false;
  }

}  
</script>
</head>

    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />

<body>
<div class="container">   
<div class="jumbotron">
  
<h3>Consultorio Dental</h3>
<p><a class="btn btn-primary btn-lg glyphicon glyphicon-th" href="../../index.html" role="button"> Inicio</a></p>
</div>
<div class="panel panel-primary">
   <div class="panel-heading">Consulta</div>
<form class="form-horizontal" method="post" action="insertar_historial_paciente.php" onsubmit="return validar(this)">
  <label>Paciente</label>
  <div>
    <select id="pk_paciente" name="fk_paciente">
    <option value="0">Seleccione un Alumno</option>
                <?php
                    $pacientes = obtenerTodosLosPacientes();
                    foreach ($pacientes as $paciente) { 
                        echo '<option value="'.$paciente->valor.'">'.$paciente->mostrar.'</option>';        
                    }
                ?>
    </select>
  </div>
   <br>
              <!-- Text input abono-->

            <label>Sintomas</label>  
              <br>
            <textarea name="sintomas"  rows="3" cols="40"  placeholder="Enfermedad 3" required=""></textarea><br>
              
<br> 
            <label>Se reseta</label>  
              <br>
            <textarea name="receta"  rows="3" cols="40"  placeholder="Enfermedad 3" required=""></textarea><br>
              
<br>
            <label>Foto de diasnostico</label>  
              <br>
          <input name="foto_diagnostico" type="text" placeholder="" required=""> <br>
   
<br>
<button id="button" name="button" class="btn btn-primary btn-lg glyphicon">Guardar Registro</button>
</form>



</div>
</div>
</body>
</html>