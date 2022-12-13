@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de Seguimiento</h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <form action="{{ route('Seguimiento.xRegistrarseg')}}" method="post" class="d-grid gap-2">
        @csrf

        @if($errors->has('idEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>codigo</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('traAct'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>trabajo actual</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('ofiAct'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>oficio actual</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('satEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                La <strong>satisfaccion</strong> es requerida
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('fecSeg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                La <strong>fecha</strong> es requerida
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        @if($errors->has('estSeg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>estado</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
        @endif

        <input type="text" name="idEst" placeholder="ID" value="{{ old('idEst')}}" class="form-control mb-2">    
        
        <select name="traAct" class="form-control mb-2">
            <option value="">Trabajo Actual</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
        </select>        
        
        <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ old('ofiAct')}}" class="form-control mb-2">

        <select name="satEst" class="form-control mb-2">
            <option value="">Satisfacción estudiantil</option>
            <option value="0-No esta satisfecho">0-No esta satisfecho</option>
            <option value="1-Regular">1-Regular</option>
            <option value="2-Bueno">2-Bueno</option>
            <option value="3-Muy bueno">3-Muy bueno</option>
        </select>
        
        <input type="text" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ old('fecSeg')}}" class="form-control mb-2">

        <input type="text" name="estSeg" placeholder="Estado de seguimiento" value="{{ old('estSeg')}}" class="form-control mb-2">

        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

    <hr>
    <h3>Seguimiento</h3>

    <table class="table">
    <thead class="table-dark">
        <tr>
        <th scope="col">ID seguimiento</th>
        <th scope="col">Codigo</th>
        <th scope="col">Trabajo Actual</th>
        <th scope="col">Oficio actual</th>
        <th scope="col">Satisfacción estudiantil</th>
        <th scope="col">Fecha de seguimiento</th>
        <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($xSeguimiento as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>
                <a href="{{ route('Seguimiento.xDetalle', $item->id) }}">
                    {{ $item->idEst }}
                </a>
            </td>
            <td>{{ $item->traAct }}</td>
            <td>{{ $item->ofiAct }}</td>
            <td>{{ $item->satEst }}</td>
            <td>{{ $item->fecSeg }}</td>
            <td>
                <form action="{{ route('Seguimiento.xEliminarseg', $item->id) }}" method="post" class="d-inline"> 
                    @method('DELETE')  
                    @csrf
                   <button type="submit" class="btn btn-danger btn-sm"> X </button>
                </form>   

                <a class="btn btn-warning btn-sm" href="{{ route('Seguimiento.xActualizarseg', $item->id) }}">
                ...A
                </a>
            </td>
        </tr>
        @endforeach     
    </tbody>
    </table>
    </hr>
    {{ $xSeguimiento->links() }}
@endsection