from flask import Blueprint, request, jsonify, session

admin_bp = Blueprint("admin", __name__)

def is_admin():
    return session.get("user") and session["user"].get("role") == "admin"

@admin_bp.route("/appointments", methods=["GET"])
def get_appointments():
    if not is_admin():
        return jsonify({"error": "Unauthorized"}), 403
    # Fetch appointments from DB
    return jsonify([...])  # Replace with real query