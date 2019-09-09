<?php
    class Producto
    {
        private $nombre;
        private $cod_barra;
        public $path_foto;

        public function __construct(string $n = null,string $c = null,string $path = null)
        {
            if($n != null)
            {
                $this->nombre = $n;
            }
            if($c != null)
            {
                $this->cod_barra = $c;
            }
            if($path != null)
            {
                $this->path_foto = $path;
            }
        }

        public function ToString()
        {
            if($this->nombre == null || $this->cod_barra == null || $this->path_foto == null)
            {
                return null;
            }
            else
            {
                return $this->cod_barra . " - " . $this->nombre . " - " . $this->path_foto . "\r\n";
            }
        }

        public static function Guardar(Producto $obj)
        {
            $retorno = false;
            $path = "./archivos/productos.txt";
            $file = fopen($path,"a");
            $int = fwrite($file,$obj->ToString());
            fclose($file);
            if($int > 0)
            {
                $retorno = true;
            }
            return $retorno;
        }

        public static function TraerTodosLosProductos()
        {
            $productos = array();
            $path = "./archivos/productos.txt";
            $file = fopen($path,"r");
            while(!feof($file))
            {
                $cadena = fgets($file);
                $array = explode(" - ",$cadena);
                if(isset($array[1]))
                {
                    array_push($productos,new Producto($array[1],$array[0],$array[2]));
                }
            }
            return $productos;
        }
    }