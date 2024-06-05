<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
    <title>ManagerPro</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="./img/logo.png" alt="Logo" class="img-fluid">
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
                        <a class="nav-link" href="#"><i class="fas fa-dollar-sign"></i> Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i> Localización</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                                class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

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

        <section class="my-5">
            <h2 class="text-center">Actividades y Clases</h2>
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
                        <td class="{{ $class_name }}">{{ $clase->Nombre ?? '' }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                    <a href="#hades" id="btn1" class="btn">Apuntate</a>
                </div>
                <div class="pricing-card">
                    <h3>ZEUS</h3>
                    <p class="price">35 <span class="currency">€/mes</span></p>
                    <p>Cross Training, Funcional, HY - WOD, MEGAWOD, Halterofilia, Open Box, DEKA:
                        <strong>15/mes</strong>
                    </p>
                    <p class="price-three-months">95 <span class="currency">€ (3 meses)</span></p>
                    <a href="#zeus" class="btn">Apuntate</a>
                </div>
                <div class="pricing-card">
                    <h3>POSEIDÓN</h3>
                    <p class="price">30 <span class="currency">€/mes</span></p>
                    <p>Cross Training, Funcional, HY - WOD, MEGAWOD, Halterofilia, Open Box, DEKA:
                        <strong>10/mes</strong>
                    </p>
                    <p class="price-three-months">80 <span class="currency">€ (3 meses)</span></p>
                    <a href="#poseidon" class="btn">Apuntate</a>
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

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="loginEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
