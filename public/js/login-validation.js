// public/js/login-validation.js
function validateLoginForm(event) {
    const usuarioInput = document.getElementById("Usuario");
    const passwordInput = document.getElementById("password");
    let valid = true;

    if (usuarioInput.value.trim() === "") {
        usuarioInput.classList.add("is-invalid");
        valid = false;
    } else {
        usuarioInput.classList.remove("is-invalid");
    }

    if (passwordInput.value.trim() === "") {
        passwordInput.classList.add("is-invalid");
        valid = false;
    } else {
        passwordInput.classList.remove("is-invalid");
    }

    return valid;
}
