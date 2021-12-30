@extends('layouts.layout')
@section('titulo', 'Tipo de documento')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Tipo de documento</h2>
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-hover table-bordered table-striped alto-100">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoDocumentos as $tipoDocumento)
                <tr>
                    <td> {{ $tipoDocumento->nombre }} </td>
                    <td>
                        {{-- <a href="{{ route('documentos.show', $tipoDocumento->id) }}" class="btn btn-info">Detalles</a> --}}
                        <a href="{{ route('documentos.edit', $tipoDocumento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('documentos.destroy', $tipoDocumento->id) }}" method="post"
                            class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar el tipo de documento  {{ $tipoDocumento->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
