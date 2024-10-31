<!--Se realiza la conección a la bd.
Después se obtiene el id con get.
Se seleccionan todos los datos con ese id.
Se busca un resultado con ese id.
En $row se cargan los datos en un array y se vuelcan en variables con el título de las columnas

Se carga el header y footer con include
-->|

<?php

include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from alumnos where id=$id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado)==1){
        $row = mysqli_fetch_array($resultado);
        $dni = $row['dni'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $telefono = $row['telefono'];

    }

    }

    
    if (isset($_POST['actualizar'])){
     $id = $_GET['id'];
     $dni = $_POST['dni'];
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $telefono = $_POST['telefono'];


     $query = "update alumnos set dni='$dni', nombre='$nombre', apellido='$apellido', telefono='$telefono' where id=$id";
     
     mysqli_query($conn, $query);

     $_SESSION ['message'] ="El registro se actualizó correctamente";

     header("location: index.php");

    }
    
    ?>

    <?php include("includes/header.php"); ?>

   <div class="container p-4">

   <div class="row">

    <col-md4 mx-auto>
        
        <div class="card card-body ">
            <!--Actualizar con método POST-->
    <form action="editar.php? id=<?php echo $_GET['id']; ?>" method="POST">
        <form-group>
        <input type="text" name="dni" value="<?php echo $dni; ?>" class="form-control" placeholder="Actualizar DNI"><br>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre"><br>
            <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualizar apellido"><br>
            <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar teléfono"><br>
        
        <br>
        <button class="btn btn-success" name="actualizar">
        Actualizar
        </button>
    </form>
        </div>    

        </col-md>

   </div>

   </div>
    

    <?php include("includes/footer.php"); ?>
