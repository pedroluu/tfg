@extends('layouts.app')

@section('template_title')
    {{ $clase->name ?? __('Show') . " " . __('Clase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Clase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.clases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $clase->Nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Ejercicios:</strong>
                            {{ $clase->ejercicios }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Capacidad:</strong>
                            {{ $clase->capacidad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Entrenador Id:</strong>
                            {{ $clase->entrenador_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Hora:</strong>
                            {{ $clase->hora }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dia:</strong>
                            {{ $clase->dia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
