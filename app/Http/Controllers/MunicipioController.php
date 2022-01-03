<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:municipios');
    }

    public function index()
    {
        $municipios = Municipio::orderBy('nombre', 'asc')->get();

        return view('municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();

        return view('municipios.insert', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMunicipioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'departamento_id' => ['required']
        ]);

        $municipio = Municipio::create($request->all());
        return redirect()->route('municipios.index')->with('exito', 'Se ha registrado el departamento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipio = Municipio::join('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')
            ->select('municipios.*', 'departamentos.nombre as nombreDepartamento')
            ->where('municipios.id', '=', $id)
            ->first();
        return view('municipios.view', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();
        $municipio = Municipio::FindOrFail($id);

        return view('municipios.edit', compact('departamentos', 'municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMunicipioRequest  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required'],
            'departamento_id' => ['required']
        ]);

        $municipio = Municipio::findOrFail($id);
        $municipio->update($request->all());

        return redirect()->route('municipios.index')->with('exito', 'Se ha modificado los datos del municipio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();

        return redirect()->route('municipios.index')->with('exito', 'Se ha eliminado la mascota correctamente.');
    }
}
