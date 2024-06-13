<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/perfilStyles.css') }}" rel="stylesheet">
    <title>Gestión de Clientes - Hades Box Center</title>
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
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cogs"></i> Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.clientes.index') }}">Clientes</a></li>
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

        <h1>Gestión de Clientes</h1>

        <!-- Listar Clientes -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Tarifa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->Nombre }}</td>
                        <td>{{ $cliente->Apellidos }}</td>
                        <td>{{ $cliente->Email }}</td>
                        <td>{{ $cliente->Usuario }}</td>
                        <td>{{ $cliente->FechaNac }}</td>
                        <td>{{ $cliente->Cuota }} €/mes</td>
                        <td>
                            <button class="btn btn-warning" onclick="editCliente({{ $cliente }})">Editar</button>
                            <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Formulario Crear/Editar Cliente -->
        <div id="clienteFormContainer">
            <h2 id="formTitle">Añadir Cliente</h2>
            <form action="{{ route('admin.clientes.store') }}" method="POST" id="clienteForm">
                @csrf
                <input type="hidden" id="clienteId" name="id">
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="Apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" required>
                </div>
                <div class="mb-3">
                    <label for="Usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="Usuario" name="Usuario" required>
                </div>
                <div class="mb-3">
                    <label for="FechaNac" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="FechaNac" name="FechaNac" required>
                </div>
                <div class="mb-3">
                    <label for="Cuota" class="form-label">Tarifa</label>
                    <select class="form-control" id="Cuota" name="Cuota">
                        <option value="40" {{ old('Cuota') == '40' ? 'selected' : '' }}>HADES - 40 €/mes</option>
                        <option value="35" {{ old('Cuota') == '35' ? 'selected' : '' }}>ZEUS - 35 €/mes</option>
                        <option value="30" {{ old('Cuota') == '30' ? 'selected' : '' }}>POSEIDÓN - 30 €/mes</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small id="passwordHelp" class="form-text text-muted">Dejar en blanco para no cambiar la contraseña</small>
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
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Hades Box Center. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        function editCliente(cliente) {
            document.getElementById('formTitle').innerText = 'Editar Cliente';
            document.getElementById('clienteForm').action = "{{ route('admin.clientes.update', ['cliente' => ':cliente']) }}".replace(':cliente', cliente.id);
            document.getElementById('clienteForm').insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
            document.getElementById('clienteId').value = cliente.id;
            document.getElementById('Nombre').value = cliente.Nombre;
            document.getElementById('Apellidos').value = cliente.Apellidos;
            document.getElementById('FechaNac').value = cliente.FechaNac;
            document.getElementById('Cuota').value = cliente.Cuota;
            document.getElementById('password').value = '';

            document.getElementById('Email').disabled = true;
            document.getElementById('Usuario').disabled = true;
        }

        document.getElementById('clienteForm').addEventListener('reset', function() {
            document.getElementById('formTitle').innerText = 'Añadir Cliente';
            document.getElementById('clienteForm').action = '{{ route('admin.clientes.store') }}';
            let methodInput = document.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }
            document.getElementById('clienteId').value = '';
            document.getElementById('Nombre').value = '';
            document.getElementById('Apellidos').value = '';
            document.getElementById('Email').value = '';
            document.getElementById('Usuario').value = '';
            document.getElementById('FechaNac').value = '';
            document.getElementById('Cuota').value = '40'; // Selecciona la primera opción por defecto
            document.getElementById('password').value = '';

            document.getElementById('Email').disabled = false;
            document.getElementById('Usuario').disabled = false;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-4ddk/TRE2AwzzA3uMcZ+mm7XbpT4D80KXsfFNJffPxAeBw/Oa2e5pWnlf2zFPCUc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ZiJmP3ZczqHv0C+M8rG3PjozyL/EvWo+pyy3xbJo80GhsVi3M/HGvGZK8pF4pU2g" crossorigin="anonymous"></script>
</body>
</html>
