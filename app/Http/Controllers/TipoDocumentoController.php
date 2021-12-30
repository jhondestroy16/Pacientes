<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumentos = TipoDocumento::orderBy('nombre', 'asc')->get();

        return view('documentos.index', compact('tipoDocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoDocumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $tipoDocumento = TipoDocumento::create($request->all());
        return redirect()->route('documentos.index')->with('exito', 'Se ha registrado el tipo de documento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDocumento = TipoDocumento::FindOrFail($id);

        return view('documentos.edit', compact('tipoDocumento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoDocumentoRequest  $request
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $tipoDocumento = TipoDocumento::FindOrFail($id);
        $tipoDocumento->update($request->all());

        return redirect()->route('documentos.index')->with('exito', 'Se ha modificado los datos exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::FindOrFail($id);
        $tipoDocumento->delete();
        return redirect()->route('documentos.index')->with('exito', 'Se ha eliminado el tipo de documentos exitosamente');
    }
}
