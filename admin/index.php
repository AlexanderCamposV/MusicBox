<?php
if($_POST){
    header('Location:inicio.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>MusicBox: Ingreso y Registro de Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-3">
            
            </div>
            <div class="col-md-5">

                </br>
                </br>
                <img src="./images/Logo_MusicBox2.png" alt="Logo de MusicBox" height="240">

                <div class="card">
                    <div class="card-header">
                        Ingreso de Usuarios
                    </div>
                    <div class="card-body">

                        <form method="POST">
                            <div class="form-group">
                                <label >Usuario</label>
                                <input type="text" class="form-control" name="usuario" placeholder="Digite su usuario">
                                <small id="emailHelp" class="form-text text-muted">Nunca compartiremos sus datos con nadie.</small>
                            </div>

                            <div class="form-group">
                                <label >Contraseña</label>
                                <input type="password" class="form-control" name="contrasenia" placeholder="Digite su contraseña">
                            </div>

                            <button type="submit" class="btn btn-primary">Entrar a MusicBox</button>
                        </form>
                        </br>

                        <a href="">Registrese Aquí</a></br>
                        <small> Olvidó su contraseña? Haga click <a href="">aquí</a> </small> 
                        

                    </div>
                </div>

            </div>



        </div>
    </div>
</body>
</html>