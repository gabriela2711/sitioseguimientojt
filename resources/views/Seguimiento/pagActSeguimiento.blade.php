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

    <form action="{{ route('Seguimiento.xUpdateseg', $xActSeguimiento->id)}}" method="post" class="d-grid gap-2">
        @method('PUT')    
        @csrf

        <input type="text" name="idEst" placeholder="ID" value="{{ $xActSeguimiento->idEst }}" class="form-control mb-2">    
        
        <select name="traAct" class="form-control mb-2">
            <option value="">Seleccione Trabajo Actual...</option>
            <option value="SI" @if ($xActSeguimiento->traAct =="si") {{ "SELECTED" }} @endif >SI</option>
            <option value="NO" @if ($xActSeguimiento->traAct =="no") {{ "SELECTED" }} @endif >NO</option>
        </select>        
        
        <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ $xActSeguimiento->ofiAct }}" class="form-control mb-2">

        <select name="satEst" class="form-control mb-2">
            <option value="">Satisfacción estudiantil</option>
            <option value="0-No esta satisfecho" @if ($xActSeguimiento->satEst =="No esta satisfecho") {{ "SELECTED" }} @endif >0-No esta satisfecho</option>
            <option value="1-Regular" @if ($xActSeguimiento->satEst =="Regular") {{ "SELECTED" }} @endif >1-Regular</option>
            <option value="2-Bueno" @if ($xActSeguimiento->satEst =="Bueno") {{ "SELECTED" }} @endif >2-Bueno</option>
            <option value="3-Muy bueno" @if ($xActSeguimiento->satEst =="Muy bueno") {{ "SELECTED" }} @endif >3-Muy bueno</option>
        </select>
        
        <input type="text" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ $xActSeguimiento->fecSeg }}" class="form-control mb-2">

        <input type="text" name="estSeg" placeholder="Estado de seguimiento" value="{{ $xActSeguimiento->estSeg }}" class="form-control mb-2">

        <button class="btn btn-warning" type="submit">ACTUALIZAR</button>
    </form>
@endsection    