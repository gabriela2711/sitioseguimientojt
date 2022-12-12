@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de actualizar</h1>
@endsection

@section('seccion')

    <h3>Detalle</h3>

    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <h3>Lista</h3>

    <form action="{{ route('Estudiante.xUpdate', $xActAlumnos->id)}}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @if($errors->has('codEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>codigo</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('nomEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>nombre</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>apellido</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('fnaEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                La <strong>fecha de nacimiento</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('turMat'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>turno</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('semMat'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>semestre</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('estMat'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>estado</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        <input type="text" name="codEst" placeholder="Código" value="{{ $xActAlumnos->codEst }}" class="form-control mb-2">    
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ $xActAlumnos->nomEst }}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ $xActAlumnos->apeEst }}" class="form-control mb-2">
        <input type="text" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ $xActAlumnos->fnaEst }}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActAlumnos->turMat ==1) {{ "SELECTED" }} @endif >Turno Dia(1)</option>
            <option value="2" @if ($xActAlumnos->turMat ==2) {{ "SELECTED" }} @endif >Turno Noche(2)</option>
            <option value="3" @if ($xActAlumnos->turMat ==3) {{ "SELECTED" }} @endif >Turno Tarde(3)</option>
        </select>
        <select name="semMat" class="form-control mb-2">
        <option value="">Seleccione...</option>
        @for($i=1; $i < 7; $i++)
            <option value="{{$i}}" @if ($xActAlumnos->semMat == $i) {{ "SELECTED" }} @endif >Semestre {{$i}}</option>
        @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1"@if ($xActAlumnos->estMat == 1) {{ "SELECTED" }} @endif >Activo </option>
            <option value="0"@if ($xActAlumnos->estMat == 0) {{ "SELECTED" }} @endif >Inactivo </option>
        </select>
        <button class="btn btn-warning" type="submit">Actualizar</button>
    </form>


@endsection