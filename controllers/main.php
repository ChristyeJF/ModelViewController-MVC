<?php
    class Main extends Controller{
        function __construct(){
            parent::__construct(); //Llamamos al constructor de la clase 'Controller'
            
            //echo '<p>Nuevo controlador main</p>';
        }
        function render(){
            $this->view->render('main/index');
        }
        function saludo(){
            echo '<p>Ejecutaste el metodo saludo</p>';
        }
    }