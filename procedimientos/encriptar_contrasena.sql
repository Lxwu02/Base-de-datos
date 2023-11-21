DELIMITER //
CREATE PROCEDURE EncriptarContrasena(
    IN p_username VARCHAR(255),
    IN p_contrasena VARCHAR(255)
)
BEGIN
    -- Verificar si el usuario existe
    IF EXISTS (SELECT * FROM usuarios WHERE username = p_username) THEN
        -- Encriptar la contraseña y actualizar en la base de datos
        UPDATE usuarios SET contrasena = CRYPT(p_contrasena, gen_salt('bf'))
        WHERE username = p_username;

        SELECT 'Contraseña encriptada exitosamente' AS mensaje;
    ELSE
        SELECT 'Usuario no encontrado. Por favor, verifica el nombre de usuario.' AS mensaje;
    END IF;
END //
DELIMITER ;
