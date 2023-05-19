CREATE DATABASE IF NOT EXISTS ODS_DB;
USE ODS_DB;
CREATE TABLE IF NOT EXISTS USUARIOS (nombre varchar(30), usuario varchar(15), password varchar(16));
INSERT INTO USUARIOS VALUES("Daniel", 'danicontec', '1234'), ("Juan", "jcarmo", "4321"), ("Maria", "mgomu", "5555"), ("Veronica", "vfere", "4582");