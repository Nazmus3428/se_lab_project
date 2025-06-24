from flask import Blueprint, request, jsonify, session
import mysql.connector

auth_bp = Blueprint("auth", __name__)

db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="medicai"
)
cursor = db.cursor(dictionary=True)

@auth_bp.route("/login", methods=["POST"])
def login():
    data = request.json
    email = data.get("email")
    password = data.get("password")

    cursor.execute("SELECT * FROM patients WHERE email=%s AND password=%s", (email, password))
    patient = cursor.fetchone()
    if patient:
        session["user"] = {"id": patient["id"], "role": "patient"}
        return jsonify({"role": "patient", "id": patient["id"]})

    cursor.execute("SELECT * FROM doctors WHERE email=%s AND password=%s", (email, password))
    doctor = cursor.fetchone()
    if doctor:
        session["user"] = {"id": doctor["id"], "role": "doctor"}
        return jsonify({"role": "doctor", "id": doctor["id"]})

    return jsonify({"error": "Invalid credentials"}), 401