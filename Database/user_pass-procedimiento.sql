DELIMITER //

CREATE PROCEDURE InsertUserData(
    IN p_usuario VARCHAR(255),
    IN p_contraseña VARCHAR(255)
)
BEGIN
    DECLARE v_count INT;

    -- Verificar si el usuario existe
    SELECT COUNT(*) INTO v_count FROM userdata WHERE usuario = p_usuario;

    IF v_count = 0 THEN
        -- Insertar el nuevo usuario
        INSERT INTO userdata (usuario, contraseña) VALUES (p_usuario, p_contraseña);
    END IF;
END //

DELIMITER ;
