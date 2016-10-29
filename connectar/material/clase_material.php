<?php
    
    require_once('../db_abstract_model.php');
    
    class Material extends DBAbstractModel
    {
        protected $pk_material;
        public  $codigo;
        public  $nom_material;
        public  $descripcion;
        public  $unidades;
        public  $costo_caja;
        public  $costo_unitario;
        public  $tope;


        
        function __construct()
        {
            $this->db_name = 'consultorio_dental';
        }
        
        public function get($user_codigo='') 
        {
            if($user_codigo != ''):
                $this->query = "SELECT codigo, nom_material, descripcion, unidades, costo_caja, costo_unitario, tope
                 FROM material WHERE codigo = '$user_codigo'";
            
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
            #if(array_key_exists('codigo', $user_data)):
                #$this->get($user_data['codigo']);
                
                #if($user_data['codigo'] != $this->codigo):
                    foreach ($user_data as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    $this->query = "INSERT INTO material (codigo, nom_material, 
                        descripcion, unidades, costo_caja, costo_unitario, tope ) VALUES
                        ('$codigo', '$nom_material', '$descripcion', '$unidades',
                         '$costo_caja', '$costo_unitario', '$tope')";
                  
                    
                    if($this->execute_single_query())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
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