<?php
    include("con_combobox.php");

    class Paciente {
        public $valor;
        public $mostrar;

        function __construct($valor, $mostrar) {
            $this->valor = $valor;
            $this->mostrar = $mostrar;
        }
    }

    // esta función se va a llamar al cargar el primer combo
    function obtenerTodosLosPacientes() 
    {
        $arreglo_pacientes = array();
        $sql = "SELECT pk_paciente, nombre
                FROM paciente order by nombre ASC"; 

        $db = obtenerConexion();

        // obtenemos todos los alumnos
        $result = ejecutarQuery($db, $sql);

        // creamos objetos de la clase alumno y los agregamos al arreglo
        while($row = $result->fetch_assoc()){
            $row['nombre'] = mb_convert_encoding($row['nombre'], 'UTF-8', mysqli_character_set_name($db));          
            $paciente = new Paciente($row['pk_paciente'], $row['nombre']);
            array_push($arreglo_pacientes, $paciente);
        }

        cerrarConexion($db, $result);

        // devolvemos el arreglo
        return $arreglo_pacientes;
    }

?>