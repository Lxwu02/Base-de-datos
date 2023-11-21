<?php
session_start();
$msg = $_GET['msg'];

// Función para escribir un nuevo usuario en el archivo CSV
function agregarUsuario($nombre, $mail, $username, $password, $fechaNacimiento) {
    $nuevoUsuario = array($nombre, $mail, $username, $password, $fechaNacimiento);
    
    // Verificar si el archivo ya existe
    $archivo = 'usuarios.csv';
    $existeArchivo = file_exists($archivo);

    // Abrir el archivo CSV para escritura
    $csv = fopen($archivo, 'a');

    // Si el archivo no existe, agregar encabezados
    if (!$existeArchivo) {
        fputcsv($csv, array('Nombre', 'Mail', 'Nombre de Usuario', 'Contraseña', 'Fecha de Nacimiento'));
    }

    // Escribir el nuevo usuario en el archivo CSV
    fputcsv($csv, $nuevoUsuario);

    // Cerrar el archivo CSV
    fclose($csv);
}

// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];

    // Agregar el nuevo usuario al archivo CSV
    agregarUsuario($nombre, $mail, $username, $password, $fechaNacimiento);

    // Redirigir o mostrar un mensaje de éxito
    header("Location: registro_exitoso.php");
    exit();
}
?>

<?php include('../templates/header.html'); ?>

<body>
    <h3>Registro de Usuario</h3>
    <form class="form-signin" role="form" action="" method="post">
        <?php echo $msg; ?>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="mail" placeholder="Correo Electrónico" required>
        <input type="text" name="username" placeholder="Nombre de Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="date" name="fecha_nacimiento" required>
        <button type="submit" name="register">Registrarse</button>
    </form>
</body>
