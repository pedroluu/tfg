@extends('layouts.app')

@section('template_title')
    {{ $entrenador->name ?? __('Show') . " " . __('Entrenador') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Entrenador</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.entrenadors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Nif:</strong>
                            {{ $entrenador->NIF }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $entrenador->Nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Apellidos:</strong>
                            {{ $entrenador->Apellidos }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fechanac:</strong>
                            {{ $entrenador->FechaNac }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Sueldo:</strong>
                            {{ $entrenador->Sueldo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Gimnasio Id:</strong>
                            {{ $entrenador->gimnasio_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
