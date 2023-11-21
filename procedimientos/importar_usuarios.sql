CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
importar_usuarios (usid int, unombre varchar(100), umail varchar(100), upassword varchar(30), uusername varchar(100), ufecha_nacimiento date)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN

    -- verificar si existe la columna generation, si no existe la agregamos y seteamos todos los valores de esa columna en 1
    -- IF 'generation' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='pokemon1') THEN
    --     ALTER TABLE pokemon1 ADD generation int;
    --     UPDATE pokemon1 SET generation = 1;
    -- END IF;
    
    IF usid NOT IN (SELECT id from usuariopar) THEN
        INSERT INTO usuariopar values(usid, unombre, umail, upassword, uusername, ufecha_nacimiento);

        -- retornamos true si se agregó el valor
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;

    END IF;



-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql