# Import flask dependencies
from flask import Blueprint, request, render_template, session, url_for

# Import the database object from the main app module
from app import db, db_usuarios

# Import module forms
from app import app

# Import module models (i.e. User)
	#from app.mod_authentication.models import User

# Define the blueprint: 'auth', set its url prefix: app.url/auth
from app.mod_state.controllers import mod_state, state_index

mod_authentication = Blueprint('authentication', __name__, url_prefix='/user')
mod_state = Blueprint('state', __name__, url_prefix='/state')

# Set the route and accepted methods
@mod_authentication.route('/')
@mod_authentication.route('/signin/')
def signin():

    return render_template("authentication/signin.html")

@mod_authentication.route('/login', methods=['GET', 'POST'])
def login():
	
	user = db_usuarios
	existing_user = user.find_one({'email' : request.form['email']})

	if existing_user:
		if (request.form['password'] == existing_user['password']):
			session['name'] = existing_user['nombre']
			session['email'] = existing_user['email']
			session['password'] = existing_user['password']
			return state_index()
	
	return signin()

@mod_authentication.route('/register', methods=['GET', 'POST'])
def register():

	return render_template("authentication/register.html")

@mod_authentication.route('/new_register', methods=['GET', 'POST'])
def new_register():
#Para registrar un nuevo usuario en la BD

	if request.method == 'POST':
		user = db_usuarios
		existing_user = user.find_one({'email' : request.form['email']})

		if existing_user is None:
			#hashpass = bcrypt.haspw(request.form['password'].encode('utf-8'), bcrypt.genSalt())
			hashpass = request.form['password']

			new_user = {
				"nombre" : request.form['name'],
				"email" : request.form['email'],
				"password" : hashpass
			}

			user.insert_one(new_user)
			session['name'] = request.form['name']
			session['email'] = request.form['email']
			session['password'] = hashpass
			return state_index()

		return 'El correo ya existe!'

	return render_template("authentication/register.html")

@mod_authentication.route('/logout/', methods=['GET', 'POST'])
@mod_state.route('/logout/')
@app.route('/logout/')
def logout():

    session.pop('name', None)
    session.pop('email', None)
    session.pop('email', None)

    return render_template("authentication/signin.html")