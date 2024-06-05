function validateLoginForm(event) {
    let valid = true;

    const email = document.getElementById("email");
    const password = document.getElementById("password");

    if (!email.value || !validateEmail(email.value)) {
        email.classList.add("is-invalid");
        valid = false;
    } else {
        email.classList.remove("is-invalid");
    }

    if (!password.value) {
        password.classList.add("is-invalid");
        valid = false;
    } else {
        password.classList.remove("is-invalid");
    }

    if (!valid) {
        event.preventDefault();
    }
    return valid;
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
