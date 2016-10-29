<?php
    
    require_once('../db_abstract_model.php');
    
    class Historial_paciente extends DBAbstractModel
    {
        protected $pk_historial;
        public $fecha_consulta;
        public  $fk_paciente;
        public  $sintomas;
        public $receta;
        public $foto_diagnostico;
        #public  $fecha;
      


        
        function __construct()
        {
            $this->db_name = 'consultorio_dental';
        }
        
        public function get($user_pkhistorialpaciente='') 
        {
            if($user_pkabono != ''):
                $this->query = "SELECT pk_historial, fecha_consulta,  fk_paciente, sintomas,  receta, foto_diagnostico
                 FROM historial_paciente WHERE pk_historial_paciente = '$user_pkhistorialpaciente'";
            
                $this->get_results_from_query();
            
            endif;
        
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad=>$valor):
                    $this->$propiedad = $valor;
                endforeach;
            endif; 
        }
        
        public function set($user_data=array())
        { 
            #if(array_key_exists('pk_abono', $user_data)):
                #$this->get($user_data['pk_abono']);
                
                #if($user_data['pk_abono'] != $this->pk_abono):
                    foreach ($user_data as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    $this->query = "INSERT INTO historial_paciente (fecha_consulta, fk_paciente, sintomas, receta, foto_diagnostico) VALUES
                    (now(), '$fk_paciente',  '$sintomas', '$receta', '$foto_diagnostico')";
                    
                    if($this->execute_single_query())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                    #echo"<script>alert('Usted esta siendo redireccionado a la pagina principal')</script>";
                    #endif;
            #endif; 
        }

        public function edit($user_data=array())
        { 
            foreach ($user_data as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            
            $this->query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellido', clave='$clave' WHERE email = '$email' ";
            $this->execute_single_query();
        }
         
        public function delete($user_pkhistorialpaciente='') 
        { 
            $this->query = "DELETE FROM historial_paciente WHERE pk_historial= '$user_pkhistorialpaciente' ";
            $this->execute_single_query();
        }
      
        function __destruct() 
        { 
            unset($this);
        }
    } 
?>