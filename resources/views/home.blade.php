<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>ManagerPro</title>
</head>

<body>
     <header class="header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="./img/logo.png" alt="Logo" class="img-fluid">
            </a>
        </div>
        <h1>HADES BOX CENTER</h1>
        <h2 id="header-subtitle">FORGING FITNESS</h2>
        <p id="header-text">VEN A ENTRENAR CON NOSOTROS</p>
        <a id="header-button" class="btn btn-light" href="{{ route('form') }}">Apúntate ahora</a>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#actividades"><i class="fas fa-running"></i> Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tarifas"><i class="fas fa-dollar-sign"></i> Tarifas</a>
                    </li>
                    @guest('client')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-sign-in-alt"></i> Registro</a>
                    </li>
                    @endguest
                    @auth('client')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservar.clases') }}"><i class="fas fa-calendar-alt"></i> Reservar Clase</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Cuenta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('client.dashboard') }}">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </li>
                    @endauth


                    @auth('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cogs"></i> Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.clientes.index') }}">Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.clases.index') }}">Clases</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.entrenadors.index') }}">Entrenadores</a></li>
                            <!-- Añade más enlaces según sea necesario -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Admin Logout</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>


    <main class="container my-5">
        <section class="row mb-5">
            <div class="col-md-8">
                <h3 class="section-title text-center">CROSS TRAINING</h3>
                <h4 class="section-subtitle text-center">Qué es y en qué consiste</h4>
                <p>Cross Training se define como un sistema de entrenamiento de fuerza y acondicionamiento basado en
                    ejercicios funcionales constantemente variados realizados a una alta intensidad.</p>
                <p>Es fácil escribirlo y explicarlo pero difícil entenderlo hasta que lo vives. Ven a probarlo, ¡que no
                    te lo cuenten!</p>
            </div>
            <div class="col-md-4 mt-4">
                <img src="./img/cross.jpg" alt="Cross Training" class="img-fluid rounded">
            </div>
        </section>

        <section class="row">
            <div class="col-md-4">
                <img id="box__img" src="./img/fondo.jpg" alt="El Box" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h3 class="section-title text-center">EL BOX</h3>
                <h4 class="section-subtitle text-center">Ven a conocernos</h4>
                <p>El Box es como se llama al lugar donde entrenamos, pero no es solo eso, es un sitio para divertirse,
                    compartir esfuerzo y conocer gente que comparte nuestra pasión por el Cross Training.</p>
                <p>Además, contamos con las mejores instalaciones, las mejores herramientas y el mejor material para
                    que tus entrenamientos sean eficaces y seguros.</p>
                <p>En definitiva, el Box es como tu segunda casa, un lugar donde encontrarás motivación y siempre te
                    sentirás bienvenido.</p>
            </div>
        </section>

        <section class="my-5" id="actividades">
            <h2 class="text-center">Actividades y Clases</h2>
            <div class="legend">
                <span class="legend-item"><span class="color-box funcional"></span>Funcional</span>
                <span class="legend-item"><span class="color-box open-box"></span>Open Box</span>
                <span class="legend-item"><span class="color-box cross-training"></span>Cross Training</span>
                <span class="legend-item"><span class="color-box halterofilia"></span>Halterofilia</span>
            </div>
            <div class="table-responsive">
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
                        <tr>
                            <td>9:30-11:00</td>
                            <td class="funcional">Funcional</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                        </tr>
                        <tr>
                            <td>11:30-13:00</td>
                            <td class="open-box">Open Box</td>
                            <td class="funcional">Funcional</td>
                            <td class="cross-training">Cross Training</td>
                            <td class="open-box">Open Box</td>
                            <td class="cross-training">Cross Training</td>
                            <td class="funcional">Funcional</td>
                        </tr>
                        <tr>
                            <td>13:00-14:00</td>
                            <td class="cross-training">Cross Training</td>
                            <td class="cross-training">Cross Training</td>
                            <td class="funcional">Funcional</td>
                            <td class="halterofilia">Halterofilia</td>
                            <td class="funcional">Funcional</td>
                            <td class="cross-training">Cross Training</td>
                        </tr>
                        <tr>
                            <td>16:00-18:00</td>
                            <td class="halterofilia">Halterofilia</td>
                            <td class="halterofilia">Halterofilia</td>
                            <td class="open-box">Open Box</td>
                            <td class="funcional">Funcional</td>
                            <td class="cross-training">Cross Training</td>
                            <td class="halterofilia">Halterofilia</td>
                        </tr>
                        <tr>
                            <td>18:30-20:00</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                            <td class="cross-training">Cross Training</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                            <td class="open-box">Open Box</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section id="tarifas" class="section pricing text-center">
            <h2>TARIFAS</h2>
            <p>No es lo que tú tienes, sino cómo usas lo que tienes lo que marca la diferencia</p>
            <div class="pricing-cards">
                <div class="pricing-card">
                    <h3>HADES</h3>
                    <p class="price">40 <span class="currency">€/mes</span></p>
                    <p>Cross Training, Funcional, HY - WOD, MEGAWOD, Halterofilia, Open Box, DEKA:
                        <strong>Ilimitado</strong>
                    </p>
                    <p class="price-three-months">105 <span class="currency">€ (3 meses)</span></p>
                    <a href="{{ route('form') }}" class="btn custom-btn">Apuntate</a>
                </div>
                <div class="pricing-card">
                    <h3>ZEUS</h3>
                    <p class="price">35 <span class="currency">€/mes</span></p>
                    <p>Cross Training, Funcional, HY - WOD, MEGAWOD, Halterofilia, Open Box, DEKA:
                        <strong>15/mes</strong>
                    </p>
                    <p class="price-three-months">95 <span class="currency">€ (3 meses)</span></p>
                    <a href="{{ route('form') }}" class="btn custom-btn">Apuntate</a>
                </div>
                <div class="pricing-card">
                    <h3>POSEIDÓN</h3>
                    <p class="price">30 <span class="currency">€/mes</span></p>
                    <p>Cross Training, Funcional, HY - WOD, MEGAWOD, Halterofilia, Open Box, DEKA:
                        <strong>10/mes</strong>
                    </p>
                    <p class="price-three-months">80 <span class="currency">€ (3 meses)</span></p>
                    <a href="{{ route('form') }}" class="btn custom-btn">Apuntate</a>
                </div>
            </div>
        </section>
    </main>

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
                    <p>Dirección:  C. Paz, 13, 45470 Los Yébenes, Toledo</p>
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
         <script src="./js/navResponsive.js"></script>
</body>

</html>
