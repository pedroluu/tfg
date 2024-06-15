<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/perfilStyles.css') }}" rel="stylesheet">
    <title>Gestión de Entrenadores - Hades Box Center</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
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
                        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cogs"></i> Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.clientes.index') }}">Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.entrenadores.index') }}">Entrenadores</a></li>
                            <!-- Añade más enlaces según sea necesario -->
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
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

        <h1>Gestión de Entrenadores</h1>

        <!-- Listar Entrenadores -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIF</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sueldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entrenadores as $entrenador)
                        <tr>
                            <td>{{ $entrenador->id }}</td>
                            <td>{{ $entrenador->NIF }}</td>
                            <td>{{ $entrenador->Nombre }}</td>
                            <td>{{ $entrenador->Apellidos }}</td>
                            <td>{{ $entrenador->FechaNac }}</td>
                            <td>{{ $entrenador->Sueldo }} €/mes</td>
                            <td>
                                <button class="btn btn-warning" onclick="editEntrenador({{ $entrenador }})">Editar</button>
                                <form action="{{ route('admin.entrenadores.destroy', $entrenador->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Formulario Crear/Editar Entrenador -->
        <div id="entrenadorFormContainer">
            <h2 id="formTitle">Añadir Entrenador</h2>
            <button id="addbtn" class="btn btn-secondary mb-3" onclick="resetForm()">Nuevo Entrenador</button>
            <form action="{{ route('admin.entrenadores.store') }}" method="POST" id="entrenadorForm">
                @csrf
                <input type="hidden" id="entrenadorId" name="id">
                <div class="mb-3">
                    <label for="NIF" class="form-label">NIF</label>
                    <input type="text" class="form-control" id="NIF" name="NIF" required>
                </div>
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="Apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="FechaNac" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="FechaNac" name="FechaNac" required>
                </div>
                <div class="mb-3">
                    <label for="Sueldo" class="form-label">Sueldo</label>
                    <input type="number" class="form-control" id="Sueldo" name="Sueldo" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/navResponsive.js') }}"></script>
    <script>
        function editEntrenador(entrenador) {
            document.getElementById('formTitle').innerText = 'Editar Entrenador';
            document.getElementById('entrenadorForm').action = '{{ route('admin.entrenadores.update', ':entrenador') }}'.replace(':entrenador', entrenador.id);
            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PUT');
            document.getElementById('entrenadorForm').appendChild(methodInput);
            document.getElementById('entrenadorId').value = entrenador.id;
            document.getElementById('NIF').value = entrenador.NIF;
            document.getElementById('Nombre').value = entrenador.Nombre;
            document.getElementById('Apellidos').value = entrenador.Apellidos;
            document.getElementById('FechaNac').value = entrenador.FechaNac;
            document.getElementById('Sueldo').value = entrenador.Sueldo;
            document.getElementById('NIF').disabled = true;
        }

        function resetForm() {
            document.getElementById('formTitle').innerText = 'Añadir Entrenador';
            document.getElementById('entrenadorForm').action = '{{ route('admin.entrenadores.store') }}';
            let methodInput = document.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }
            document.getElementById('entrenadorId').value = '';
            document.getElementById('NIF').value = '';
            document.getElementById('Nombre').value = '';
            document.getElementById('Apellidos').value = '';
            document.getElementById('FechaNac').value = '';
            document.getElementById('Sueldo').value = '';
            document.getElementById('NIF').disabled = false;
        }

        document.getElementById('entrenadorForm').addEventListener('reset', resetForm);
    </script>
</body>
</html>
