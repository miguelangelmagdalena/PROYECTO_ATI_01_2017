$(document).ready(function(){
	$( "#ajax_inicio" ).submit(function( event ){

        var that    = $(this);
            url     = "script.php/?pag_inicio_sesion=true";
            type  	= "post";
            data    = {};


        $("form input, form select, form textarea").each(
            function(index){  
                var input = $(this);
                if(input.attr("type") != "submit"){
                    
                    data[input.attr("name")] = input.val();

                }
            }
        );


       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);
                if (response == 'Error, correo o contrasena erroneo') {
                    $("#response").html("<h1><span class='label label-danger'> "+response+" </span></h1>");
                }else{
                    $("#response").html("<h1><span class='label label-success'> "+response+" </span></h1>");
                    $("#inicio_sesion").css("display","block");

                    $("#loading2").css("display","inline-block");
                    setTimeout(location.reload.bind(location), 2000);
                           	           
                 }
                
                
           }
       });

        return false;
    });

    $( "#ajax_registro" ).submit(function( event ){

        var that    = $(this);
            url     = "script.php/?pag_registro=true";
            type  	= "post";
            data    = {};


        $("form input, form select, form textarea").each(
            function(index){  
                var input = $(this);

                if(input.attr("type") != "submit" && input.attr("type") == "checkbox"){//Obtenemos el valor del input checked o unchecked
                   
                   data[input.val()] = input.is(":checked");

                } else if(input.attr("type") != "submit"){   

                   data[input.attr("name")] = input.val();

                } 
            }
        );

       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);

                if (response.match(/code-error/i) != null) {
                    $("#response").html("<h1><span class='label label-danger'> "+response+" </span></h1>");
                }else{
                    $("#response").html("<h1><span class='label label-success'> "+response+" </span></h1>");
                }
                
           }
       });



        return false;
    });

    $( "#cerrar_session" ).click(function(  ){
    	
		var that    = $(this);
            url     = "script.php/?pag_cerrar_sesion=true";
            type  	= "post";
            data    = {};
		
    	$.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);
                
                $("#loading1").css("display","inline-block");


                setTimeout(function(){location.href="index.php"} , 1000);  
                //setTimeout(location.reload.bind(location), 2000);
           }
       	});
       	return false;
    	
    });


    $( "#ajax_listar_todos" ).submit(function( event ){ //Al momento de darle click a listar todos

        var that    = $(this);
            url     = "script.php/?pag_listar_todos=true";
            type  	= "get";
            data    = {};

       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);

                var lista = "<table class='table table-striped'> <tr> <th>Rol</th> <th>Nombre</th> <th>Apellido</th> <th>Cedula</th> <th>Correo</th> <th>Contraseña</th> <th>Eliminar</th> </tr> ";
                var respuesta = JSON.parse(response);

		      	for (var i = 0; i < respuesta.length; i++) {
		      		if(respuesta[i].rol == "estudiante"){
		      			lista = lista + " <tr> <td>" + respuesta[i].rol +"</td>"+ "<td>" + respuesta[i].nombre+"</td> "+ "<td>" + respuesta[i].apellido+"</td> "+ "<td>" + respuesta[i].cedula+"</td> "+ "<td>" + respuesta[i].correo+"</td> "+ "<td>" + respuesta[i].contrasena+"</td> "+ "<td><a class='eliminar' href='#' value='"+respuesta[i].cedula+"'><button class='label label-danger'>X</button></a></td> </tr>";
		      		} else {
		      			lista = lista + " <tr> <td>" + respuesta[i].rol +"</td>"+ "<td>" + respuesta[i].nombre+"</td> "+ "<td>" + respuesta[i].apellido+"</td> "+ "<td>" + respuesta[i].cedula+"</td> "+ "<td>" + respuesta[i].correo+"</td> "+ "<td>" + respuesta[i].contrasena+"</td> <td> </td> </tr>";
		      		}

		        		
		      	}

		      	lista = lista + " </table>";

		      	document.getElementById("response").innerHTML = lista;

                
           }
       });

        return false;

    });


    $(document).on('click', '.eliminar', function(){ //Para seleccionar los botones eliminar creados dinamicamente

    	var that    = $(this);
            url     = "script.php/?eliminar=true";
            type  	= "delete";
            data    = {};

        console.log(that.attr("value"));
        data["cedula"] = that.attr("value");

        $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);
                
                $("#response").html("<h1><span class='label label-success'> "+response+" </span></h1>");
                

                //setTimeout(function(){location.href="index.php"} , 1000);  
                //setTimeout(location.reload.bind(location), 1000);
           }
       	});
       	return false;
    });

    $( "#ajax_pag_listar_estudiantes" ).submit(function( event ){ //Al momento de darle click a listar todos

        var that    = $(this);
            url     = "script.php/?pag_listar_estudiantes=true";
            type  	= "get";
            data    = {};

       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);

                var lista = "<table class='table table-striped'> <tr> <th>Rol</th> <th>Nombre</th> <th>Apellido</th> <th>Cedula</th> <th>Correo</th> <th>Contraseña</th> <th>Eliminar</th> </tr> ";
                var respuesta = JSON.parse(response);

		      	for (var i = 0; i < respuesta.length; i++) {
		        	lista = lista + " <tr class='estudiante'> <td>" + respuesta[i].rol +"</td>"+ "<td>" + respuesta[i].nombre+"</td> "+ "<td>" + respuesta[i].apellido+"</td> "+ "<td>" + respuesta[i].cedula+"</td> "+ "<td>" + respuesta[i].correo+"</td> "+ "<td>" + respuesta[i].contrasena+"</td> "+ "<td><a class='eliminar' href='#' value='"+respuesta[i].cedula+"'><button class='label label-danger'>X</button></a></td> </tr>";
		      	}

		      	lista = lista + " </table>";

		      	document.getElementById("response").innerHTML = lista;
                
           }
       });

        return false;
        
    });

    $( "#ajax_pag_listar_preparadores" ).submit(function( event ){ //Al momento de darle click a listar todos

        var that    = $(this);
            url     = "script.php/?pag_listar_preparadores=true";
            type  	= "get";
            data    = {};

       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);

                var lista = "<table class='table table-striped'> <tr> <th>Rol</th> <th>Nombre</th> <th>Apellido</th> <th>Cedula</th> <th>Correo</th> <th>Contraseña</th></tr> ";
                var respuesta = JSON.parse(response);

		      	for (var i = 0; i < respuesta.length; i++) {
		        	lista = lista + " <tr> <td>" + respuesta[i].rol +"</td>"+ "<td>" + respuesta[i].nombre+"</td> "+ "<td>" + respuesta[i].apellido+"</td> "+ "<td>" + respuesta[i].cedula+"</td> "+ "<td>" + respuesta[i].correo+"</td> "+ "<td>" + respuesta[i].contrasena+"</td> </tr>";
		      	}

		      	lista = lista + " </table>";

		      	document.getElementById("response").innerHTML = lista;
                
           }
       });

        return false;
        
    });

    $( "#ajax_pag_listar_perfil" ).submit(function( event ){ //Al momento de darle click a listar todos

        var that    = $(this);
            url     = "script.php/?pag_listar_perfil=true";
            type  	= "get";
            data    = {};

       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);

                var lista = "<table class='table table-striped'> <tr> <th>Rol</th> <th>Nombre</th> <th>Apellido</th> <th>Cedula</th> <th>Correo</th> <th>Contraseña</th></tr> ";
                var respuesta = JSON.parse(response);

		      	for (var i = 0; i < respuesta.length; i++) {
		        	lista = lista + " <tr> <td>" + respuesta[i].rol +"</td>"+ "<td>" + respuesta[i].nombre+"</td> "+ "<td>" + respuesta[i].apellido+"</td> "+ "<td>" + respuesta[i].cedula+"</td> "+ "<td>" + respuesta[i].correo+"</td> "+ "<td>" + respuesta[i].contrasena+"</td> </tr>";
		      	}

		      	lista = lista + " </table>";

		      	document.getElementById("response").innerHTML = lista;

		      	$("#ajax_modificar_perfil").css("display","block");


		      	$("form input, form select, form textarea").each(
		            function(index){  
		                var input = $(this);

		                if(input.attr("type") != "submit"){ 

		                	if(input.attr("name") == "rol"){
		                		input.val(respuesta[0].rol);
		                	} else if(input.attr("name") == "nombre"){
		                		input.val(respuesta[0].nombre);
		                	} else if(input.attr("name") == "apellido"){
		                		input.val(respuesta[0].apellido);
		                	} else if(input.attr("name") == "cedula"){
		                		input.val(respuesta[0].cedula);
		                	} else if(input.attr("name") == "correo"){
		                		input.val(respuesta[0].correo);
		                	} else if(input.attr("name") == "contrasena"){
		                		input.val(respuesta[0].contrasena);
		                	}

		                   

		                } 
		            }
		        );
                
           }
       });

        return false;
        
    });


    $( "#ajax_modificar_perfil" ).submit(function( event ){ //Al momento de darle click a registrar usuario

        var that    = $(this);
            url     = "script.php/?pag_modificar_perfil=true";
            type  	= "put";
            data    = {};


        $("form input, form select, form textarea").each(
            function(index){  
                var input = $(this);

                if(input.attr("type") != "submit" && input.attr("type") == "checkbox"){//Obtenemos el valor del input checked o unchecked
                   
                   data[input.val()] = input.is(":checked");

                } else if(input.attr("type") != "submit"){   

                   data[input.attr("name")] = input.val();

                } 
            }
        );

       // console.log(data);

       $.ajax({
           url: url ,
           type: type,
           data: data,
           success: function(response){
                console.log(response);

                if (response.match(/code-error/i) != null) {
                    $("#response").html("<h1><span class='label label-danger'> "+response+" </span></h1>");
                }else{
                    $("#response").html("<h1><span class='label label-success'> "+response+" </span></h1>");
                }
                
           }
       });



        return false;
    });


    $("#input_filtro").on("keyup", function() { //filtro de la pagina eliminar

    	var value = $(this).val().toLowerCase(); //llevamos a minuscula lo que se escribio
    	$("#response .table .estudiante").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});

  	});

  	$(document).on('click', '.icon', function(){
  		var x = document.getElementById("menu_header3");
	    if (x.className === "header3") {
	        x.className += " responsive";
	    } else {
	        x.className = "header3";
	    }
  	});
});