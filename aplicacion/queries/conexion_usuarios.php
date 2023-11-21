<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    // Primero obtenemos todos los usuarios de la tabla que queremos agregar
    $query = "SELECT * FROM basededatospar ORDER BY id;";
    $result = $dbpar -> prepare($query);
    $result -> execute();
    $usuariospar = $result -> fetchAll();


    foreach ($usuariospar as $usuario){

        // id-nombre-mail-contraseña-usuario-fechanacimiento

        $query = "SELECT importar_usuarios($pokemon[0], '$usuario[1]'::varchar,'$usuario[2]'::varchar,$usuario[3]::varchar,$usuario[4]::varchar,$usuario[11]);";


        // Ejecutamos las querys para efectivamente insertar los datos
        $result = $dbimpar -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }


    // Mostramos los cambios en una nueva tabla
    $query = "SELECT * FROM usuario1 ORDER BY id DESC;";
    $result = $dbimpar -> prepare($query);
    $result -> execute();
    $pokemons = $result -> fetchAll();

?>