<!doctype html>
<html lang="en">

<head>
    <title>MusicBox: Administrador de Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/proyectos_php/MusicBox"; // De esta manera hacemos la redireccion a la pagina de MusicBox ?>


    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
             
            <a class="nav-item nav-link active" href="<?php echo $url;?>/admin/inicio.php">Administrador de Usuarios<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/admin/section/musica.php">Música: Administrador</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>">Ir A MusicBox</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/admin/section/logout.php">Cerrar Sesión</a>

        </div>
    </nav>


    <div class="container">
    </br>
        <div class="row">
            