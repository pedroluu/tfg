@extends('layouts.app')

@section('template_title')
    Entrenador
@endsection


@push('styles')
    <link href="{{ asset('css/perfilStyles.css') }}" rel="stylesheet">
@endpush


<header class="header">
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid">
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
                        <li><a class="dropdown-item" href="{{ route('admin.clases.index') }}">Clases</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.entrenadors.index') }}">Entrenadores</a></li>
                        <!-- Añade más enlaces según sea necesario -->
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>


@section('content')

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entrenador') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.entrenadors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nif</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Fechanac</th>
										<th>Sueldo</th>
										<th>Gimnasio Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entrenadors as $entrenador)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $entrenador->NIF }}</td>
											<td>{{ $entrenador->Nombre }}</td>
											<td>{{ $entrenador->Apellidos }}</td>
											<td>{{ $entrenador->FechaNac }}</td>
											<td>{{ $entrenador->Sueldo }}</td>
											<td>{{ $entrenador->gimnasio_id }}</td>

                                            <td>
                                                <form action="{{ route('admin.entrenadors.destroy',$entrenador->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.entrenadors.show',$entrenador->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.entrenadors.edit',$entrenador->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $entrenadors->links() !!}
            </div>
        </div>
    </div>



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
                    <p>Dirección:  C. Paz, 13, 45470 Los Yébenes, Toledo</p>
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
@endsection
