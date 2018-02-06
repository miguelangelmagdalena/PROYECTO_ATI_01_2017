<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../static/css/style_notification-friend.css">
	<link rel="stylesheet" type="text/css" href="../static/font-awesome/css/font-awesome.css">
	<script type="text/javascript" src="../static/js/jquery.js"></script>
	<meta charset="utf-8">
</head>
<body>


<div class="navegation_bar"></div>

<div class="lateral-chat"></div>

<div id="live-chat"></div>

<div class="main">
	<div class="container">
		<div class="row ">
			<div class=" col-xs-12 col-sm-9 col-md-9">
			<div class="notifications">

				<div class="notification">
					<img src="">
					<div class="content">
						<h3 class="title">Solicitud de amistad <i class="fa fa-users"></i></h3>
						<h4>Carl C. Snyder</h4>
						<button class="btn btn-success block">Aceptar <i class="fa fa-user-plus"></i></button>
						<button class="btn btn-danger block">Rechazar <i class="fa fa-user-times"></i></button>
						<hr>
					</div>
				</div>

				<div class="notification">
					<img src="">
					<div class="content">
						<h3 class="title">Solicitud de amistad <i class="fa fa-users"></i></h3>
						<h4>Darryl D. Russell</h4>
						<button class="btn btn-success block">Aceptar <i class="fa fa-user-plus"></i></button>
						<button class="btn btn-danger block">Rechazar <i class="fa fa-user-times"></i></button>
						<hr>
					</div>
				</div>

				<div class="notification">
					<img src="">
					<div class="content">
						<h3 class="title">Solicitud de amistad <i class="fa fa-users"></i></h3>
						<h4>Shannon B. McBride</h4>
						<button class="btn btn-success block">Aceptar <i class="fa fa-user-plus"></i></button>
						<button class="btn btn-danger block">Rechazar <i class="fa fa-user-times"></i></button>
						<hr>
					</div>
				</div>

				<div class="notification">
					<img src="">
					<div class="content">
						<h3 class="title">Solicitud de amistad <i class="fa fa-users"></i></h3>
						<h4>Connie M. Cook quiere ser tu amigo</h4>
						<button class="btn btn-success block">Aceptar <i class="fa fa-user-plus"></i></button>
						<button class="btn btn-danger block">Rechazar <i class="fa fa-user-times"></i></button>
						<hr>
					</div>
				</div>




			</div>
			</div>
		</div>
	</div>

	
</div>

<script type="text/javascript">
		$(".navegation_bar").load("navbar.html");
		$(".lateral-chat").load("lateral-chat.html");
		$("#live-chat").load("chat-active.html");
	</script>	
</body>
</html>