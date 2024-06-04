function validateForm(event) {
    let isValid = true;

    // Obtener los elementos del formulario
    const nombre = document.getElementById("nombre");
    const apellidos = document.getElementById("apellidos");
    const fechaNac = document.getElementById("fecha_nac");
    const tarifa = document.getElementById("tarifa");
    const email = document.getElementById("email");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const passwordConfirmation = document.getElementById(
        "password_confirmation"
    );

    // Validar nombre
    if (nombre.value.trim() === "") {
        nombre.classList.add("is-invalid");
        isValid = false;
    } else {
        nombre.classList.remove("is-invalid");
    }

    // Validar apellidos
    if (apellidos.value.trim() === "") {
        apellidos.classList.add("is-invalid");
        isValid = false;
    } else {
        apellidos.classList.remove("is-invalid");
    }

    // Validar fecha de nacimiento
    if (fechaNac.value === "") {
        fechaNac.classList.add("is-invalid");
        isValid = false;
    } else {
        fechaNac.classList.remove("is-invalid");
    }

    // Validar tarifa
    if (tarifa.value === "") {
        tarifa.classList.add("is-invalid");
        isValid = false;
    } else {
        tarifa.classList.remove("is-invalid");
    }

    // Validar email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
        email.classList.add("is-invalid");
        isValid = false;
    } else {
        email.classList.remove("is-invalid");
    }

    // Validar nombre de usuario
    if (username.value.trim() === "") {
        username.classList.add("is-invalid");
        isValid = false;
    } else {
        username.classList.remove("is-invalid");
    }

    // Validar contraseña
    if (password.value.trim() === "") {
        password.classList.add("is-invalid");
        isValid = false;
    } else {
        password.classList.remove("is-invalid");
    }

    // Validar confirmación de contraseña
    if (password.value !== passwordConfirmation.value) {
        passwordConfirmation.classList.add("is-invalid");
        isValid = false;
    } else {
        passwordConfirmation.classList.remove("is-invalid");
    }

    // Si el formulario no es válido, prevenir el envío
    if (!isValid) {
        event.preventDefault();
    }

    return isValid;
}
