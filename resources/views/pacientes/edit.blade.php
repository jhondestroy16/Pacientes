@extends('layouts.layout')

@section('titulo', 'Editar paciente')

@section('content')
    <h2 class="texto-blanco pt-5 pb-3">Editar paciente</h2>
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
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="post" class="my-5">
        @method('put')
        @csrf
        <div class="card mt-4 mb-3">
            <div class="card-body shadow">
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="tipo_documento_id" class="form-label texto my-2">
                                <h4 class="texto">Tipo de documento</h4>
                            </label>
                            <select name="tipo_documento_id" class="form-control">
                                <option selected disabled value="">Seleccione...</option>
                                @foreach ($documentos as $documento)
                                    <option value="{{ $documento->id }}" @if ($paciente->tipo_documento_id == $documento->id)
                                        selected
                                @endif>
                                {{ $documento->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="numero_documento" class="form-label texto my-2">
                                <h4 class="texto">Numero de Documento</h4>
                            </label>
                            <input type="number" name="numero_documento" id="numero_documento"
                                placeholder="numero del documento" class="form-control"
                                value="{{ $paciente->numero_documento }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="primer_nombre" class="form-label texto my-2">
                                <h4 class="texto">Primer nombre</h4>
                            </label>
                            <input type="text" name="primer_nombre" id="primer_nombre" placeholder="Primer nombre"
                                class="form-control" value="{{ $paciente->primer_nombre }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="segundo_nombre" class="form-label texto my-2">
                                <h4 class="texto">Segundo nombre</h4>
                            </label>
                            <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo nombre"
                                class="form-control" value="{{ $paciente->segundo_nombre }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="primer_apellido" class="form-label texto my-2">
                                <h4 class="texto">Primer apellido</h4>
                            </label>
                            <input type="text" name="primer_apellido" id="primer_apellido" placeholder="Primer apellido"
                                class="form-control" value="{{ $paciente->primer_apellido }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="segundo_apellido" class="form-label texto my-2">
                                <h4 class="texto">Segundo apellido</h4>
                            </label>
                            <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo apellido"
                                class="form-control" value="{{ $paciente->segundo_apellido }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="genero_id" class="form-label texto my-2">
                                <h4 class="texto">Genero</h4>
                            </label>
                            <select name="genero_id" class="form-control">
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}" @if ($paciente->genero_id == $genero->id)
                                        selected
                                @endif>
                                {{ $genero->nombre }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="departamento_id" class="form-label texto my-2">
                                <h4 class="texto">departamentos</h4>
                            </label>
                            <select name="departamento_id" class="form-control">
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}" @if ($paciente->departamento_id == $departamento->id)
                                        selected
                                @endif>
                                {{ $departamento->nombre }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <div class="mb-2">
                            <label for="municipio_id" class="form-label texto my-2">
                                <h4 class="texto">Municipios</h4>
                            </label>
                            <select name="municipio_id" class="form-control">
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}" @if ($paciente->municipio_id  == $municipio->id)
                                        selected
                                @endif>
                                {{ $municipio->nombre }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-2"> Guardar </button>
        </div>
    </form>
@endsection
