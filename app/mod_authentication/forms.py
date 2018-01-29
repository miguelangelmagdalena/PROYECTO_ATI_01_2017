# Import Form validators
from wtforms.validators import Required, Email, EqualTo
from flask_wtf import FlaskForm

# Define the login form (WTForms)

class LoginForm(FlaskForm):
    email    = TextField('Email Address', [Email(),
                Required(message='Forgot your email address?')])
    password = PasswordField('Password', [
                Required(message='Must provide a password. ;-)')])