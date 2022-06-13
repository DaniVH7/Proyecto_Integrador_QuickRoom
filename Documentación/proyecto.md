
1.1	Definición del problema:
En Tulancingo hay muchas habitaciones que esperan a ser habitadas, la problemática
llega cuando hay muchos estudiantes que no son del municipio de Tulancingo y quieren
estudiar en las instituciones dentro del municipio, la mejor opción es rentar una
habitación que cuente con lo indispensable para subsistir y se adapte a su economía. Un
problema mucho más grande, es la inseguridad dentro del municipio, ya que con el
tiempo se ha visto mucha delincuencia, este es un factor para que los estudiantes quieran
rentar cerca de donde van a estudiar, ahorrarán tiempo, dinero y estarán un poco más
seguros.

1.2 Definición del proyecto:
En nuestra aplicación va enfocada a estudiantes ingresados en la utec que no son de Tulancingo o que radican en Tulancingo pero que les quede lejos la escuela, nuestra aplicación les ayudara a buscar una habitación que cuente con lo necesaria para subsistir deacuerdo a sus necesidades.

1.3 Definición de las funciones del proyecto
Las funciones que va a llevar nuestra aplicación es que al ingresar nos pida que introduzcamos el usuario y contraseña, en el inicio mostrara las habitaciones que se están disponibles, también traerá apartados como seguridad, formas de pago, ayuda, en el apartado de seguridad traerá una opción en donde los padres de los estudiantes puedan monitorear a sus hijos para ver o notificar si el estudiante cumple con los pagos, sobre su comportamiento dentro de la habitación. Nuestra aplicación va a facilitar a los padres en saber sobre su comportamiento de sus hijos.

1.4 Diseño de la base de datos (Diagrama entidad - relación)
![image](https://user-images.githubusercontent.com/102370094/173268857-e740a664-7846-4309-a2b9-bb3203284a4b.png)

1.5 Creación de la base de datos (Script)
https://replit.com/@DaniVH7/ProyectoIntegradorQuickRoom#BasedeDatos/Usuarios.sql

1.6 Diccionario de datos

Usuarios
Campo	Tipo	Tamaño	Descripción
Uid	Integer	Not Null	Clave de Usuario
Nombre	Varchar	250	Nombre del usuario
Apellidop	Varchar	250	Apellido del usuario
Apellidom	Varchar	250	Apellido de usuario
Edad	Integer	250	Edad del usuario
Email	Varchar	250	Email del usuario
Password	Varchar	32	Contraseña del usuario
Teléfono	Integer	Not null	Teléfono del usuario
Estatus	Varchar	50	Permite saber si está activo o no


Administrador
Campo	Tipo	Tamaño	descripción
Aid	Integer	Not Null	Clave de Usuario
Nombre	Varchar	250	Nombre del usuario
Apellidop	Varchar	250	Apellido del usuario
Apellidom	Varchar	250	Apellido de usuario
Estatus	Varchar	50	Permite saber si está activo o no


Cuartos
Campo	Tipo	Tamaño	Descripcion
cid	Integer	Not Null	Clave de Usuario
Descripcion 	Varchar	250	Da una breve descripción a cerca del cuarto
Aid	Integer	Not null	Conecta la tabla de admin y cuartos
Idprov	Integer	Not null	Conecta la tabla de proveedor con cuartos

Proveedor
Campo	Tipo	Tamaño	Descripcion
Idprov	Integer	Not Null	Clave de Usuario
Nombreprov	Varchar	250	Nombre del usuario
Email	Varchar	250	Apellido del usuario
Teléfono 	Integer	Not null	Muestra el número celular del proveedor









1.7 Generación de datos de prueba
..\Downloads\usuarios.csv
..\Downloads\prov.csv
..\Downloads\admin.csv
..\Downloads\cuartos.csv
