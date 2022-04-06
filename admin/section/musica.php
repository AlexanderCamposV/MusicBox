<?php include("../template/header.php");
include("../config/db.php");

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : ""; // If ternario: Si hay información llegando por el método POST, entonces deje esa información en la variable, de lo contrario dejela como una cadena vacia.
$txtArtista = (isset($_POST['txtArtista'])) ? $_POST['txtArtista'] : "";
$txtAlbum = (isset($_POST['txtAlbum'])) ? $_POST['txtAlbum'] : "";
$txtAnio = (isset($_POST['txtAnio'])) ? $_POST['txtAnio'] : "";
$txtDiscog = (isset($_POST['txtDiscog'])) ? $_POST['txtDiscog'] : "";
$txtGenero = (isset($_POST['txtGenero'])) ? $_POST['txtGenero'] : "";
$txtProducido = (isset($_POST['txtProducido'])) ? $_POST['txtProducido'] : "";
$txtCaratula = (isset($_FILES['txtCaratula']['name'])) ? $_FILES['txtCaratula']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";



switch ($accion) {
    case 'agregar':
        $SQL = $conexion->prepare("INSERT INTO `musica` (`id`, `artista`, `album`, `anio`, `discografica`, `genero`, `producido`, `caratula`) VALUES (NULL, :artista, :album, :anio, :discografica, :genero, :producido, :caratula);");
        $SQL->bindParam(':artista', $txtArtista); // Para que acepte los parametros que se le van a poner.
        $SQL->bindParam(':album', $txtAlbum); // Asiganción de variables a parámetros sql
        $SQL->bindParam(':anio', $txtAnio);
        $SQL->bindParam(':discografica', $txtDiscog);
        $SQL->bindParam(':genero', $txtGenero);
        $SQL->bindParam(':producido', $txtProducido);
        $SQL->bindParam(':caratula', $txtCaratula);
        $SQL->execute(); // Ejecusión del método
        break;

    case 'borrar':
        
        $SQL = $conexion->prepare('DELETE FROM musica WHERE musica.id = :id');
        $SQL->bindParam(':id', $txtID);
        $SQL->execute();
        break;

    case 'seleccionar':
        $SQL = $conexion->prepare('SELECT * FROM musica WHERE musica.id = :id');
        $SQL->bindParam(':id', $txtID);
        $SQL->execute();
        $datosMusica = $SQL->fetch(PDO::FETCH_LAZY); // Retorna los datos en un arreglo para cargar el formulario

        $txtID = $datosMusica['id'];
        $txtArtista = $datosMusica['artista'];
        $txtAlbum = $datosMusica['album'];
        $txtAnio = $datosMusica['anio'];
        $txtDiscog = $datosMusica['discografica'];
        $txtGenero = $datosMusica['genero'];
        $txtProducido = $datosMusica['producido'];
        $txtCaratula = $datosMusica['caratula'];
        break;

    case 'modificar':
        $SQL = $conexion->prepare("UPDATE musica SET artista=:artista, album=:album, anio=:anio, discografica=:discografica, genero=:genero, producido=:producido WHERE musica.id=:id");
        $SQL->bindParam(':id', $txtID);
        $SQL->bindParam(':artista', $txtArtista);
        $SQL->bindParam(':album', $txtAlbum);
        $SQL->bindParam(':anio', $txtAnio);
        $SQL->bindParam(':discografica', $txtDiscog);
        $SQL->bindParam(':genero', $txtGenero);
        $SQL->bindParam(':producido', $txtProducido);
        $SQL->execute();
       
        if($txtCaratula != ""){
            $SQL = $conexion->prepare('UPDATE musica SET caratula=:caratula WHERE musica.id = :id');
            $SQL->bindParam(':caratula', $txtCaratula);
            $SQL->bindParam(':id', $txtID);
            $SQL->execute(); 
        }
        break;  

    case 'cancelar':
            echo "Click en cancelar";
            break;  
        default:

        break;
}

# LISTAR O MOSTRAR
    $SQL = $conexion->prepare('SELECT * FROM musica;');
    $SQL->execute();
    $tablaMusica = $SQL->fetchAll(PDO::FETCH_ASSOC); // Retorna los datos en un arreglo para cargar la tabla



?>

<!-- FORMULARIO PARA AGREGAR ALBUMES -->
<div class="col-md-4">

    <div class="card">
        <div class="card-header">
            Datos del Álbum
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input disabled type="text" class="form-control"  value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="Id del Artista">
                </div>

                <div class="form-group">
                    <label for="txtArtista">Artista:</label>
                    <input type="text" class="form-control" value="<?php echo $txtArtista;?>" name="txtArtista" id="txtArtista" placeholder="Digite el nombre del artista">
                </div>

                <div class="form-group">
                    <label for="txtAlbum">Álbum:</label>
                    <input type="text" class="form-control" value="<?php echo $txtAlbum;?>" name="txtAlbum" id="txtAlbum" placeholder="Digite el nombre del álbum">
                </div>

                <div class="form-group">
                    <label for="txtAnio">Año:</label>
                    <input type="text" class="form-control" value="<?php echo $txtAnio;?>" name="txtAnio" id="txtAnio" placeholder="Digite año de lanzamiento">
                </div>

                <div class="form-group">
                    <label for="txtDiscog">Discografica:</label>
                    <input type="text" class="form-control" value="<?php echo $txtDiscog;?>" name="txtDiscog" id="txtDiscog" placeholder="Digite el nombre de la discografica">
                </div>

                <div class="form-group">
                    <label for="txtGenero">Género:</label>
                    <input type="text" class="form-control" value="<?php echo $txtGenero;?>" name="txtGenero" id="txtGenero" placeholder="Digite el género musical">
                </div>

                <div class="form-group">
                    <label for="txtProducido">Producido por:</label>
                    <input type="text" class="form-control" value="<?php echo $txtProducido;?>" name="txtProducido" id="txtProducido" placeholder="Digite los nombres de los productores">
                </div>

                <div class="form-group">
                    <label for="txtCaratula">Carátula:</label>
                    <?php echo $txtCaratula;?>
                    <input type="file" class="form-control" name="txtCaratula" id="txtCaratula" placeholder="Adjunte la imagen de la portada">
                </div>


                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="agregar" class="btn btn-primary">Agregar</button>
                    <button type="submit" name="accion" value="modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="cancelar" class="btn btn-info">Cancelar</button>
                </div>

            </form>
        </div>
    </div>
</div>





<!-- TABLA DE ALBUMES -->
<div class="col-md-8">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Artista</th>
                <th>Álbum</th>
                <th>Año</th>
                <th>Discografica</th>
                <th>Género</th>
                <th>Productor(es)</th>
                <th>Caratula</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($tablaMusica as $musica){?>
            <tr>
                <td><?php echo $musica['id'];?></td>
                <td><?php echo $musica['artista'];?></td>
                <td><?php echo $musica['album'];?></td>
                <td><?php echo $musica['anio'];?></td>
                <td><?php echo $musica['discografica'];?></td>
                <td><?php echo $musica['genero'];?></td>
                <td><?php echo $musica['producido'];?></td>
                <td><?php echo $musica['caratula'];?></td>
                <td> 

                <form method="POST">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $musica['id'];?>">
                <input type="submit" name="accion" value="borrar" class="btn btn-danger">
                <input type="submit" name="accion" value="seleccionar" class="btn btn-primary">
                </form>

                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>



</div>


<?php include("../template/footer.php") ?>