document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("profile-form")
        .addEventListener("submit", function (e) {
            let valid = true;

            let nombre = document.getElementById("nombre").value;
            let apellidos = document.getElementById("apellidos").value;
            let email = document.getElementById("email").value;
            let FechaNac = document.getElementById("FechaNac").value;

            if (!nombre) {
                valid = false;
                alert("El campo Nombre es obligatorio.");
            }

            if (!apellidos) {
                valid = false;
                alert("El campo Apellidos es obligatorio.");
            }

            if (!email) {
                valid = false;
                alert("El campo Email es obligatorio.");
            } else {
                let emailPattern =
                    /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!emailPattern.test(email)) {
                    valid = false;
                    alert(
                        "Ingrese una dirección de correo electrónico válida."
                    );
                }
            }

            if (!FechaNac) {
                valid = false;
                alert("El campo Fecha de Nacimiento es obligatorio.");
            } else {
                let datePattern = /^\d{4}-\d{2}-\d{2}$/;
                if (!datePattern.test(FechaNac)) {
                    valid = false;
                    alert(
                        "Ingrese una fecha de nacimiento válida (AAAA-MM-DD)."
                    );
                }
            }

            if (!valid) {
                e.preventDefault();
            }
        });
});
