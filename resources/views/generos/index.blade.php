@extends('layouts.layout')
@section('titulo', 'Generos')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Generos</h2>
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
            @foreach ($generos as $genero)
                <tr>
                    <td> {{ $genero->nombre }} </td>
                    <td>
                        {{-- <a href="{{ route('generos.show', $genero->id) }}" class="btn btn-info">Detalles</a> --}}
                        <a href="{{ route('generos.edit', $genero->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('generos.destroy', $genero->id) }}" method="post" class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar el genero  {{ $genero->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
