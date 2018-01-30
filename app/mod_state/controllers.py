# Import flask dependencies
from flask import Blueprint, request, render_template


# Import the database object from the main app module
from app import db

from app import app
# Import module forms
    #from app.mod_state.forms import LoginForm

# Import module models (i.e. User)
    #from app.mod_state.models import User

# Define the blueprint: 'auth', set its url prefix: app.url/auth
mod_state = Blueprint('state', __name__, url_prefix='/state')

# Set the route and accepted methods
@app.route('/')
@mod_state.route('/')
def home():

    # If sign in form is submitted

    # Verify the sign in form
    return render_template("state/index.html")