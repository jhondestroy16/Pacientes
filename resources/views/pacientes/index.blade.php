@extends('layouts.layout')
@section('titulo', 'Pacientes')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Pacientes</h2>
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-hover table-bordered table-striped alto-100">
        <thead>
            <tr>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td> {{ $paciente->primer_nombre }} </td>
                    <td> {{ $paciente->segundo_nombre }} </td>
                    <td> {{ $paciente->primer_apellido }} </td>
                    <td> {{ $paciente->segundo_apellido }} </td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="post"
                            class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Desea eliminar el paciente  {{ $paciente->primer_nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
