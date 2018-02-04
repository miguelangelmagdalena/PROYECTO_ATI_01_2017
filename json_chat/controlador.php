<?php

$mensaje =$_POST['mensaje'];
$data =file_get_contents("conversacion.json");
$my_json=json_decode($data);

$mensaje_en_cola= array("mensaje"=>$mensaje);

array_push($my_json,$mensaje_en_cola);

$json=json_encode($my_json);
file_put_contents("conversacion.json",$json);

#$data =file_get_contents("conversacion.json");
#$my_json = json_decode($data);

#foreach ($my_json as $msj) {
#	echo "<p>".$msj->mensaje."</p>";
#}


 ?>