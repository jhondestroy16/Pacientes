@extends('layouts.layout')
@section('titulo', 'Municipios')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Municipios</h2>
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-hover table-bordered table-striped alto-100">
        <thead>
            <tr>
                <th>Nombre municipio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($municipios as $municipio)
                <tr>
                    <td> {{ $municipio->nombre }} </td>
                    <td>
                        <a href="{{ route('municipios.show', $municipio->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('municipios.edit', $municipio->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('municipios.destroy', $municipio->id) }}" method="post"
                            class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar el municipio  {{ $municipio->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
