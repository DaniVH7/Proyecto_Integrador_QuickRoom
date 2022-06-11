.headers on
.mode column
PRAGMA foreign_key = ON
create table proveedor(
  idprov integer primary key AUTOINCREMENT,
  nombreprov varchar(260),
  email varchar(350),
  telefono int
);
CREATE UNIQUE INDEX index_proveedor_email ON proveedor(nombreprov,email);