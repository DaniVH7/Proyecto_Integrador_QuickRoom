.headers on
.mode column
PRAGMA foreign_key = ON;
drop table cuartos;
create table cuartos(
  cid integer primary key AUTOINCREMENT,
  descripcion varchar(500),
  aid  integer not null REFERENCES admin(aid),
  idprov integer  not null REFERENCES proveedor(idprov)
);