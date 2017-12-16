<?php
	session_start();
	// Comprobando el estado de la coneccion

	if(isset($_GET['pag_cerrar_sesion'])){ //Cuando le da click a cerrar sesion
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy(); 
		echo "Ha cerrado sesión con éxito";

	} else if(isset($_GET['pag_inicio_sesion'])){ //Datos de la pagina de inicio

		if ( isset( $_POST['correo'],  $_POST['contrasena'] ) ){

			$archivo 	= file_get_contents('usuarios.json');
			$usuarios 	= json_decode($archivo, true);
			$bandera 	= 0;

			foreach ($usuarios['usuarios'] as $field => $value) {
	    		// Use $field and $value here
	    		if($value['correo'] == $_POST['correo'] AND $value['contrasena'] == $_POST['contrasena'] AND $bandera == 0){

	    			echo 'Inicio de sesión exitoso ' .$value['nombre'];
	    			$bandera = 1;

	    			//Le asignamos los valores a session php
	    			$_SESSION['nombre'] 	= $value['nombre'];
	    			$_SESSION['apellido'] 	= $value['apellido'];
	    			$_SESSION['correo'] 	= $value['correo'];
	    			$_SESSION['cedula']  	= $value['cedula'];
	    			$_SESSION['contrasena'] = $value['contrasena'];
	    			$_SESSION['rol'] 		= $value['rol'];
	    		}
			}
			if($bandera == 0){
				echo 'Error, correo o contrasena erroneo';
			}
	
		}

	} else if(isset($_GET['pag_registro'])){ //Datos de la pagina de registro

		if ( isset($_POST['rol'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['cedula'], $_POST['contrasena'] )){


			$archivo 	= file_get_contents('usuarios.json');
			$usuarios 	= json_decode($archivo, true);

			if (count($usuarios) == 0) {//El archivo no tiene ningun usuario registrado

	    		$result["usuarios"][]=$_POST;

	    		$fp = fopen('usuarios.json', 'w');
	    		fwrite($fp, json_encode($result));
				fclose($fp);
				echo 'Registro Exitoso ' .$_POST['nombre'];
			} else {//Ya hay usuarios registrados, entonces lo agregamos al arreglo

				/*Comprobamos que la cedula y el correo no esten repetidos*/
				$bandera = 0;
				foreach($usuarios['usuarios'] as $item) { 
				    if ($item['correo'] == $_POST['correo'] ){
				    	$bandera = 1;
				    } 
				    if ($item['cedula'] == $_POST['cedula']){
				    	$bandera += 10;
				    	break;
				    }
				    
				}
				switch ($bandera){
					case 1:
						echo "code-error 1";
						break;
					case 10:
						echo "code-error 10";
						break;
					case 11:
						echo "code-error 11";
						break;
					case 0:
						array_push( $usuarios['usuarios'], $_POST );

						$fp = fopen('usuarios.json', 'w');
						fwrite($fp, json_encode($usuarios));
						fclose($fp);
						echo 'Registro Exitoso ' .$_POST['nombre'];
						break;
				}

				
			}
			
		}

	} else if (isset($_GET['pag_listar_estudiantes'])){ //Datos de la pagina listar estudiantes
		$archivo 	= file_get_contents('usuarios.json');
		$json 	= json_decode($archivo, true);
		$usuarios = array();
		foreach($json["usuarios"] as $field => $value) {

			if($value["rol"] == "estudiante"){
				// se crea la tupla de productos.
				array_push($usuarios, 
					array(	'rol' 		=> $value["rol"], 
							'nombre'	=> $value["nombre"], 
							'apellido'	=> $value["apellido"], 
							'cedula'	=> $value["cedula"], 
							'correo'	=> $value["correo"], 
							'contrasena'=> $value["contrasena"])); 
			}

		}

		// se crea el json de respuesta.
		echo json_encode($usuarios);

	} else if (isset($_GET['pag_listar_preparadores'])){
		$archivo 	= file_get_contents('usuarios.json');
		$json 	= json_decode($archivo, true);
		$usuarios = array();
		foreach($json["usuarios"] as $field => $value) {

			if($value["rol"] == "preparador"){
				// se crea la tupla de productos.
				array_push($usuarios, 
					array(	'rol' 		=> $value["rol"], 
							'nombre'	=> $value["nombre"], 
							'apellido'	=> $value["apellido"], 
							'cedula'	=> $value["cedula"], 
							'correo'	=> $value["correo"], 
							'contrasena'=> $value["contrasena"])); 
			}

		}

		// se crea el json de respuesta.
		echo json_encode($usuarios);

	} else if (isset($_GET['pag_listar_perfil'])){
		$archivo 	= file_get_contents('usuarios.json');
		$json 	= json_decode($archivo, true);
		$usuarios = array();
		foreach($json["usuarios"] as $field => $value) {

			if($value["correo"] == $_SESSION["correo"] and $value["cedula"] == $_SESSION["cedula"]){
				// se crea la tupla de productos.
				array_push($usuarios, 
					array(	'rol' 		=> $value["rol"], 
							'nombre'	=> $value["nombre"], 
							'apellido'	=> $value["apellido"], 
							'cedula'	=> $value["cedula"], 
							'correo'	=> $value["correo"], 
							'contrasena'=> $value["contrasena"])); 
				break;
			}

		}

		// se crea el json de respuesta.
		echo json_encode($usuarios);

	} else if (isset($_GET['pag_listar_todos'])){
		$archivo 	= file_get_contents('usuarios.json');
		$json 	= json_decode($archivo, true);
		$usuarios = array();
		foreach($json["usuarios"] as $field => $value) {
			// se crea la tupla de productos.
			array_push($usuarios, 
				array(	'rol' 		=> $value["rol"], 
						'nombre'	=> $value["nombre"], 
						'apellido'	=> $value["apellido"], 
						'cedula'	=> $value["cedula"], 
						'correo'	=> $value["correo"], 
						'contrasena'=> $value["contrasena"])); 
		}

		// se crea el json de respuesta.
		echo json_encode($usuarios);
	} else if (isset($_GET['pag_modificar_perfil'])){

		parse_str(file_get_contents('php://input'), $_PUT);

		$archivo 	= file_get_contents('usuarios.json');
		$usuarios 	= json_decode($archivo, true);

		/*Comprobamos que la cedula y el correo no esten repetidos*/
		$bandera = 0;
		
		if (isset($_PUT['correo']) || isset($_PUT['cedula'])){
			foreach($usuarios['usuarios'] as $item) {

				if (isset($_PUT['correo'])){
				    if ($item['correo'] == $_PUT['correo']  AND $_PUT['correo'] != $_SESSION["correo"]){
				    	$bandera = 1;
				    } 
				}
				if (isset($_PUT['cedula'])){
				    if ($item['cedula'] == $_PUT['cedula']  AND $_PUT['cedula'] != $_SESSION["cedula"]){
				    	$bandera += 10;

				    }
				}
				if ($bandera != 0) { // Encontramos errores
					break;
				}
			    
			}
		}

		switch ($bandera){
			case 1:
				echo "code-error 1";
				break;
			case 10:
				echo "code-error 10";
				break;
			case 11:
				echo "code-error 11";
				break;
			case 0:
				foreach($usuarios["usuarios"] as &$value) { //Pasamos el valor por referencia para modificar

					if($value["correo"] == $_SESSION["correo"] and $value["cedula"] == $_SESSION["cedula"]){
						// Buscamos los que coincidan con el que inicio sesion
						
						//Luego verificamos que el campo no este vacio y los datos que vamos a cambiar sean diferentes de los originales
						if (empty($_PUT['nombre']) == false && $_PUT['nombre'] != $value["nombre"]){
							$value["nombre"] 	= $_PUT['nombre'];
							$_SESSION['nombre'] = $_PUT['nombre'];
							$bandera += 1;
						}
						if (empty($_PUT['apellido']) == false  && $_PUT['apellido'] != $value["apellido"]){
							$value["apellido"] 		= $_PUT['apellido'];
							$_SESSION['apellido'] 	= $_PUT['apellido'];
							$bandera += 1;
						}
						if (empty($_PUT['cedula']) == false && $_PUT['cedula'] != $value["cedula"]){
							$value["cedula"] 		= $_PUT['cedula'];
							$_SESSION['cedula']  	= $_PUT['cedula'];
							$bandera += 1;
						}
						if (empty($_PUT['correo']) == false && $_PUT['correo'] != $value["correo"]){
							$value["correo"] 	= $_PUT['correo'];
							$_SESSION['correo'] = $_PUT['correo'];
							$bandera += 1;
						}
						if (empty($_PUT['contrasena']) == false && $_PUT['contrasena'] != $value["contrasena"]){
							$value["contrasena"] 	= $_PUT['contrasena'];
							$_SESSION['contrasena'] = $_PUT['contrasena'];
							$bandera += 1;
						}

						if($bandera >= 1){

							$fp = fopen('usuarios.json', 'w');
							fwrite($fp, json_encode($usuarios));
							fclose($fp);

							echo "Perfil modificado con éxito. Modificaciones realizadas: " .$bandera;
						}
						break;					
						
					}

				}
				if ($bandera == 0) {
					echo "Modificaciones realizadas: " .$bandera;
				}
				break;
		}
	} else if (isset($_GET['eliminar'])) {

		parse_str(file_get_contents('php://input'), $_DELETE);

		$archivo 	= file_get_contents('usuarios.json');
		$usuarios 	= json_decode($archivo, true);

		$i = 0;
		foreach($usuarios["usuarios"] as $key => $value) { 


			if ($value['cedula'] == $_DELETE['cedula']){ //Identificamos el que vamos a eliminar

				//unset($usuarios["usuarios"][$i]); //borramos a la persona
				//unset($usuarios["usuarios"][$key]);
				//break;   	

			}else{
				if($i == 0){ //Creamos un array con los que no vamos a eliminar
					$result["usuarios"][] = $usuarios["usuarios"][0]; 
				}else{
					array_push( $result['usuarios'], $usuarios["usuarios"][$key] );
				}
			}

			$i++;
		}

		$fp = fopen('usuarios.json', 'w');
		fwrite($fp, json_encode($result));
		fclose($fp);
		echo "El estudiante con cedula: ".$_DELETE['cedula']." ha sido eliminado"; 
		
	}

?>