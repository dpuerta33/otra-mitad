<?php
  // Recibimos los parámetros del formulario.
  // Para ello primero comprobamos si llegan a través del método POST o GET.
  $pParametros = false;
  if(count($_GET) != 0){
    $pParametros = $_GET;
  } else if(count($_POST) != 0){
    $pParametros = $_POST;
  }
  
  // A continuación comprobamos que se han pasado los valores requeridos, de lo contrario $pParametros será == false.
  if($pParametros == FALSE){
		echo ("No se ha pasado valor alguno.");
		exit();
	} else {
    //Valores para la tabla DISENIADORA.
  	$nombre = $pParametros['nombre']; // Debe ir indicado entre los corchetes el atributo 'name' del campo del formulario correspondiente.
    $publicaciones = $pParametros['publicaciones'];
    $foto = $pParametros['foto'];
    $anioNacimiento = $pParametros['anioNacimiento'];
    $anioFallecimiento = $pParametros['anioFallecimiento'];
    $paisResidencia = $pParametros['paisResidencia'];
    $paisNacimiento = $pParametros['paisNacimiento'];
    $webs = $pParametros['web'];
    $premios = $pParametros['premios'];
    $formacion = $pParametros['formacion'];
    $biografia = $pParametros['biografia'];
    //Valores para la tabla USUARIO.
  	$email = $pParametros['email'];
    //Valores para la tabla ESPECIALIDAD.
  	$especialidad = $pParametros['especialidad'];

  	//============================================
  	//Creamos la consulta para insertar valores en la tabla DISENIADORA.
  	$insertarDiseniadora = <<<CONSULTA
  		INSERT INTO Diseniadora (
	      Nombre,
	      Publicaciones,
	      Foto,
	      Anio_Nacimiento,
	      Anio_Defuncion,
	      Pais_residencia,
	      Pais_nacimiento,
	      Webs,
	      Premios,
	      Formacion,
	      Biografia,
		  Email_Usuario
      ) VALUES (
        '$nombre',
        '$publicaciones',
        '$foto',
        '$anioNacimiento',
        '$anioFallecimiento',
        '$paisResidencia',
        '$paisNacimiento',
        '$webs',
        '$premios',
        '$formacion',
        '$biografia',
		'$email'
      );
CONSULTA;
  	//Creamos la consulta para insertar valores en la tabla USUARIO.
  	$insertarUsuario = <<<CONSULTA
  		Insert IGNORE INTO Usuario
      VALUES (
        '$email'
      );
CONSULTA;
//==============================================================================
  	//Funci�n para insertar las especialidades.
  	function anadirEspecialidad($especialidad, $nombre, $baseDatos){
  		//Creamos la consulta para insertar valores en la tabla ESPECIALIDAD.
  		$insertarEspecialidad = <<<CONSULTA
      Insert INTO Especialidad (
		Tipo,
		Nombre_Diseniadora
      ) VALUES (
        '$especialidad',
		'$nombre'
      );
CONSULTA;
  		//Ahora a�adimos el registro en la tabla correspondiente a la especialidad.
  		$resultado = $baseDatos->query($insertarEspecialidad);
  		if($resultado == false){
  			echo('Error al anadir la ESPECIALIDAD!<br>');
  			echo($baseDatos->error);
  			exit();
  		} else {
  			echo('ESPECIALIDAD anadida con exito!<br/>');
  		}
  	}
//==============================================================================
    //Funci�n para insertar las subespecialidades.
    function anadirSubespecialidad($especialidad, $subespecialidad, $baseDatos, $nombre){
      switch ($especialidad) {
        case 'Disenio grafico':
          $aux = 'Grafico';
          break;
        case 'Disenio de interiores':
          $aux = 'Interior';
          break;
        case 'Disenio de producto':
          $aux = 'Producto';
          break;
        case 'Disenio de moda':
          $aux = 'Moda';
          break;
      }
      //Creamos la consulta para insertar valores en las tablas MODA, INTERIOR, PRODUCTO o GRAFICO.
      $insertarSubespecialidad = <<<CONSULTA
        Insert INTO $aux (
			Nombre,
			Nombre_Diseniadora
		) VALUES (
          '$subespecialidad',
		  '$nombre'
        );
CONSULTA;
      //Ahora a�adimos el registro en la tabla correspondiente a la subespecialidad.
      $resultado = $baseDatos->query($insertarSubespecialidad);
      if($resultado == false){
        echo('Error al anadir la SUBESPECIALIDAD!<br>');
        echo($baseDatos->error);
        exit();
      } else {
        echo('SUBESPECIALIDAD anadida con exito!<br/>');
      }
    }
//==============================================================================
  	//Abrir conexi�n con la BD.
  	$baseDatos = new mysqli('localhost', 'myjul9043', 'tfFeAW0x', 'webjulieta');
  	if($baseDatos == false){
  		echo ('Error en la conexion.<br>');
  		exit();
  	}
  	//Ahora a�adimos el registro a la tabla USUARIO. ==============================================================================
  	$resultado = $baseDatos->query($insertarUsuario);
  	if($resultado == false){
  		echo('Error al anadir el USUARIO!<br>');
  		echo($baseDatos->error);
  		exit();
  	} else {
  		echo('USUARIO anadido con exito!<br/>');
  	}
  	//Ahora a�adimos el registro a la tabla DISENIADORA. ==============================================================================
  	$resultado = $baseDatos->query($insertarDiseniadora);
  	if($resultado == false){
  		echo('Error al anadir la DISE�ADORA!<br>');
  		echo($baseDatos->error);
  		exit();
  	} else {
  		echo('DISE�ADORA anadida con exito!<br/>');
  	}
  	//Ahora a�adimos el registro a la tabla ESPECIALIDAD. ==============================================================================
  	if(count($pParametros['especialidad']) > 1){
  		for($i=0; $i<count($pParametros['especialidad']); $i++){
  			anadirEspecialidad($pParametros['especialidad'][$i], $nombre, $baseDatos);
  		}
  	} else {
  		anadirEspecialidad($pParametros['especialidad'][0], $nombre, $baseDatos);
  	}
  	//Ahora a�adimos cada subespecialidad a su tabla correspondiente seg�n la especialidad que haya elegido previamente. ==============================================================================
    //Este c�digo se ejecutará al final porque deben haberse añadido previamente los demás campos.
    if(count($pParametros['especialidad']) > 1){  //Comprobamos si se ha elegido una o más especialidades.
      for($j=0; $j<count($pParametros['especialidad']); $j++){ //Si se ha elegido mñas de una recorremos el array para tratarlas por separado, ya que cada especialidad tiene asociadas unas subespecialidades diferentes y por lo tanto no se pueden tratar a la vez.
      	switch ($pParametros['especialidad'][$j]) { //Con el switch comprobamos que especialidad se ha escogido.
          case 'Disenio grafico':
            if(count($pParametros['grafico']) > 1){
            	for($i=0; $i<count($pParametros['grafico']); $i++){
            		$subespecialidad = $pParametros['grafico'][$i];
            		anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
            	}
              } else {
              $subespecialidad = $pParametros['grafico'][0];
              anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre);
            }
            break;
          case 'Disenio de interiores':
            if(count($pParametros['interiores']) > 1){
            	for($i=0; $i<count($pParametros['interiores']); $i++){
            		$subespecialidad = $pParametros['interiores'][$i];
            		anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
            	}
            } else {
              $subespecialidad = $pParametros['interiores'][0];
              anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre);
            }
            break;
          case 'Disenio de producto':
            if(count($pParametros['producto']) > 1){
            	for($i=0; $i<count($pParametros['producto']); $i++){
            		$subespecialidad = $pParametros['producto'][$i];
            		anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
            	}
            } else {
              $subespecialidad = $pParametros['producto'][0];
              anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre);
            }
            break;
          case 'Disenio de moda':
            if(count($pParametros['moda']) > 1){
            	for($i=0; $i<count($pParametros['moda']); $i++){
            		$subespecialidad = $pParametros['moda'][$i];
            		anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
            	}
            } else {
              $subespecialidad = $pParametros['moda'][0];
              anadirSubespecialidad($pParametros['especialidad'][$j], $subespecialidad, $baseDatos, $nombre);
            }
            break;
        }
      }
    } else {
      switch ($especialidad[0]) {
        case 'Disenio grafico':
          if(count($pParametros['grafico']) > 1){
          	for($i=0; $i<count($pParametros['grafico']); $i++){
          		$subespecialidad = $pParametros['grafico'][$i];
          		anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
          	}
          } else {
            $subespecialidad = $pParametros['grafico'][0];
            anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre);
          }
          break;
        case 'Disenio de interiores':
          if(count($pParametros['interiores']) > 1){
          	for($i=0; $i<count($pParametros['interiores']); $i++){
          		$subespecialidad = $pParametros['interiores'][$i];
          		anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
          	}
          } else {
            $subespecialidad = $pParametros['interiores'][0];
            anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre);
          }
          break;
        case 'Disenio de producto':
          if(count($pParametros['producto']) > 1){
          	for($i=0; $i<count($pParametros['producto']); $i++){
          		$subespecialidad = $pParametros['producto'][$i];
          		anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
          	}
          } else {
            $subespecialidad = $pParametros['producto'][0];
            anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre);
          }
          break;
        case 'Disenio de moda':
          if(count($pParametros['moda']) > 1){
          	for($i=0; $i<count($pParametros['moda']); $i++){
          		$subespecialidad = $pParametros['moda'][$i];
          		anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre); //Una vez identificada la especialidad llamamos a la función que añadira las subespecialidades a la tabla correspondiente. La función recibe dos parámetros: Especialidad y subespecialidades(cadena de texto).
          	}
          } else {
            $subespecialidad = $pParametros['moda'][0];
            anadirSubespecialidad($especialidad[0], $subespecialidad, $baseDatos, $nombre);
          }
          break;
      }
    }
    //Finalmente cerramos la conexi�n. ==============================================================================
  	$baseDatos->close();
    //Y acto seguido redirigimos de nuevo a la página del formulario. Esta página debería ser invisible para el usuario.
    header('Location: subir.html');
  }
?>
