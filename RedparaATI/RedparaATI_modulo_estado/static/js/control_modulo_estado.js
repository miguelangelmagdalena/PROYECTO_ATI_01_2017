$(document).ready(function(){



	/*$.getJSON("datos_ejemplo.json", function(result){
  		$(".data_title").text("asd");
  		$(".data_description").text("asd");
  		$( "#Superbutton").hide();
	});*/



	/*$( "#Superbutton" ).click(function(  ){
		
		$(".data_title").text("asd");

	    $.ajax({
	        url: "datos_ejemplo.json",
	        dataType: "jsonp",
	        success: function (data) {
	        	$(".data_description").text("aasasdassd");
	            json = data;

				console.log("no funciona");
	        }
	    });
		
	});*/


	/*$.getJSON("datos_ejemplo.json", {}, function(data){
		alert(data); //uncomment this for debug
        alert(data.field); //further debug
	}
	).fail(function(){
  		console.log("failed");
	});
	*/

	//Activar el boton  de ver más al hacer scroll
	$(window).scroll(function(){
		var windowHeight = $(window).scrollTop();
		var windowHeight2 = $(window).height();
		var documentHeight = $(document).height();
		//var contentTarget = $("#Superbutton").offset().top;
 		//console.log(windowHeight + "px / boton: " + contentTarget + "px");

		//console.log(windowHeight + "px / height: " + windowHeight2 + "px / altura " + documentHeight + "px");
		if((windowHeight + windowHeight2) >= documentHeight  ){
			$("#Superbutton").click();	
		}
	});


	//Mostramos la información dinamicamente desde el json
	var i = 0;
	var max_value = 20; //Cantidad de elementos maxima en el json 
	var increment = 2;

	more_elements_callback(i,increment,max_value);

});


	function hide_button(){ // Elimina el botón de carga de mas publicaciones dom
		var item = document.getElementById("Superbutton");
		item.parentNode.removeChild(item);
	}
	function show_button(index,increment,max_value){// Agrega de nuevo el botón de carga de mas publicaciones al final
		var item = document.createElement("button"); 
		item.id  	= "Superbutton";
		item.type 	= "button";
		item.title 	="Ver más";
		item.value  ="Ver más";
		item.onclick= function() {
			more_elements_callback(index,increment,max_value);
		};
		var text = document.createTextNode("Ver más");
		item.appendChild(text);

		var element = document.getElementById("content"); //Buscamos el padre para agregarle hijos
		element.appendChild(item);
	}

	function more_elements_callback(index,increment,max_value){ //Funcion para agregar elementos mas despues del indice

		var max = index + increment;

		//Validamos que no se pase del mayor valor del json
		if (max > max_value) {

			//2. Para repetir todos los datos del json
			i = 0; 
			more_elements_callback(i, increment, max_value);

		}else{

			//Removemos el boton
			hide_button();

			for (i = index; i < max; i++) {
				//Creamos data_title
				var p1 			= document.createElement("P"); 
				p1.className 	= "data_title";
				p1.title 		= "data_title";
				var text1 		= document.createTextNode(mydata[i].title); //Titulo
				var element 	= document.getElementById("content"); //Buscamos el padre para agregarle hijos
				p1.appendChild(text1);
				element.appendChild(p1);

				p1 = {};
				//Creamos data_description
				p1 				= document.createElement("P"); 
				p1.className 	= "data_description";
				p1.title 		= "data_description";
				text1 			= document.createTextNode(mydata[i].description); //Descripcion
				p1.appendChild(text1);
				element.appendChild(p1);

				p1 = {};
				//Creamos data_image
				p1 				= document.createElement("div"); 
				p1.className 	= "data_image";
				p1.title 		= "data_image";
				element.appendChild(p1);

				p1 = {};
				//Creamos data_image2
				p1 				= document.createElement("img"); 
				p1.className 	= "data_image2";
				p1.src 			= mydata[i].url; //Url de la imagen
				p1.title 		= mydata[i].url;
				elements 		= document.getElementsByClassName("data_image");
				elements[elements.length-1].appendChild(p1);
			}

			//Agregamos el boton
			show_button(max,increment,max_value);
		}

	}