<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="n_i_f" class="form-label">{{ __('Nif') }}</label>
            <input type="text" name="NIF" class="form-control @error('NIF') is-invalid @enderror" value="{{ old('NIF', $entrenador?->NIF) }}" id="n_i_f" placeholder="Nif">
            {!! $errors->first('NIF', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old('Nombre', $entrenador?->Nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="Apellidos" class="form-control @error('Apellidos') is-invalid @enderror" value="{{ old('Apellidos', $entrenador?->Apellidos) }}" id="apellidos" placeholder="Apellidos">
            {!! $errors->first('Apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nac" class="form-label">{{ __('Fechanac') }}</label>
            <input type="text" name="FechaNac" class="form-control @error('FechaNac') is-invalid @enderror" value="{{ old('FechaNac', $entrenador?->FechaNac) }}" id="fecha_nac" placeholder="Fechanac">
            {!! $errors->first('FechaNac', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sueldo" class="form-label">{{ __('Sueldo') }}</label>
            <input type="text" name="Sueldo" class="form-control @error('Sueldo') is-invalid @enderror" value="{{ old('Sueldo', $entrenador?->Sueldo) }}" id="sueldo" placeholder="Sueldo">
            {!! $errors->first('Sueldo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gimnasio_id" class="form-label">{{ __('Gimnasio Id') }}</label>
            <input type="text" name="gimnasio_id" class="form-control @error('gimnasio_id') is-invalid @enderror" value="{{ old('gimnasio_id', $entrenador?->gimnasio_id) }}" id="gimnasio_id" placeholder="Gimnasio Id">
            {!! $errors->first('gimnasio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>