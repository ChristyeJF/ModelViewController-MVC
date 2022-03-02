<?php
    class Nuevo extends Controller{
        function __construct(){
            parent::__construct(); //Llamamos al constructor de la clase 'Controller'
            $this->view->mensaje = '';
            //echo '<p>Nuevo controlador main</p>';
        }

        function render(){
            $this->view->render('nuevo/index');
        }

        function registrarAlumno(){
            $matricula =$_POST['matricula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $mensaje ='';
            if($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])){
                $mensaje = 'Alumno creado';
            }
            else{
                $mensaje = 'La matrícula ya fue creada';
            }

            $this->view->mensaje = $mensaje;
            $this->render(); //cargamos nuevamente el render
           
                        
           
            
        }
      
    }