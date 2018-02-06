# Import the database object (db) from the main application module
from app import db, db_usuarios, db_estados, db_chats

def look_for_user (email2):
	return db_usuarios.find_one({'email' : email2 })

def look_states (id):
	mis_estados = db_estados.find( {'id_usuario' : id} )

	return mis_estados

def look_friends_states (id):
	usuario = db_usuarios.find_one({'id' : id })
	amigos 	= usuario['relacion']

	#return amigos
	#todos 		= mis_estados

	for i in amigos:
		estados_amigos = db_estados.find( {'id_usuario' : i['id_con']} )
		return estados_amigos
		#todos = [x for x in chain(todos, estados_amigos)]


	
	return ""