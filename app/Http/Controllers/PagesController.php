<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Estudiante1;
use App\Models\Seguimiento;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');  
    }

    public function fnSegDetalle($id){
        $xDetSeguimiento = Seguimiento::findOrFail($id);
        return view('Seguimiento.pagDetSeguimiento', compact('xDetSeguimiento'));
    }

    public function fnSegActualizar($id){
        $xActSeguimiento = Seguimiento::findOrFail($id);
        return view('Seguimiento.pagActSeguimiento', compact('xActSeguimiento'));
    }

    public function fnUpdateseg(Request $request, $id){
        $xUpdatesegAlumnos = Seguimiento::findOrFail($id);

        $xUpdatesegAlumnos->idEst = $request->idEst;
        $xUpdatesegAlumnos->traAct = $request->traAct;
        $xUpdatesegAlumnos->ofiAct = $request->ofiAct;
        $xUpdatesegAlumnos->satEst = $request->satEst;
        $xUpdatesegAlumnos->fecSeg = $request->fecSeg;
        $xUpdatesegAlumnos->estSeg = $request->estSeg;

        $xUpdatesegAlumnos->save();

        //return view('pagLista';)
        return back()->with('msj','Se actualizo con exito');

        $xDetSeguimiento = Seguimiento::findOrFail($id);
        return view('Seguimiento.pagDetSeguimiento', compact('xDetSeguimiento'));
        
    }

    public function fnEliminarseg($id){
        $xdeleteSeguimiento = Seguimiento::findOrFail($id);
        $xdeleteSeguimiento->delete();
        return back()->with('msj','Se elimino con éxito');
    
    }

    public function fnSeguimiento(){
        $xSeguimiento = Seguimiento::paginate(3);
        return view('pagSeguimiento', compact('xSeguimiento'));
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante1::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito');
    }

    public function fnUpdate(Request $request, $id){
        $xUpdateAlumnos = Estudiante1::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;

        $xUpdateAlumnos->save();

        //return view('pagLista';)
        return back()->with('msj','Se actualizo con exito');

        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
        
    }

    public function fnRegistrar(Request $request){
        //return $request; 
        
        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante1;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();

        //return view('pagLista';)
        return back()->with('msj','Se registro con exito');

        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
        
    }

    public function fnLista(){
        $xAlumnos = Estudiante1::paginate(4);
        return view('pagLista', compact('xAlumnos'));
        
    }

    public function fnRegistrarSeg(Request $request){
        //return $request;
        
        $request -> validate([
            'idEst'=>'required',
            'traAct'=>'required',
            'ofiAct'=>'required',
            'satEst'=>'required',
            'fecSeg'=>'required',
            'estSeg'=>'required'
        ]);

        $nuevoEstudianteseg = new Seguimiento;
        $nuevoEstudianteseg->idEst = $request->idEst;
        $nuevoEstudianteseg->traAct = $request->traAct;
        $nuevoEstudianteseg->ofiAct = $request->ofiAct;
        $nuevoEstudianteseg->satEst = $request->satEst;
        $nuevoEstudianteseg->fecSeg = $request->fecSeg;
        $nuevoEstudianteseg->estSeg = $request->estSeg;

        $nuevoEstudianteseg->save();
        return back()->with('msj','Se registro con exito');
        
    }


    public function fnGaleria($numero=0){

        $valor=$numero;
        $otro=25;
        //return view('pagGaleria', ['valor' => $numero, 'otro' => 25]);
        return view('pagGaleria', compact('valor','otro'));
    }
}


