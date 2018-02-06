<!DOCTYPE html>
<html>
<head>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../static/css/style_lateral_chat.css">
	<link rel="stylesheet" type="text/css" href="../static/css/style_chat-active.css">
	<link rel="stylesheet" type="text/css" href="../static/font-awesome/css/font-awesome.css">
	<script type="text/javascript" src="../static/js/jquery.js"></script>

	<!-- Otros -->
	<meta charset="utf-8"> 
	<meta charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>RedParAti</title>

</head>
<body>

<div class="navegation_bar"></div>

<div class="lateral-chat"></div>

<div id="live-chat" style="display: none;"></div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<script type="text/javascript">
		$(".navegation_bar").load("navbar.php");
		$(".lateral-chat").load("lateral-chat.php");
		$("#live-chat").load("chat-active.php");
		var id_conversacion=0;

		$(document).ready(function(){

			$(".list-friend li").click(function(){
				$(".list-friend li").css("font-weight","normal").css("background","#DFDFDF");
				$(this).css("font-weight","700").css("background","#cccccc");
			id_conversacion= $(this).val();
			$('#live-chat').css("display","block");
			});
	

		});

	$(document).ready(function() {

    function limpiar_pantalla(){
        $.ajax({
            type: "POST",
            url: "refrescar_pantalla.php",
            data: {id:id_conversacion},
            success: function(data) {
            	$('.chat .chat-history').html("");
                $('.chat .chat-history').append(data);
            }
        });
    }

    setInterval(limpiar_pantalla, 10);
});

</script>


</body>
</html>
