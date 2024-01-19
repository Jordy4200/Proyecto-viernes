<?php
// Validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

// Conectamos a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Hacemos llamado al input de formulario
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$nombre_compania = $_POST["nombre_compania"];
$numero_contacto = $_POST["numero_contacto"];
$mensaje = $_POST["mensaje"];

// Verificamos la conexión a la base de datos
if (!$connection) {
    echo "No se ha podido conectar con el servidor" . mysqli_error($connection);
} else {
    echo "<b><h3>Hemos conectado al servidor</h3></b>";
}

// Indicamos el nombre de la base de datos
$datab = "proyecto_final";

// Indicamos seleccionar la base de datos
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    echo "No se ha podido encontrar la Tabla";
} else {
    echo "<h3>Tabla seleccionada:</h3>";
}

// Insertamos datos de registro a MySQL, indicando nombre de la tabla y sus atributos
$instruccion_SQL = "INSERT INTO usuario(nombre, correo, nombre_compania, numero_contacto, mensaje)
                     VALUES ('$nombre', '$correo', '$nombre_compania', '$numero_contacto', '$mensaje')";
$resultado = mysqli_query($connection, $instruccion_SQL);

// Consulta para mostrar todos los registros de la tabla 'usuario'
$consulta = "SELECT * FROM usuario";
$result = mysqli_query($connection, $consulta);

mysqli_close($connection);

echo '<a href="index.html"> Volver Atrás</a>';
?>