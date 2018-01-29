# Run a test server.
from app import app

app.run(port=8080, debug=True)

#Externally Visible Server 
	#app.run(host='0.0.0.0', port=8080, debug=True)