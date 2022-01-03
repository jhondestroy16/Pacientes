<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:generos');
    }

    public function index()
    {
        $generos = Genero::orderBy('nombre', 'asc')->get();
        return view('generos.index', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $generos = Genero::create($request->all());
        return redirect()->route('generos.index')->with('exito', 'Se ha registrado el genero correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generos = Genero::FindOrFail($id);
        return view('generos.edit', compact('generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneroRequest  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $genero = Genero::FindOrFail($id);
        $genero->update($request->all());

        return redirect()->route('generos.index')->with('exito', 'Se ha modificado los datos exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::FindOrFail($id);
        $genero->delete();
        return redirect()->route('generos.index')->with('exito', 'Se ha eliminado el genero exitosamente');
    }
}
