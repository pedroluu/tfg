<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/perfilStyles.css') }}" rel="stylesheet">
    <title>Cliente Dashboard - ManagerPro</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="../img/logo.png" alt="Logo" class="img-fluid">
            </a>
        </div>
        <h1>HADES BOX CENTER</h1>
       <h2 id="header-subtitle">FORGING FITNESS</h2>
        <p id="header-text">VEN A ENTRENAR CON NOSOTROS</p>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservar.clases') }}"><i class="fas fa-calendar-alt"></i>Reservar Clase</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Cuenta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <main class="container my-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Sección de Clases Reservadas -->
        <section class="row mb-5">
            <div class="col-12">
                <h4 class="section-title text-center">Tus Clases Reservadas</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Clase</th>
                            <th scope="col">Fecha Reserva</th>
                            <th scope="col">Hora Clase</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::guard('client')->user()->reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->clase->Nombre }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->FechaReserva)->format('d/m/Y') }}</td>
                                <td>{{ $reserva->clase->hora }}</td>
                                <td>
                                    <form action="{{ route('cancelar.reserva', $reserva->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

         <!-- Formulario de actualización del perfil -->
         <section class="row mb-5">
            <div class="col-12">
                <h4 class="section-title text-center">Información del Perfil</h4>
                <form action="{{ route('client.update') }}" method="POST" id="profile-form" onsubmit="return validateProfileForm(event)">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->Nombre }}">
                            <div class="invalid-feedback">Por favor, ingresa un nombre.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $user->Apellidos }}">
                            <div class="invalid-feedback">Por favor, ingresa los apellidos.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->Email }}">
                            <div class="invalid-feedback">Por favor, ingresa un email válido.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FechaNac" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="FechaNac" name="FechaNac" value="{{ $user->FechaNac }}">
                            <div class="invalid-feedback">Por favor, ingresa una fecha de nacimiento.</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Sobre Nosotros</h4>
                    <p>Hades Box Center es un gimnasio dedicado a ofrecer entrenamiento de alta calidad. Únete a nosotros y lleva tu rendimiento al siguiente nivel.</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/validationUp.js') }}"></script>
    <script src="{{ asset('js/navResponsive.js') }}"></script>
</body>

</html>
