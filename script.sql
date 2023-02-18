	create database gestarticle;
	use gestionarticle

	create table categorie(
		idCat int auto_increment primary key,
		libelle varchar (50));

	create table roleUser(
		idRole int auto_increment primary key,
		libelle varchar (50));

	create table users(
		idUser int auto_increment primary key,
		login varchar (50) unique,
		password varchar (50),
		role int ,
		foreign key(role) references roleUser(idRole));

	create table article(
		id int auto_increment primary key,
		code char(5) unique,
		designation varchar (50),
		quantite int,
		categorie int,
		users int,
		foreign key(categorie) references categorie(idCat),
		foreign key(users) references users(idUser));