# Import flask dependencies
from flask import Blueprint, request, render_template, session, url_for, flash, jsonify
from bson import BSON
from bson import json_util
import itertools

# Importamos APP para definir la pagina princial
from app import app

# Import module models (i.e. User)
from app.mod_state.models import look_for_user, look_states, look_friends_states

# Define the blueprint: 'auth', set its url prefix: app.url/auth
mod_state = Blueprint('state', __name__, url_prefix='/state')

# Set the route and accepted methods
@app.route('/')
@mod_state.route('/')
def state_index():

    # If sign in form is submitted
    if 'name' in session:
    	return render_template("state/index.html")

    return render_template("authentication/signin.html")
 
@app.route('/load_states<id>')
@mod_state.route('/load_states<id>')
def load_states(id):

    # If sign in form is submitted
    if 'name' not in session:
    	return render_template("authentication/signin.html")
    

    #existing_user = look_for_user(session['email'])
    #return jsonify(json_util.dumps(existing_user))

    states1 = jsonify(json_util.dumps(look_states(session['id'])))
    states2 = jsonify(json_util.dumps(look_friends_states(session['id']) ) )

    
    return states1
    
    

