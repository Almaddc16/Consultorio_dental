<?php
    
    require_once('../db_abstract_model.php');
    
    class Agenda extends DBAbstractModel
    {
        protected $pk_agenda;
        public  $fk_paciente;
        public  $fecha;
        public $entrada;
        public $salida;

        #public  $fecha;
      


        
        function __construct()
        {
            $this->db_name = 'consultorio_dental';
        }
        
        public function get($user_paciente='') 
        {
            if($user_paciente!= ' '):
                $this->query = "SELECT fk_paciente, fecha, entrada, salida, 
                 FROM agenda WHERE  fk_paciente='$user_paciente'";
            
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
                    $this->query = "INSERT INTO agenda(fk_paciente, fecha, entrada, salida) VALUES
                    ('$fk_paciente', '$fecha', '$entrada', '$salida')";
                    
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

        /*public function edit($user_data=array())
        { 
            foreach ($user_data as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            
            $this->query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellido', clave='$clave' WHERE email = '$email' ";
            $this->execute_single_query();
        }
         */
        public function delete($user_codigo='') 
        { 
            $this->query = "DELETE FROM material WHERE codigo = '$user_codigo' ";
            $this->execute_single_query();
        }
      
        function __destruct() 
        { 
            unset($this);
        }
    } 
?>