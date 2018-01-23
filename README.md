# PROYECTO_ATI_01_2017
Proyecto Red Social de Aplicaciones con la Tecnología Internet 01-2017 UCV

## Para ver la pagina con Github Pages
Aqui va a ser la pagina de estado:
* https://musthagon.github.io/PROYECTO_ATI_01_2017/RedparaATI/templates/index.html


## Ahora el directorio con Python Flask debería ser asi (en construcción...)
	
	~/PROYECTO_ATI_01_2017
		|-- run.py
		|-- config.py
		|__ /env             						# Virtual Environment (puede cambiar dependiendo del SO linux / window, yo use window)
		|__ /app             						# Our Application Module
			 |-- __init__.py
			 |__ /mod_authentication 		# (What's brilliant about this is the offered portability and reusability of your code, combined with ease of maintenance )
				|-- __init__.py
				|-- controllers.py
				|-- models.py
				|-- forms.py
			 |__ /mod_chat
			 |__ /mod_state
			 |__ /templates
				|--404.html
				|__ /authentication
				|__ /chat
				|__ /state
			 |__ /static

Seguir esta guia:
https://www.digitalocean.com/community/tutorials/how-to-structure-large-flask-applications

- [x] Instalar python, virtualenv, creamos entorno virtual env, instalamos Flask, instalamos otras dependencias en el entorno :alien:
- [ ] Crear base de datos MongoDB :scream:
- [ ] Probar que funciona el mod_authentication con  la DB :scream:
- [ ] Aplicar flask a los demas modulos :scream:
- [ ] Para todo lo demas existe mastercard :smile:

## Como esta organizado el directorio?
Es una estructura que recomienda el framework python flask 

	/..
		/template (Paginas html)
			/index.html
		/static
			/css
			/js
			/images
			/vendor (Css y js de frameworks u otros externos)
				/css
				/js
		
## Modelo de Datos
![alt text](/ATIDiagramaClasesModeloDatos.jpg "Modelo de datos")
	
## Modelo de Navegación
![alt text](ATIProyectoModNav.jpg "Modelo de datos")

## :warning: Pendiente:
* Activar Javascript
* Estoy probando las cosas con Xampp - Apache
* Estoy usando Google Chrome