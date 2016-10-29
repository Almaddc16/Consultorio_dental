<?php
    
    require_once('../db_abstract_model.php');
    
    class NuevaCita extends DBAbstractModel
    {
         protected $pk_agenda;
         public $fk_paciente;
        public $fecha;
        public $ampm;
        public $h_entrada;
        public $min_entrada;
        public $h_salida;
        public $min_salida;
        
      function __construct()
        {
            $this->db_name = 'consultorio_dental';
        }
        
       public function get($fk_paciente='')
        {
            if($fk_paciente != ''):
                $this->query = "SELECT pk_agenda, fk_paciente, fecha, ampm, h_entrada, min_entrada, h_salida, min_salida  FROM agenda WHERE fk_paciente = '$fk_paciente' ";
            
                $this->get_results_from_query();
            
            endif;
        
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad=>$valor):
                    $this->$propiedad = $valor;
                endforeach;
            endif; 
        }
        
        public function set($agenda=array())
        { 
            if(array_key_exists('fk_paciente', $agenda)):
                $this->get($agenda['fk_paciente']);
                
                if($agenda['fk_paciente'] != $this->fk_paciente):
                    foreach ($agenda as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    $this->query = "INSERT INTO agenda (fk_paciente, fecha, ampm, h_entrada, min_entrada, h_salida, min_salida) VALUES ('$fk_paciente', '$fecha', '$ampm', '$h_entrada', '$min_entrada', '$h_salida', '$min_salida')";
                    $this->execute_single_query();
                    return(true);
                endif;
            endif;

            return (false);
            
        }

        

        public function edit($user_data=array())
        { 
            foreach ($user_data as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            
            $this->query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellido', clave='$clave' WHERE email = '$email' ";
            $this->execute_single_query();
        }
        
        
        public function delete($parametro='') 
        { 
            $this->query = "UPDATE roles SET baja=now() WHERE pk_rol = '$parametro' ";
            $this->execute_single_query();
        }

        function __destruct() 
        { 
            unset($this);
        }
    } 
?>