<?php
$id = $_POST['id'];
$mensaje =$_POST['mensaje'];
$data =file_get_contents("conversacion.json");
$lista_conversaciones= json_decode($data);

$existe_conversacion = false;

foreach ($lista_conversaciones as $it ) {
	
	if ($it->id == $id){

		$existe_conversacion=true;
		break;

	}
}


if ($existe_conversacion == true ){
	foreach ($lista_conversaciones as $it) {
		if ($it->id == $id){
			array_push($it->conversacion,$mensaje);
		}
	}
}

else{

$lista_mensaje = array();
array_push($lista_mensaje,$mensaje);
$nueva_conversacion = array('id' => $id, 'conversacion' => $lista_mensaje );

array_push($lista_conversaciones,$nueva_conversacion);
}

file_put_contents("conversacion.json",json_encode($lista_conversaciones));

#$my_json=json_decode($data);

#$mensaje_en_cola= array("mensaje"=>$mensaje);
#array_push($my_json,$mensaje_en_cola);

#$json=json_encode($my_json);
#file_put_contents("conversacion.json",$json);

#$data =file_get_contents("conversacion.json");
#$my_json = json_decode($data);

#foreach ($my_json as $msj) {
#	echo "<p>".$msj->mensaje."</p>";
#}


 ?>