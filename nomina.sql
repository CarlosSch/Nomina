DROP DATABASE IF EXISTS bdnomina;
CREATE DATABASE bdnomina;
USE bdnomina;

CREATE TABLE tipo(
    id_tipo TINYINT(2) PRIMARY KEY NOT NULL,
    tipo VARCHAR (15)
);

CREATE TABLE areas(
    id_area TINYINT(2) PRIMARY KEY NOT NULL,
    area VARCHAR(15)
);

CREATE TABLE empleados(
    id_empleado TINYINT(3) PRIMARY KEY NOT NULL,
    usuario VARCHAR (15),
    nombre VARCHAR (25),
    a_paterno VARCHAR (25),
    a_materno VARCHAR (25),
    photo TEXT,
    pass VARCHAR (30),
    salario DOUBLE(8,3),
    id_tipo TINYINT (1), INDEX (id_tipo), FOREIGN KEY (id_tipo) REFERENCES tipo(id_tipo),
    id_area TINYINT (1), INDEX (id_area), FOREIGN KEY (id_area) REFERENCES areas(id_area)
);

CREATE TABLE asistencias (
    id_asistencias INT (6) PRIMARY KEY AUTO_INCREMENT,
    faltas TINYINT (2),
    permisos TINYINT (2),
    fecha DATE,
    h_entrada TIME,
    h_salida TIME,
    in_comida TIME,
    out_comida TIME,
    id_empleado TINYINT (3), INDEX (id_empleado), FOREIGN KEY (id_empleado) REFERENCES empleados (id_empleado)
);

CREATE TABLE nomina(
    id_nomina INT(6) PRIMARY KEY AUTO_INCREMENT,
    inicio DATE,
    cierre DATE,
    quincena DOUBLE (10,3)
);

INSERT INTO nomina
        VALUES 
            (1, "2020-01-11", "2020-01-24", 789901.50),
            (2, "2020-01-25", "2020-02-07", 789901.50),
            (3, "2020-02-08", "2020-01-21", 789901.50);


INSERT INTO tipo 
        VALUES
            (1, "Empleado"),
            (2, "Contador"),
            (3, "Administrador");

INSERT INTO areas
        VALUES  (1, "Sistemas"),
                (2, "Mantenimiento"),
                (3, "Licitaciones"),
                (4, "Calidad"),
                (5, "Ventas"),
                (6, "Marketing"),
                (7, "Limpieza"),
                (8, "Diseno"),
                (9, "Logistica"),
                (10, "Contabilidad"),
                (11, "Almacen"),
                (12, "Construcción");

INSERT INTO empleados
        VALUES
            (1, "clopezg", "Carlos", "Lopez", "Garces", "1234", 11000, 3, 1),
            (2, "yguerraf", "Dan Yair", "Guerra", "Flores", "4321", 8000, 2, 1),
            (3, "iriosl", "Isidro", "Rios", "lopez", "4321", 14000, 1, 1);

INSERT INTO asistencias 
        VALUES 
            (1, 0, 0, "2020-01-12", "08:55:00", "18:00:35", "13:30:00", "14:10:00", 1),
            (2, 0, 0, "2020-01-12", "08:45:00", "18:01:35", "14:30:00", "15:10:00", 2);

CREATE VIEW datos AS 
       SELECT empleados.id_empleado,
               empleados.usuario, 
               empleados.pass,
               empleados.nombre,
               empleados.a_paterno,
               empleados.a_materno,
               empleados.salario,
               areas.area,
               tipo.tipo
        FROM empleados
        INNER JOIN areas ON empleados.id_area = areas.id_area
        INNER JOIN tipo ON empleados.id_tipo = tipo.id_tipo;


CREATE VIEW datosA AS 
       SELECT asistencias.id_asistencias,
               asistencias.faltas,
               asistencias.permisos, 
               asistencias.fecha, 
               asistencias.h_entrada, 
               asistencias.h_salida, 
               asistencias.in_comida, 
               asistencias.out_comida, 
               empleados.nombre
        FROM asistencias
        INNER JOIN empleados ON asistencias.id_empleado = empleados.id_empleado;