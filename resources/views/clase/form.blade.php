<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old('Nombre', $clase?->Nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ejercicios" class="form-label">{{ __('Ejercicios') }}</label>
            <input type="text" name="ejercicios" class="form-control @error('ejercicios') is-invalid @enderror" value="{{ old('ejercicios', $clase?->ejercicios) }}" id="ejercicios" placeholder="Ejercicios">
            {!! $errors->first('ejercicios', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="capacidad" class="form-label">{{ __('Capacidad') }}</label>
            <input type="text" name="capacidad" class="form-control @error('capacidad') is-invalid @enderror" value="{{ old('capacidad', $clase?->capacidad) }}" id="capacidad" placeholder="Capacidad">
            {!! $errors->first('capacidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="entrenador_id" class="form-label">{{ __('Entrenador Id') }}</label>
            <input type="text" name="entrenador_id" class="form-control @error('entrenador_id') is-invalid @enderror" value="{{ old('entrenador_id', $clase?->entrenador_id) }}" id="entrenador_id" placeholder="Entrenador Id">
            {!! $errors->first('entrenador_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora" class="form-label">{{ __('Hora') }}</label>
            <input type="text" name="hora" class="form-control @error('hora') is-invalid @enderror" value="{{ old('hora', $clase?->hora) }}" id="hora" placeholder="Hora">
            {!! $errors->first('hora', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="dia" class="form-label">{{ __('Dia') }}</label>
            <input type="text" name="dia" class="form-control @error('dia') is-invalid @enderror" value="{{ old('dia', $clase?->dia) }}" id="dia" placeholder="Dia">
            {!! $errors->first('dia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>