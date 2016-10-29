<?php
    include("clase_abono_pkpaciente.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>

  <script type="text/javascript">
function validar(formulario)
{

  if(document.getElementById("pk_paciente").value!='0') 
  {
    return (true);
  }
  else
  {
    alert('Debes Seleccionar un Paciente peneque');
    return false;
  }

}  
</script>
</head>
<body>

<form class="form-horizontal" method="post" action="guardar/insertar.php" onsubmit="return validar(this)">
  <label>Paciente</label>
  <div>
    <select id="pk_paciente" name="pk_paciente">
    <option value="0">Seleccione un Alumno</option>
                <?php
                    $pacientes = obtenerTodosLosPacientes();
                    foreach ($pacientes as $paciente) { 
                        echo '<option value="'.$paciente->valor.'">'.$paciente->mostrar.'</option>';        
                    }
                ?>
    </select>
  </div>


<button id="button" name="button">Guardar Registro</button>
</form>
</body>
</html>