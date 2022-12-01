<?php
	header('Content-Type:text/html; charset=UTF-8');
	session_start();
?>
<!DOCTYPE html>
<html>
  <head lang="es">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>La otra mitad</title>
    <!-- Icono de la p gina -->
    <link rel="icon" href="img/icon.ico" type="image/x-icon">
    <!-- Etiquetas meta -->
		<meta name="author" content="Diego Puerta Cazorla, Antonio Roncero Ábalos">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <meta name="keywords" content="la otra mitad">
    <!--<meta name="description" content="">-->
    <!-- Codificaci n -->
		<meta charset="utf-8">
    <!-- Hojas de estilo -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_buscador.css">
    <!-- Scripts -->
    <script src="js/jquery-3.3.1.js"></script>
  </head>
  <body>
    <!-- Cabecera -->
    <div class="page-header">
      <!--
      <h1>Otra mitad</h1>
      <h2>visibilizar mujeres diseñadoras</h2>
      Termómetro
      -->

      <!-- Título -->
      <div class="titulo">
        <a href="index.html"><img src="img/titulo.png" /></a>
      </div>

      <!-- Term metro -->
      <div class="termometro">
        <a href="termometro/index.html"><img src="img/termomometro_boton.png" /></a>
      </div>

      <!-- Menú -->
      <nav class="navbar navbar-default">
			  <!-- El logotipo y el icono que despliega el menú se agrupan
				   para mostrarlos mejor en los dispositivos móviles -->
			  <div class="navbar-header">
          <!-- Esta imagen solo se muestra en pantallas pequeñas -->
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

			  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
				   otro elemento que se pueda ocultar al minimizar la barra -->
			  <div class="collapse navbar-collapse navbar-ex1-collapse">
  				<ul class="nav navbar-nav bold">
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

      <!-- Apartados del buscador en forma de lista -->
      <div class="col-xs-12 contenedorListas">
        <div class="clasificador">
          <h3 class="bold"><a href="conectividadBuscador.php?param=grafico">gráfico</a></h3>
          <ul class="parrafo">
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Ilustracion">ilustración</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Interactivo">interactivo</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Motion_graphics">motion graphics</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Tipografia">tipografía</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Branding">branding</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Editorial">editorial</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Publicidad">publicidad</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=grafico_Otras">otras</a></li>
          </ul>
        </div>
        <div class="clasificador">
          <h3 class="bold"><a href="conectividadBuscador.php?param=interiores">interiores</a></h3>
          <ul class="parrafo">
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Decoracion">decoración</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Retail">retail</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Efimero">efímero</a></li>
			<li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Escenografia">escenografía</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Rehabilitacion">rehabilitación</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Expositivo">expositivo</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=interiores_Otras">otras</a></li>
          </ul>
        </div>
        <div class="clasificador">
          <h3 class="bold"><a href="conectividadBuscador.php?param=moda">moda</a></h3>
          <ul class="parrafo">
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Alta_costura">alta costura</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Pret_a_porter">pret a porter</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Textil">textil</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Patronaje">patronaje</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Moda_tecnica">moda técnica</a></li>
			<li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Complementos">complementos</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=moda_Otras">otras</a></li>
          </ul>
        </div>
        <div class="clasificador">
          <h3 class="bold"><a href="conectividadBuscador.php?param=producto">producto</a></h3>
          <ul class="parrafo">
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Mobiliario">mobiliario</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Packaging">packaging</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Productos">productos</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Iluminacion">iluminación</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Tecnologicos">tecnológicos</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Domestico">doméstico</a></li>
            <li><img class="circulo" src="img/circulo_azul.png"/><a href="conectividadBuscador.php?param=producto_Otras">otras</a></li>
          </ul>
        </div>
		<!--
        <div class="clasificador">
          <h3>libros</h3>
          <ul>
            <li>gr fico</li>
            <li>interiores</li>
            <li>moda</li>
            <li>producto</li>
          </ul>
        </div>
		-->
      </div>

	  <?php 
	  	if(isset($_SESSION['foto']) && isset($_SESSION['nombre']) && isset($_SESSION['especialidad']) && isset($_SESSION['pais'])){
	  ?>
	      <!-- Elementos resultado de la b�squeda -->
	      <div class="col-xs-12 contenedorBanners">
		  <h2 class="bold">resultado de la búsqueda</h2>
	  <?php
			$lon = count($foto = $_SESSION['foto']);
			for($i=0; $i<count($foto = $_SESSION['foto']); $i++){
				$foto = $_SESSION['foto'][$i];
				$nombre = $_SESSION['nombre'][$i];
				$especialidad = $_SESSION['especialidad'];
				$pais = $_SESSION['pais'][$i];
				
				echo("
						<a href='detalleDiseniadora.php?nombre=$nombre'>
						<div class='banner'>
						<img src='$foto'></a>
						<h4 class='black'>$nombre</h4></a>
						<p class='parrafo'>$pais</p>
						</div>
						</a>
						");
			}
		
			session_destroy();
	  ?>
      </div>
      <?php 
		} else {
      ?>
      <!-- últimos elementos añadidos -->
      <div class="col-xs-12 contenedorBanners">
		<h2 class="bold">nuevo en nuestro archivo</h2>
			<?php
				$busquedaUltimos	= <<<CONSULTA
					SELECT Nombre, Pais_nacimiento, Foto FROM Diseniadora ORDER BY Fecha_Subida DESC LIMIT 10;
CONSULTA;
				// Abrimos la conexión a la BD.
				$basedatos = new mysqli('localhost', 'myjul9043', 'tfFeAW0x', 'webjulieta');
				if($basedatos == false){
					echo ('Error en la conexión.<br/>');
					exit();
				}
				// Realizamos la consulta.
				$resultado = $basedatos->query($busquedaUltimos);
				if($resultado == false){
					echo('Error al realizar la consulta!<br/>');
					echo($basedatos->error);
					exit();
				} else {
					//echo('Consulta realizada con éxito!<br/>');
				}
				if (mysqli_num_rows($resultado)>0){
					while ($fila = $resultado->fetch_assoc()){
						
						$fotoUlt = $fila['Foto'];
						$nombreUlt = $fila['Nombre'];
						$paisUlt = $fila['Pais_nacimiento'];
						//$especialidadAlf = $fila[''];
						/*
						switch ($especialidadUlt){
							case 'Disenio grafico':
								$especialidadUlt = utf8_encode('Diseño gráfico');
								break;
							case 'Disenio de interiores':
								$especialidadUlt = utf8_encode('Diseño de interiores');
								break;
							case 'Disenio de moda':
								$especialidadUlt = utf8_encode('Diseño de moda');
								break;
							case 'Disenio de producto':
								$especialidadUlt = utf8_encode('Diseño de producto');
								break;
						}
						*/
						echo("
								<a href='detalleDiseniadora.php?nombre=$nombreUlt'>
								<div class='banner'>
								<img src='$fotoUlt'>
								<h3 class='black'>$nombreUlt</h3>
								<p class='parrafo'>$paisUlt</p>
								</div>
								</a>
								");
					}
				} else {
					echo ("<p class='black'>Aún no existen registros!</p>");
				}
				// Finalmente cerramos la coniexión.
				$basedatos->close();
			?>
      </div>
      <?php 
		}
      ?>
      <!-- Elementos por orden alfabético -->
	  <div class="col-xs-12 contenedorBanners lastBanner">
		<h2 class="bold">orden alfabético</h2>
			<?php
				$busquedaAlfabetico	= <<<CONSULTA
					SELECT Nombre, Pais_nacimiento, Foto FROM Diseniadora ORDER BY Diseniadora.Nombre ASC;
CONSULTA;
				// Abrimos la conexión a la BD.
				$basedatos = new mysqli('localhost', 'myjul9043', 'tfFeAW0x', 'webjulieta');
				if($basedatos == false){
					echo ('Error en la conexión.<br/>');
					exit();
				}
				// Realizamos la consulta.
				$resultado = $basedatos->query($busquedaAlfabetico);
				if($resultado == false){
					echo('Error al realizar la consulta!<br/>');
					echo($basedatos->error);
					exit();
				} else {
					//echo('Consulta realizada con éxito!<br/>');
				}
				if (mysqli_num_rows($resultado)>0){
					while ($fila = $resultado->fetch_assoc()){
						
						$fotoAlf = $fila['Foto'];
						$nombreAlf = $fila['Nombre'];
						$paisAlf = $fila['Pais_nacimiento'];
						//$especialidadAlf = $fila[''];
						/*
						switch ($especialidadAlf){
							case 'Disenio grafico':
								$especialidadAlf = utf8_encode('Diseño gráfico');
								break;
							case 'Disenio de interiores':
								$especialidadAlf = utf8_encode('Diseño de interiores');
								break;
							case 'Disenio de moda':
								$especialidadAlf = utf8_encode('Diseño de moda');
								break;
							case 'Disenio de producto':
								$especialidadAlf = utf8_encode('Diseño de producto');
								break;
						}
						*/
						echo("
								<a href='detalleDiseniadora.php?nombre=$nombreAlf'>
								<div class='banner'>
								<img src='$fotoAlf'>
								<h3 class='black'>$nombreAlf</h3>
								<p class='parrafo'>$paisAlf</p>
								</div>
								</a>
								");
					}
				} else {
					echo ("<p class='black'>Aún no existen registros!</p>");
				}
				// Finalmente cerramos la coniexión.
				$basedatos->close();
			?>
	   </div>
	</div>

    <!-- Pié -->
    <div class="footer light">
      Proyecto TFE | Julieta G. Obligado | realizado con tipografía Mohr
    </div>

    	<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
  </body>
</html>
