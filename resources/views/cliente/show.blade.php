@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? __('Show') . " " . __('Cliente') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.clientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $cliente->Nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Apellidos:</strong>
                            {{ $cliente->Apellidos }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fechanac:</strong>
                            {{ $cliente->FechaNac }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cuota:</strong>
                            {{ $cliente->Cuota }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Email:</strong>
                            {{ $cliente->Email }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Usuario:</strong>
                            {{ $cliente->Usuario }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Gimnasio Id:</strong>
                            {{ $cliente->gimnasio_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
