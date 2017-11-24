Create database Biblioteca
collate utf8_unicode_ci;

USE Biblioteca;

Create table Usuario(
ID_Usuario int auto_increment not null,
Documento_Identificacion varchar(50) not null collate utf8_spanish_ci ,
Contraseña blob null,
Nombre varchar(50) not null collate utf8_spanish_ci ,
Genero varchar(50) not null collate utf8_spanish_ci ,
Fecha_Nacimiento date not null,
Carrera varchar(50) not null collate utf8_spanish_ci ,
Nivel varchar(50) not null collate utf8_spanish_ci ,
primary key (ID_Usuario))
collate utf8_unicode_ci,
engine InnoDB ;


Create table Recursos(
ID_Recursos int auto_increment not null,
ID_Tipo_Recursos int not null,
Descripcion varchar(400) not null collate  utf8_spanish_ci ,
Titulo varchar(50) not null collate utf8_spanish_ci ,
Imagen varchar(100) not null collate utf8_spanish_ci ,
Adjunto varchar(50) not null collate utf8_spanish_ci ,
primary key (ID_Recursos))
collate utf8_unicode_ci,
engine InnoDB ;

Create table Tipo_Recursos(
ID_Tipo_Recursos int auto_increment not null,
Descripcion varchar(400) not null collate  utf8_spanish_ci ,
primary key (ID_Tipo_Recursos))
collate utf8_unicode_ci,
engine InnoDB ;

Create table Solicitud_Recursos(
ID_Solicitud_Recursos int auto_increment not null,
ID_Usuario int not null,
ID_Recursos int not null,
Fecha_Solicitud date not null collate  utf8_unicode_ci ,
Fecha_Concesion date not null collate  utf8_unicode_ci ,
Fecha_Entrega date not null collate  utf8_unicode_ci ,
primary key (ID_Solicitud_Recursos))
collate utf8_unicode_ci,
engine InnoDB ;

alter table Recursos 
add constraint r_1  foreign key (ID_Tipo_Recursos) references Tipo_Recursos(ID_Tipo_Recursos);

alter table Solicitud_Recursos 
add constraint r_2  foreign key (ID_Recursos) references Recursos(ID_Recursos);

alter table Solicitud_Recursos 
add constraint r_3  foreign key (ID_Usuario) references Usuario(ID_Usuario);

 
 

 






 
 
