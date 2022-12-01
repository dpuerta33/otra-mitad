<?php
	session_start();
	
	if(isset($_GET['param'])){
		$param = $_GET['param'];
		echo("Parametro recibido: $param <br>");
		
		$aux = explode("_", $param);
		
		switch ($aux[0]){
			case 'grafico':
				$especialidad = 'Grafico';
				break;
			case 'interiores':
				$especialidad = 'Interior';
				break;
			case 'moda':
				$especialidad = 'Moda';
				break;
			case 'producto':
				$especialidad = 'Producto';
				break;
		}
		
		echo $especialidad ."<br>";
		
		if($param == 'grafico' || $param == 'interiores' || $param == 'moda' || $param == 'producto'){
			
			echo "Buscar por especialidad <br>";
			
			switch ($especialidad){
				case 'Grafico':
					$especialidadbd = 'Disenio grafico';
					break;
				case 'Interior':
					$especialidadbd = 'Disenio de interiores';
					break;
				case 'Moda':
					$especialidadbd = 'Disenio de moda';
					break;
				case 'Producto':
					$especialidadbd = 'Disenio de producto';
					break;
			}
				
			 $busqueda = <<<CONSULTA
			 SELECT Diseniadora.Nombre, Pais_nacimiento, Foto FROM Diseniadora
			 JOIN Especialidad
			 WHERE Especialidad.Tipo='$especialidadbd'
			 AND Diseniadora.Nombre=Especialidad.Nombre_Diseniadora
			 GROUP BY Diseniadora.Nombre;
CONSULTA;

		} else {
			
			echo "Buscar por subespecialidad <br>";
			
			if(count($aux)==3){
				$busqueda = <<<CONSULTA
			SELECT Diseniadora.Nombre, Pais_nacimiento, Foto
			FROM Diseniadora JOIN $especialidad WHERE $especialidad.Nombre='$aux[1] $aux[2]'
			AND Diseniadora.Nombre=$especialidad.Nombre_Diseniadora
			GROUP BY Diseniadora.Nombre;
CONSULTA;
			} elseif (count($aux)==4){
				$busqueda = <<<CONSULTA
			SELECT Diseniadora.Nombre, Pais_nacimiento, Foto
			FROM Diseniadora JOIN $especialidad WHERE $especialidad.Nombre='$aux[1] $aux[2] $aux[3]'
			AND Diseniadora.Nombre=$especialidad.Nombre_Diseniadora
			GROUP BY Diseniadora.Nombre;
CONSULTA;
			} else {
				$busqueda = <<<CONSULTA
			SELECT Diseniadora.Nombre, Pais_nacimiento, Foto
			FROM Diseniadora JOIN $especialidad WHERE $especialidad.Nombre='$aux[1]'
			AND Diseniadora.Nombre=$especialidad.Nombre_Diseniadora
			GROUP BY Diseniadora.Nombre;
CONSULTA;

			}
				
		}
		
		// Abrimos la conexión a la BD.
		$basedatos = new mysqli('localhost', 'myjul9043', 'tfFeAW0x', 'webjulieta');
		if($basedatos == false){
			echo ('Error en la conexión.<br/>');
			exit();
		}
		// Realizamos la consulta.
		$resultado = $basedatos->query($busqueda);
		if($resultado == false){
			echo('Error al realizar la consulta!<br/>');
			echo($basedatos->error);
			exit();
		} else {
			echo('Consulta realizada con éxito!<br/>');
		}
		
		if (mysqli_num_rows($resultado)>0){
			$i = 0;
			$arrayFotos = array();
			$arrayNombre = array();
			$arrayPais = array();
			
			switch ($especialidad){
				case 'Grafico':
					$especialidad = utf8_encode('Diseño gráfico');
					
					break;
				case 'Interior':
					$especialidad = utf8_encode('Diseño de interiores');
					break;
				case 'Moda':
					$especialidad = utf8_encode('Diseño de moda');
					break;
				case 'Producto':
					$especialidad = utf8_encode('Diseño de producto');
					break;
			}
			
			while ($fila = $resultado->fetch_assoc()){
				
				$arrayFotos[$i] = $fila['Foto'];
				$arrayNombre[$i] = $fila['Nombre'];
				$arrayPais[$i] = $fila['Pais_nacimiento'];
				
				$_SESSION['foto'] = $arrayFotos;
				$_SESSION['nombre'] = $arrayNombre;
				$_SESSION['pais'] = $arrayPais;
				$_SESSION['especialidad'] = $especialidad;
				
				$i++;
				
			}
		} else {
			echo ("Aún no existen registros!");
		}
		
		// Finalmente cerramos la coniexión.
		$basedatos->close();
		//Y redireccionamos al buscador.
		header("Location:buscador.php");
	} else {
		header("Location:buscador.php");
	}
?>