<?php

class reservacion {
    private $lugar;
    private $nombre;
    private $apellido;
    private $celular;
    private $fecha_e;
    private $fecha_s;

    public function __construct($lugar, $nombre, $apellido, $celular, $fecha_e, $fecha_s){
        $this->setLugar($lugar);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setCelular($celular);
        $this->setFecha_e($fecha_e);
        $this->setFecha_s($fecha_s);
    }
    
    public function setLugar ($lugar){
        if (empty($lugar)){
            throw new Exception("El hotel es requerido");
        }
        $this->lugar = $lugar;
    }

    public function setNombre ($nombre){
        if (empty($nombre)){
            throw new Exception("El nombre es necesario");
        }
        $this->nombre = $nombre;
    }

    public function setApellido ($apellido){
        if (empty($apellido)){
            throw new Exception("El apellido es necesario");
        }
        $this->apellido = $apellido;
    }

    public function setCelular($celular){
        if (empty($celular)){
            throw new Exception("El numero de celular es necesario");
        }
        $this->celular = $celular;
    }

    public function setFecha_e ($fecha_e){
        if (empty($fecha_e)){
            throw new Exception ("La fecha de entrada es necesaria");
        }
        $this->fecha_e = $fecha_e;
    }

    public function setFecha_s ($fecha_s){
        if (empty ($fecha_s)){
            throw new Exception ("La fecha de salida tambien es necesaria"); 
        }
        $this->fecha_s = $fecha_s;
    }
    public function createFile ($cr_file){
        $file = fopen($cr_file, 'a');
        if ($file === false){
                throw new Exception ("***El Archivo no se pudo abrir***");
            }
        $reservationdata = [
            $this->lugar,
            $this->nombre,
            $this->apellido,
            $this->celular,
            $this->fecha_e,
            $this->fecha_s
        ];
        fputcsv($file, $reservationdata);
        fclose($file);
    }
    
}
?>