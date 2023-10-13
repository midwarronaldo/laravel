<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlumnoRepository;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $alumnos;
    public function __construct(AlumnoRepository $alumnos)
    {
        $this->alumnos = $alumnos;
    }
    public function index()
    {
        //
        $alumnos = $this->alumnos->obtenerAlumnos();
        return view('alumnos.lista', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->alumnos->insertarAlumno($request);
        return redirect()->action([AlumnoController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $alumno = $this->alumnos->obtenerAlumnoPorId($id);
        return view('alumnos.ver', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno = $this->alumnos->obtenerAlumnoPorId($id);
        return view('alumnos.editar', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->alumnos->actualizarAlumno($request, $id);
        return redirect()->action([AlumnoController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->alumnos->eliminarAlumno($id);
        return redirect()->action([AlumnoController::class, 'index']);
    }
}
