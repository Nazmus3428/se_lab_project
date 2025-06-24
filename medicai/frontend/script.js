// Handle Login
document.getElementById("loginForm")?.addEventListener("submit", function (e) {
  e.preventDefault();
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  fetch("http://localhost:5000/auth/login", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ email, password }),
  })
  .then((res) => res.json())
  .then((data) => {
    if (data.role) {
      localStorage.setItem("user", JSON.stringify(data));
      window.location.href = "dashboard.html";
    } else {
      document.getElementById("loginError").innerText = "Invalid credentials.";
    }
  });
});

// Guest Appointment Booking
document.getElementById("guestAppointmentForm")?.addEventListener("submit", function (e) {
  e.preventDefault();

  const payload = {
    patient_name: document.getElementById("guestName").value,
    patient_email: document.getElementById("guestEmail").value,
    doctor_id: document.getElementById("doctorSelect").value,
    date: document.getElementById("appointmentDate").value,
    time: document.getElementById("appointmentTime").value,
    reason: document.getElementById("reason").value
  };

  fetch("http://localhost:5000/appointments/guest/book", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  })
  .then((res) => res.json())
  .then(() => {
    document.getElementById("bookingStatus").innerText = "Thank you! Your request has been received.";
  })
  .catch(err => {
    document.getElementById("bookingStatus").innerText = "Oops! Something went wrong.";
    console.error(err);
  });
});

// Load user info in dashboard
window.addEventListener("load", () => {
  const user = JSON.parse(localStorage.getItem("user"));
  if (user && document.getElementById("userRole")) {
    document.getElementById("userRole").innerText = user.role;
    document.getElementById("userId").innerText = user.id;
  }
});

// Book Appointment
document.getElementById("bookingForm")?.addEventListener("submit", function (e) {
  e.preventDefault();
  const payload = {
    patient_id: document.getElementById("patient_id").value,
    doctor_id: document.getElementById("doctor_id").value,
    date: document.getElementById("date").value,
    time: document.getElementById("time").value,
    reason: document.getElementById("reason").value,
  };

  fetch("http://localhost:5000/appointments/book", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  }).then(() => alert("Appointment booked!"));
});

// Symptom Checker
function checkSymptoms() {
  const symptoms = document.getElementById("symptomsInput").value.split(",");
  fetch("http://localhost:5000/symptom/predict", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ symptoms }),
  })
  .then((res) => res.json())
  .then((data) => {
    document.getElementById("diseaseResult").innerText =
      "Predicted Disease: " + data.predicted_disease;
  });
}