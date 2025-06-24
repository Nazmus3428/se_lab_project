from flask import Blueprint, request, jsonify
import joblib
import numpy as np
from tensorflow.keras.models import load_model

symptom_bp = Blueprint("symptom", __name__)

model = load_model("models/symptom_model.h5")
vectorizer = joblib.load("models/vectorizer.pkl")
label_encoder = joblib.load("models/label_encoder.pkl")

@symptom_bp.route("/predict", methods=["POST"])
def predict_disease():
    data = request.json
    symptoms = data.get("symptoms")
    input_text = " ".join(symptoms)
    vec_input = vectorizer.transform([input_text])
    prediction = model.predict(vec_input.toarray())
    predicted_index = np.argmax(prediction)
    disease = label_encoder.inverse_transform([predicted_index])[0]
    return jsonify({"predicted_disease": disease})