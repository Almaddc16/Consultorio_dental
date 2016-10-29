<?php
    
    require_once('../db_abstract_model.php');
    
    class Servicio extends DBAbstractModel
    {
        protected $pk_servicio;
        public  $nom_servicio;
        public $costo;

        
        function __construct()
        {
            $this->db_name = 'consultorio_dental';
        }
        
        public function get($user_nomservicio='') 
        {
            if($user_nomservicio != ''):
                $this->query = "SELECT nom_servicio, costo FROM servicio WHERE nom_servicio = '$user_nomservicio'";
            
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
            if(array_key_exists('nom_servicio', $user_data)):
                $this->get($user_data['nom_servicio']);
                
                if($user_data['nom_servicio'] != $this->nom_servicio):
                    foreach ($user_data as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    $this->query = "INSERT INTO servicio (nom_servicio, costo) VALUES
                        ('$nom_servicio', '$costo')";
                    $this->execute_single_query();
                endif;
            endif; 
        }

        public function edit($user_data=array())
        { 
            foreach ($user_data as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            
            $this->query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellido', clave='$clave' WHERE email = '$email' ";
            $this->execute_single_query();
        }

        public function delete($user_nomservicio='') 
        { 
            $this->query = "DELETE FROM servicio WHERE nom_servicio = '$user_nomservicio' ";
            $this->execute_single_query();
        }
        
        function __destruct() 
        { 
            unset($this);
        }
    } 
?>