<?php
session_start();
$conn = mysqli_connect (
'localhost', // nombre servidor
'root', // usuario
'', // contraseña
'instituto_db'); //nombre base de datos
?> 

<?php
if ($conn) {
echo "Conexión realizada con éxito";
} else {
    echo "Error de conexión";
}



?>