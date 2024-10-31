<?php include("conexion.php");?>

<?php include("includes/header.php");?>


<div class="container p-4">

    <div class="row">
 
        <div class="col-md-4">
    

             <!--Buscar tarea-->
        <div class="card card-body">
            <h3>Buscar alumno</h3>
            <form action="index.php" method="post">

                 <input type="text" name="apellido" class="form-control" placeholder="Apellido"><br>


                    <br>
                <input type="submit" class="btn btn-secondary btn-block float-start " name="todos-alumnos" value="Todos los alumnos">
                 <input type="submit" class="btn btn-success btn-block float-end " name="buscar-alumno" value="Buscar">
            </form>
        </div>
<br>

        </div>
        

        <div class="col-md-8">

        
        <!--Mensaje de tarea-->

        <?php
        
        if(isset($_SESSION['message'])) { ?>
    
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  onclick="location.href='index.php'"></button>
            </div>
        
            <?php session_unset(); } ?>


        <!--Guardar tarea-->
               <div class="card card-body">
            <h3>Nuevo alumno</h3>
            <form action="guardar.php" method="post">
                <div class="form-group">
                    <input type="text" name="dni" class="form-control" placeholder="Ingresar DNI" autofocus><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" autofocus><br>
                    <input type="text" name="apellido" class="form-control" placeholder="Ingresar Apellido" autofocus><br>
                    <input type="text" name="telefono" class="form-control" placeholder="Ingresar Teléfono" autofocus><br>
                </div>
                <br>
                <input type="submit" class="btn btn-success btn-block float-end " name="guardar-alumno" value="Guardar alumno">
            </form>

            </div>


	<script type="text/javascript">
	    function confirmar(){
	    return confirm('¿Quiere borrar el registro?');
	} </script> 
            

        <!--Tabla-->

        <table class="table table-responsive table-bordered">
            <br>
            <br>

            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
              <!--Consulta con el select de todos los datos en tbody-->

            <tbody>

            <?php
                  
                       
                     if (isset($_POST['buscar-alumno'])){
                        
                        $apellido = $_POST['apellido'];
             
    
                        $query = "select * from alumnos where apellido like '%$apellido' ";
                        $resultado = mysqli_query($conn, $query);
    
                        while($row = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td> <?php echo $row['dni']; ?></td>
                            <td> <?php echo $row['nombre']; ?></td>
                            <td> <?php echo $row['apellido']; ?></td>
                            <td> <?php echo $row['telefono']; ?></td>
                            <td>

                            <a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-success">Ver</a>    
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Editar</a>
                            <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">Eliminar</a>
                      
                            </td>
                        </tr>

                    
                        <?php }

                    } else  { ?>
            
                <?php 

                $query = "select * from alumnos";
                $resultado = mysqli_query ($conn, $query);

                while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td> <?php echo $row['dni']; ?></td>
                        <td> <?php echo $row['nombre']; ?></td>
                        <td> <?php echo $row['apellido']; ?></td>
                        <td> <?php echo $row['telefono']; ?></td>
                        <td>

        
                            <a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-success">Ver</a>
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Editar</a>
                            <?php echo "<a href='eliminar.php?id=".$row['id']."' onclick='return confirmar()' class='btn btn-danger'>Eliminar</a>"?>
                            
                        </td>
                    </tr>

            <?php } } ?>

            </tbody>
        </table>
        

        </div>

    </div>
    
</div>

   

<?php ("includes/footer.php") ?>