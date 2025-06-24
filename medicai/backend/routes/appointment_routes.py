from flask import Blueprint, request, jsonify
import mysql.connector

appointment_bp = Blueprint("appointments", __name__)

db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="medicai"
)
cursor = db.cursor()

@appointment_bp.route("/book", methods=["POST"])
def book_appointment():
    data = request.json
    patient_id = data.get("patient_id")
    doctor_id = data.get("doctor_id")
    date = data.get("date")
    time = data.get("time")
    reason = data.get("reason")

    sql = "INSERT INTO appointments (patient_id, doctor_id, date, time, reason) VALUES (%s, %s, %s, %s, %s)"
    values = (patient_id, doctor_id, date, time, reason)
    cursor.execute(sql, values)
    db.commit()
    return jsonify({"message": "Appointment booked!"})

    @appointment_bp.route("/guest/book", methods=["POST"])
def guest_book_appointment():
    data = request.json
    sql = """
    INSERT INTO appointments (patient_name, patient_email, doctor_id, date, time, reason)
    VALUES (%s, %s, %s, %s, %s, %s)
    """
    values = (
        data.get("patient_name"),
        data.get("patient_email"),
        data.get("doctor_id"),
        data.get("date"),
        data.get("time"),
        data.get("reason")
    )
    cursor.execute(sql, values)
    db.commit()
    return jsonify({"message": "Guest appointment booked!"})