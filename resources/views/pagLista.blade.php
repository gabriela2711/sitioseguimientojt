@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de Lista</h1>
@endsection

@section('seccion')

    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <h3>Lista</h3>

    <form action="{{ route('Estudiante.xRegistrar')}}" method="post" class="d-grid gap-2">
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

        <input type="text" name="codEst" placeholder="Código" value="{{ old('codEst')}}" class="form-control mb-2">    
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ old('nomEst')}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ old('apeEst')}}" class="form-control mb-2">
        <input type="date" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ old('fnaEst')}}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1">Turno Dia</option>
            <option value="2">Turno Noche</option>
            <option value="3">Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
        <option value="">Seleccione...</option>
        @for($i=1; $i < 7; $i++)
            <option value="{{$i}}">Semestre {{$i}}</option>
        @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

    <hr>
    <h3>Lista</h3>

        <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Codigo</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Estado de Matricula</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($xAlumnos as $item) 
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->codEst }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle', $item->id) }}">    
                    {{ $item->apeEst }}, {{ $item->nomEst }}
                    </a>
                </td>
                <td>{{ $item->estMat }}</td>
                <td>
                    <form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>    

                    <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id) }}">    
                    A
                    </a>
                </td>
            </tr>
            @endforeach  
        </tbody>
    </table>
    {{ $xAlumnos->links() }}
@endsection