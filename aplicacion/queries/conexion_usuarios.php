<?php
##Establecer conexión
require("../config/conexion.php");
include('../templates/header.html');

echo "<div class='main'><h1 class='title' align='center'>Llega aquí </h1></div>";
$query = "SELECT importar_usuarios()";
#echo "<div class='main'><h1 class='title' align='center'>Llega aquí1 </h1></div>";
$result = $db2 -> prepare($query);
#echo "<div class='main'><h1 class='title' align='center'>Llega aquí2 </h1></div>";
$result -> execute();
#echo "<div class='main'><h1 class='title' align='center'>Llega aquí3 </h1></div>";
$usuarios = $result -> fetchAll();
echo "<div class='main'><h1 class='title' align='center'>Usuarios Importados con éxito </h1></div>";
?>
