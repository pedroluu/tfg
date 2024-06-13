// public/js/profile-validation.js
function validateProfileForm(event) {
    const nombreInput = document.getElementById("nombre");
    const apellidosInput = document.getElementById("apellidos");
    const emailInput = document.getElementById("email");
    const fechaNacInput = document.getElementById("FechaNac");
    let valid = true;

    if (nombreInput.value.trim() === "") {
        nombreInput.classList.add("is-invalid");
        valid = false;
    } else {
        nombreInput.classList.remove("is-invalid");
    }

    if (apellidosInput.value.trim() === "") {
        apellidosInput.classList.add("is-invalid");
        valid = false;
    } else {
        apellidosInput.classList.remove("is-invalid");
    }

    if (emailInput.value.trim() === "" || !validateEmail(emailInput.value)) {
        emailInput.classList.add("is-invalid");
        valid = false;
    } else {
        emailInput.classList.remove("is-invalid");
    }

    if (fechaNacInput.value.trim() === "") {
        fechaNacInput.classList.add("is-invalid");
        valid = false;
    } else {
        fechaNacInput.classList.remove("is-invalid");
    }

    return valid;
}

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(String(email).toLowerCase());
}
