<?php 

$data =file_get_contents("conversacion.json");
$my_json = json_decode($data);

foreach ($my_json as $msj) {
	echo "<p>".$msj->mensaje."</p>";
}

 ?>