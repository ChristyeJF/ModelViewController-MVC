<?php
    class Errorr extends Controller{
        function __construct(){
            parent::__construct();

            $this->view->mensaje = 'Error al cargar el recurso o no existe la página'; //al actualizar este mensaje automaticamente se actualizara tambien el texto en index.php de la carpeta error

            $this->view->render('error/index');
            //echo '<p> Error al cargar el recurso</p>';
        }
    }