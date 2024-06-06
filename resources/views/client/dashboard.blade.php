<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
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
        <h2>FORGING FITNESS</h2>
        <p>VEN A ENTRENAR CON NOSOTROS</p>
        <div class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-users"></i>Inicio</a>
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

        <!-- Sección de Clases Reservadas -->
        <section class="row mb-5">
            <div class="col-12">
                <h4 class="section-title text-center">Tus Clases Reservadas</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Clase</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se listarán las clases reservadas del cliente -->
                        <tr>
                            <td>Clase de Yoga</td>
                            <td>01/06/2024</td>
                            <td>10:00 AM</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Cancelar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Entrenamiento Funcional</td>
                            <td>03/06/2024</td>
                            <td>12:00 PM</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Cancelar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Sección de Información del Perfil -->
        <section class="row mb-5">
            <div class="col-12">
                <h4 class="section-title text-center">Información del Perfil</h4>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="Nombre Cliente">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" value="Apellidos Cliente">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="cliente@correo.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" value="+34 123 456 789">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </section>

        <!-- Sección de Actividades y Clases -->
        <section id="actividades" class="my-5">
            <h2 class="text-center">Reserva tus clases</h2>
            <div class="legend">
                <span class="legend-item"><span class="color-box funcional"></span>Funcional</span>
                <span class="legend-item"><span class="color-box open-box"></span>Open Box</span>
                <span class="legend-item"><span class="color-box cross-training"></span>Cross Training</span>
                <span class="legend-item"><span class="color-box halterofilia"></span>Halterofilia</span>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $horarios = [
                    '09:30-11:00',
                    '11:30-13:00',
                    '13:00-14:00',
                    '16:00-18:00',
                    '18:30-20:00',
                    ];
                    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                    @endphp

                    @foreach ($horarios as $hora)
                    <tr>
                        <td>{{ $hora }}</td>
                        @foreach ($dias as $dia)
                        @php
                        $clase = $clases->where('hora', $hora)->where('dia', $dia)->first();
                        $class_name = strtolower(str_replace(' ', '-', $clase->Nombre ?? ''));
                        @endphp
                        <td class="{{ $class_name }}">
                            @if($clase)
                                <strong>{{ $clase->Nombre }}</strong>
                                <form action="{{ route('reservar.clase') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="clase_id" value="{{ $clase->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Reservar</button>
                                </form>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
</body>

</html>
