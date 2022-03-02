<?php
    require_once 'controllers/error.php'; 
    class App{
        function __construct(){ //Este metodo es ejecutara cuando se cree un objeto de la clase porque es un constructor
            //echo '<p>Nueva app</p>'; 

            $url = isset($_GET['url']) ? $_GET['url']: null; //Si no existe url, la url será null
            $url = rtrim($url, '/'); //rtrim: Elimina los espacios en blanco u otros caracteres al final de una cadena.
            $url = explode('/',$url);
            
            if(empty($url[0])){ //si url[0] está vacio nos redirifirá al main.php
                $archivo_controllers = 'controllers/main.php';
                require_once $archivo_controllers;
                $controller = new Main();

                $controller->loadModel('main');
                $controller->render();

                return false;

            }
           
            
            // var_dump($url); //Desglosamos cada palabra de url despues del '/'

            $archivo_controllers = 'controllers/'.$url[0].'.php';

            if(file_exists($archivo_controllers)){ //Si el archivo existe
                require_once $archivo_controllers;

                //inicializa el controlador
                $controller = new $url[0]; //$url[0] en este ejemplo equivaldra a: Main() (clase main)

                $controller->loadModel($url[0]);

                $nparam = sizeof($url); //numero de parametros para llamar las funciones para editar y eliminar

                if($nparam>1){
                    if($nparam > 2){
                        $param = [];
                        for($i=2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }
                    else{
                        $controller->{$url[1]}();
                    }
                }
                else{
                    $controller->render();
                }
                /*
                //si hay un metodo que se requiere cargar
                if(isset($url[1])){
                    $controller->{$url[1]}(); //llamamos al método por ejemplo saludo()
                }
                else{
                    $controller->render();
                }*/
            }
            else{
                $controller = new Errorr();
            }

          
        }
    }