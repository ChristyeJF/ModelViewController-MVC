<?php
    class Consulta extends Controller{
        function __construct(){
            parent::__construct(); //Llamamos al constructor de la clase 'Controller'
            $this->view->alumnos = [];
            //echo '<p>Nuevo controlador main</p>';
        }
        function render(){
            $alumnos = $this->model->get();
            $this->view->alumnos= $alumnos;
            $this->view->render('consulta/index');
        }
        
        function verAlumno($param = null){
            // var_dump($param); para ver el arreglo escrito en la url
            $idAlumno = $param[0];
            $alumno = $this->model->getById($idAlumno);

            session_start(); //iniciamos sesion para evitar que se cambie la matricula en el formulario
            $_SESSION['id_verAlumno'] = $alumno->matricula;
            $this->view->alumno = $alumno;
            $this->view->mensaje = '';
            $this->view->render('consulta/detalle'); 

        }
        
        function actualizarAlumno(){
            session_start();
            $matricula = $_SESSION['id_verAlumno'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            unset($_SESSION['id_verAlumno']); //destruir session

            if($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])){
                //actualizar alumno (éxito)
                $alumno = new Alumno();
                $alumno->matricula = $matricula;
                $alumno->nombre = $nombre;
                $alumno->apellido = $apellido;

                $this->view->alumno = $alumno;
                $this->view->mensaje = 'Alumno actualizado correctamente';
            }
            else{
                //mensaje de error
                $this->view->mensaje='No se pudo actualizar el alumno';
            }
            $this->view->render('consulta/detalle');

        }

        function eliminarAlumno($param = null){
            /* $matricula = $param[0]; sin javascript
            if($this->model->delete($matricula)){
                $this->view->mensaje = 'Alumno eliminado correctamente';
            }
            else{
                //mensaje de error
                $this->view->mensaje='No se pudo eliminar al alumno';
            }
            $this->render();
            */
            $matricula = $param[0]; 
            if($this->model->delete($matricula)){
                $mensaje = 'Alumno eliminado correctamente';
            }
            else{
                //mensaje de error
                $mensaje='No se pudo eliminar al alumno';
            }
            echo $mensaje;

        }
    
    
    }
