CREATE DATABASE IF NOT EXISTS SESIONES;
USE SESIONES;
CREATE TABLE IF NOT EXISTS USERDATA (ID INTEGER NOT NULL AUTO_INCREMENT, USUARIO VARCHAR(18), CONTRASEÑA VARCHAR(24) NOT NULL, PRIMARY KEY(ID,USUARIO));