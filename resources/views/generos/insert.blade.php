@extends('layouts.layout')

@section('titulo', 'Registro genero')
@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Registrar nuevo genero</h2>
    @if ($errors->any())

        <div class="alert alert-danger">
            <div class="header">
                <strong>Ups...</strong>algo salio mal
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{ route('generos.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="card mt-4 mb-3">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="nombre" class="form-label texto my-2">
                                <h4 class="texto">Nombre</h4>
                            </label>
                            <input type="text" name="nombre" id="nombre" placeholder="Femenino"
                                class="form-control" value="{{ old('nombre') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-4"> Guardar </button>
        </div>
    </form>
@endsection
