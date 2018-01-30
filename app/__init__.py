# Import flask and template operators
from flask import Flask, render_template, request, redirect, url_for

# Import pymongo para usar mongodb
from pymongo import MongoClient

# For ObjectId to work
from bson.objectid import ObjectId 

# Define the WSGI application object
app = Flask(__name__)

# Configurations
app.config.from_object('config')

# Define the database object which is imported
# by modules and controllers
client = MongoClient('localhost',27017)

#Select the database
db = client.redparaati

#Select collections:
	#usuarios = db.usuarios
	#estados  = db.estados

# Sample HTTP error handling
@app.errorhandler(404)
def not_found(error):
    return render_template('404.html')

# Import a module / component using its blueprint handler variable (mod_auth)
from app.mod_authentication.controllers import mod_authentication
from app.mod_state.controllers import mod_state

# Register blueprint(s)
app.register_blueprint(mod_authentication)
app.register_blueprint(mod_state)
# app.register_blueprint(xyz_module)
# ..
