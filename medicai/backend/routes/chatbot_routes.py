from flask import Blueprint, request, jsonify
from transformers import pipeline

chatbot_bp = Blueprint("chatbot", __name__)
medical_qa = pipeline("question-answering", model="deepset/roberta-base-squad2")

@chatbot_bp.route("/chat", methods=["POST"])
def chat():
    data = request.json
    question = data.get("question")
    context = "The hospital is open from 9 AM to 7 PM. Emergency services are available 24/7."

    response = medical_qa(question=question, context=context)
    return jsonify({"answer": response["answer"]})