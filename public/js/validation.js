function validateForm(event) {
    const nombre = document.getElementById('Nombre');
    const apellidos = document.getElementById('Apellidos');
    const fechaNac = document.getElementById('FechaNac');
    const cuota = document.getElementById('Cuota');
    const email = document.getElementById('Email');
    const usuario = document.getElementById('Usuario');
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');

    let isValid = true;

    if (nombre.value.trim() === '') {
        nombre.classList.add('is-invalid');
        nombre.nextElementSibling.innerText = 'Por favor, ingresa tu nombre.';
        isValid = false;
    } else {
        nombre.classList.remove('is-invalid');
    }

    if (apellidos.value.trim() === '') {
        apellidos.classList.add('is-invalid');
        apellidos.nextElementSibling.innerText = 'Por favor, ingresa tus apellidos.';
        isValid = false;
    } else {
        apellidos.classList.remove('is-invalid');
    }

    if (fechaNac.value === '') {
        fechaNac.classList.add('is-invalid');
        fechaNac.nextElementSibling.innerText = 'Por favor, ingresa tu fecha de nacimiento.';
        isValid = false;
    } else {
        fechaNac.classList.remove('is-invalid');
    }

    if (cuota.value.trim() === '') {
        cuota.classList.add('is-invalid');
        cuota.nextElementSibling.innerText = 'Por favor, selecciona una tarifa.';
        isValid = false;
    } else {
        cuota.classList.remove('is-invalid');
    }

    if (email.value.trim() === '' || !validateEmail(email.value)) {
        email.classList.add('is-invalid');
        email.nextElementSibling.innerText = 'Por favor, ingresa un correo electrónico válido.';
        isValid = false;
    } else {
        email.classList.remove('is-invalid');
    }

    if (usuario.value.trim() === '') {
        usuario.classList.add('is-invalid');
        usuario.nextElementSibling.innerText = 'Por favor, ingresa un nombre de usuario.';
        isValid = false;
    } else {
        usuario.classList.remove('is-invalid');
    }

    if (password.value.trim() === '') {
        password.classList.add('is-invalid');
        password.nextElementSibling.innerText = 'Por favor, ingresa una contraseña.';
        isValid = false;
    } else if (password.value.length < 8) {
        password.classList.add('is-invalid');
        password.nextElementSibling.innerText = 'La contraseña debe tener al menos 8 caracteres.';
        isValid = false;
    } else {
        password.classList.remove('is-invalid');
    }

    if (password.value !== passwordConfirmation.value) {
        passwordConfirmation.classList.add('is-invalid');
        passwordConfirmation.nextElementSibling.innerText = 'Las contraseñas no coinciden.';
        isValid = false;
    } else {
        passwordConfirmation.classList.remove('is-invalid');
    }

    if (!isValid) {
        event.preventDefault();
    }
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
