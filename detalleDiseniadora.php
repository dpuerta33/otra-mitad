<!DOCTYPE html>
<html>
  <head lang="es">
    <title>La otra mitad</title>
    <!-- Icono de la p�gina -->
    <link rel="icon" href="img/icon.ico" type="image/x-icon">
    <!-- Etiquetas meta -->
		<meta name="author" content="Diego Puerta Cazorla, Antonio Roncero �balos">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="la otra mitad">
    <!--<meta name="description" content="">-->
    <!-- Codificaci�n -->
		<meta charset="utf-8">
    <!-- Hojas de estilo -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
   	 	<link rel="stylesheet" type="text/css" href="css/style_diseniadora.css">
  </head>
  <body>
  	<!-- Cabecera -->
    <div class="page-header">
      <!--
      <h1>Otra mitad</h1>
      <h2>visibilizar mujeres dise�adoras</h2>
      Term�metro
      -->

      <!-- T�tulo -->
      <div class="titulo">
        <a href="index.html"><img src="img/titulo.png" /></a>
      </div>

      <!-- Term�metro -->
      <div class="termometro">
        <a href="termometro/index.html"><img src="img/logo_termometro.png" /></a>
      </div>

      <!-- Men� -->
      <nav class="navbar navbar-default">
			  <!-- El logotipo y el icono que despliega el men� se agrupan
				   para mostrarlos mejor en los dispositivos m�viles -->
			  <div class="navbar-header">
          <!-- Esta imagen solo se muestra en pantallas peque�as -->
          <div class="titulo_small col-xs-9">
            <a href="index.html"><img src="img/titulo.png" /></a>
          </div>

				  <button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-ex1-collapse">
  				  <span class="sr-only">Desplegar navegación</span>
  				  <span class="icon-bar"></span>
  				  <span class="icon-bar"></span>
  				  <span class="icon-bar"></span>
  				</button>
			  </div>

			  <!-- Agrupar los enlaces de navegaci�n, los formularios y cualquier
				   otro elemento que se pueda ocultar al minimizar la barra -->
			  <div class="collapse navbar-collapse navbar-ex1-collapse">
  				<ul class="nav navbar-nav black">
  				  <li><a href="index.html">proyecto</a></li>
  				  <li class="activo"><a href="buscador.php">buscador</a></li>
  				  <li><a href="timeline.html">timeline</a></li>
            <li><a href="subir.html">subir</a></li>
            <li><a href="quienes_son.html">descubre</a></li>
            <li><a href="libros.html">libros</a></li>
            <li class="term-item"><a href="termometro/index.html">Termómetro</a></li>
  				</ul>
			  </div>
			</nav>

    </div>
    <!-- Cuerpo -->
    <div class="cuerpo col-xs-12">
  	<?php 
  		if(isset($_REQUEST['nombre'])){
			$nombre = $_REQUEST['nombre'];
  			$datos	= <<<CONSULTA
				SELECT * FROM Diseniadora 
				WHERE Diseniadora.Nombre='$nombre';
CONSULTA;
			$especialidad = <<<CONSULTA
				SELECT Especialidad.Tipo 
				FROM Especialidad 
				WHERE Especialidad.Nombre_Diseniadora='$nombre';
CONSULTA;
				// Abrimos la conexi�n a la BD.
				$basedatos = new mysqli('localhost', 'myjul9043', 'tfFeAW0x', 'webjulieta');
				if($basedatos == false){
					echo ('Error en la conexión<br/>');
					exit();
				}
				//===================================================================================================
				// Realizamos la consulta de los principales datos.
				$resultado = $basedatos->query($datos);
				if($resultado == false){
					echo('Error al realizar la consulta!<br/>');
					echo($basedatos->error);
					exit();
				} else {
					//echo('Consulta realizada con �xito!<br/>');
				}
				if (mysqli_num_rows($resultado)>0){
					while ($fila = $resultado->fetch_assoc()){
						$fechaNac = $fila['Anio_Nacimiento'];
						$paisNac = $fila['Pais_nacimiento'];
						$paisRes = $fila['Pais_residencia'];
						$formacion = $fila['Formacion'];
						$biografia = $fila['Biografia'];
						$imagen = $fila['Foto'];
					}
				} else {
					echo ("<p class='black'>Aún no existen registros!</p>");
				}
				//===================================================================================================
				// Realizamos la consulta de la especialidad.
				$resultado = $basedatos->query($especialidad);
				if($resultado == false){
					echo('Error al realizar la consulta!<br/>');
					echo($basedatos->error);
					exit();
				} else {
					//echo('Consulta realizada con éxito!<br/>');
				}
				if (mysqli_num_rows($resultado)>0){
					$n = 0;
					$espArray = array();
					while ($fila = $resultado->fetch_assoc()){
						if($n == 0){
							switch ($fila['Tipo']){
								case 'Disenio grafico':
									$esp = 'Diseño gráfico';
									$espArray[0] = 'Grafico';
									break;
								case 'Disenio de interiores':
									$esp = 'Diseño de interiores';
									$espArray[0] = 'Interior';
									break;
								case 'Disenio de moda':
									$esp = 'Diseño de moda';
									$espArray[0] = 'Moda';
									break;
								case 'Disenio de producto':
									$esp = 'Diseño de producto';
									$espArray[0] = 'Producto';
									break;
							}
						} else {
							switch ($fila['Tipo']){
								case 'Disenio grafico':
									$esp .= ', Diseño gráfico';
									$espArray[$n] = 'Grafico';
									break;
								case 'Disenio de interiores':
									$esp .= ', Diseño de interiores';
									$espArray[$n] = 'Interior';
									break;
								case 'Disenio de moda':
									$esp .= ', Diseño de moda';
									$espArray[$n] = 'Moda';
									break;
								case 'Disenio de producto':
									$esp .= ', Diseño de producto';
									$espArray[$n] = 'Producto';
									break;
							}
						}
						$n++;
					}
					for($x=0; $x<$n; $x++){
						$subespecialidad = <<<CONSULTA
							SELECT $espArray[$x].Nombre
							FROM $espArray[$x]
							WHERE $espArray[$x].Nombre_Diseniadora='$nombre';
CONSULTA;
						// Realizamos la consulta de las subespecialidades.
						$resultado = $basedatos->query($subespecialidad);
						if($resultado == false){
							echo('Error al realizar la consulta!<br/>');
							echo($basedatos->error);
							exit();
						} else {
							//echo('Consulta realizada con �xito!<br/>');
						}
						if (mysqli_num_rows($resultado)>0){
							$y = 0;
							while ($fila = $resultado->fetch_assoc()){
								if($y == 0){
									$subesp[$x] = $fila['Nombre']. ", ";
								} else {
									$subesp[$x] .= $fila['Nombre']. ", ";
								}
								$y++;
							}
						} else {
							echo ("<p class='black'>Aún no existen registros!</p>");
						}
					}
				} else {
					echo ("<p class='black'>Aún no existen registros!</p>");
				}
  		} else {
  			echo("<p class='black'>No se ha pasado ningún parámetro.</p>");
  		}
  	?>
  	
  	<h2 class="black"><?php echo("$nombre"); ?></h2>
  	<div class="imagen col-xs-12 col-sm-4">
		<img src="<?php echo("$imagen"); ?>"/>
  	</div>
  	<div class="textoBio col-xs-12 col-sm-8">
		<h3 class="black">Ficha Técnica</h3>
		<p class="parrafo">
		Fecha de nacimiento: <?php echo($fechaNac); ?> <br/>
		País de nacimiento: <?php echo($paisNac); ?> <br/>
		País de residencia: <?php echo($paisRes); ?> <br/>
		Nombre: <?php echo($nombre); ?> <br/>
		Formacion académica: <?php echo($formacion); ?> <br/>
		Especialidades: <?php echo($esp); ?> <br/>
		Subespecialidades: 
		<?php 
			for($x=0; $x<count($subesp) ;$x++){
					echo($subesp[$x]);
			}
		?> <br/>
		<p>
		
		<h3 class="black">Biografía</h3>
		<p class="parrafo"><?php echo($biografia); ?><p>
  	</div>
  	</div>
  	<!-- Pi� -->
    <div class="footer light">
      Proyecto TFE | Julieta G. Obligado | realizado con tipografía Mohr
    </div>
  	
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>