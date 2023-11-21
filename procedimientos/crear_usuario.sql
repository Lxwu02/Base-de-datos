-- Este stored procedure crea un nuevo usuario en la base de datos del grupo impar
DELIMITER //
CREATE PROCEDURE CrearUsuario(
    IN p_username VARCHAR(255),
    IN p_nombre VARCHAR(255),
    IN p_email VARCHAR(255),
    IN p_password VARCHAR(8)
    IN p_fecha_nacimiento DATE
)
BEGIN
    DECLARE new_user_id INT;

    -- Verificar si el username es único
    IF NOT EXISTS (SELECT * FROM usuarios WHERE username = p_username) THEN
        -- Obtener el nuevo ID único para el usuario
        SELECT IFNULL(MAX(id), 0) + 1 INTO new_user_id FROM usuarios;

        -- Insertar el nuevo usuario en la tabla
        INSERT INTO usuarios (id, nombre, email, passwprd, username, fecha_nacimiento)
        VALUES (new_user_id, p_nombre, p_email, p_password, p_username, p_fecha_nacimiento);

        -- Asignar permisos (ajustar según tus necesidades)
        -- ...

        -- Otros procesos que puedas necesitar realizar al crear un usuario
        -- ...

        SELECT 'Usuario creado exitosamente' AS mensaje;
    ELSE
        SELECT 'El username ya existe. Por favor, elige otro.' AS mensaje;
    END IF;
END //
DELIMITER ;
