<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old('Nombre', $cliente?->Nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="Apellidos" class="form-control @error('Apellidos') is-invalid @enderror" value="{{ old('Apellidos', $cliente?->Apellidos) }}" id="apellidos" placeholder="Apellidos">
            {!! $errors->first('Apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nac" class="form-label">{{ __('Fechanac') }}</label>
            <input type="text" name="FechaNac" class="form-control @error('FechaNac') is-invalid @enderror" value="{{ old('FechaNac', $cliente?->FechaNac) }}" id="fecha_nac" placeholder="Fechanac">
            {!! $errors->first('FechaNac', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cuota" class="form-label">{{ __('Cuota') }}</label>
            <input type="text" name="Cuota" class="form-control @error('Cuota') is-invalid @enderror" value="{{ old('Cuota', $cliente?->Cuota) }}" id="cuota" placeholder="Cuota">
            {!! $errors->first('Cuota', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="Email" class="form-control @error('Email') is-invalid @enderror" value="{{ old('Email', $cliente?->Email) }}" id="email" placeholder="Email">
            {!! $errors->first('Email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="usuario" class="form-label">{{ __('Usuario') }}</label>
            <input type="text" name="Usuario" class="form-control @error('Usuario') is-invalid @enderror" value="{{ old('Usuario', $cliente?->Usuario) }}" id="usuario" placeholder="Usuario">
            {!! $errors->first('Usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gimnasio_id" class="form-label">{{ __('Gimnasio Id') }}</label>
            <input type="text" name="gimnasio_id" class="form-control @error('gimnasio_id') is-invalid @enderror" value="{{ old('gimnasio_id', $cliente?->gimnasio_id) }}" id="gimnasio_id" placeholder="Gimnasio Id">
            {!! $errors->first('gimnasio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>