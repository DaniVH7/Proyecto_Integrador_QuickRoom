.headers on
.mode column
PRAGMA foreign_key = ON; 
CREATE TABLE admin(
  aid integer primary key AUTOINCREMENT,
  nombre varchar(250),
  apellidop varchar(250),
  apellidom varchar(250),
  status varchar(50) check(status='activo' or status='inactivo')
);


