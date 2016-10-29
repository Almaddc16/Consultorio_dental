<?php
    
    require_once('db_abstract_model.php');
    
    class Clase extends DBAbstractModel
    {
        public $nombre;
        public $domicilio;
        protected $pk_dealguien;
        
        function __construct()
        {
            $this->db_name = 'BD_Ejemplo';
        }
        

        //este arreglo de awebo debe recibir 2 variables si no no funciona, como verás le envio 2 varíables donde dice AQUIIIIII en la funcion set
        public function get($primera_condicion='',$segunda_condicion='') 
        {
            if($primera_condicion != '' && $segunda_condicion != ''):
                $this->query = "SELECT pk_dealguien, nombre FROM tabla_ejemplo WHERE nombre = '$primera_condicion' and domicilio = '$segunda_condicion'  ";
            
                $this->get_results_from_query();
            
            endif;
        
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad=>$valor):
                    $this->$propiedad = $valor;
                endforeach;
            endif; 
        }
        
        //recibimos un arreglo
        public function set($arreglo=array())
        { 
           
     //validamos que existan estos 2 renglones en el arreglo
    if(array_key_exists('nombre', $arreglo) && array_key_exists('domicilio', $arreglo)):
                
                //AQUIIIIII se envian las 2 variables que no queremos que se repitan a la funcion get
                $this->get($arreglo['nombre'],$arreglo['domicilio']);
                

                //this->X dentro del if son las variables que se declaran arriba al iniciar la clase
                if($arreglo['nombre'] != $this->nombre && $arreglo['domicilio'] != $this->domicilio):

                    foreach ($arreglo as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    $this->query = "INSERT INTO tabla_ejemplo (nombre,domicilio) VALUES ('$nombre','$domicilio')";
                    $this->execute_single_query();
                    return(true);

                endif;
                //no se cumple el segundo if
                return (false);

    endif;
    //no se cumple el primer if
    return (false);
            
        }


        function __destruct() 
        { 
            unset($this);
        }
    } 
?>