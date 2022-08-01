# Proyecto Integrador
- Fernando Majin Sampayo Perez
- Cristian Daniel Valeriano Hernandez
## Antecedentes
México tiene una población estimada de 125 millones de habitantes, de los cuales 37.766.217 son estudiantes. Del total de la población, 12.576.736 de personas se encuentran entre los 18 y 23 años, lo que se puede considerar como el mercado potencial de la educación superior en México.
En Hidalgo, en el ciclo escolar 2015-2016 está en el lugar 16 de matrícula de educación superior del país con un total de 97,429 alumnos que incluye licenciatura y posgrado, lo equivale al 2.3% del total nacional.
Dentro de la universidad Tecnologica de Tulancingo hay un aproximado de 2942, 1162 son  de tulancingo, 1140 son de otros municipios del Estado y 640 de otros Estados y del extranjero.

https://unate.org/admision/cuantos-estudiantes-hay-en-mexico-inegi.html



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
 ![image](https://user-images.githubusercontent.com/102370094/182036566-b9cd5fcd-cd81-4709-b716-638b3d59670b.png)


sql
~~~
 --
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `administradores` (`id_administrador`, `nombre`, `apellidop`, `apellidom`, `telefono`, `usuario`, `correo`, `contra`) VALUES
(1, 'Cristian Daniel', 'Valeriano', 'Hernandez', '7713930384', 'CristianAdmin', 'cristian@email.com', 'cris123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartos`
--

CREATE TABLE `cuartos` (
  `id_cuarto` int(11) NOT NULL,
  `precio` varchar(12) DEFAULT NULL,
  `amueblado` varchar(10) DEFAULT NULL CHECK (`amueblado` = 'si' or `amueblado` = 'no'),
  `agua` varchar(250) DEFAULT NULL CHECK (`agua` = 'si' or `agua` = 'no'),
  `luz` varchar(250) DEFAULT NULL CHECK (`luz` = 'si' or `luz` = 'no'),
  `internet` varchar(250) DEFAULT NULL CHECK (`internet` = 'si' or `internet` = 'no'),
  `vigilancia` varchar(250) DEFAULT NULL CHECK (`vigilancia` = 'si' or `vigilancia` = 'no'),
  `cocina` varchar(250) DEFAULT NULL CHECK (`cocina` = 'si' or `cocina` = 'no'),
  `baño_compartido` varchar(250) DEFAULT NULL CHECK (`baño_compartido` = 'si' or `baño_compartido` = 'no'),
  `cuarto_compartido` varchar(10) DEFAULT NULL CHECK (`cuarto_compartido` = 'si' or `cuarto_compartido` = 'no'),
  `tiempo_renta` varchar(50) DEFAULT NULL,
  `tipo_condominio` varchar(250) DEFAULT NULL CHECK (`tipo_condominio` = 'casa' or `tipo_condominio` = 'edificio'),
  `calle` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `municipio` varchar(250) DEFAULT NULL,
  `geomapa` varchar(250) DEFAULT NULL,
  `fotografias` varchar(250) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuartos`
--

INSERT INTO `cuartos` (`id_cuarto`, `precio`, `amueblado`, `agua`, `luz`, `internet`, `vigilancia`, `cocina`, `baño_compartido`, `cuarto_compartido`, `tiempo_renta`, `tipo_condominio`, `calle`, `estado`, `municipio`, `geomapa`, `fotografias`) VALUES
(1, '1300', 'si', 'si', 'si', 'si', 'no', 'no', 'si', 'no', '4 Meses', 'Edificio', 'Avenida Universidad', 'Hidalgo', 'Tulancingo', NULL, ''),
(2, '1600', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', '1 Mes', 'Casa', 'Avenida Universidad', 'Hidalgo', 'Tulancingo', NULL, ''),
(3, '1500', 'si', 'si', 'si', 'si', 'si', 'no', 'no', 'no', '5 Mes', 'Casa', 'Avenida Universidad', 'Hidalgo', 'Tulancingo', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estatus` varchar(250) DEFAULT NULL CHECK (`estatus` = 'Activo' or `estatus` = 'Inactivo'),
  `id_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nombre`, `apellidop`, `apellidom`, `fecha`, `usuario`, `correo`, `contra`, `telefono`, `estatus`, `id_padre`) VALUES
(1, 'Cristian Daniel', 'Valeriano', 'Hernandez', '2003-08-31', 'Cristian', 'cristian@email.com', 'cris123', '7713930384', NULL, NULL),
(2, 'Fernando', 'Sampayo ', 'Perez', '1999-06-21', 'Majin', 'majin@email.com', 'majin123', '7712930989', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id_padre` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(32) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registro` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--

CREATE TABLE `rentas` (
  `id_renta` int(11) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_cuarto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tiempo_de_renta` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `cuartos`
--
ALTER TABLE `cuartos`
  ADD PRIMARY KEY (`id_cuarto`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD UNIQUE KEY `index_estudiantes` (`correo`,`telefono`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id_padre`),
  ADD UNIQUE KEY `index_padres` (`correo`,`telefono`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`),
  ADD UNIQUE KEY `index_registros` (`correo`,`telefono`);

--
-- Indices de la tabla `rentas`
--
ALTER TABLE `rentas`
  ADD PRIMARY KEY (`id_renta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuartos`
--
ALTER TABLE `cuartos`
  MODIFY `id_cuarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id_padre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rentas`
--
ALTER TABLE `rentas`
  MODIFY `id_renta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
~~~


# 1.6 Diccionario de datos
Diccionario de Datos

##Estudiantes
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
Id_estudiante	|INTEGER	|NOT NULL|	Clave de Usuario
Nombre	|VARCHAR|	250	|Nombre del Usuario
Apellido paterno	|VARCHAR	|250|	Apellido Paterno del Usuario
Apellido Materno|	VARCHAR|	250|	Apellido Materno del Usuario
Fecha|date| |Fecha de Nacimiento del Usuario
Usuario	|Varchar|250 NOT NUL| Nombre para iniciar Sesion
Correo|	VARCHAR	|250|	Email del usuario
Contra|	VARCHAR|	32|	Contraseña del Usuario
Teléfono|	INTEGER|	NOT NULL|	|Teléfono del Usuario
Estatus|	|VARCHAR|	50|	Permite saber si el usuario esta activo o no




- Administradores
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
Id_administrador	|	INT|	|NOT NULL|	Clavel del Administrador
Nombre |		VARCHAR|	250|	Nombre del Administrador
Apellido Paterno |	|VARCHAR|	250|	Apellido Paterno del Administrador
Apellido Materno |VARCHAR|250|	Apellido Materno del Administrador
Teléfono | 	varchar| 10	|Numero celular del Admin
Usuario	|	VARCHAR|250|  Nombre para iniciar Sesion
Correo |	VARCHAR|	250|	Email del Administrador
contra |	VARCHAR|	32	|Contraseña del Administrador
Estatus |	VARCHAR|	50	|Permite saber si el Administrador esta Activo o no


- Cuartos
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
Id_cuartos|	INTEGER|	NOT NULL|	Clave del Cuarto
Precio|		varchar	|	12	|	Precio del cuarto
Amueblado|	varchar	|	2	|	Si el cuarto esta amueblado
Agua	|	varchar	|	2	|	El cuarto tiene agua
Luz	|	varchar	|	2	|	El cuarto tiene luz
Internet|	varchar	|	2	|	El cuarto tiene Internet
Vigilancia|	varchar	|	2	|	El cuarto tiene vigilancia
Cocina	|	varchar	|	2	|	El cuarto tiene cocina
Baño_		varchar	|	2	|	El cuarto tiene baño Compartido
compartido|       		
Cuarto_		varchar	|	2	|	El cuarto es compartido
Compartido|	
Tiempo_renta|	varchar	|	2	|	Tiempo a ser rentado
Tipo_		varchar	|	2	|
Condominio|					Tiempo de condominio, casa o edificio
Calle 	|	varchar	|	2	|	Calle del condominio
Estado	|	varchar	|	2	|	Estado donde se ubica condómino
Municipio|	varchar	|	2	|	Municipio donde se ubica el condominio
Mapa	|	varchar	|	2	|	Mapa de la ubicación
Fotografías| 	varchar	|	150	|	Fotografías del cuarto





-Padres
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
Id_padre|	int	|	not null|		Id del padre
Nombre	|	varchar	|	250	|	Nombre del padre
Apellidop|	varchar	|	250	|	Apellido del padre
Apellidom|	varchar	|	250	|	Apellido materno del padre
Usuario	|	varchar	|	250	|	Usuario para entrar
Correo	|	varchar	|	250	|	Correo para iniciar sesión
Contra	|	varchar	|	250	|	Contraseña para iniciar sesión
Teléfono|	varchar	|	10	|	Teléfono celular del padre

-Registros
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
Id_registro|	int	|	not null|		Id del registro nuevo
Nombre	|	varchar	|	250	|	Nombre del nuevo registro
Apellidop|	varchar	|	250	|	Apellido del nuevo registro
Apellidom|	varchar	|	250	|	Apellido materno del nuevo registro
Usuario	|	varchar	|	250	|	Usuario para registro nuevo
Correo	|	varchar	|	250	|	Correo para iniciar sesión
Contra	|	varchar	|	250	|	Contraseña para iniciar sesión
Teléfono|	varchar	|	10	|	Teléfono celular para registro nuevo



-Rentas
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
Id_renta	|	int	|	auto_increment	|Id de renta
Id_administrador|	int	|	auto_increment	|Id del administrador
Id_estudiante	|	int	|	auto_increment	|Id del estudiante
Id_cuarto	|	int	|	auto_increment	|Id del cuarto
Fecha		|	date	|	auto_increment	|Fecha que se hizo la renta
Tiempo_renta	|	varchar	|	250		|	Cuanto tiempo se renta el cuarto


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


