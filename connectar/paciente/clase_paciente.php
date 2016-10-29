<?php
    
    require_once('../db_abstract_model.php');
    
    class Paciente extends DBAbstractModel
    {
        protected $pk_paciente;
        public $nombre;
        public $apellidos;
        private $curp;
        public $edad;
        public $fecha_nac;
        public $sexo;
        public $enfermedades_cronicas;
        public $alergias;
        public $localidad_origen;
        public $direccion;
        public $telefono;
        
        
        function __construct()
        {
            $this->db_name = 'consultorio_dental';
        }
        
        public function get($user_curp='') 
        {
            if($user_curp != ''):
                $this->query = "SELECT pk_paciente, nombre, apellidos, curp, edad, fecha_nac, sexo, enfermedades_cronicas,
                alergias, localidad_origen, direccion, telefono FROM paciente WHERE curp = '$user_curp' ";

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
            if(array_key_exists('curp', $user_data)):
                $this->get($user_data['curp'] );
                
                if($user_data['curp'] != $this->curp ):
                    foreach ($user_data as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    //Sentencia de inserción del elemento 

                     $this->query = "INSERT INTO paciente (nombre, apellidos, curp, edad, fecha_nac, sexo, enfermedades_cronicas,
                alergias, localidad_origen, direccion, telefono, imagen) VALUES
                        ('$nombre', '$apellidos', '$curp', '$edad', '$fecha_nac', '$sexo', '$enfermedades_cronicas', '$alergias', '$localidad_origen'
                            , '$direccion', '$telefono', 'imagenes/paciente.png')";
                       
                   
                    $this->execute_single_query();

                endif;
            endif; 
        }

        public function edit($user_curp=array())
        { 
            foreach ($user_curp as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            
            $this->query = "UPDATE paciente SET nombre='$nombre', apellidos='$apellidos', curp='$curp', 
            edad='$edad', fecha_nac='$fecha_nac', sexo='$sexo', enfermedades_cronicas='$enfermedades_cronicas',
             alergias='$alergias', localidad_origen='$localidad_origen', direccion='$direccion', 
            telefono='$telefono'
            WHERE curp = '$curp' ";
            $this->execute_single_query();
        }

        public function delete($user_curp='') 
        { 
            $this->query = "DELETE FROM paciente WHERE curp= '$user_curp' ";
            $this->execute_single_query();
        }
        
        function __destruct() 
        { 
            unset($this);
        }
    } 
?>