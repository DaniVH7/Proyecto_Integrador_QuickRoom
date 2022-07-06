# Proyecto Integrador
- Fernando Majin Sampayo Perez
- Cristian Daniel Valeriano Hernandez
## Antecedentes
México tiene una población estimada de 125 millones de habitantes, de los cuales 37.766.217 son estudiantes. Del total de la población, 12.576.736 de personas se encuentran entre los 18 y 23 años, lo que se puede considerar como el mercado potencial de la educación superior en México.
En Hidalgo, en el ciclo escolar 2015-2016 está en el lugar 16 de matrícula de educación superior del país con un total de 97,429 alumnos que incluye licenciatura y posgrado, lo equivale al 2.3% del total nacional.
Dentro de la universidad Tecnologica de Tulancingo hay un aproximado de 2942, 1162 son  de tulancingo, 1140 son de otros municipios del Estado y 640 de otros Estados y del extranjero.

-https://unate.org/admision/cuantos-estudiantes-hay-en-mexico-inegi.html

## 1.1 Definición del problema: 
•	La principal problemática llega cuando hay muchos estudiantes que no son del municipio de Tulancingo y quieren estudiar en las instituciones dentro del municipio, la mejor opción para ellos es alquilar una habitación que cuenta con una habitación amueblada, agua, luz e internet, etc, y se adapta a su economía e interese .
 Los estudiantes recurren a rentar una habitación ya que no hay transportes a horas muy tempranas del día, y los que hay no llegan a la hora adecuada para iniciar sus clases diarias, la cuestión es de que si se te pasa el transporte habitual tienes que esperar una hora o mas para que vuelva a pasar.
 	El desgaste que tienen los estudiantes al viajar diario es muy grande, ya que se levantan muy temprano para poder tomar su transporte y de regreso a casa llegan se demoran para llegar por que no conocen los horarios del transporte. Además del costo que tiene el transporte, es muy caro y pagas durante 7 días, por ejemplo el precio del transporte va de 40 a 50 pesos más el transporte de la central de autobuses a casa, vendrían siendo de 1100 a 1300 pesos semanalmente. 
	En la universidad hay estudiantes que no son del estado de Hidalgo y viven con algún familiar que radica en el estado de Tulancingo, les facilita un poco la solvencia de rentar un cuarto, pero no es lo mismo vivir con un familiar que conoces o haz visto muy pocas veces.
	 Un problema mucho más grande, es la inseguridad dentro del municipio, ya que con el tiempo se ha visto mucha delincuencia, este es un factor para que los estudiantes quieran alquilar cerca de donde van a estudiar, con esto evitaríamos cualquier tipo de riesgo.

## 	1.2 Definición del proyecto: 
Es una aplicación que se enfoca a los estudiantes que no son del municipio de Tulancingo y estudian en las instituciones del municipio, la aplicación ayuda a buscar una habitación que cuente con lo necesario para subsistir ajustándose a sus necesidades y al capital con el que cuentan.
Dentro de esto definimos el proyecto en donde se resolverán todas las necesidades de los estudiantes que no son de el municipio de Tulancingo.
•	Para empezar  Es una aplicación que se enfoca a los estudiantes que no son del municipio de Tulancingo y estudian en las instituciones del municipio, la aplicación ayuda a buscar una habitación que cuente con lo necesario para subsistir ajustandose a sus necesidades.


 ## 1.3 Definición de las funciones del proyecto:
  ## - Administrador
| Numero | Funcion | 
| ----------- | ----------- | 
| 1.1 | Crear un registro nuevo
| 1.2 | Iniciar sesion 
| 1.3 | Tipo de Alojamiento
| 1.4 | Descripcion del Alojamiento y Precio
| 1.5 | Ubicacion donde se encuentra
| 1.6 | Contenido dentro del Alojamineto
| 1.7 | Que ofrece el espacio
| 1.8 | Imagenes acerca de la Habitacion
| 1.9 | Publicar

## -Usuario
|Numero | Funcion |
|------------|--------------|
| 1.1 | Crear un Registro nuevo
| 1.2 | Iniciar sesion
| 1.3 | Entrar al catalogo de alojamientos
| 1.4 | Seleccionar su Habitacion
| 1.5 | Comparar Precios
| 1.6 | Apartar la Habitacion
| 1.7 | Pago de Renta
 ## 1.4 Diseño de la base de datos (Diagrama entidad - relación)
 ![image](https://user-images.githubusercontent.com/97567256/173607602-111dba9a-1db8-437e-8bd5-9a271341615a.png)



  ## 1.5 Creación de la base de datos (Script)
  CREATE DATABASE QUICKROOM;
USE QUICKROOM;
#--Tabla Usuarios--
create table if not exists usuarios(
  id_user integer primary key AUTO_INCREMENT NOT NULL,
  nombre varchar(250),
  apellidop varchar(250),
  apellidom varchar(250),
  edad integer,
  email varchar(250),
  password varchar(32),
  telefono integer not null,
  status varchar(50) check (status='Activo' or status='Inactivo')
);

CREATE UNIQUE INDEX index_emai ON usuarios(email);

#--Tabla Administradores--
CREATE TABLE administradores(
  id_admin integer primary key AUTO_INCREMENT,
  nombre varchar(250),
  apellidop varchar(250),
  apellidom varchar(250),
  status varchar(50) check(status='activo' or status='inactivo'),
  id_prov integer references proveedores(id_prov)
);

#--Tabla de Proveedores--
create table proveedores(
  id_prov integer primary key AUTO_INCREMENT,
  nombreprov varchar(260),
  email varchar(350),
  telefono integer not null,
  id_direccion integer not null references direccion(idD)
);
CREATE UNIQUE INDEX index_proveedor_email ON proveedores(nombreprov,email);

#--Tabla de Condominios--
CREATE TABLE condominios(
  id_condominio integer primary key AUTO_INCREMENT,
  descripcion varchar(200),
  total_habitaciones int,
  color varchar(50),
  direccion varchar(200),
  id_direccion integer references direcciones(id_direccion),
  id_admin integer references admin(id_admin),
  id_cuarto integer references cuartos(id_cuarto)
 );
 
#--Tabla de Cuartos--
create table cuartos(
  id_cuarto integer primary key AUTO_INCREMENT,
  precio varchar(12),
  amueblado varchar(10) check(amueblado ='si' or amueblado='no'),
  servicios varchar(250) check(servicios='si' or servicios='no'),
  compartido varchar(10) check(compartido='si' or compartido='no'),
  tiempo_renta varchar(50),
  calificacion varchar(50),
  descripcion varchar(500),
  id_admi  integer not null REFERENCES admin(id_admin),
  id_user integer not null REFERENCES usuario(id_user)
);

#Tabla de Direcciones
create table direcciones(
    id_direccion INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    estado varchar(250),
    municipio varchar(250),
    colonia varchar(250),
    calle varchar(250),
    codigo_postal INTEGER NOT NULL,
    id_condominio integer not null references condominios(id_condominio)
);

~~~
# 1.6 Diccionario de datos
## - Usuarios
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| Uid | INTEGER |NOT NULL | Clave de Usuario
| Nombre | VARCHAR | 250 | Nombre del Usuario
| Apellido paterno |VARCHAR | 250 | Apellido Paterno del Usuario
| Apellido Materno |VARCHAR | 250 | Apellido Materno del Usuario|
| Edad  |   INTEGER  |NOT NULL | Edad del Usuario
| Email |   VARCHAR |   250 | Email del usuario
| Password  | VARCHAR | 32 | Contraseña del Usuario
| Telefono | INTEGER | NOT NULL | Telefono del Usuario
| Status    |VARCHAR  | 50 | Permite saber si el usuario esta activo o  no

## - Administrador
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| Aid | INTEGER | NOT NULL | Clavel del Administrador 
| Nombre | VARCHAR | 250 | Nombre del Administrador
| Apellido Paterno | VARCHAR | 250 | Apellido Paterno del Administrador
| Apellido Materno | VARCHAR | 250 | Apellido Materno del Administrador
| Email | VARCHAR | 250 | Email del Administrador
| Password | VARCHAR | 32 | Contraseña del Administrador
| Status | VARCHAR | 50 | Permite saber si el Administrador esta Activo o no

## - Cuartos
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| cid  | INTEGER | NOT NULL | Clave del Cuarto
| Descripcion | VARCHAR | 500 | Da una breve descripcion acerca de la habitacion
| Aid | INTEGER | NOT NULL | Conecta la tabla de Admin y cuartos
| idprov | INTEGER | NOT NULL | Conecta la tabla de proveedor con cuartos

## - Proveedor
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| idprov | INTEGER | NOT NULL | Clave del Proveedor
| nombre | VARCHAR | 250 | Nombrel Proveedor 
| Email  | VARCHAR | 250 | Email del proveedor
| Telefono | INTEGER | NOT NULL | Muestra el numero celular del proveedor
| Direccion | VARCHAR | 300 | Indica la direccion de el proveedor
|idD | INTEGER | NOT NULL | Conecta la tabla proovedor con direccion

## - Direccion
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
|idD  | INTEGER | NOT NULL | Id de la direccion
| Estado | VARCHAR | 250 | Indica el estado donde se ubica el proveedor
| Municipio | VARCHAR | 250 | Indica el municipio donde se ubica el proveedor
| Colonia  | VARCHAR | 250 |  Indica la colonia donde se ubica el proveedor
| Calle  | VARCHAR | 250 |  Indica la calle donde se ubica el proveedor
| Codigo Postal  | INTEGER | NOT NULL | Muestra el CP de la entidad donde se ubica el proveedor

# 1.7 Generación de datos de prueba
- ..\Downloads\usuarios.csv
- ..\Downloads\prov.csv
- ..\Downloads\admin.csv
- ..\Downloads\cuartos.csv

| Pregunta:| 
| ----------- |
| Consulta |
|-------------|
| Resultado |
|-------------|


