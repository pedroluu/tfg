<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="./css/loginstyles.css" rel="stylesheet">
    <title>Login - ManagerPro</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid">
        </div>
        <h1>HADES BOX CENTER</h1>
        <h2>FORGING FITNESS</h2>
        <p>VEN A ENTRENAR CON NOSOTROS</p>
        <button class="btn btn-light">Apúntate ahora</button>
        <div class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users"></i> Coaches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-running"></i> Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-clock"></i> Horario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-dollar-sign"></i> Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i> Localización</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i> Zona Socios</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="form-container d-flex justify-content-center align-items-center" style="height: 60vh;">
        <div class="card w-50">
            <div class="card-header text-center">Iniciar Sesión</div>
            <div class="card-body">
                <form method="POST" action="/ruta-de-login" onsubmit="return validateLoginForm(event)">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="mi-email@example.com">
                        <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        <div class="invalid-feedback">Por favor, ingresa una contraseña.</div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Sobre Nosotros</h4>
                    <p>Hades Box Center es un gimnasio dedicado a ofrecer entrenamiento de alta calidad. Únete a
                        nosotros y lleva tu rendimiento al siguiente nivel.</p>
                </div>
                <div class="footer-section">
                    <h4>Contacto</h4>
                    <p>Email: info@hadesboxcenter.com</p>
                    <p>Teléfono: +34 123 456 789</p>
                    <p>Dirección: Calle Ejemplo 123, Ciudad, País</p>
                </div>
                <div class="footer-section">
                    <h4>Síguenos</h4>
                    <p><a href="#">Facebook</a></p>
                    <p><a href="#">Instagram</a></p>
                    <p><a href="#">Twitter</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Hades Box Center. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/login-validation.js') }}"></script>
</body>

</html>
