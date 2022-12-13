@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de Lista</h1>
@endsection

@section('seccion')

    <h3>Detalle</h3>
    
    <p>Id                           : {{ $xDetSeguimiento -> idEst }} </p>
    <p>Trabajo Actual               : {{ $xDetSeguimiento -> traAct }} </p>
    <p>Oficio Actual                : {{ $xDetSeguimiento -> ofiAct }} </p>
    <p>Satisfaccion Estudiantil     : {{ $xDetSeguimiento -> satEst }} </p>
    <p>Fecha Seguimiento            : {{ $xDetSeguimiento -> fecSeg }} </p>
    <p>Estado Seguimiento           : {{ $xDetSeguimiento -> estSeg }} </p>


@endsection