<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\TipoDocumento;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Genero;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:pacientes');
    }

    public function index()
    {
        $pacientes = Paciente::orderBy('numero_documento', 'asc')->get();

        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();
        $documentos = TipoDocumento::orderBy('nombre', 'asc')->get();
        $municipios = Municipio::orderBy('nombre', 'asc')->get();
        $generos = Genero::orderBy('nombre', 'asc')->get();

        return view('pacientes.insert', compact('departamentos', 'documentos', 'municipios', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePacienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => ['required'],
            'numero_documento' => ['required'],
            'primer_nombre' => ['required'],
            'primer_apellido' => ['required'],
            'genero_id' => ['required'],
            'departamento_id' => ['required'],
            'municipio_id' => ['required']
        ]);

        $paciente = Paciente::create($request->all());
        return redirect()->route('pacientes.index')->with('exito', 'Se ha registrado el paciente correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::join('tipo_documentos', 'pacientes.tipo_documento_id', '=', 'tipo_documentos.id')
            ->join('generos', 'pacientes.genero_id', '=', 'generos.id')
            ->join('departamentos', 'pacientes.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'pacientes.municipio_id', '=', 'municipios.id')
            ->select('tipo_documentos.nombre as nombreTipoDocumento', 'generos.nombre as nombreGenero', 'departamentos.nombre as nombreDepartamento', 'municipios.nombre as nombreMunicipio', 'pacientes.*')
            ->where('pacientes.id', '=', $id)
            ->first();
        return view('pacientes.view', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();
        $documentos = TipoDocumento::orderBy('nombre', 'asc')->get();
        $municipios = Municipio::orderBy('nombre', 'asc')->get();
        $generos = Genero::orderBy('nombre', 'asc')->get();
        $paciente = Paciente::FindOrFail($id);

        return view('pacientes.edit', compact('departamentos', 'municipios','documentos','generos','paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacienteRequest  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_documento_id' => ['required'],
            'numero_documento' => ['required'],
            'primer_nombre' => ['required'],
            'primer_apellido' => ['required'],
            'genero_id' => ['required'],
            'departamento_id' => ['required'],
            'municipio_id' => ['required']
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('exito', 'Se ha modificado los datos del paciente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
