<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Municipio;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();

        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required']
        ]);
        $departamento = Departamento::create($request->all());
        return redirect()->route('departamentos.index')->with('exito', 'Se ha registrado el departamento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipios = Municipio::join('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')
            ->select('municipios.*', 'departamentos.nombre as nombreDepartamento')
            ->where('departamentos.id', '=', $id)
            ->get();
        $departamento = Departamento::FindOrFail($id);
        return view('departamentos.view', compact('municipios', 'departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = Departamento::FindOrFail($id);
        return view('departamentos.edit', compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartamentoRequest  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $departamento = Departamento::FindOrFail($id);
        $departamento->update($request->all());

        return redirect()->route('departamentos.index')->with('exito', 'Se ha modificado los datos exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::FindOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('exito', 'Se ha eliminado el departamento exitosamente');
    }
}
