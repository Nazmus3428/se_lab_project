from flask import Flask, request, jsonify, session
from flask_cors import CORS
import mysql.connector

app = Flask(__name__)
CORS(app)
app.secret_key = "hospital_secret_key"

# Import routes
from routes.auth_routes import auth_bp
from routes.symptom_routes import symptom_bp
from routes.appointment_routes import appointment_bp
from routes.admin_routes import admin_bp
from routes.chatbot_routes import chatbot_bp

app.register_blueprint(auth_bp)
app.register_blueprint(symptom_bp)
app.register_blueprint(appointment_bp)
app.register_blueprint(admin_bp)
app.register_blueprint(chatbot_bp)

if __name__ == "__main__":
    app.run(debug=True)