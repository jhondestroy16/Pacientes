@extends('layouts.layout')
@section('titulo', 'Departamentos')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Departamentos</h2>
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
            @foreach ($departamentos as $departamento)
                <tr>
                    <td> {{ $departamento->nombre }} </td>
                    <td>
                        <a href="{{ route('departamentos.show', $departamento->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="post"
                            class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar la mascota  {{ $departamento->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
