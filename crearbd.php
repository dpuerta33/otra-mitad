<?php
	// Creamos las consultas.
	$comprobarBd = <<<CONSULTA
		DROP DATABASE IF EXISTS webjulieta;
CONSULTA;
	$crearBd = <<<CONSULTA
		CREATE DATABASE webjulieta;
CONSULTA;
	$cambiarBd = <<<CONSULTA
	USE webjulieta;
CONSULTA;
	$comprobarTablaUsuario = <<<CONSULTA
		DROP TABLE IF EXISTS Usuario;
CONSULTA;
	$crearTablaUsuario = <<<CONSULTA
    CREATE TABLE Usuario(
		Email varchar (30) NOT NULL,
		PRIMARY KEY (Email)
	);
CONSULTA;
	$comprobarTablaDiseniadora = <<<CONSULTA
		DROP TABLE IF EXISTS Diseniadora;
CONSULTA;
	$crearTablaDiseniadora = <<<CONSULTA
		CREATE TABLE Diseniadora (
			Nombre varchar(30) NOT NULL,
			Publicaciones varchar(350),
			Foto varchar(100),
			Anio_Nacimiento varchar(10),
			Anio_Defuncion varchar(10),
			Pais_residencia varchar(20),
			Pais_nacimiento varchar(20),
			Webs varchar(50),
			Premios varchar(200),
			Formacion varchar(100),
			Biografia varchar (1000),
			Email_Usuario varchar(30),
			Fecha_Subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (Nombre),
			FOREIGN KEY (Email_Usuario) REFERENCES Usuario (Email) ON UPDATE CASCADE ON DELETE CASCADE
		);
CONSULTA;
	$comprobarTablaEspecialidad = <<<CONSULTA
		DROP TABLE IF EXISTS Especialidad;
CONSULTA;
	$crearTablaEspecialidad = <<<CONSULTA
		CREATE TABLE Especialidad (
			ID int NOT NULL AUTO_INCREMENT,
			Tipo varchar(50) NOT NULL,
			Nombre_Diseniadora varchar(30),
			PRIMARY KEY (ID),
			FOREIGN KEY (Nombre_Diseniadora) REFERENCES Diseniadora (Nombre) ON UPDATE CASCADE ON DELETE CASCADE
		);
CONSULTA;
  $comprobarTablaModa = <<<CONSULTA
    DROP TABLE IF EXISTS Moda;
CONSULTA;
  $crearTablaModa = <<<CONSULTA
		CREATE TABLE Moda(
			ID int NOT NULL AUTO_INCREMENT,
			Nombre varchar(70),
			Nombre_Diseniadora varchar(30),
			PRIMARY KEY (ID),
			FOREIGN KEY (Nombre_Diseniadora) REFERENCES Diseniadora (Nombre) ON UPDATE CASCADE ON DELETE CASCADE
		);
CONSULTA;
  $comprobarTablaInterior = <<<CONSULTA
    DROP TABLE IF EXISTS Interior;
CONSULTA;
  $crearTablaInterior = <<<CONSULTA
		CREATE TABLE Interior(
			ID int NOT NULL AUTO_INCREMENT,
			Nombre varchar(70),
			Nombre_Diseniadora varchar(30),
			PRIMARY KEY (ID),
			FOREIGN KEY (Nombre_Diseniadora) REFERENCES Diseniadora (Nombre) ON UPDATE CASCADE ON DELETE CASCADE
		);
CONSULTA;
  $comprobarTablaProducto = <<<CONSULTA
    DROP TABLE IF EXISTS Producto;
CONSULTA;
  $crearTablaProducto = <<<CONSULTA
		CREATE TABLE Producto(
			ID int NOT NULL AUTO_INCREMENT,
			Nombre varchar(70),
			Nombre_Diseniadora varchar(30),
			PRIMARY KEY (ID),
			FOREIGN KEY (Nombre_Diseniadora) REFERENCES Diseniadora (Nombre) ON UPDATE CASCADE ON DELETE CASCADE
		);
CONSULTA;
  $comprobarTablaGrafico = <<<CONSULTA
    DROP TABLE IF EXISTS Grafico;
CONSULTA;
  $crearTablaGrafico = <<<CONSULTA
		CREATE TABLE Grafico(
			ID int NOT NULL AUTO_INCREMENT,
			Nombre varchar(70),
			Nombre_Diseniadora varchar(30),
			PRIMARY KEY (ID),
			FOREIGN KEY (Nombre_Diseniadora) REFERENCES Diseniadora (Nombre) ON UPDATE CASCADE ON DELETE CASCADE
		);
CONSULTA;

	// Abrimos la conexiÃ³n a la BD.
	$basedatos = new mysqli('localhost', 'root', '', '');
	if($basedatos == false){
		echo ('Error en la conexión.<br/>');
		exit();
	}
	// Crear BD.
	$resultado = $basedatos->query($comprobarBd);
	if($resultado == false){
		echo('Error al crear la base de datos!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearBd);
	if($resultado == false){
		echo('Error al crear la base de datos!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Base de datos creada con exito!<br/>');
	}
	// Cambiar a la BD 'webjulieta'.
	$resultado = $basedatos->query($cambiarBd);
	if($resultado == false){
		echo('Error al conectarse a la base de datos!<br/>');
		echo($basedatos->error);
		exit();
	}
	// Crear Tablas.
	// USUARIO ==============================================
	$resultado = $basedatos->query($comprobarTablaUsuario);
	if($resultado == false){
		echo('Error al crear la tabla USUARIO!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaUsuario);
	if($resultado == false){
		echo('Error al crear la tabla USUARIO!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla USUARIO creada con exito!<br/>');
	}
	// DISENIADORA ==============================================
	$resultado = $basedatos->query($comprobarTablaDiseniadora);
	if($resultado == false){
		echo('Error al crear la tabla DISENIADORA!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaDiseniadora);
	if($resultado == false){
		echo('Error al crear la tabla DISENIADORA!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla DISENIADORA creada con exito!<br/>');
	}
	// ESPECIALIDAD ==============================================
	$resultado = $basedatos->query($comprobarTablaEspecialidad);
	if($resultado == false){
		echo('Error al crear la tabla ESPECIALIDAD!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaEspecialidad);
	if($resultado == false){
		echo('Error al crear la tabla ESPECIALIDAD!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla ESPECIALIDAD creada con exito!<br/>');
	}
  	// MODA ==============================================
	$resultado = $basedatos->query($comprobarTablaModa);
	if($resultado == false){
		echo('Error al crear la tabla MODA!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaModa);
	if($resultado == false){
		echo('Error al crear la tabla MODA!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla MODA creada con exito!<br/>');
	}
  	// INTERIOR ==============================================
	$resultado = $basedatos->query($comprobarTablaInterior);
	if($resultado == false){
		echo('Error al crear la tabla INTERIOR!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaInterior);
	if($resultado == false){
		echo('Error al crear la tabla INTERIOR!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla INTERIOR creada con exito!<br/>');
	}
 	// PRODUCTO ==============================================
	$resultado = $basedatos->query($comprobarTablaProducto);
	if($resultado == false){
		echo('Error al crear la tabla PRODUCTO!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaProducto);
	if($resultado == false){
		echo('Error al crear la tabla PRODUCTO!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla PRODUCTO creada con exito!<br/>');
	}
  	// GRAFICO ==============================================
	$resultado = $basedatos->query($comprobarTablaGrafico);
	if($resultado == false){
		echo('Error al crear la tabla GRAFICO!<br/>');
		echo($basedatos->error);
		exit();
	}
	$resultado = $basedatos->query($crearTablaGrafico);
	if($resultado == false){
		echo('Error al crear la tabla GRAFICO!<br/>');
		echo($basedatos->error);
		exit();
	} else {
		echo('Tabla GRAFICO creada con exito!<br/>');
	}
	// Finalmente cerramos la coniexión.
	$basedatos->close();
?>
