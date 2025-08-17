// FILE: validation.js
function validateForm() {
  const email = document.getElementById("email").value;
  const birth = document.getElementById("birth").value;
  const password = document.getElementById("password").value;

  const emailRegex = /^[a-z0-9._%+-]+@cse\.diu\.edu\.bd$/;
  const dateRegex = /^\d{2}-\d{2}-\d{4}$/;
  const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[@]).{6,}$/;

  if (!emailRegex.test(email)) {
    alert("Use only .cse@diu.edu.bd email");
    return false;
  }

  if (!dateRegex.test(birth)) {
    alert("Use date format dd-mm-yyyy");
    return false;
  }

  if (!passRegex.test(password)) {
    alert("Password must contain at least one lowercase, one uppercase and '@'");
    return false;
  }

  return true;
}
