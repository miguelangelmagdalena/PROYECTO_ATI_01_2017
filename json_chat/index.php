<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">

</style>

<body>
	<div id="historial_chat">
		
	</div>

	<form id="form" method="POST">
		<textarea style="width: 300px;resize: none;" name="mensaje" id="mensaje"></textarea>
		<input type="button" id="boton" value="Enviar" >
	</form>

<script type="text/javascript">
		$(document).ready(function() {
    function limpiar_pantalla(){
        $.ajax({
            type: "POST",
            url: "refrescar_pantalla.php",
            success: function(data) {
            	$('#historial_chat').html("");
                $('#historial_chat').append(data);
            }
        });
    }

    setInterval(limpiar_pantalla, 1000);
});
</script>

<script type="text/javascript">

	$('#boton').click(function(){
		$.ajax({
			type:"POST",
			url: "controlador.php",
			data: $('#form').serialize(),
			success: function(data)            
           {
             /* $("#historial_chat").html("");*/
              $("#mensaje").val('');
              /*$("#historial_chat").append(data);*/
                
           }
		});
	});

</script>


</body>

</html>