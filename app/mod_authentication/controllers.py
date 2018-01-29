# Import flask dependencies
from flask import Blueprint, request, render_template


# Import the database object from the main app module
from app import db

# Import module forms
    #from app.mod_authentication.forms import LoginForm

# Import module models (i.e. User)
    #from app.mod_authentication.models import User

# Define the blueprint: 'auth', set its url prefix: app.url/auth
mod_authentication = Blueprint('authentication', __name__, url_prefix='/authentication')

# Set the route and accepted methods
@mod_authentication.route('/signin/', methods=['GET', 'POST'])
def signin():

    # If sign in form is submitted

    # Verify the sign in form
    return render_template("authentication/signin.html", form=form)