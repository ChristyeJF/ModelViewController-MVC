<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
</head>
<body>
    <div id="header">
        <ul>
            <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li> <!-- para que no exista url relativas es decir: si escribimos main/saludo y luego pulsamos en 'nuevo' en la URL se ejecutara main/nuevo mas no simplemente nuevo -->
            <li><a href="<?php echo constant('URL'); ?>nuevo">Nuevo</a></li>
            <li><a href="<?php echo constant('URL'); ?>consulta">Consulta</a></li>
            <li><a href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
        </ul>
    </div>
</body>
</html>