<?php
    class NuevoModel extends Model{
        public function __construct(){
            parent::__construct(); //llamamos al constructor de 'Model'
        }
        public function insert($datos){
            //Insertar datos en la BD
            try{
                $query = $this->db->connect()->prepare('INSERT INTO alumnos(matricula, nombre, apellido) VALUES (:matricula, :nombre, :apellido)');
                $query->execute(['matricula' => $datos['matricula'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido']]);
                return true;
            }
            catch(PDOException $e){
                //echo 'Ya existe esta matrícula';
                return false;
            }
        }
    }