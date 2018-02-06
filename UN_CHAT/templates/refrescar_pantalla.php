<?php 

$id = $_POST['id'];
$data =file_get_contents("conversacion.json");
$my_json = json_decode($data);

foreach ($my_json as $identificador) {

	if ($identificador->id == $id){

		foreach ($identificador->conversacion as $mensaje) {

			echo "<p>".$mensaje."</p>";
				
			}
		
		}
	}


 ?>