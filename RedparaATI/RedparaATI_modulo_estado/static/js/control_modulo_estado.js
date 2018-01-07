$(document).ready(function(){//Cuando cargan todos los elementos del DOM

	//1. Mostramos la información dinamicamente desde el json
	var i = 0;			//Valor Inicial
	var max_value = 20; //Cantidad de elementos maxima en el json 
	var increment = 2;	//Cantidad de elementos a mostrar hasta llegar al maximo
	more_elements_callback(i,increment,max_value);

	//Evento de ver más al hacer scroll
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


});


/*****************OTRAS FUNCIONES********************************/


function hide_button(){ // Elimina el botón de carga de mas publicaciones del DOM

	var item = document.getElementById("Superbutton");
	item.parentNode.removeChild(item);

	//Lo mismo pero con jquery
	//$("#Superbutton").remove();
}

function show_button(index,increment,max_value){// Agrega de nuevo el botón de carga de mas publicaciones al final de las publicaciones
	
	//1. Creamos el boton
	var item 	= document.createElement("button"); 
	item.id  	= "Superbutton";
	item.type 	= "button";
	item.title 	= "Ver más";
	item.appendChild(document.createTextNode("Ver más"));
	item.onclick= function() {
		more_elements_callback(index,increment,max_value);
	};

	//2. Agregamos el boton al final
	document.getElementById("content").appendChild(item); //Buscamos el padre para agregarle hijos
	
	//Esctructura del boton:
	//<button id="Superbutton" type="button" title="Ver más" onclick="more_elements_callback(index,increment,max_value)"> Ver más</button>
}

function more_elements_callback(index,increment,max_value){ //Funcion para agregar elementos mas despues del indice

	//Valor maximo actual
	var max = index + increment;

	//Validamos que no se pase del mayor valor del json
	if (max > max_value) {

		
		i = 0; //Para repetir todos los datos del json

		more_elements_callback(i, increment, max_value);

	}else{

		//Removemos el boton
		hide_button();

		for (i = index; i < max; i++) {

			var publicacion = 			"<p class='data_title' title='data_title'>"+mydata[i].title+"</p>";
			publicacion = publicacion + "<p class='data_description' title='data_description'>"+mydata[i].description+"</p>";
			publicacion = publicacion + "<div class='data_image' title='data_image'><img class='data_image2' title='"+mydata[i].url+"' src='"+mydata[i].url+"'></img></div>";
			$(publicacion).appendTo("#content");


			/*
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
			*/
		}

		//Agregamos el boton
		show_button(max,increment,max_value);
	}

}