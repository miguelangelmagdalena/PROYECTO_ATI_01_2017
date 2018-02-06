<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../static/css/style_chat-active.css">
	<link rel="stylesheet" type="text/css" href="../static/font-awesome/css/font-awesome.css">
	<script type="text/javascript" src="../static/js/jquery.js"></script>

</head>
<body>
		<header class="clearfix">
			<h4 id="nombre_chat">Chat activo</h4>
		</header>
		<div class="chat">
			<div class="chat-history">
			</div> 
			<form  method="post">
					<textarea style="width: 100%;resize: none;" name="mensaje" id="mensaje"></textarea>
					<input type="button"  class="center-block" id="boton" value="Enviar">
			</form>
		</div>


<script type="text/javascript">
	(function() {

	$('#live-chat header').on('click', function() {

		$('.chat').slideToggle(300, 'swing');
	});

	$('.chat-close').on('click', function(e) {

		$('#live-chat').fadeOut(300);

	});

}) ();

	$(document).ready(function(){

	$('#boton').click(function(){
		$.ajax({
			type:"POST",
			url: "controlador.php",
			data:{mensaje:$('#mensaje').val(), id:id_conversacion},
			success: function(data)            
           {
             /* $("#historial_chat").html("");*/
              $("#mensaje").val('');
              /*$("#historial_chat").append(data);*/
                
           }
		});
	});
});



</script>

</body>
</html>