<?php
//incluidmos archivo que contiene los datos de configuracion de conexion a la BD
include 'global/config.php';
include 'global/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <a class="navbar-brand" href="Index.php">Logo de la Empresa</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Carrito(0)</a>
                  </li>
            </div>
      </nav>


    <div class="container">
        <br>
        <div class="alert alert-success">
        <?php print_r($_POST)?>
            Pantalla de Mensaje ....
            <a  href="#" class="badge badge-success">Ver Carrito</a>
    </div>

    <div class="row">
        <?php
        $sentencia = $pdo->prepare("SELECT * FROM tblproductos");
        $sentencia->execute();
        //
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //Aqui se desplegaran los productos que vienen directamente de la Base de datos
        print_r($listaProductos);
        ?>
        <!--Este es el template de la imagen -->
        <?php
        //aqui le estoy diciendo vea leame todo el contenido de la consulta de la lista de productos y prodcuto tendra toda la informacion 
        foreach($listaProductos as $producto){
        ?>
       
       
        <div class="col-3">
            <div class="card">
                <img 
                title="<?php echo $producto['Nombre'];?>"
                alt ="<?php echo $producto['Nombre'];?>"
                class="card-img-top"
                src="<?php echo $producto['Imagen'];?>";
                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $producto['Descripcion'];?>"
                > 
               <div class="card-body">
                        <span><?php echo $producto['Nombre'];?></span>
                        <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>
                        <!--Esto sirve para enviar la informacion del libro-->p class="card-text">Descripcion</p>
                        
                        <form action="" method="post">
                        <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                        <input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                        <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY);?>">
                        <input type="text" name="cantidad" id="cantidad"value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                        <button class="btn btn-primary"
                        value="Agregar"
                        type="submit">
                        Agregar al Carrito
                        </button>
                        </form>
                        
                </div>
            </div>
        </div>
        <?php } ?>
    </div> 
    <script>
    $(function () {
    $('[data-toggle="popover"]').popover()
    });
       </script>

    </body>
</html>