<html lang="en">
<meta charset="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Modificar</title>
</head>
<body> <!--modifica el fondo de pantalla en  css.css-->


<?php  
require_once "conectar.php"; 

$email = $_GET['email'];

//clase para hacer la consulta
class usuariosModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users($parametro = '') 
    { 
        $result = $this->_db->query("SELECT * FROM usuarios WHERE email ='$parametro'"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$usuarioModel = new usuariosModelo(); 
    $renglon = $usuarioModel->get_users($email); 

    foreach($renglon as $row):
?> 
		<div>
		<form name="formulario" method="post" action="update.php"> 
		<h1>Modificar Persona</h1>
		
		<div style="display:none;">
		<label>ID:</label>
		<input type="text" name="id" id="id" value="<?php echo var_dump($row['id']); ?>"readonly><br>
		</div>
		
		<label>Nombre(s)</label>
		<input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
		
		<label>Apellidos</label>
		<input type="text" name="apellido" value="<?php echo $row['apellidos']; ?>"><br>
		
		<div style="display:none;">
		<label>Correo</label>
		<input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
		</div>
		
		<label>Clave</label>
		<input type="text" name="clave" value="<?php echo $row['clave']; ?>"><br>
<?php 
endforeach
 ?>
 <br>
		<input type="submit" name="boton" value="Actualizar">
		</form>
		</div>

</body>
</html>