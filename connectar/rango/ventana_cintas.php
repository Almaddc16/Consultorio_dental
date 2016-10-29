<?php  
require_once "../conectar.php"; 

$pk_paciente = $_GET['pk_paciente'];

//clase para hacer la consulta
class pModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users($parametro = '') 
    { 
        $result = $this->_db->query("SELECT * FROM paciente where pk_paciente='$parametro'"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$pModel = new pModelo(); 
    $p_users = $pModel->get_users($pk_paciente); 



?> 


<!doctype html lang="es">
<html>
<head>
    <title>Expediente personal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

    </head>
    <body>


 <?php 
    
    foreach($p_users as $row):

?>
<div class="container">
<div class="page-header">
<!--voton para ir a inicio-->
<a href="../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>

<!--voton para añadir foto-->
<a href="../../index.html"><button class="btn btn-primary" type="button">
  Añadir nueva foto <span class="btn-lg glyphicon glyphicon-camera"></span>
</button>
</a>
<!--voton para añadir foto-->
<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal2">
  Nueva consulta <span class="btn-lg glyphicon glyphicon-plus"></span>
</button>
</a>
 <!-- Button trigger modal -->
<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  Abonar<span class="btn-lg glyphicon glyphicon-usd"></span>
</button>
</a>

<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#cita">
  Nueva cita<span class="btn-lg glyphicon glyphicon-calendar"></span>
</button>
</a>
<!--voton para modificar-->
<a href="#"><button class="btn btn-primary" type="button">
  Modificar <span class="btn-lg glyphicon glyphicon-pencil"></span>
</button>
</a>
</div>
</div>
<div class="container">
    <div><!-- para nueva cita-->

<div class="modal fade" id="cita"tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user"></span> Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?></h4>
      </div>
      <div class="modal-body">

         <!---->

                    <form class="form-horizontal" method="post" action="../agenda/insertarcita.php">



            <!-- Form Name -->

<div class="form-group" style="display:none;">
                      <label class="col-md-4 control-label" for="textinput">PK_Paciente:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  name="fk_paciente" value="<?php echo"".$row['pk_paciente'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block"></span>  
                      </div>
                    </div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha">Fecha</label>  
  <div class="col-md-4">
  <input id="fecha" name="fecha" type="date" placeholder="" class="form-control input-md" required="">
  <span class="help-block">Seleccione la fecha de cita</span>  
  </div>
</div>
<fieldset>

<!-- Form Name -->
<legend>Datos entrada</legend>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="h_entrada">Hora de entrada</label>
  <div class="col-md-4">
    <select id="h_entrada" name="h_entrada" class="form-control">
      <option value="0"></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
     <option value="11">12</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="min_entrada">Minuto:</label>
  <div class="col-md-4">
    <select id="min_entrada" name="min_entrada" class="form-control">
     <option value="0">00</option>
      <option value="5">5</option>

      <option value="15">15</option>

      <option value="25">25</option>

      <option value="35">35</option>

      <option value="45">45</option>

    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ampm">AM - PM</label>
  <div class="col-md-4">
    <select id="ampm" name="ampm" class="form-control">
      <option value="am">am</option>
      <option value="pm">pm</option>
    </select>
  </div>
</div>

</fieldset>
<fieldset>

<!-- Form Name -->
<legend>Datos Salida</legend>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="h_entrada">Hora de entrada</label>
  <div class="col-md-4">
    <select id="h_salida" name="h_salida" class="form-control">
      <option value="0"></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
     <option value="11">12</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="min_entrada">Minuto:</label>
  <div class="col-md-4">
    <select id="min_salida" name="min_salida" class="form-control">
      <option value="0">00</option>
      <option value="5">5</option>

      <option value="15">15</option>

      <option value="25">25</option>

      <option value="35">35</option>

      <option value="45">45</option>

    </select>
  </div>
</div>
<p id ="mensaje"> <span></span></p>
</fieldset>



<input  id="registrar" type="submit"class="btn btn-primary">
</form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div><!-- div para cerrar cita-->

</div>

</html>